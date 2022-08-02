<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Output extends CI_Controller {
    
    private $session_id;
    public function __construct() {

        parent::__construct();
        
        $this->checkUser();
        $this->session_id = $this->session->userdata('cust_id');	
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
    
    public function check_hourly_or_salried($empid) //New Changes 
    {
       $type = "";

       $query = $this->db->where('employee_id',$empid)->get('pay_imp_payroll_info');

       if($query->num_rows() > 0)
       {
         $row = $query->row();

         if($row->hours_worked > 0)
         {
            $type = "Hourly";
         }else
         {
            $type = "Salaried";
         }
       }else{
            $type = "Hourly";
       }

       return $type;
    }

    public function get_handred_kplus($empid)
    {
        $hundredkPlus = "";

        $query = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE id='$empid'");

        if($query->num_rows() > 0)
        {
        $pay_freq = (!empty($query->row()->pay_freq)) ? trim(strtolower($query->row()->pay_freq)) : 'weekly';

        if($pay_freq == "weekly")
        {
            $highSalary = 1923;

            $query = $this->db->query("SELECT SUM(REPLACE(gross_pay,',','')) total_amount,COUNT(employee_id) paycheck  FROM `pay_imp_payroll_info` WHERE DATE_FORMAT(pay_date,'%Y')='2019' AND employee_id='$empid'");

            if($query->num_rows() > 0)
            {
                if(!$query->row()->total_amount || !$query->row()->paycheck)
                {
                $hundredkPlus="Not employed in 2019";
                }
                else
                {
                  $amount =(int) $query->row()->total_amount;
                  $paycheques = (int) $query->row()->paycheck;
                  $calculation = $amount /  $paycheques;  
                  if($calculation >= $highSalary)
                  {
                    $hundredkPlus="Yes";
                  }else{
                    $hundredkPlus="No"; 
                  }  
                }
            }else
            {
                $hundredkPlus="No";
            }

        }
        elseif($pay_freq == "bi-weekly" || $pay_freq == "biweekly")
        {
            $highSalary = 3846;

            $query = $this->db->query("SELECT SUM(REPLACE(gross_pay,',','')) total_amount,COUNT(employee_id) paycheck  FROM `pay_imp_payroll_info` WHERE DATE_FORMAT(pay_date,'%Y')='2019' AND employee_id='$empid'");

            if($query->num_rows() > 0)
            {
                if(!$query->row()->total_amount || !$query->row()->paycheck)
                {
                $hundredkPlus="Not employed in 2019";
                }
                else
                {
                  $amount =(int) $query->row()->total_amount;
                  $paycheques = (int) $query->row()->paycheck;
                  $calculation = $amount /  $paycheques;  
                  if($calculation >= $highSalary)
                  {
                    $hundredkPlus="Yes";
                  }else{
                    $hundredkPlus="No"; 
                  }  
                }
            }else
            {
                $hundredkPlus="No";
            }
        }
        elseif($pay_freq == "semi-monthly" || $pay_freq == "semimonthly")
        {
            $highSalary = 4166;

            $query = $this->db->query("SELECT SUM(REPLACE(gross_pay,',','')) total_amount,COUNT(employee_id) paycheck  FROM `pay_imp_payroll_info` WHERE DATE_FORMAT(pay_date,'%Y')='2019' AND employee_id='$empid'");

            if($query->num_rows() > 0)
            {
                if(!$query->row()->total_amount || !$query->row()->paycheck)
                {
                $hundredkPlus="Not employed in 2019";
                }
                else
                {
                  $amount =(int) $query->row()->total_amount;
                  $paycheques = (int) $query->row()->paycheck;
                  $calculation = $amount /  $paycheques;  
                  if($calculation >= $highSalary)
                  {
                    $hundredkPlus="Yes";
                  }else{
                    $hundredkPlus="No"; 
                  }  
                }
            }else
            {
                $hundredkPlus="No";
            }
        }
        elseif($pay_freq == "monthly")
        {
            $highSalary = 8334;

            $query = $this->db->query("SELECT SUM(REPLACE(gross_pay,',','')) total_amount,COUNT(employee_id) paycheck  FROM `pay_imp_payroll_info` WHERE DATE_FORMAT(pay_date,'%Y')='2019' AND employee_id='$empid'");

            if($query->num_rows() > 0)
            {
                if(!$query->row()->total_amount || !$query->row()->paycheck)
                {
                $hundredkPlus="Not employed in 2019";
                }
                else
                {
                  $amount =(int) $query->row()->total_amount;
                  $paycheques = (int) $query->row()->paycheck;
                  $calculation = $amount /  $paycheques;  
                  if($calculation >= $highSalary)
                  {
                    $hundredkPlus="Yes";
                  }else{
                    $hundredkPlus="No"; 
                  }  
                }
            }else
            {
                $hundredkPlus="No";
            }
        }

        }else
        {
            $hundredkPlus="No";
        }

        

        

        return strtolower($hundredkPlus);
        
    }
    
    

    public function owners_data($Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24)
    {
        $query = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE is_owner='TRUE' AND customer_id='".$this->session_id."'");
        
        if($query->num_rows() > 0)
        {
            $resp = $query->result();

            $data = [];

            foreach($resp as $row)
            {
                $query_one = $this->db->query("SELECT SUM(REPLACE(gross_pay,',','')) gross_pay_total FROM `pay_imp_payroll_info` WHERE employee_id='".$row->id."' AND DATE_FORMAT(pay_date,'%Y-%m-%d') BETWEEN '2019-01-01' AND '2019-12-31'");
                
                if($query_one->num_rows() > 0)
                {
                    $ownPayLookbackPer = (!$query_one->row()->gross_pay_total) ? 0 : $query_one->row()->gross_pay_total;
                }else
                {
                    $ownPayLookbackPer = 0;
                }
                // $exp_ssn = explode('--',filter_var($row->customer_employee_id, FILTER_SANITIZE_NUMBER_INT));

                // $ssn = $exp_ssn[1];

                $databydate = $this->data_by_date("gross_pay",$row->id,$Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24);
                
               $checkinowner = $this->db
                               ->where('emp_id',$row->id)
                               ->where('cust_id',$row->customer_id)
                               ->get('pay_imp_ownerpayrollsummary');

            
                $data_owner = [
                    'emp_id'=>$row->id,
                    'cust_id'=>$row->customer_id,
                    'empSSN4'=>$row->customer_employee_id,
                    'OwnFname'=>$row->employee_name,
                    'ownPayLookbackPer'=>$ownPayLookbackPer,
                    'ownPayForgPer'=>$databydate['Alt_Period_8_gross_pay'],
                    'ownPayForgPer24'=>$databydate['Alt_Period_24_gross_pay'],
                    'ownPerOwnership'=>0,
                    'ownPPPApplicable'=>0 
                ];

                if($checkinowner->num_rows() == 0)
                {
                    $this->db->insert('pay_imp_ownerpayrollsummary', $data_owner);
                }else{
                    $this->db->where('emp_id',$row->id)
                    ->where('cust_id',$row->customer_id)
                    ->update('pay_imp_ownerpayrollsummary',$data_owner);
                }



            }
            $cust_id=$this->session_id;
            $this->load->Model("MainModel");
            $ownerdata=$this->MainModel->getwhere($cust_id,"ownertable");
            $payrolltable=$this->MainModel->getwhere($cust_id,"payrolltable");
                    
           //print_r($ownerdata);
            //print_r($payrolltable);
            //print_r($resp);
            $or_fname_ar=explode("~",$ownerdata->first_name);
            $or_lname_ar=explode("~",$ownerdata->last_name);
            $or_email=explode("~",$ownerdata->email);
            
            $owner2019_pay=explode("~",$ownerdata->owner2019_pay);
            $alternate8_opay="";
            if(strpos($payrolltable->alternate8_opay,"~")!==FALSE){
                $alternate8_opay=explode("~",$payrolltable->alternate8_opay);
            }
            else{
                $alternate8_opay=0;
            }
            $alternate24_opay=explode("~",$payrolltable->alternate24_opay);
            
            
            foreach($resp as $row)
            {
                $sys_owner=$row->system_owner;
                if(strlen($sys_owner)>1){
                    $sys_own_ar=explode("~",$sys_owner);
                    $first_name=$sys_own_ar[0];
                    $email=$sys_own_ar[1];
                    $last_name=$sys_own_ar[2];
                    
                    $count=count($or_fname_ar);
                    for($i=0;$i<$count;$i++){
               // echo $or_fname_ar[$i]."     ".$first_name."     ".$or_email[$i]."     ".$email."     ".$or_lname_ar[$i]."     ".$last_name;
                        if($or_fname_ar[$i]===$first_name&&$or_email[$i]===$email&&$or_lname_ar[$i]===$last_name){
                            $query_one = $this->db->query("SELECT * FROM `pay_imp_ownerpayrollsummary` WHERE emp_id='".$row->id."'");
                            if($query_one->num_rows() > 0)
                            {
                                $ownPayLookbackPer = $query_one->row()->ownPayLookbackPer;
                                $ownPayForgPer = $query_one->row()->ownPayForgPer;
                                $ownPayForgPer24 = $query_one->row()->ownPayForgPer24;
                                
                                $owner2019_pay[$i]=$ownPayLookbackPer;
                                if(gettype($alternate8_opay)==="array"){
                                    $alternate8_opay[$i]=$ownPayForgPer;
                                }
                                $alternate24_opay[$i]=$ownPayForgPer24;
                            }
                        }
                    }
                    $owner2019pay =implode("~",$owner2019_pay);
                    $alternate8pay="";
                    if(gettype($alternate8_opay)==="array"){
                                    
                        $alternate8pay =implode("~",$alternate8_opay);
                    }
                    else{
                        $alternate8pay=$alternate8_opay;
                    }
                    $alternate24pay =implode("~",$alternate24_opay);
                    $data=array(
                        "owner2019_pay"=>$owner2019pay
                        );
                    $this->MainModel->update($data,$cust_id,"ownertable");
                    
                    
                    $data=array(
                        "alternate8_opay"=>$alternate8pay,
                        "alternate24_opay"=>$alternate24pay
                        );
                    $this->MainModel->update($data,$cust_id,"payrolltable");
                }
                
            }
            
            
            
            
            

            // if(count($data_owner) > 0){

            // $this->db->insert_batch('pay_imp_ownerpayrollsummary', $data_owner); 

            // }
            return count($data_owner);
            
        }

    }
    public function provide_fieds_sum($field,$start,$end,$empid)
    {
        $query = $this->db->query("SELECT SUM(REPLACE(`$field`,',','')) total FROM `pay_imp_payroll_info` WHERE employee_id ='$empid' AND DATE_FORMAT(pay_date,'%Y-%m-%d') BETWEEN '$start' AND '$end'");
    
        if($query->num_rows() > 0)
        {
            return  (!$query->row()->total) ? 0 : $query->row()->total ;
        }
        else{

            return 0 ;

        }
    }

    public function data_by_date($field,$empid,$Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24)
    {
        if(!empty($Alt_Period_Begin_8) && !empty($Alt_Period_End_8) ) {

            $query_one = $this->db->query("SELECT SUM(REPLACE(`$field`,',','')) total FROM pay_imp_payroll_info WHERE employee_id='$empid' AND DATE_FORMAT(pay_date,'%Y-%m-%d') BETWEEN '$Alt_Period_Begin_8' AND '$Alt_Period_End_8'");
            
            if($query_one->num_rows() > 0)
            {
               $Alt_Period_8_gross_pay = (!$query_one->row()->total) ? 0 : $query_one->row()->total;
            }
            else
            {
                $Alt_Period_8_gross_pay = 0 ;
            }

        }
        else {

            $Alt_Period_8_gross_pay = 0 ;

        }

        if(!empty($Alt_Period_Being24) && !empty($Alt_Period_End24)) {

            $query_two = $this->db->query("SELECT SUM(REPLACE(`$field`,',','')) total FROM pay_imp_payroll_info WHERE employee_id='$empid' AND DATE_FORMAT(pay_date,'%Y-%m-%d') BETWEEN '$Alt_Period_Being24' AND '$Alt_Period_End24'");

            if($query_two->num_rows() > 0)
            {
               $Alt_Period_24_gross_pay = (!$query_two->row()->total) ? 0 : $query_two->row()->total;
            }
            else
            {
                $Alt_Period_24_gross_pay = 0 ;
            }
        }
        else {
            
            $Alt_Period_24_gross_pay = 0 ;
        }
    
       

       

        return ['Alt_Period_8_gross_pay'=>$Alt_Period_8_gross_pay,'Alt_Period_24_gross_pay'=>$Alt_Period_24_gross_pay];

    }

    public function empSalRateCurrent($empid)
    {
        $query = $this->db->query("SELECT (REPLACE(gross_pay,',','') / hours_worked) total FROM `pay_imp_payroll_info` WHERE employee_id ='$empid' ORDER BY pay_date DESC LIMIT 1");

        if($query->num_rows() > 0)
        {
            return (!$query->row()->total) ? 0 : $query->row()->total ;

        }else{

            return 0 ;
        }
    }
    public function latest_last_column($empid)
    {
        $query = $this->db->query("SELECT pay_date,hours_worked,gross_pay FROM `pay_imp_payroll_info` WHERE employee_id='$empid' AND DATE_FORMAT(pay_date,'%Y')='2020'  ORDER BY DATE_FORMAT(pay_date,'%Y-%m-%d') DESC LIMIT 1");

        if($query->num_rows() > 0)
        {   $row = $query->row();
            return ['pay_date'=> $row->pay_date,'hours_worked'=>$row->hours_worked,'gross_pay'=>$row->gross_pay];
        }else{
            return ['pay_date'=>0,'hours_worked'=>0,'gross_pay'=>0];

        }
    }

    public function get_hours_by_freq($payfreq,$hour)
    {
        $hours = 0;

        if($hour > 0){
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

    public function feb_15_pay($empid = 4)
    {
        $empHrsFeb15 = 0;

        $empPayFeb15 = 0;

        $qbf = $this->db->query("SELECT DATE_FORMAT(pay_date,'%Y-%m-%d') dayonly,hours_worked,REPLACE(gross_pay,',','') gross_pay  FROM pay_imp_payroll_info WHERE `employee_id` = '$empid' AND DATE_FORMAT(pay_date,'%Y-%m-%d') BETWEEN '2020-01-15' AND '2020-02-15' ORDER BY pay_date DESC LIMIT 1");
        
        $qff = $this->db->query("SELECT DATE_FORMAT(pay_date,'%Y-%m-%d') dayonly,hours_worked,REPLACE(gross_pay,',','') gross_pay  FROM pay_imp_payroll_info WHERE `employee_id` = '$empid' AND DATE_FORMAT(pay_date,'%Y-%m-%d') BETWEEN '2020-02-15' AND '2020-03-15' ORDER BY pay_date ASC LIMIT 1");
    
        $payfreq = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE id='$empid'");

        $pay_freq = (!empty($payfreq->row()->pay_freq)) ? trim(strtolower($payfreq->row()->pay_freq)) : 'weekly';

        if($qbf->num_rows() > 0 && $qff->num_rows() > 0)
        {
            // echo "condition 1";
            $qbf_date = strtotime($qbf->row()->dayonly);

            $qff_date = strtotime($qff->row()->dayonly);
            
            $minus = ceil(abs($qbf_date - $qff_date) / 86400);

            if($minus > 0)
            {
                $divide = $minus / 7;

                $qff_hours = $this->get_hours_by_freq($pay_freq,$qff->row()->hours_worked); 

                $qff_gorsspay = $qff->row()->gross_pay;

                $empHrsFeb15 = $qff_hours / $divide;

                $empPayFeb15 = $qff_gorsspay / $divide;
                
            }else{

                $empHrsFeb15 = 0;

                $empPayFeb15 = 0;

            }


        }
        elseif($qbf->num_rows() > 0 && $qff->num_rows() == 0)
        {
           

            $empHrsFeb15 = 0;

            $empPayFeb15 = 0;
        }
        elseif($qbf->num_rows() == 0 && $qff->num_rows() > 0)
        {
            
           // echo "condition 2";
            $hire_date = $payfreq->row()->hire_date;

            $hire_exceed = "2020-02-22";

            $greater_date = "2020-01-15";

            $less_date = "2020-02-15";

            $equal_greater = "2020-02-15";

            $equal_lses = "2020-02-22";

            if($hire_date > $hire_exceed)
            {
                $empHrsFeb15 = 0;

                $empPayFeb15 = 0;

               
            }
            elseif($hire_date >= $greater_date && $hire_date < $less_date)
            {
                //echo "condition 3";
                $numerichiredate = strtotime($hire_date);

                $qff_date = strtotime($qff->row()->dayonly);

                $minus = ceil(abs($numerichiredate - $qff_date) / 86400);

                if($minus > 0)
                {
                $divide = $minus / 7;

                $qff_hours = $this->get_hours_by_freq($pay_freq,$qff->row()->hours_worked); 

                $qff_gorsspay = $qff->row()->gross_pay;

                $empHrsFeb15 = $qff_hours / $divide;

                $empPayFeb15 = $qff_gorsspay / $divide;

                }else
                {
                    $empHrsFeb15 = 0;

                    $empPayFeb15 = 0;
                }

                

            }
            elseif($hire_date >= $equal_greater && $hire_date <= $equal_lses)
            {//echo "condition 4";
                $numerichiredate = strtotime($hire_date);

                $qff_date = strtotime($qff->row()->dayonly);

                $minus = ceil(abs($numerichiredate - $qff_date) / 86400);

                if($minus > 0)
                {
                $divide = $minus / 7;

                $forfeb = strtotime("2020-02-23");

                $febfifteenweek = ceil(abs($numerichiredate - $forfeb) / 86400);

                $qff_hours = $this->get_hours_by_freq($pay_freq,$qff->row()->hours_worked); 

                $qff_gorsspay = $qff->row()->gross_pay;

                $empHrsFeb15 = ( $qff_hours / $divide ) * $febfifteenweek;

                $empPayFeb15 = ( $qff_gorsspay / $divide ) * $febfifteenweek;


                

                }else
                {
                    $empHrsFeb15 = 0;

                    $empPayFeb15 = 0;
                }

                

            }
        }

    
   return  ['hours'=>$empHrsFeb15,'gross_pay'=>$empPayFeb15] ;
   
        
    }


    public function employee_data($Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24)
    {

        $query = $this->db->query("SELECT * FROM pay_imp_employees_info WHERE is_owner='FALSE' AND customer_id='".$this->session_id."'");
        
        if($query->num_rows() > 0)
        {
            $resp = $query->result();

            $data_employees = [];

            foreach($resp as $row)
            {
                // $exp_ssn = explode('--',filter_var($row->customer_employee_id, FILTER_SANITIZE_NUMBER_INT));

                // $ssn = $exp_ssn[1];

                // $query_twos = $this->db->query("SELECT DATE_FORMAT(pay_date,'%d') day,hours_worked,gross_pay FROM `pay_imp_payroll_info` WHERE employee_id ='".$row->id."' AND DATE_FORMAT(pay_date,'%Y-%m')='2020-02'");

            
                   

                    // if($query_twos->num_rows() > 1)
                    // {

                    //     $result = $query_twos->result();
                    
                    //     $date_one = $result[0]->day;

                    //     $date_two = $result[1]->day;

                    //     $subs_both = $date_two - $date_one;

                    //     $week = round($subs_both / 7);

                    //     $after_feb15_hour = $result[1]->hours_worked / $week;

                    //     $after_feb15_pay = str_replace(',','',$result[1]->gross_pay) / $week;
                    

                    
                    // }else{
                    //     $after_feb15_hour = 0;

                    //     $after_feb15_pay = 0 ;
                    // }
                

                $check_employees = $this->db->where('emp_id',$row->id)
                                            ->where('cust_id',$row->customer_id)
                                            ->get('pay_imp_schemployeestable');
                
               
                $data_employees = [

                    'emp_id'=>$row->id,
                    'cust_id'=>$row->customer_id,
                    'empFname'=>$row->employee_name,
                    'empHireDate'=>date("Y-m-d", strtotime($row->hire_date)),
                    'termination_date'=>date("Y-m-d", strtotime($row->termination_date)),
                    'empSalHrlyType'=>$this->check_hourly_or_salried($row->id), //not exist //New Changes //not exist
                    'emp2019_100Kplus'=>$this->get_handred_kplus($row->id), 
                    'empSalRateCurrent'=>$this->empSalRateCurrent($row->id),
                    'empHrsFeb15'=> $this->feb_15_pay($row->id)['hours'],
                    'empPayFeb15'=>$this->feb_15_pay($row->id)['gross_pay'],
                    'empHrsLookbackPer'=>$this->provide_fieds_sum("hours_worked","2019-02-15","2019-06-30",$row->id),
                    'empPayLookbackPer'=>$this->provide_fieds_sum("gross_pay","2019-02-15","2019-06-30",$row->id),
                    'empHrsLookbackPer2'=>$this->provide_fieds_sum("hours_worked","2020-01-01","2020-02-29",$row->id),
                    'empPayLookbackPer2'=>$this->provide_fieds_sum("gross_pay","2020-01-01","2020-02-29",$row->id),
                    'empHrsQ120'=>$this->provide_fieds_sum("hours_worked","2020-01-01","2020-03-31",$row->id),
                    'empPayQ120'=>$this->provide_fieds_sum("gross_pay","2020-01-01","2020-03-31",$row->id),
                    'empHrsSafeHarbor2'=>$this->provide_fieds_sum("hours_worked","2020-02-15","2020-04-26",$row->id),
                    'empPaySafeHarbor2'=>$this->provide_fieds_sum("gross_pay","2020-02-15","2020-04-26",$row->id),
                    'empHrsForgPer'=>$this->data_by_date("hours_worked",$row->id,$Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24)['Alt_Period_8_gross_pay'],
                    'empPayForgPer'=>$this->data_by_date("gross_pay",$row->id,$Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24)['Alt_Period_8_gross_pay'],
                    'empHrsForgPer24'=>$this->data_by_date("hours_worked",$row->id,$Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24)['Alt_Period_24_gross_pay'],
                    'empPayForgPer24'=>$this->data_by_date("gross_pay",$row->id,$Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24)['Alt_Period_24_gross_pay'],
                    'empSSN4'=>$row->customer_employee_id,
                    'empPayCurrentPer'=>$this->latest_last_column($row->id)['gross_pay'],
                    'empHrsCurrentPer'=>$this->latest_last_column($row->id)['hours_worked'],
                    'empCurrentPerDate'=>$this->latest_last_column($row->id)['pay_date']
                    

                ];

                if($check_employees->num_rows() == 0)
                {

                    $this->db->insert('pay_imp_schemployeestable', $data_employees);

                }else
                {

                    $this->db->where('emp_id',$row->id)
                            ->where('cust_id',$row->customer_id)
                            ->update('pay_imp_schemployeestable',$data_employees);

                }





            }



            // if(count($data_employees) > 0){

            //     $this->db->insert_batch('pay_imp_schemployeestable', $data_employees); 
    
            //     }

                return count($data_employees);
        }
    }

    public function index()
    {

        $Alt_Period_Begin_8 = $this->input->post('Alt_Period_Begin_8');
        $Alt_Period_End_8 = $this->input->post('Alt_Period_End_8');
        $Alt_Period_Being24 = $this->input->post('Alt_Period_Begin_24');
        $Alt_Period_End24 = $this->input->post('Alt_Period_End_24');
        
        
        //echo $Alt_Period_Begin_8." ".$Alt_Period_End_8." ".$Alt_Period_Being24." ".$Alt_Period_End24;
        // if($this->owners_data($Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24) && $this->employee_data($Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24)){

            $owner  = $this->owners_data($Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24);
            $employees =  $this->employee_data($Alt_Period_Begin_8,$Alt_Period_End_8,$Alt_Period_Being24,$Alt_Period_End24);
            if(!$owner)
            {
                $owner = 0;
            }
            $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('code' => 200,'owner_records'=>$owner,'employee_records'=>$employees)));

        //}

        

    }

    
    

}