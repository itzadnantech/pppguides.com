<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
    require FCPATH . '/vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use Dompdf\Dompdf;
    use Dompdf\Options;
    // If necessary, modify the path in the require statement below to refer to the
    // location of your Composer autoload.php file.
    require 'vendor/vendor/autoload.php';
    
    
class Admin extends CI_Controller {
    function __construct() {
        
        parent::__construct();
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 2400)) {
            // last request was more than 30 minutes ago
            session_unset();     // unset $_SESSION variable for the run-time 
            session_destroy();   // destroy session data in storage
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    public function index(){
      
     
    }
    
    
    public function customInvoices(){
        $this->checkUser();
     
        $reference_id=$this->session->userdata('reference_id');
        $data=array();
        $data["selectedmenu"]=4;
        $admin_id=$this->session->userdata("admin_id");
       
        $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        $data["userdata"]=$this->MainModel->getDatabyReferenceId($reference_id);
        //reference id is the admin id
        $data["invoicedata"]=$this->MainModel->fetchAllData($admin_id,'custominvoicetable');
        $this->loadView("admin/custominvoices",$data);
    }
    
     public function customInvoicesAction(){
        $data=array();
   
        $this->checkUser();
        $this->load->model('MainModel');
        $this->form_validation->set_rules('cust_id',"Cust id","required");
        $this->form_validation->set_rules('amount',"Amount","required");
        $this->form_validation->set_rules('due_date',"Due date","required");
        $this->form_validation->set_rules('current_date',"Current date","required");
   
         if ($this->form_validation->run() == false) 
        {
            die("~".validation_errors().'~red~');
        }
        extract($_POST);
        $admin_id=$this->session->userdata('admin_id');
        
            
            $data = array(
                'cust_id'=>$cust_id,
                'reference_id'=>$admin_id,
                'amount'=>$amount,
                'due_date'=>$due_date,
                'current_date'=>$current_date,
                'description'=>$description,
                'reference_email'=>$this->session->userdata('email')
                
                );
             $adminRow=$this->MainModel->getParentPricePlan($admin_id);       
             $invoice_id=$this->MainModel->insert($data,'custominvoicetable');
             if($invoice_id){

                    $subject= "Invoice ".$invoice_id. " from ".$adminRow->ws_name;
                    $UserRow	=	$this->MainModel->getwhere($cust_id,"usertable");
                    $companyRow	=	$this->MainModel->getwhere($cust_id,"companytable");
                    $message="Dear $UserRow->first_name:<br><br>
                    
                    Below is an invoice from ".$adminRow->ws_name." for services described below. <br><br>
                    
                    Click the link below and pay using a credit card:<br>
                    ". base_url()."user/payBill/".$invoice_id."<br><br>
                    
                    Invoice Details<br>
                    Invoice #:  $invoice_id<br>
                    Description:    $description<br>
                    Customer Id:    $cust_id<br>
                    Company Name:   ".$companyRow->business_name."<br>
                    Amount: $amount<br>
                    Invoice Date:   $current_date<br>
                    <br>
                    If you have any questions, please contact ".$adminRow->support_email."<br><br>
                    
                    Thank you<br>
                    ".$adminRow->ws_name;

                 $to=$UserRow->email;
                 echo $invoice_id."~Record succesfully Created  ~green~";
                 $this->sendEmail($to,$subject,$message);
                 $this->updateActivity("customInvoice-Generated",$invoice_id);
             }
             else{
                 echo "~There has been an error~red~";
             }
     }
     
    public function updateCustomInvoices(){
        $data=array();
   
        $this->checkUser();
        $this->form_validation->set_rules('cust_id',"Cust id","required");
        $this->form_validation->set_rules('amount',"Amount","required");
        $this->form_validation->set_rules('due_date',"Due date","required");
        $this->form_validation->set_rules('current_date',"Current date","required");
   
         if ($this->form_validation->run() == false) 
        {
            die("~".validation_errors().'~red~');
        }
        extract($_POST);
        $admin_id=$this->session->userdata('admin_id');
    //reference id is the admin id
        $data = array(
            'cust_id'=>$cust_id,
            'reference_id'=>$admin_id,
            'amount'=>$amount,
            'due_date'=>$due_date,
            'current_date'=>$current_date,
            
            );
                
         $res=$this->MainModel->updatewhere($data,$invoice_id,"invoice_id",'custominvoicetable');
         if($res){
             echo $invoice_id."~Record succesfully updated  ~green~";
            $this->updateActivity("customInvoice-Updated",$invoice_id);
         }
         else{
             echo "~There has been an error~red~";
         }
    
    }
    
    public function getRow($id,$col_name,$table){
            $this->checkUser();
              $data=$this->MainModel->getrow($id,$col_name,$table);
              echo json_encode($data);
    }
        
        
        public function promoCodes(){
            $this->checkUser();
         
            $reference_id=$this->session->userdata('reference_id');
            $data=array();
            $data["selectedmenu"]=4;
            $admin_id=$this->session->userdata("admin_id");
            $data["admindata"]=$this->MainModel->getAdminData($admin_id);
            $data["userdata"]=$this->MainModel->getDatabyReferenceId($reference_id);
            //reference id is the admin id
            $data["promodata"]=$promodata=$this->MainModel->fetchAllData($admin_id,'promocodestable');
             
             foreach($promodata as $promoRow){
                 if(date("Y-m-d")>$promoRow->expiry_date){ 
                    $datatoupdate = array(
                        'status'=>"inactive"
                    ); 
                    $this->MainModel->updatewhere($datatoupdate,$promoRow->promo_id,"promo_id",'promocodestable');
                 } 
             }
            $this->loadView("admin/promocodes",$data);
        }
        
        
     public function promoCodesAction(){
        $data=array();
   
        $this->checkUser();
        $this->load->model('MainModel');
        $this->form_validation->set_rules('code',"Code","required");
        $this->form_validation->set_rules('discount',"Discount","required");
        $this->form_validation->set_rules('current_date',"current date","required");
        $this->form_validation->set_rules('expiry_date',"expiry date","required");
        $this->form_validation->set_rules('based_on',"Based on","required");
        $this->form_validation->set_rules('status',"status","required");
   
         if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'-red-');
        }
        extract($_POST);
        
        $admin_id=$this->session->userdata('admin_id');
        
        $data = array(
            'cust_id'=>$cust_id,
            'code'=>$code,
            'discount'=>$discount,
            'based_on'=>$based_on,
            'expiry_date'=>$expiry_date,
            'current_date'=>$current_date,
            'status'=>$status,
            'reference_email'=>$this->session->userdata('email')
            
            );
            $whereArray=array(
                "code"=>$code,
                "reference_id"=>$admin_id
                );
            
         $res=$this->MainModel->get_where($whereArray,"promocodestable"); 
         if(!(count((array)@$res)>0)){   
             $promo_id=$this->MainModel->insert($data,'promocodestable');
             echo "Record succesfully Created-green-".base_url()."admin/promoCodes";
             $this->updateActivity("PromoCode-Generated","$code");
         }
         else{
             echo "Code already exists-red-";
         }
     }
     
    public function updatePromoCodes(){
        $data=array();
       
        $this->checkUser();
        $this->form_validation->set_rules('code',"Code","required");
        $this->form_validation->set_rules('discount',"Discount","required");
        $this->form_validation->set_rules('current_date',"current date","required");
        $this->form_validation->set_rules('expiry_date',"expiry date","required");
        $this->form_validation->set_rules('based_on',"Based on","required");
        $this->form_validation->set_rules('status',"status","required");
   
         if ($this->form_validation->run() == false) 
        {
             die(validation_errors().'-red-');
        }
        extract($_POST);
        $admin_id=$this->session->userdata('admin_id');
        //reference id is the admin id
        $data = array(
                'code'=>$code,
                'discount'=>$discount,
                'based_on'=>$based_on,
                'expiry_date'=>$expiry_date,
                'current_date'=>$current_date,
                'status'=>$status,
                
                );
        $whereArray=array(
                "code"=>$code,
                "reference_id"=>$admin_id
                );
            
        $res=$this->MainModel->get_where($whereArray,"promocodestable"); 
        if($old_code!=$code){
            if(!(count((array)@$res)>0)){         
                 $this->MainModel->updatewhere($data,$promo_id,"promo_id",'promocodestable');
                 echo "Record succesfully updated-green-".base_url()."admin/promoCodes";
            }
            else{
                 die("There has been an error-red-");
            }
        }
        else{
             $this->MainModel->updatewhere($data,$promo_id,"promo_id",'promocodestable');
             echo "Record succesfully updated-green-".base_url()."admin/promoCodes";
        }
        $this->updateActivity("PromoCode-Updated",$code);
    }
    

    public function search(){ 
       $data=array();
        $this->checkUser();
        $searchstring = $_SERVER['QUERY_STRING'];
        
        $records =$allChilds= array();
        $allChilds=$this->MainModel->getChildRecords($this->session->userdata('admin_id'),$records);
        
        $admin_id=$this->session->userdata("admin_id");
       
        $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        $data["result"]=  $this->MainModel->search($allChilds,$searchstring);
        $data["salesdata"]=$this->MainModel->fetchAllData($admin_id,'salestable');
        $data["searchstring"]=$searchstring;
        $data["selectedmenu"]=0;
        $this->loadView("admin/adminhome",$data);
      
    }
    
    public function adminasuser($cust_id){
        $this->checkUser();
        $userdata=$this->MainModel->getwhere($cust_id,"usertable");
        $data["cust_id"]=$cust_id;
        $data["p_reference_id"]=$userdata->reference_id;
        $this->session->set_userdata($data);
        header("Location: ".base_url()."user/companyInfo");
    }

    public function adminhome(){
        $this->checkUser();
        $data=array();
        $data["selectedmenu"]=0;
        $admin_id=$this->session->userdata("admin_id");
      // print_r($admin_id) ;
        $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        $data["salesdata"]=NULL;
        $this->loadView("admin/adminhome",$data);
    }
    
   
public function updateUserSalesIdReferenceId(){
     $data=array();
      
        $this->checkUser();
        $this->form_validation->set_rules('cust_id',"Cust id","required");
        $this->form_validation->set_rules('sales_id',"Sales id","required");
        $this->form_validation->set_rules('reference_id',"Reference Id","required");
         if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'-red-');
        }
        extract($_POST);
     
        $data = array('sales_id'=>$sales_id);
                 
          $this->MainModel->updateUserSalesRefData(array('sales_id'=>$sales_id),array('reference_id'=>$reference_id),$cust_id);
          echo "Data update succesfully-green-".base_url()."admin/adminhome";
               
    
             $this->updateActivity("ReferenceId-SalesId-Updated","");
} 

    public function getSalesData($cust_id){
            $this->checkUser();
              $rscdata=$this->MainModel->getDataofUser($cust_id);
              echo json_encode($rscdata);
    }
    public function getSelerData($reference_id,$sales_id){
            $this->checkUser();
              $rscdata=$this->MainModel->getDatabyrs($reference_id,$sales_id);
              echo json_encode($rscdata);
    }



      public function maintainsales(){
            $this->checkUser();
         
            $reference_id=$this->session->userdata('reference_id');
            $data=array();
            $data["selectedmenu"]=4;
            $admin_id=$this->session->userdata("admin_id");
           
            $data["admindata"]=$this->MainModel->getAdminData($admin_id);
            $data["userdata"]=$this->MainModel->getDatabyReferenceId($reference_id);
             $data["salesdata"]=$this->MainModel->fetchAllData($admin_id,'salestable');
            $this->loadView("admin/maintainsales",$data);
        }
        
 public function maintainsalesaction(){
        $data=array();
   
        $this->checkUser();
        $this->load->model('MainModel');
        $this->form_validation->set_rules('sales_id',"sales id","required");
        $this->form_validation->set_rules('sales_dis',"sales dis","required");
        $this->form_validation->set_rules('salesEmailName',"sales Email Name","required");
        $this->form_validation->set_rules('salesEmailAddress',"sales Email Address","required");
        $this->form_validation->set_rules('salesEmailPhone',"sales Email Phone","required");
        $this->form_validation->set_rules('salesEmailTxt1',"sales Email Txt1","required");
        $this->form_validation->set_rules('siteLoginURL',"site Login URL","required");
   
         if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'-red-');
        }
        extract($_POST);
        $admin_id=$this->session->userdata('admin_id');
        $res=$this->MainModel->adminSalesIdExists($sales_id,$admin_id);
        if(count((array)@$res)>0)
        { 
            die('SalesId already exists-red-');
        }
        else{
            
            $data = array(
                'reference_id'=>$admin_id,
                'sales_id'=>$sales_id,
                'sales_dis'=>$sales_dis,
                'salesEmailName'=>$salesEmailName,
                'salesEmailAddress'=>$salesEmailAddress,
                'salesEmailPhone'=>$salesEmailPhone,
                'salesEmailTxt1'=>$salesEmailTxt1,
                'salesEmailTxt2'=>$salesEmailTxt2,
                'salesEmailTxt3'=>$salesEmailTxt3,
                 'siteLoginURL'=>$siteLoginURL
                
                );
                    
             $this->MainModel->insert($data,'salestable');
             echo "Sales record succesfully Created  -green-".base_url()."admin/maintainsales";
             
             
             
        }
         
     
             $this->updateActivity("SalesId-Generated","");
 }


public function updateSalesData(){
    $data=array();
   
        $this->checkUser();
        $this->form_validation->set_rules('sales_id',"sales id","required");
        $this->form_validation->set_rules('sales_dis',"sales dis","required");
        $this->form_validation->set_rules('salesEmailName',"sales Email Name","required");
        $this->form_validation->set_rules('salesEmailAddress',"sales Email Address","required");
        $this->form_validation->set_rules('salesEmailPhone',"sales Email Phone","required");
        $this->form_validation->set_rules('salesEmailTxt1',"sales Email Txt1","required");
        $this->form_validation->set_rules('siteLoginURL',"site Login URL","required");
   
         if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'-red-');
        }
        extract($_POST);
        $admin_id=$this->session->userdata('admin_id');
        $res=$this->MainModel->adminSalesIdExists($sales_id,$admin_id);
        if(count((array)@$res)>0&&$old_sales_id!=$sales_id)
        { 
            die('SalesId already exists-red-');
        }
        else{
            
            $data = array(
                'sales_id'=>$sales_id,
                'sales_dis'=>$sales_dis,
                'salesEmailName'=>$salesEmailName,
                'salesEmailAddress'=>$salesEmailAddress,
                'salesEmailPhone'=>$salesEmailPhone,
                'salesEmailTxt1'=>$salesEmailTxt1,
                'salesEmailTxt2'=>$salesEmailTxt2,
                'salesEmailTxt3'=>$salesEmailTxt3,
                 'siteLoginURL'=>$siteLoginURL
                
                );
                    
             if($this->MainModel->updateSales($data,$admin_id,$old_sales_id,'salestable')){
                 //echo $admin_id."   ".$sales_id;
                echo "Sales data updated successfully  -green-".base_url()."admin/maintainsales";
             }
             else{
                echo "There has been an error  -red-";
             }
             
             
             
        }
    
             $this->updateActivity("SalesId-Updated","");
}









 
    public function registeruser(){
        $this->checkUser();
     
        $data=array();
        $data["selectedmenu"]=3;
        $records = array();
        $admin_id=$this->session->userdata("admin_id");
       
        $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        $data["userdata"]=$this->MainModel->getChildRecords($this->session->userdata('admin_id'),$records);
        $this->loadView("admin/registernewuser",$data);
    }
    
    
    public function  registeruseraction()
    {
        $data=array();
        $this->checkUser();
        $this->load->model('UserModel');
        $this->form_validation->set_rules('email',"Email","required|trim");
        $this->form_validation->set_rules('password',"Password","required");
        $this->form_validation->set_rules('role',"Role","required");
        if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'-red-');
        }
        extract($_POST);
        $res	=	$this->UserModel->checkemail(strtolower($email));
        if(count((array)@$res)>0)
        { 
            die('Email already exists-red-');
        }
        else{
            $data = array(
                'email'=>strtolower($email),
                'pswd'=>md5($password),
                'role'=>$role,
                'access_level'=>$access_level,
				"reference_id"=>$this->session->userdata('admin_id')
                );
                //echo $access_level;
                $priceplan=$this->MainModel->getPriceplan($this->session->userdata('admin_id'));
                $id=$this->UserModel->insert($data);
                
                if($role=="whole_saler"){
                     $this->MainModel->insert(
                         array(
                             "fk_wholesaler_id"=>$id,
                             "ws_name"=>$priceplan->ws_name,
                             "support_email"=>$priceplan->support_email,
                             "phone"=>$priceplan->phone,
                             "price_group"=>$priceplan->price_group,
                             "terms_and_conditions"=>$priceplan->terms_and_conditions,
                         ),"wholesalertable");
                }
                else{
                 
                $orderData = array(
				            'cust_id'=>$id,
							'product_id' => "0",
							'buyer_name' => "",
							'buyer_email' => "",
							'card_number' => "",
							'card_exp_month' => "",
							'card_exp_year' => "",
							'paid_amount' => 0,
							'paid_amount_currency' => "usd",
							'txn_id' => "",
							'user_ip'=>"",
							'payment_status' => "No payment done"
						);
						
		                $this->load->model('product');
						$orderID = $this->product->insertOrder($orderData);
						$data = array(
                'cust_id'=>$id
                );
                $this->MainModel->insert($data,"nonpayrolltable");
                $this->MainModel->insert($data,"companytable");
                $this->MainModel->insert($data,"loantable");
                $this->MainModel->insert($data,"ownertable");
                $this->MainModel->insert($data,"payrolltable");
                $this->MainModel->insert($data,"statustable");
                $this->MainModel->insert($data,"scheduleatable");
                }
   
                echo "Person Registered-green-".base_url()."admin/registeruser";
        }
       
             $this->updateActivity("NewUser-Created","");
    }
    
    
    function updateActivity($activity,$activitydetail,$custid_email=0){
        $email="";
        $cust_id="";
        if($custid_email===0){
            $cust_id=$this->session->userdata("admin_id");
            $email=$this->session->userdata("email");
        }
        else{
            $cust_id=explode("~",$custid_email)[0];
            $email=explode("~",$custid_email)[1];
        }
        
        $datatoinsert=array(
            "cust_id"=>$cust_id,
            "email"=>$email,
            "activitytype"=>$activity,
            "activitydate"=>date("Y-m-d"),
            "ipaddress"=>$this->input->ip_address(),
            "activitytime"=>date("H:i:s"),
            "activitydetail"=>$activitydetail
            );
        $this->MainModel->insert($datatoinsert,"activitytable");
        
    }
    
    public function downloadFile(){
        $this->checkUser();
        $searchstring = $_SERVER['QUERY_STRING'];
    $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $sheet = $spreadsheet->getActiveSheet();
        $spreadsheet->getActiveSheet()->setTitle('companytable');

        $companytable=$this->MainModel->getXMLData($searchstring,'companytable');
        // manually set table data value
        
            // set the names of header cells
          $sheet->setCellValue('A1', 'cust_id');
          $sheet->setCellValue('B1', 'entity_type');
          $sheet->setCellValue('C1', 'business_name');
          $sheet->setCellValue('D1', 'trade_name');
          $sheet->setCellValue('E1', 'ein');
          $sheet->setCellValue('F1', 'ssn');
          $sheet->setCellValue('G1', 'street_address1');
          $sheet->setCellValue('H1', 'street_address2');
          $sheet->setCellValue('I1', 'city');
          $sheet->setCellValue('J1', 'state');
          $sheet->setCellValue('K1', 'zip');
      
        // Add some data
        $x = 2;
        foreach($companytable as $get){
            $sheet->setCellValue('A'.$x, $get->cust_id);
            $sheet->setCellValue('B'.$x, $get->entity_type);
            $sheet->setCellValue('C'.$x, $get->business_name);
            $sheet->setCellValue('D'.$x, $get->trade_name);
            $sheet->setCellValue('E'.$x, $get->ein);
            $sheet->setCellValue('F'.$x, $get->ssn);
            $sheet->setCellValue('G'.$x, $get->street_address1);
            $sheet->setCellValue('H'.$x, $get->street_address2);
            $sheet->setCellValue('I'.$x, $get->city);
            $sheet->setCellValue('J'.$x, $get->state);
            $sheet->setCellValue('K'.$x, $get->zip);
          $x++;
        }
        
        
        $loantable=$this->MainModel->getXMLData($searchstring,'loantable');
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(1);
        $spreadsheet->getActiveSheet()->setTitle('loantable');
        $sheet = $spreadsheet->getActiveSheet();
        // manually set table data value
        
            // set the names of header cells
          $sheet->setCellValue('A1', 'cust_id');
          $sheet->setCellValue('B1', 'sba');
          $sheet->setCellValue('C1', 'loan_number');
          $sheet->setCellValue('D1', 'loan_amount');
          $sheet->setCellValue('E1', 'bank_name');
          $sheet->setCellValue('F1', 'disbursement_date');
          $sheet->setCellValue('G1', 'eidl_amount');
          $sheet->setCellValue('H1', 'Eidl_app_number');
          $sheet->setCellValue('I1', 'eidl_loan_date');
          $sheet->setCellValue('J1', 'eidl_grant_amount');
          $sheet->setCellValue('K1', 'eidl_grant_app_num');
          $sheet->setCellValue('L1', 'edit_grant_date');
          $sheet->setCellValue('M1', 'loantime_employees');
          $sheet->setCellValue('N1', 'forgivenesstime_employees');
      
        // Add some data
        $x = 2;
        foreach($loantable as $get){
            $sheet->setCellValue('A'.$x, $get->cust_id);
            $sheet->setCellValue('B'.$x, $get->sba);
            $sheet->setCellValue('C'.$x, $get->loan_number);
            $sheet->setCellValue('D'.$x, $get->loan_amount);
            $sheet->setCellValue('E'.$x, $get->bank_name);
            $sheet->setCellValue('F'.$x, $get->disbursement_date);
            $sheet->setCellValue('G'.$x, $get->eidl_amount);
            $sheet->setCellValue('H'.$x, $get->Eidl_app_number);
            $sheet->setCellValue('I'.$x, $get->eidl_loan_date);
            $sheet->setCellValue('J'.$x, $get->eidl_grant_amount);
            $sheet->setCellValue('K'.$x, $get->eidl_grant_app_num);
            $sheet->setCellValue('L'.$x, $get->edit_grant_date);
            $sheet->setCellValue('M'.$x, $get->loantime_employees);
            $sheet->setCellValue('N'.$x, $get->forgivenesstime_employees);
          $x++;
        }
        
        
        
        $nonpayrolltable=$this->MainModel->getXMLData($searchstring,'nonpayrolltable');
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(2);
        $spreadsheet->getActiveSheet()->setTitle('nonpayrolltable');
        $sheet = $spreadsheet->getActiveSheet();
        // manually set table data value
        
            // set the names of header cells
          $sheet->setCellValue('A1', 'cust_id');
          $sheet->setCellValue('B1', 'rent_payee');
          $sheet->setCellValue('C1', 'rent_amount');
          $sheet->setCellValue('D1', 'rent_month');
          $sheet->setCellValue('E1', 'rent_date');
          $sheet->setCellValue('F1', 'mortgage_payee');
          $sheet->setCellValue('G1', 'mortgage_amount');
          $sheet->setCellValue('H1', 'mortgage_month');
          $sheet->setCellValue('I1', 'mortgage_date');
          $sheet->setCellValue('J1', 'utility_payee');
          $sheet->setCellValue('K1', 'utility_amount');
          $sheet->setCellValue('L1', 'utility_type');
          $sheet->setCellValue('M1', 'utility_month');
          $sheet->setCellValue('N1', 'utility_date');
      
        // Add some data
        $x = 2;
        foreach($nonpayrolltable as $get){
            
            $j=0;
            $line=$x;
            if(strpos($get->rent_payee, "~") !== false){
                $names=explode("~",$get->rent_payee);
                foreach($names as $name){
            $sheet->setCellValue('A'.$x, $get->cust_id);
                    $sheet->setCellValue('B'.$x, explode("~",$get->rent_payee)[$j]);
                    $sheet->setCellValue('C'.$x, explode("~",$get->rent_amount)[$j]);
                    $sheet->setCellValue('D'.$x, explode("~",$get->rent_month)[$j]);
                    $sheet->setCellValue('E'.$x, explode("~",$get->rent_date)[$j]);
                    $j++;
                    $x++;
                }
            }
            
            
            $j=0;
            $x=$line;
            $names=explode("~",$get->mortgage_payee);
            foreach($names as $name){
            $sheet->setCellValue('A'.$x, $get->cust_id);
                $sheet->setCellValue('F'.$x, explode("~",$get->mortgage_payee)[$j]);
                $sheet->setCellValue('G'.$x, explode("~",$get->mortgage_amount)[$j]);
                $sheet->setCellValue('H'.$x, explode("~",$get->mortgage_month)[$j]);
                $sheet->setCellValue('I'.$x, explode("~",$get->mortgage_date)[$j]);
                $j++;
                $x++;
            }
            
            
            $j=0;
            $x=$line;
            $names=explode("~",$get->utility_payee);
            foreach($names as $name){
            $sheet->setCellValue('A'.$x, $get->cust_id);
                $sheet->setCellValue('J'.$x, explode("~",$get->utility_payee)[$j]);
                $sheet->setCellValue('K'.$x, explode("~",$get->utility_amount)[$j]);
                $sheet->setCellValue('L'.$x, explode("~",$get->utility_type)[$j]);
                $sheet->setCellValue('M'.$x, explode("~",$get->utility_month)[$j]);
                $sheet->setCellValue('N'.$x, explode("~",$get->utility_date)[$j]);
                $j++;
                $x++;
            }
        }
        
        
        
        $ownertable=$this->MainModel->getXMLData($searchstring,'ownertable');
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(3);
        $spreadsheet->getActiveSheet()->setTitle('ownertable');
        $sheet = $spreadsheet->getActiveSheet();
        // manually set table data value
        
            // set the names of header cells
          $sheet->setCellValue('A1', 'cust_id');
          $sheet->setCellValue('B1', 'owner_count');
          $sheet->setCellValue('C1', 'first_name');
          $sheet->setCellValue('D1', 'middle_initial');
          $sheet->setCellValue('E1', 'last_name');
          $sheet->setCellValue('F1', 'title');
          $sheet->setCellValue('G1', 'ownership_percentage');
          $sheet->setCellValue('H1', 'owner2019_pay');
          $sheet->setCellValue('I1', 'email');
          $sheet->setCellValue('J1', 'landline_phone');
          $sheet->setCellValue('K1', 'landline_extension');
          $sheet->setCellValue('L1', 'mobile_phone');
          $sheet->setCellValue('M1', 'mobile_carrier');
      
        // Add some data
        $x = 2;
        foreach($ownertable as $get){
            $j=0;
                $names=explode("~",$get->first_name);
                foreach($names as $name){
                    $sheet->setCellValue('A'.$x, $get->cust_id);
                    $sheet->setCellValue('B'.$x, $get->owner_count);
                    $sheet->setCellValue('C'.$x, explode("~",$get->first_name)[$j]);
                    $sheet->setCellValue('D'.$x, explode("~",$get->middle_initial)[$j]);
                    $sheet->setCellValue('E'.$x, explode("~",$get->last_name)[$j]);
                    $sheet->setCellValue('F'.$x, explode("~",$get->title)[$j]);
                    $sheet->setCellValue('G'.$x, explode("~",$get->ownership_percentage)[$j]);
                    $sheet->setCellValue('H'.$x, explode("~",$get->email)[$j]);
                    $sheet->setCellValue('I'.$x, explode("~",$get->owner2019_pay)[$j]);
                    $sheet->setCellValue('J'.$x, explode("~",$get->landline_phone)[$j]);
                    $sheet->setCellValue('K'.$x, explode("~",$get->landline_extension)[$j]);
                    $sheet->setCellValue('L'.$x, explode("~",$get->mobile_phone)[$j]);
                    $sheet->setCellValue('M'.$x, explode("~",$get->mobile_carrier)[$j]);
                    $j++;
                    $x++;
                }
        }
        
        
        $payrolltable=$this->MainModel->getXMLData($searchstring,'payrolltable');
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(4);
        $spreadsheet->getActiveSheet()->setTitle('payrolltable');
        $sheet = $spreadsheet->getActiveSheet();
        // manually set table data value
        
          $sheet->setCellValue('A1', 'cust_id');
          $sheet->setCellValue('B1', 'payroll_schedule');
          $sheet->setCellValue('C1', 'payroll_begin_date');
          $sheet->setCellValue('D1', 'loan8_start');
          $sheet->setCellValue('E1', 'loan8_end');
          $sheet->setCellValue('F1', 'payroll8_start');
          $sheet->setCellValue('G1', 'payroll8_end');
          $sheet->setCellValue('H1', 'loan24_start');
          $sheet->setCellValue('I1', 'loan24_end');
          $sheet->setCellValue('J1', 'payroll24_start');
          $sheet->setCellValue('K1', 'payroll24_end');
          $sheet->setCellValue('L1', 'payroll_service');
          $sheet->setCellValue('M1', 'Payroll_software');
          $sheet->setCellValue('N1', 'covered8_cost');
          $sheet->setCellValue('O1', 'alternate8_cost');
          $sheet->setCellValue('P1', 'covered24_cost');
          $sheet->setCellValue('Q1', 'alternate24_cost');
          $sheet->setCellValue('R1', 'unemp8_contributions');
          $sheet->setCellValue('S1', 'state8_taxes');
          $sheet->setCellValue('T1', 'tax8_description');
          $sheet->setCellValue('U1', 'unemp24_contributions');
          $sheet->setCellValue('V1', 'state24_taxes');
          $sheet->setCellValue('W1', 'tax24_description');
          $sheet->setCellValue('X1', 'health8_cost');
          $sheet->setCellValue('Y1', 'retirement8_cost');
          $sheet->setCellValue('Z1', 'health24_cost');
          $sheet->setCellValue('AA1', 'retirement24_cost');
      
        $x = 2;
        foreach($payrolltable as $get){
            $sheet->setCellValue('A'.$x, $get->cust_id);
            $sheet->setCellValue('B'.$x, $get->payroll_schedule);
            $sheet->setCellValue('C'.$x, $get->payroll_begin_date);
            $sheet->setCellValue('D'.$x, $get->loan8_start);
            $sheet->setCellValue('E'.$x, $get->loan8_end);
            $sheet->setCellValue('F'.$x, $get->payroll8_start);
            $sheet->setCellValue('G'.$x, $get->payroll8_end);
            $sheet->setCellValue('H'.$x, $get->loan24_start);
            $sheet->setCellValue('I'.$x, $get->loan24_end);
            $sheet->setCellValue('J'.$x, $get->payroll24_start);
            $sheet->setCellValue('K'.$x, $get->payroll24_end);
            $sheet->setCellValue('L'.$x, $get->payroll_service);
            $sheet->setCellValue('M'.$x, $get->Payroll_software);
            $sheet->setCellValue('N'.$x, $get->covered8_cost);
            $sheet->setCellValue('O'.$x, $get->alternate8_cost);
            $sheet->setCellValue('P'.$x, $get->covered24_cost);
            $sheet->setCellValue('Q'.$x, $get->alternate24_cost);
            $sheet->setCellValue('R'.$x, $get->unemp8_contributions);
            $sheet->setCellValue('S'.$x, $get->state8_taxes);
            $sheet->setCellValue('T'.$x, $get->tax8_description);
            $sheet->setCellValue('U'.$x, $get->unemp24_contributions);
            $sheet->setCellValue('V'.$x, $get->state24_taxes);
            $sheet->setCellValue('W'.$x, $get->tax24_description);
            $sheet->setCellValue('X'.$x, $get->health8_cost);
            $sheet->setCellValue('Y'.$x, $get->retirement8_cost);
            $sheet->setCellValue('Z'.$x, $get->health24_cost);
            $sheet->setCellValue('AA'.$x, $get->retirement24_cost);
          $x++;
        }
        
        
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'Backupfile'; // set filename for excel file to be exported
 
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        //$this->search();
        
        $this->updateActivity("ExcelFile-Exported","");
     }
    public function loadView($view,$data){
        $this->load->view('template/head',$data);
		$this->load->view($view);
        $this->load->view('template/footer');
    }
    function checkUser(){
        if($this->session->userdata('admin_id')== NULL){
           header("Location: ".base_url());
            exit; 
        }
    }

    public function logout(){
        
        
        if(strlen($this->session->userdata("admin_id"))>0){
            $this->updateActivity("Logout","");
        }
        $data	=	array(
                            "admin_id"		=>	NULL,
                            "cust_id"		=>	NULL,
                          
                            "email"			=>	NULL,
                          
                          );
        $this->session->set_userdata($data);
        header("Location: ".base_url());
    }
    
    
    
       
    
    
    

    
    
    /////////////////////security questions


    public function seurityquestion(){
        $data=array();
        $data["selectedmenu"]=2;
        $admin_id=$this->session->userdata("admin_id");
      // print_r($admin_id) ;
        $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        $this->loadView("admin/securityquestions",$data);
    }




    public function seurityquestionsaction(){
        $data=array();
        $this->checkUser();
        extract($_POST);
        $this->form_validation->set_rules('q_one',"question one","required");
        $this->form_validation->set_rules('a_one',"answer one","required");
        $this->form_validation->set_rules('q_two',"question two","required");
        $this->form_validation->set_rules('a_two',"answer two","required");
        $this->form_validation->set_rules('q_three',"question three","required");
        $this->form_validation->set_rules('a_three',"answer three","required");
        if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'-red-');
        }	
       $this->load->model('UserModel');
                 
        $data = array(
              'q_one'=>$q_one,
              'a_one'=>$a_one,
              'q_two'=>$q_two,
              'a_two'=>$a_two,
              'q_three'=>$q_three,
              'a_three'=>$a_three,
              );
              $admin_id=$this->session->userdata("admin_id");
              $data["res"]=$this->UserModel->update($data,$admin_id);
              echo "Questions saved succesfully changed-green-"; 
    
    }

    ///////////////////////////////////////passwordchange//////
 
 
 
 
    public function passwordvarquestions(){
        $data=array();
        $data["selectedmenu"]=2;
        $admin_id=$this->session->userdata("admin_id");
        // print_r($admin_id) ;
        $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        $res =$this->UserModel->getwhere($admin_id);
        if(count((array)$res)>0)
        {if(  $res->a_one=="" && $res->a_two=="" && $res->a_three=="")
            {
                $data["msg"]="To secure your account more please answer security questions";
                
            }
            else{
                  $data=array(
                      'q_one'=> $res->q_one,
                      'q_two'=>$res->q_two,
                       'q_three'=>$res->q_three,
                      );
            }
        $this->loadView("admin/changepassquestion",$data);

    }

    }
    public function passwordvarquestionsact(){
        $data=array();
         $this->checkUser();
         extract($_POST);
         $data["selectedmenu"]=2;
        $this->load->model('UserModel');	
        $id=$this->session->userdata('cust_id');
        $res=$this->UserModel->getwhere($id);
   
        if(count((array)$res)>0)
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if( $a_one==$res->a_one &&  $a_two==$res->a_two ||  $a_one==$res->a_one  && $a_three==$res->a_three ||  $a_two==$res->a_two && $a_three==$res->a_three )
            {  
              $path="admin/changePassword";
            $this->session->set_userdata($data);
            die('Successfull matched-green-'.base_url().$path);
        
            }
            else
            {
                die('Not matched-red-');
            }
        }
        }

    




    }





public function changePassword(){
    $data=array();
    $data["selectedmenu"]=2;
    $this->loadView("admin/changepassword",$data);
}
   
    public function updatePassword(){
        $this->checkUser();
        $this->load->model('UserModel');
        extract($_POST);
        $data["selectedmenu"]=2;
        $this->form_validation->set_rules('currentpassword',"Current password","required|trim");
        $this->form_validation->set_rules('newpassword',"New password","required|trim");
        $this->form_validation->set_rules('confirmation', 'Confirm new password', 'required|matches[newpassword]');
       
        if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'-red-');}
       $res=$this->UserModel->isPassword(strtolower($this->session->userdata('email')),md5($currentpassword));
      
       if(count((array)$res)>0)
        {           
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {   $data = array(
              'pswd'=>md5($newpassword)
              );
        $id=$this->session->userdata('admin_id');
        $data["res"]=$this->UserModel->update($data,$id);
        echo "Password succesfully changed-green-"; 
        }
      else
        {
            echo "Incorrect old password-red-";
        }
    }
      
    }

 
    ///////////////////////////////////////////////////////
    
    
    
    
    
////////////////////////////////////update email

        public function changeEmail(){
        $this->checkUser();
     
        $data=array();
        $data["selectedmenu"]=2;
        $admin_id=$this->session->userdata("admin_id");
        $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        $this->loadView("admin/changeemail",$data);
    }
    
    public function changeEmailAction(){   
            
         $data=array();
         $oldemail=$this->session->userdata('email');
         $this->load->model('UserModel');
         $this->form_validation->set_rules('email',"Email","required|trim");
    
         if ($this->form_validation->run() == false) 
         {
             die(validation_errors().'-red-');
         }
         extract($_POST);
         $res	=	$this->UserModel->checkemail(strtolower($email));
         if(count((array)@$res)>0)
         { 
             die('Email already exists-red-');
         }
    
         $code1=rand(100,999);
         $code2=rand(100,999);
         $code=$code1."-".$code2;
         
         $data["sample_email"]=strtolower($email);
    
         $data["sample_code"]=$code;
         $this->session->set_userdata($data);
         
         
         $to = $email;
         $subject = 'Email verification code!';
         $txt ='Your Email verification code is : '.$code. "\n" .'Your email address has been updated'."\r\n" .'Old email was : '. $oldemail  ."\r\n".'New email is : '. $email ."\r\n".'If this was done in an error, contact us at guides@pppguides.com and include your call back phone number, where one of our representatives can call you. ';
         $headers = "From: no-reply@pppguides.com";
         mail($to,$subject,$txt,$headers);
         
         echo "Verifying email-green-".base_url()."admin/emailverify";
         
     }
     
     
    function sendEmail($to,$subject,$message,$from='no-reply@pppguides.com',$fromname='PPPGuides') {
        
		// Replace sender@example.com with your "From" address.
	// This address must be verified with Amazon SES.
	$sender = $from;
	$senderName = $fromname;

	$recipient = $to;

	$usernameSmtp = 'AKIAVPVVEXS65CGO64UE';
	$passwordSmtp = 'BMlSeC/G4/DZn9GlqfTxy/uEu4Tp76YdFU9xdLC+8shy';
	$host = 'email-smtp.us-east-1.amazonaws.com';
	$port = 587;


	// The plain-text body of the email
	$bodyText =  "Email Test\r\nThis email was sent through the Amazon SES SMTP interface using the PHPMailer class.";

	// The HTML-formatted body of the email
	$bodyHtml = '<h1>Email Test</h1>
	    <p>This email was sent through the
	    <a href="https://aws.amazon.com/ses">Amazon SES</a> SMTP
	    interface using the <a href="https://github.com/PHPMailer/PHPMailer">
	    PHPMailer</a> class.</p>';

	$bodyText = $message;
	$bodyHtml = $message;

	$mail = new PHPMailer(true);

	try {
	/*
	    // Specify the SMTP settings.
	    $mail->isSMTP();
	    $mail->setFrom($sender, $senderName);
	    $mail->Username   = $usernameSmtp;
	    $mail->Password   = $passwordSmtp;
	    $mail->Host       = $host;
	    $mail->Port       = $port;
	    $mail->SMTPAuth   = true;
	    $mail->SMTPSecure = 'tls';
	#    $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

	    // Specify the message recipients.
   	 $mail->addAddress($recipient);
    	// You can also add CC, BCC, and additional To recipients here.

	    // Specify the content of the message.
    	$mail->isHTML(true);
    	$mail->Subject    = $subject;
    	$mail->Body       = $bodyHtml;
    	$mail->AltBody    = $bodyText;
    	
    	
    	$mail->Send();
    	    
        echo "Email sent!" , PHP_EOL;
    */
        return true;



	}
	 catch (phpmailerException $e) {
    		echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
	} catch (Exception $e) {
	    echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
	}

}
 
 public function emailverify(){
    $data["selectedmenu"]=2;
     $data=array(); 
   
        $admin_id=$this->session->userdata("admin_id");
        $data["admindata"]=$this->MainModel->getAdminData($admin_id);
     $this->loadView("admin/emailverification",$data);
 }
 
 public function emailcheckVerCode(){
     $data=array();
     $this->load->model('UserModel');
     $this->form_validation->set_rules('vcode',"Verification code","required|trim");
     if ($this->form_validation->run() == false) 
     {
         die(validation_errors().'-red-');
     }
     extract($_POST);
     
     if($vcode==$this->session->userdata('sample_code')){
         
         $data = array(
         'email'=>$this->session->userdata('sample_email'),
      
         );
         $id=$this->session->userdata('admin_id');
         $data["res"]=$this->UserModel->update($data,$id);
         
         $data = array(
        
         'email'=>$this->session->userdata('sample_email')
         );
         $this->session->set_userdata($data);
         
         
         die("Email Changed Sucessfully-green-");
     }
       die('Wrong verification code-red-');
 }

/////////////////////////////////////////////////////
}