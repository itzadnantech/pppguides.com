<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'assets/libraries/phpspreadsheet/vendor/autoload.php';
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Importall extends CI_Controller {

    public function __construct() {

        parent::__construct();	
        	
         $this->checkUser();
		$this->load->helper('string');
	}
    function checkUser(){
        if(strlen($this->session->userdata('cust_id'))<1){
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($actual_link,'payBill') !== false) {
                $this->session->set_userdata('redirect_url',$actual_link);
            }
            //echo $this->session->userdata('redirect_url');
           header("Location: ".base_url());
            exit; 
        }
    } 

    public function get_hours_by_freq($payfreq,$hour)
    {

        $hours = 0;

        if($hour > 0 && !empty($hour)){
            $hours = $hour;
        }else{

        if($payfreq == "weekly")
        {
            $hours = 40;
        }
        elseif($payfreq == "bi-weekly")
        {
            $hours = 80;
        }
        elseif($payfreq == "semi-monthly")
        {
            $hours = 87;
        }
        elseif($payfreq == "monthly")
        {
            $hours = 173;
        }

        }

        return $hours;

    }

public function format_ssn($ssn)
{
    $new_ssn = "xxx-xx-xxxx";

    if(!empty($ssn))
    {
        $exp = explode("-",$ssn);

        $new_ssn ="xxx-xx-".$exp[2];
    }

    return $new_ssn;
}
/***********************ADP DATA Start**************************/    
public function save_adp_data($data)
{
    $customer_id = $data['customer_id'];
    $employee_id = $data['customer_employee_id'];
    $name = $data['employee_name'];

    $query = $this->db->query("SELECT customer_employee_id,customer_id FROM pay_imp_employees_info WHERE employee_name = '$name' AND customer_id = '$customer_id'");

    if($query->num_rows() > 0)
    {
        $row = $query->row();

        $this->db->where('employee_name',$name)
                 ->where('customer_id',$customer_id)
                 ->update('pay_imp_employees_info',$data);

    }else
    {
        $this->db->insert('pay_imp_employees_info',$data);
    }



}

public function adp_column_handler($data,$employee_id,$customer_id,$insert_id,$pay_freq){

    $columns = [];

    $hire_date = "00/00/0000";
    $termination_date = "00/00/0000";
    $s_o_r = "0";
    $status = "";
    $ssn="xxx-xx-xxxx";
    foreach($data as $cell)
    {
    
     
    if(preg_match("/Hire Date:/i", $cell) == 1)
    {
        $hire_date_exp = explode(":",$cell);

        $hire_date = trim($hire_date_exp[1]);
    }

    if(preg_match("/Termination Date:/i", $cell) == 1)
    {
        $termination_date_exp = explode(":",$cell);

        $termination_date = trim($termination_date_exp[1]);
    }

    if(preg_match("/Hourly:/i", $cell) == 1)
    {
        $s_o_r_exp = explode(":",$cell);

        $s_o_r = trim($s_o_r_exp[1]);
    }

    if(preg_match("/Status:/i", $cell) == 1)
    {
        $status_exp = explode(":",$cell);

        $status = trim($status_exp[1]);
    }

    if(preg_match("/SSN:/i", $cell) == 1)
    {
        $ssn_exp = explode(":",$cell);

        $ssn = trim($ssn_exp[1]);
    }
    
    $hire_new_format = date_create($hire_date);
    $date_new_hire = trim(date_format($hire_new_format,"Y-m-d"));

    $termination_new_format = date_create($termination_date);
    $date_new_termination = trim(date_format($termination_new_format,"Y-m-d"));

    $columns['employee_name']=trim($data[0]);
    $columns['hire_date']=$date_new_hire;
    $columns['termination_date']=$date_new_termination;
    $columns['hire_as']='Hourly';
    $columns['is_owner']='FALSE';
    $columns['status'] = $status;
    $columns['customer_employee_id']=$this->format_ssn($ssn);
    $columns['customer_id']=$customer_id;
    $columns['pay_freq'] = $pay_freq;
    $columns['file_id'] = $insert_id;
    $columns['created_by'] = 1;

    }

   return $columns;

}

public function import_adp_data($file_name,$file_type,$customer_id,$insert_id,$freq)
{

    $targetPath ="./assets/documents/".$file_name;

    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    $spreadSheet = $Reader->load($targetPath);

    $excelSheet = $spreadSheet->getActiveSheet();

    $spreadSheetAry = $excelSheet->toArray();

    $sheetCount = count($spreadSheetAry);
    
    $pay_freq = "";

    if(preg_match("/Pay Frequency:/i", $spreadSheetAry[5][0]) == 1)
    {
        $pay_freq_exp = explode(":",$spreadSheetAry[5][0]);

        $pay_freq = trim($pay_freq_exp[1]);
    }else{

        $pay_freq = $freq;

    }

    $str_values = "";
    
    $error = 0;
    for ($i = 0; $i <= $sheetCount; $i ++) {
                
                    if($i == 0)
                    {
                        if(strpos($spreadSheetAry[$i][0],$file_type) !== false){
                              
                                $error = 0;
                        }else{
                         
                            $error = 1;
                        }
                        
                    }

                    if($i > 5 && $error == 0){
                
                        if(empty($spreadSheetAry[$i][0]))
                        {
                            $str_values.="-||||-";
                        }else{
                            $str_values.=$spreadSheetAry[$i][0]."@@@";
                        }
            
                    }

    }

    if($error == 0)
    {

        $unness = explode("-||||--||||--||||--||||--||||--||||-",$str_values)[0];

        $mainarr = explode("-||||-",$unness);

        foreach($mainarr as $row)
        {

            if($row != "Pay Frequency Totals:Biweekly@@@")
            {
                $col = explode("@@@",$row);

                $employee_id = random_string('numeric', 4);

                $resp = $this->adp_column_handler($col,$employee_id,$customer_id,$insert_id,$pay_freq);

                $this->save_adp_data($resp);
        //         echo "<pre>";
        // print_r($resp);
        // echo "</pre>";
        //         echo "<br /><br /><br />";
            }
            

        }

        $this->session->set_flashdata('successmsg','Payroll File Imported Successfully!');

        redirect('import/view/'.$insert_id.'/'.$customer_id.'');


    }else{

        $this->session->set_flashdata('errormsg',"Selected File's Format does not match that of Employee Information. Please check and upload the file again.");

        redirect("user/importExcel");

    }
    echo "Error:".$error;
    //echo $str_values;


}

public function save_adp_payroll_data($data,$insert_id,$pay_freequency)
{

   if(!empty($data['employee_id'])){

   $check = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE employee_name='".trim($data['employee_name'])."' AND customer_id='".$data['customer_id']."'");

   if($check->num_rows() > 0)
   {
    $employee_id = $check->row()->id;
    $pay_freq_new =  $check->row()->pay_freq;
   }else
   {
    $this->db->insert('pay_imp_employees_info',['employee_name'=>trim($data['employee_name']),'customer_id'=>$data['customer_id'],'is_owner'=>'FALSE']);
    $employee_id = $this->db->insert_id();
    $pay_freq_new = $pay_freequency;
   }
   $d = date_create($data['pay_date']);
   $paydate = date_format($d,"Y-m-d");

   $pay_year = date_format($d,"Y");

   


   $payroll_data = [

    'pay_date'=>$paydate,
    'employee_id'=>$employee_id,
    'employee_name'=>trim($data['employee_name']),
    'hours_worked'=>$this->get_hours_by_freq($pay_freq_new,$data['hours_worked']),
    'gross_pay'=>trim(str_replace(",","",str_replace("$","",$data['extra_total_paid']))),
    'health_benefits'=>'',
    'retirement_benefits'=> '',
    'pay_period_begin_date'=> '',
    'pay_period_end_date'=> '',
    'customer_id'=>$data['customer_id'],
    'file_id'=>$insert_id
   ];

   $check_payroll = $this->db->query("SELECT * FROM pay_imp_payroll_info WHERE DATE_FORMAT(pay_date,'%Y-%m-%d')='$paydate' AND 	employee_id='$employee_id' AND customer_id='".$data['customer_id']."'");

   if($check_payroll->num_rows() == 0)
   {
      $before_year = 2019;
      $after_year = 2020;

      if($pay_year >= $before_year &&  $pay_year <= $after_year)
        {
          
          $gross_pay_check = trim(str_replace(",","",str_replace("$","",$data['extra_total_paid'])));  

          if($gross_pay_check > 0)
          {
            $this->db->insert('pay_imp_payroll_info',$payroll_data);
          }

       }
   }

   } 


}

public function adp_payroll_data($file_name,$file_type,$customer_id,$insert_id,$pay_freequency)
{
    $targetPath ="./assets/documents/".$file_name;

    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    $spreadSheet = $Reader->load($targetPath);

    $excelSheet = $spreadSheet->getActiveSheet();

    $spreadSheetAry = $excelSheet->toArray();

    $sheetCount = count($spreadSheetAry);

    $columns_data = [];

    $error = 0;

    for ($i = 0; $i <= $sheetCount; $i ++) {

        if(preg_match("/Report: Payroll Summary/i", $spreadSheetAry[0][0]) == 0)
        {
            $error = 1 ;
        }else{
            $error = 0 ;
        }

        if($i > 4 &&  $error==0){
            $first_cell = (isset($spreadSheetAry[$i][0])) ? $spreadSheetAry[$i][0] : '';
            if(preg_match("/Department Totals:/i", $first_cell) == 0 && 
               preg_match("/Total Net Pays for/i", $first_cell) == 0 &&
               preg_match("/Department:/i", $first_cell) == 0 &&
               preg_match("/Pay Frequency Totals:/i", $first_cell) == 0 &&
               preg_match("/Company Totals:/i", $first_cell) == 0 
            ){

            $columns_data['pay_date']=(isset($spreadSheetAry[$i][0])) ? $spreadSheetAry[$i][0] : '0000-00-00';
            
            $columns_data['employee_id'] = (isset($spreadSheetAry[$i][1])) ? $spreadSheetAry[$i][1] : '';

            $columns_data['employee_name'] = (isset($spreadSheetAry[$i][1])) ? $spreadSheetAry[$i][1] : '';

            $columns_data['hours_worked'] = (isset($spreadSheetAry[$i][2])) ? $spreadSheetAry[$i][2] : 0;

            $columns_data['extra_total_paid'] = (isset($spreadSheetAry[$i][3])) ? $spreadSheetAry[$i][3] : '';

            $columns_data['extra_tax_withheld'] = (isset($spreadSheetAry[$i][4])) ? $spreadSheetAry[$i][4] : '';

            $columns_data['extra_deductions'] = (isset($spreadSheetAry[$i][5])) ? $spreadSheetAry[$i][5] : '';

            $columns_data['extra_net_pay'] = (isset($spreadSheetAry[$i][6])) ? $spreadSheetAry[$i][6] : '';

            $columns_data['extra_check_no'] = (isset($spreadSheetAry[$i][7])) ? $spreadSheetAry[$i][7] : '';

            $columns_data['employer_liability'] = (isset($spreadSheetAry[$i][8])) ? $spreadSheetAry[$i][8] : '';

            $columns_data['total_expense'] = (isset($spreadSheetAry[$i][9])) ? $spreadSheetAry[$i][9] : '';

            $columns_data['customer_id'] = $customer_id;

            $this->save_adp_payroll_data($columns_data,$insert_id,$pay_freequency);

        }

            

        }

    }

   if($error == 0)
   {
    $this->session->set_flashdata('successmsg','Payroll File Imported Successfully!');
    redirect("user/importExcel");
   }else{
    $this->session->set_flashdata('errormsg',"Selected File's Format does not match that of Employee Payroll Data. Please check and upload file again.");

    redirect("user/importExcel");
   }
   
   
}

/***********************ADP DATA End**************************/   

/***********************PayCheck DATA Start**************************/  

public function paycheck_employee_data($file_name,$file_id,$customer_id,$pay_freq)
{
    
    $targetPath ="./assets/documents/".$file_name;

    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    $spreadSheet = $Reader->load($targetPath);

    $excelSheet = $spreadSheet->getActiveSheet();

    $spreadSheetAry = $excelSheet->toArray();

    $sheetCount = count($spreadSheetAry);

    $employee_data = [];

            if($spreadSheetAry[0][7]!="Birth Date")
        {
            $this->session->set_flashdata('errormsg',"Selected File's Format does not match that of Employee Information. Please check and upload the file again.");

            redirect("user/importExcel");
        }else{
            foreach($spreadSheetAry as $key => $row)
            {
                if($key > 0){


                    $hire_new_formatx = date_create($row[33]);
                    $paydate_new_hirex = date_format($hire_new_formatx,"Y-m-d");


                $employee_data = [

                    'employee_name'=>$row[1] ,
                    'hire_date'=>$paydate_new_hirex,
                    'termination_date'=>'0000-00-00',
                    'hire_as'=>(!empty($row[27])) ? (($row[27]=="Y") ? 'Salaried' : 'Hourly') : 'Hourly',
                    'is_owner'=>'FALSE',
                    'status'=>$row[23],
                    'customer_employee_id'=>$this->format_ssn($row[5]),
                    'customer_id'=>$customer_id,
                    'pay_freq'=>(!empty($row[30])) ? strtolower($row[30]) : $pay_freq,
                    'file_id'=>$file_id,
                
                ];
                $emp_name = $row[1];
                $check_employee = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE employee_name='$emp_name' AND customer_id='$customer_id'");
                
                if($check_employee->num_rows() == 0)
                {

                    $this->db->insert('pay_imp_employees_info',$employee_data);


                }else{
                    $this->db->where('id',$check_employee->row()->id)->update('pay_imp_employees_info',$employee_data);
                }
                
               

            }
            }

           
    
            $this->session->set_flashdata('successmsg','Payroll File Imported Successfully!');
        
            redirect('import/view/'.$file_id.'/'.$customer_id.'');

        }

   
    

   
                              

}

public function paycheck_payroll_data($file_name,$file_id,$customer_id,$pay_freequency)
{
    $targetPath ="./assets/documents/".$file_name;

    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    $spreadSheet = $Reader->load($targetPath);

    $excelSheet = $spreadSheet->getActiveSheet();

    $spreadSheetAry = $excelSheet->toArray();

    $sheetCount = count($spreadSheetAry);

    $payroll_data = [];



            if($spreadSheetAry[0][4]!="Regular - Amounts")
        {
            $this->session->set_flashdata('errormsg',"Selected File's Format does not match that of Payroll Information. Please check and upload the file again.");

            redirect("user/importExcel");
        }else{
            foreach($spreadSheetAry as $key => $row)
            {
                if($key > 0){
                    
                    $emp_name = $row[1];
                    if(!empty($emp_name)){
                    $check = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE employee_name='$emp_name' AND customer_id='$customer_id'");
                  
                    if($check->num_rows() == 0)
                    {
                        $this->db->insert('pay_imp_employees_info',['employee_name'=>$emp_name,'customer_id'=>$customer_id,'is_owner'=>'FALSE']);
                         $employee_id = $this->db->insert_id();
                         $pay_freq_new = $pay_freequency;
                     
                    }else
                    { 
                         $employee_id = $check->row()->id;
                         $pay_freq_new = $check->row()->pay_freq;
                    }
                }
               
                $d = date_create($row[3]);

                $pay_year = date_format($d,"Y");
                $before_year = 2019;
                $after_year = 2020;
                if($pay_year >= $before_year &&  $pay_year <= $after_year){


                    $pay_new_format = date_create($row[3]);
                    $paydate_new_pay = trim(date_format($pay_new_format,"Y-m-d"));

                    if(preg_match("/Total:/i", $row[4]) == 0){


            $check_in_payroll = $this->db->query("SELECT * FROM pay_imp_payroll_info WHERE pay_date='$paydate_new_pay' AND employee_id='$employee_id' AND customer_id='$customer_id'");


                $payroll_data  = [

                    'pay_date'=>$paydate_new_pay,
                    'employee_id'=>$employee_id,
                    'employee_name'=>trim($row[1]),
                    'hours_worked'=>$this->get_hours_by_freq($pay_freq_new,0),
                    'gross_pay'=> trim(str_replace(",","",str_replace("$","",$row[4]))),
                    'health_benefits'=>'',
                    'retirement_benefits'=>'',
                    'pay_period_begin_date'=>'',
                    'pay_period_end_date'=>'',
                    'customer_id'=>$customer_id,
                    'file_id'=>$file_id
                
                ];

                
                if($check_in_payroll->num_rows() > 0)
                {
                    // $this->db->where('employee_id',$employee_id)
                    //         ->where('pay_date',$paydate_new_pay)
                    //         ->where('customer_id',$customer_id)
                    //         ->update('pay_imp_payroll_info',$payroll_data);
                }else
                {
                    if(trim(str_replace(",","",str_replace("$","",$row[4]))) > 0)
                    {
                    $this->db->insert('pay_imp_payroll_info',$payroll_data);
                    }
                }




            }

            }

            }
            }

           

            $this->session->set_flashdata('successmsg','Payroll File Imported Successfully!');
        
            redirect("user/importExcel");
        }
      
}
/***********************PayCheck DATA End**************************/ 


/***********************QB DATA End**************************/ 

public function name_revert($emp_name)
{
    $replace = str_replace(",","",$emp_name);

    $trim_one = trim($replace);

    $array = explode(" ",$trim_one);
    
    $length = count($array);
   
    if($length == 2)
    {
        $emp_name_new = $array[1]." ".$array[0];
    }
    elseif($length == 3)
    {
        $emp_name_new = $array[1]." ".$array[2]." ".$array[0];
    }
    elseif($length == 4)
    {
        $emp_name_new = $array[3]." ".$array[2]." ".$array[0]." ".$array[1];
    }
    else
    {
        $emp_name_new = $trim_one;
    }

    return trim($emp_name_new);

    
}

public function qb_payroll_data($file_name,$customer_id,$insert_id,$pay_freq)
{
    $targetPath ="./assets/documents/".$file_name;

    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();

    $spreadSheet = $Reader->load($targetPath);

    $excelSheet = $spreadSheet->getActiveSheet();

    $spreadSheetAry = $excelSheet->toArray();

    $sheetCount = count($spreadSheetAry);

    $payroll_data = [];

    if($spreadSheetAry[6][5]!="Taxes Withheld")
    {
        $this->session->set_flashdata('errormsg',"Selected File's Format does not match that of Payroll Information. Please check and upload the file again.");

        redirect("user/importExcel");
    }else{

    foreach($spreadSheetAry as $key => $row)
    {
        if($key > 6 && $row[1]!="Totals" && $row[1]!="Historical Checks")
        {
            $emp_name = trim($row[1]);
            if(!empty($emp_name)){
                $check = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE employee_name='$emp_name' AND customer_id='$customer_id'");
              
                $emp_name_xyz = $this->name_revert($emp_name);

                if($check->num_rows() == 0)
                {
                    
                    

                    $check_two = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE employee_name='$emp_name_xyz' AND customer_id='$customer_id'");

                    if($check_two->num_rows() > 0)
                    {
                        $employee_id = $check_two->row()->id;

                     $pay_freq_new = $check_two->row()->pay_freq;

                    }else{

                    $this->db->insert('pay_imp_employees_info',['employee_name'=>$emp_name_xyz,'customer_id'=>$customer_id,'pay_freq'=>strtolower($pay_freq),'is_owner'=>'FALSE']);
                     $employee_id = $this->db->insert_id();
                     $pay_freq_new = $pay_freq;

                    }
                }else
                { 
                     $employee_id = $check->row()->id;

                     $pay_freq_new = $check->row()->pay_freq;
                }
            }

        $d = date_create($row[0]);
        $pay_year = date_format($d,"Y");
        $before_year = 2019;
        $after_year = 2020;

        if($pay_year >= $before_year &&  $pay_year <= $after_year){


            $pay_new_format = date_create($row[0]);
            $paydate_new_pay = trim(date_format($pay_new_format,"Y-m-d"));

                $check_in_payroll = $this->db->query("SELECT * FROM pay_imp_payroll_info WHERE pay_date='$paydate_new_pay' AND employee_id='$employee_id' AND customer_id='$customer_id'");

            
                $payroll_data = [

                    'pay_date'=>$paydate_new_pay,
                    'employee_id'=>$employee_id,
                    'employee_name'=>$emp_name_xyz,
                    'hours_worked'=>$this->get_hours_by_freq($pay_freq_new,$row[4]),
                    'gross_pay'=> trim(str_replace(",","",str_replace("$","",$row[7]))),
                    'health_benefits'=>'',
                    'retirement_benefits'=>'',
                    'pay_period_begin_date'=>'',
                    'pay_period_end_date'=>'',
                    'customer_id'=>$customer_id,
                    'file_id'=>$insert_id
                
                ];

                if($check_in_payroll->num_rows() > 0)
                {
                    // $this->db->where('employee_id',$employee_id)
                    //         ->where('pay_date',$paydate_new_pay)
                    //         ->where('customer_id',$customer_id)
                    //         ->update('pay_imp_payroll_info',$payroll_data);
                }else
                {   
                    if(trim(str_replace(",","",str_replace("$","",$row[7]))) > 0)
                    {
                    $this->db->insert('pay_imp_payroll_info',$payroll_data);
                    }
                }
                

            }

            }

        }

    

    $this->session->set_flashdata('successmsg','Payroll File Imported Successfully!');

    redirect("user/importExcel");

    }
   

}


public function qb_employees_data($file_name,$customer_id,$insert_id,$pay_freequency)
{
    
    $targetPath ="./assets/documents/".$file_name;

    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();

    $spreadSheet = $Reader->load($targetPath);

    $excelSheet = $spreadSheet->getActiveSheet();

    $spreadSheetAry = $excelSheet->toArray();

    $sheetCount = count($spreadSheetAry);

    $employee_data = [];

    if($spreadSheetAry[6][0]!="Personal Info")
    {
        $this->session->set_flashdata('errormsg',"Selected File's Format does not match that of Employee Information. Please check and upload the file again.");

        redirect("user/importExcel");
    }else{

    foreach($spreadSheetAry as $key => $row)
    {
        if($key > 6){
            // echo $row[0]."<br />";
            if(empty($row[0]))
            {
                continue;
            }
            $strlower = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $row[0]);
           
            $exp_emp_name = $row[0];
            
            $exp_xyz_one = explode("\n",$exp_emp_name);

            $employee_name = $exp_xyz_one[0];

            $exptwo = explode("Hired:",$strlower);

            $expthree = explode("Born:",$exptwo[1]);

            $hire_date = $expthree[0];

            $hire_new_formatx = date_create($hire_date);

            $paydate_new_hirex = date_format($hire_new_formatx,"Y-m-d");

            // $paycheque = explode("/Month",$row[2]);

            // $gross_pay = trim(str_replace(",","",str_replace("$","",$paycheque[0])));

            $ssn = $row[4];
            
            $employee_data = [

                    'employee_name'=>str_replace(","," ",trim(strtoupper($employee_name))),
                    'hire_date'=>$paydate_new_hirex,
                    'termination_date'=>'0000-00-00',
                    'hire_as'=>'Hourly',
                    'is_owner'=>'FALSE',
                    'status'=>'',
                    'customer_employee_id'=>$this->format_ssn($ssn),
                    'customer_id'=>$customer_id,
                    'pay_freq'=>'monthly',
                    'file_id'=>$insert_id
                
                ];
        
        $empname = trim(strtoupper($employee_name));

        $check_employee = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE employee_name='$empname' AND customer_id='$customer_id'");
                        
        if($check_employee->num_rows() == 0)
        {
            $this->db->insert('pay_imp_employees_info',$employee_data);
        }else{
            $this->db->where('id',$check_employee->row()->id)->update('pay_imp_employees_info',$employee_data);
        }     















        }

    }

    $this->session->set_flashdata('successmsg','Payroll File Imported Successfully!');

        redirect('import/view/'.$insert_id.'/'.$customer_id.'');

    }

    

}

/***********************QB DATA End**************************/ 



/***********************initute DATA start**************************/ 

public function intuit_employee($file_name,$customer_id,$insert_id,$pay_freq)
{

    $targetPath ="./assets/documents/".$file_name;

    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    $spreadSheet = $Reader->load($targetPath);

    $excelSheet = $spreadSheet->getActiveSheet();

    $spreadSheetAry = $excelSheet->toArray();

    $sheetCount = count($spreadSheetAry);

    $columns_string = "";

    if($spreadSheetAry[3][1]!="Work Location"){
        $this->session->set_flashdata('errormsg',"Selected File's Format does not match that of Employee Information. Please check and upload the file again.");

        redirect("user/importExcel");
    }else{
    foreach($spreadSheetAry as $key => $row)
    {
        if($key > 3){
            if(!empty($row[0])){
            if(preg_match("/Born:/i", $row[0]) == 1)
            {
                $columns_string .= $row[0]."-||||-".$row[1]."-||||-".$row[2]."-||||-".$row[3]."@@@@";
            }else{
                $columns_string .= $row[0]."-||||-".$row[1]."-||||-".$row[2]."-||||-".$row[3]."-||||-";
            }
        }
           
    }
    }

    $exp_one = explode("@@@@",$columns_string);

    $emp_data = [];
    foreach($exp_one  as $key => $rows)
    {
        $exp_two = explode("-||||-",$rows);

        $hiredate_date ="0000-00-00";
        $termination_date = "0000-00-00";
        $ssn = "xxx-xx-xxxx";
        foreach($exp_two as $keytwo => $subrows)
        {
            if(preg_match("/Hired:/i", $subrows) == 1)
    {
        $hiredate_date_exp = explode(":", $subrows);

        $hiredate_date = trim($hiredate_date_exp[1]);
    }

    if(preg_match("/Term:/i", $subrows) == 1)
    {
        $term_date_exp = explode(":", $subrows);

        $termination_date = trim($term_date_exp[1]);
    }

    if(preg_match("/SSN:/i", $subrows) == 1)
    {
        $ssn_exp = explode(":", $subrows);

        $ssn = trim($ssn_exp[1]);
    }


        }
       
        if($hiredate_date!=="0000-00-00"){
        $hire_date_one = date_create($hiredate_date);
        $hire_date_txt= date_format($hire_date_one,"Y-m-d");
        }
        if($termination_date!=="0000-00-00" &&  $termination_date!=="yes"){
        $term_date_one = date_create($termination_date);
        $term_date_txt= date_format($term_date_one,"Y-m-d");
    }else{
        $term_date_txt ="0000-00-00";
    }
        if(!empty(str_replace("*","",$exp_two[0]))){
        $emp_data = [

            'employee_name'=>str_replace("*","",$exp_two[0]),
            'hire_date'=>$hire_date_txt,
            'termination_date'=>$term_date_txt,
            'hire_as'=>'Hourly',
            'is_owner'=>'FALSE',
            'status'=>($termination_date=="yes" || $termination_date!="0000-00-00") ? 'Terminated' : 'Active',
            'customer_employee_id'=>$this->format_ssn($ssn),
            'customer_id'=>$customer_id,
            'pay_freq'=>strtolower($pay_freq),
            'file_id'=>$insert_id,

        ];

        $check_employee = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE employee_name='".$exp_two[0]."' AND customer_id='$customer_id'");
                
        if($check_employee->num_rows() == 0)
        {
            $this->db->insert('pay_imp_employees_info',$emp_data);
        }else{
            $this->db->where('id',$check_employee->row()->id)->update('pay_imp_employees_info',$emp_data);
        }

    }



    }

    $this->session->set_flashdata('successmsg','Payroll File Imported Successfully!');
        
    redirect('import/view/'.$insert_id.'/'.$customer_id.'');

 }



}

public function intuit_payroll_data($file_name,$customer_id,$insert_id,$pay_freequency)
{
    $targetPath ="./assets/documents/".$file_name;

    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    $spreadSheet = $Reader->load($targetPath);

    $excelSheet = $spreadSheet->getActiveSheet();

    $spreadSheetAry = $excelSheet->toArray();

    $sheetCount = count($spreadSheetAry);

    $payroll_data = [];

    if($spreadSheetAry[4][2]!="Net Amt")
    {
        $this->session->set_flashdata('errormsg',"Selected File's Format does not match that of Payroll Information. Please check and upload the file again.");

        redirect("user/importExcel");
    }else{

    foreach($spreadSheetAry as $key => $row)
    {
        if($key > 4){
           
            $emp_name =trim(str_replace("*","",$row[1]));
            if(!empty($emp_name) ){
                $check = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE employee_name='$emp_name' AND customer_id='$customer_id'");
              
                if($check->num_rows() == 0)
                {
                    $this->db->insert('pay_imp_employees_info',['employee_name'=>$emp_name,'customer_id'=>$customer_id,'is_owner'=>'FALSE']);
                     $employee_id = $this->db->insert_id();
                     $pay_freq_new = $pay_freequency;
                }else
                { 
                     $employee_id = $check->row()->id;

                     $pay_freq_new = $check->row()->pay_freq;
                }
            }

            $d = date_create($row[0]);
            $pay_year = date_format($d,"Y");
            $before_year = 2019;
            $after_year = 2020;

      if($pay_year >= $before_year &&  $pay_year <= $after_year)
    {

        $date_new_format = date_create($row[0]);
        $paydate_new = trim(date_format($date_new_format,"Y-m-d"));


        $check_in_payroll = $this->db->query("SELECT * FROM pay_imp_payroll_info WHERE pay_date='$paydate_new' AND employee_id='$employee_id' AND customer_id='$customer_id'");

        if(preg_match("/Totals/i", trim(str_replace("*","",$row[1]))) == 0){

            $payroll_data = [

                'pay_date'=>$paydate_new,
                'employee_id'=>$employee_id,
                'employee_name'=>trim(str_replace("*","",$row[1])),
                'hours_worked'=>$this->get_hours_by_freq($pay_freq_new,$row[3]),
                'gross_pay'=>trim(str_replace(",","",str_replace("$","",$row[6]))),
                'health_benefits'=>'',
                'retirement_benefits'=>'',
                'pay_period_begin_date'=>'',
                'pay_period_end_date'=>'',
                'customer_id'=>$customer_id,
                'file_id'=>$insert_id
            
            ];

        }

            if($check_in_payroll->num_rows() > 0)
            {
                // $this->db->where('employee_id',$employee_id)
                //         ->where('pay_date',$paydate_new)
                //         ->where('customer_id',$customer_id)
                //         ->update('pay_imp_payroll_info',$payroll_data);
            }else
            {   
                if(trim(str_replace(",","",str_replace("$","",$row[6]))) > 0)
                {
                    $this->db->insert('pay_imp_payroll_info',$payroll_data);
                }
                
            }

    }

        }
        
    }

   
    $this->session->set_flashdata('successmsg','Payroll File Imported Successfully!');

    redirect("user/importExcel");

 }

}



/***********************initute DATA End**************************/ 

/***********************Standard DATA START**************************/ 

public function standard_template_employee($file_name,$customer_id,$insert_id,$pay_freq)
{

    $targetPath ="./assets/documents/".$file_name;

    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    $spreadSheet = $Reader->load($targetPath);

    $excelSheet = $spreadSheet->getActiveSheet();

    $spreadSheetAry = $excelSheet->toArray();

    $sheetCount = count($spreadSheetAry);

    $employee_data = [];

    if(trim($spreadSheetAry[2][1])!="Employee Summary")
    {

        $this->session->set_flashdata('errormsg',"Selected File's Format does not match that of Employee Information. Please check and upload the file again.");

        redirect("user/importExcel");

    }else{


    foreach($spreadSheetAry as $key => $row)
    {
        if($key > 10){

            $date_new_format = date_create($row[1]);
            $hire_new = trim(date_format($date_new_format,"Y-m-d"));

            if(!empty($row[2]) && $row[2]!="00-00-0000")
            {
            $term_new_format = date_create($row[2]);
            $term_new = trim(date_format($term_new_format,"Y-m-d"));
            }else{
            $term_new = "0000-00-00";
            }

            $employee_data = [

                'employee_name'=>trim($row[0]),
                'hire_date'=>(!empty($hire_new)) ? $hire_new : '0000-00-00',
                'termination_date'=>$term_new,
                'hire_as'=>(!empty( trim($row[3]) )) ? trim($row[3]) : 'Hourly',
                'is_owner'=>'FALSE',
                'status'=>trim($row[4]),
                'customer_employee_id'=>trim($row[5]),
                'customer_id'=>$customer_id,
                'pay_freq'=>(!empty(trim(strtolower($row[6])))) ? trim(strtolower($row[6])) : trim(strtolower($pay_freq)),
                'file_id'=>$insert_id,
                
                ];
        
                $emp_name = trim($row[0]);
                $ssn = trim($row[5]);
                
                $check_employee = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE employee_name='$emp_name' AND customer_employee_id='$ssn' AND customer_id='$customer_id'");

                if($check_employee->num_rows() == 0)
                {
                
                $this->db->insert('pay_imp_employees_info',$employee_data);
                
                
                }else{
                $this->db->where('id',$check_employee->row()->id)->update('pay_imp_employees_info',$employee_data);
                }









        }

    }

    $this->session->set_flashdata('successmsg','Payroll File Imported Successfully!');

    redirect('import/view/'.$insert_id.'/'.$customer_id.'');

 }


}




public function standardtemplate_payroll_data($file_name,$file_id,$customer_id,$pay_freequency)
{
    $targetPath ="./assets/documents/".$file_name;

    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    $spreadSheet = $Reader->load($targetPath);

    $excelSheet = $spreadSheet->getActiveSheet();

    $spreadSheetAry = $excelSheet->toArray();

    $sheetCount = count($spreadSheetAry);

    $payroll_data = [];



            if($spreadSheetAry[2][1]!="Payroll Summary")
        {
            $this->session->set_flashdata('errormsg',"Selected File's Format does not match that of Payroll Information. Please check and upload the file again.");

            redirect("user/importExcel");
        }else{
            foreach($spreadSheetAry as $key => $row)
            {
                if($key > 10){
                    
                    $emp_name = trim($row[1]);
                    $ssnid = trim($row[2]);
                    if(!empty($emp_name)){
                    $check = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE employee_name='$emp_name' AND customer_employee_id='$ssnid' AND customer_id='$customer_id'");
                  
                    if($check->num_rows() == 0)
                    {
                        $this->db->insert('pay_imp_employees_info',['employee_name'=>$emp_name,'customer_employee_id'=>$ssnid,'customer_id'=>$customer_id,'is_owner'=>'FALSE']);
                         $employee_id = $this->db->insert_id();
                         $pay_freq_new = $pay_freequency;
                     
                    }else
                    { 
                         $employee_id = $check->row()->id;

                         $pay_freq_new = $check->row()->pay_freq;
                    }
                }
               
                $d = date_create($row[0]);

                $pay_year = date_format($d,"Y");
                $before_year = 2019;
                $after_year = 2020;
                if($pay_year >= $before_year &&  $pay_year <= $after_year){


                    $pay_new_format = date_create($row[0]);
                    $paydate_new_pay = trim(date_format($pay_new_format,"Y-m-d"));

                    


            $check_in_payroll = $this->db->query("SELECT * FROM pay_imp_payroll_info WHERE pay_date='$paydate_new_pay' AND employee_id='$employee_id' AND customer_id='$customer_id'");


                $payroll_data  = [

                    'pay_date'=>$paydate_new_pay,
                    'employee_id'=>$employee_id,
                    'employee_name'=>trim($row[1]),
                    'hours_worked'=>$this->get_hours_by_freq($pay_freq_new,$row[3]),
                    'gross_pay'=> trim(str_replace(",","",str_replace("$","",$row[4]))),
                    'health_benefits'=>'',
                    'retirement_benefits'=>'',
                    'pay_period_begin_date'=>'',
                    'pay_period_end_date'=>'',
                    'customer_id'=>$customer_id,
                    'file_id'=>$file_id
                
                ];

                
                if($check_in_payroll->num_rows() > 0)
                {
                    // $this->db->where('employee_id',$employee_id)
                    //         ->where('pay_date',$paydate_new_pay)
                    //         ->where('customer_id',$customer_id)
                    //         ->update('pay_imp_payroll_info',$payroll_data);
                }else
                {
                    if(trim(str_replace(",","",str_replace("$","",$row[4]))) > 0)
                    {
                    $this->db->insert('pay_imp_payroll_info',$payroll_data);
                    }
                }




            

            }

            }
            }

           

            $this->session->set_flashdata('successmsg','Payroll File Imported Successfully!');
        
            redirect("user/importExcel");
        }
      
}








/***********************Standard DATA END**************************/ 
public function index()
{
    $config['upload_path']          = "./assets/documents/";
    $config['allowed_types']        = 'xls|xlsx';


    $rep = str_replace(' ','_',$_FILES["imported_file"]['name']);
    $date_time_rep = date('Y_m_d_H_i_s')."_".strtotime(date('Y_m_d_H_i_s'))."_".base64_encode($rep).$rep;

    $config['file_name']        = $date_time_rep;
    $this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('imported_file'))
    {
            $this->session->set_flashdata('errormsg',$this->upload->display_errors());

            redirect("user/importExcel"); 
    }
    else
    {
            $data_file = array('upload_data' => $this->upload->data());

            
            
            $customer_id = $this->input->post('customer_id');
            
            $vendoer_id = $this->input->post('select_vendor');

            $file_type = $this->input->post('data_type');

            $pay_freequency = $this->input->post('pay_frequency');

            $employee_id = random_string('numeric', 4);

            /**************************************************************** */
            $vendor = [];
            $vendor[1]="ADP";
            $vendor[2]="Intuit";
            $vendor[3]="Quickbooks";
            $vendor[4]="Paychex";
            $vendor[5]="Standard Template";
            $vendor[6]="Vendor 6";
            $import_history = [

                'customer_id'=> $customer_id,
                'file_type'=>$file_type,
                'vendor_id'=>$vendor[$vendoer_id],
                'file_name'=>$data_file['upload_data']['orig_name'],
                'created_by'=>1 

            ];

            $this->db->insert('pay_imp_import_record',$import_history);

            $insert_id = $this->db->insert_id();

          /**************************************************************** */

            if($vendoer_id == 1)
            {
                if($file_type == "Employee Summary"){

                $this->import_adp_data($data_file['upload_data']['orig_name'],$file_type,$customer_id,$insert_id,$pay_freequency);
               
            }else{
                    
                $this->adp_payroll_data($data_file['upload_data']['orig_name'],$file_type,$customer_id,$insert_id,$pay_freequency);

                }
            }

            if($vendoer_id == 4)
            {
                if($file_type == "Employee Summary"){

                $this->paycheck_employee_data($data_file['upload_data']['orig_name'],$insert_id,$customer_id,$file_type,$pay_freequency);
               
            }else{
                    
                $this->paycheck_payroll_data($data_file['upload_data']['orig_name'],$insert_id,$customer_id,$file_type,$pay_freequency);

                }
            }

           
            if($vendoer_id == 3)
            {
                if($file_type == "Employee Summary"){

               $this->qb_employees_data($data_file['upload_data']['orig_name'],$customer_id,$insert_id,$pay_freequency);
               
            }else{
                    
                $this->qb_payroll_data($data_file['upload_data']['orig_name'],$customer_id,$insert_id,$pay_freequency);

                }
            }


            if($vendoer_id == 2)
            {
                if($file_type == "Employee Summary"){

               $this->intuit_employee($data_file['upload_data']['orig_name'],$customer_id,$insert_id,$pay_freequency);
               
               
            }else{
                    
               $this->intuit_payroll_data($data_file['upload_data']['orig_name'],$customer_id,$insert_id,$pay_freequency);
               

                }
            }


            if($vendoer_id == 5)
            {
                if($file_type == "Employee Summary"){

               
               $this->standard_template_employee($data_file['upload_data']['orig_name'],$customer_id,$insert_id,$pay_freequency);
               
            }else{
                    
              
               $this->standardtemplate_payroll_data($data_file['upload_data']['orig_name'],$insert_id,$customer_id,$pay_freequency);

                }
            }
            
           

           

   }

}


}



?>