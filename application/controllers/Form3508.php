<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
use Dompdf\Options;
// If necessary, modify the path in the require statement below to refer to the
// location of your Composer autoload.php file.
require 'vendor/vendor/autoload.php';

    class Form3508 extends CI_Controller {
        
        function __construct() {
            
            parent::__construct();
            
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1400)) {
                // last request was more than 30 minutes ago
                session_unset();     // unset $_SESSION variable for the run-time 
                session_destroy();   // destroy session data in storage
            }
            $_SESSION['LAST_ACTIVITY'] = time();
        }
        
    
    public function importExcel(){
        $data=array();
        $data["cust_id"]=$cust_id=$this->session->userdata('cust_id');
        $data["payrolldata"]=$payrolldata=$this->MainModel->getwhere($cust_id,"payrolltable");
        $scheduledata=$this->MainModel->getwhere($cust_id,"scheduleatable");
        $data["period_name"]=explode("(",$scheduledata->forgiveness_period)[0];
        $date=explode("(",$scheduledata->forgiveness_period)[1];
        $data["datefrom"]=trim(explode(" To",$date)[0],' ');
        $data["dateto"]=trim(explode("To ",$date)[1],')');
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["userdata"]=$this->MainModel->getwhere($cust_id,"usertable");
        $data["selectedmenu"]=0;
        $data["formval"]=0;
        $this->updateActivity("Forgiveness-Excel-Import");
        $this->loadView("User/importexcel",$data);
    }
    
    function updateActivity($activity,$custid_email=0){
        $email="";
        $cust_id="";
        if($custid_email===0){
            $cust_id=$this->session->userdata("cust_id");
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
            );
        $this->MainModel->insert($datatoinsert,"activitytable");
        
    }
    
    function applyForForgiveness($message=""){
        
        $message=urldecode($message);
        $this->checkUser();
        $data=array();
       
        $cust_id=$this->session->userdata('cust_id');
        $data["scheduledata"]=$scheduledata=$this->MainModel->getwhere($cust_id,"scheduleatable");
        $data["schemployeesdata"]=$this->MainModel->fetchschemployeeData($cust_id,"pay_imp_schemployeestable");
        $data["payrolldata"]=$this->MainModel->getwhere($cust_id,"payrolltable");
        $data["companydata"]=$this->MainModel->getwhere($cust_id,"companytable");
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["userdata"]=$this->MainModel->getwhere($cust_id,"usertable");
        $data["filedata"]=$this->MainModel->getFileWhere($cust_id,"companyInfo","filestable");
        $data["loandata"]=$this->MainModel->getwhere($cust_id,"loantable");
        $data["cust_id"]=$cust_id;
        $data["selectedmenu"]=0;
        $data["formval"]=0;
       
        if($message!=''){
            $data["message"]=$message;
        }
        if(strpos($scheduledata->forgiveness_period,"(")!==FALSE){
            $data["period_name"]=explode("(",$scheduledata->forgiveness_period)[0];
            $data["period_name"]=explode("(",$scheduledata->forgiveness_period)[0];
            $date=explode("(",$scheduledata->forgiveness_period)[1];
            $data["datefrom"]=trim(explode(" To",$date)[0],' ');
            $data["dateto"]=trim(explode("To ",$date)[1],')');
        } 
        $this->loadView("forms/applyForForgiveness",$data);
}

    function forgivenessAction(){
         $this->checkUser();
        $data=array();
         extract($_POST);
        $cust_id=$this->session->userdata('cust_id');
        $this->MainModel->deleterow($cust_id,"pay_imp_schemployeestable");
        
        $ppploan="";
          if(isset($ppp_loan)){
              $ppploan=$ppp_loan;
          }
              $data = array( 
               'cust_id'=>$cust_id,
                'ppp_loan'=>$ppploan,
                'employees_change'=>$employees_change,
                'fte_harbor_1'=>$fte_harbor_1,
                'fte_harbor_2'=>$fte_harbor_2,
                'employee_type'=>$employee_type,
                'forgiveness_period'=>$forgiveness_period,
                'forgiveness_period_date'=>$forgiveness_period_date,
                'ftemethod1'=>$ftemethod1,
                'ftemethod2'=>$ftemethod2,
                'ftemethod3'=>$ftemethod3,
                'ftemethod4'=>$ftemethod4,
                'ftemethod5'=>$ftemethod5,
                'ftemethod6'=>$ftemethod6,
              );
        
       $this->MainModel->update($data,$cust_id,"scheduleatable");
       $arraycount=count($empFname);
       print_r($empHrsForgPer24);
       //print_r($_POST);
       for($i=0;$i<$arraycount;$i++){
            $data=array();
            if(strlen($empFname[$i])>0){
                $Payforgper=0;
                $Hrsforgper=0;
                $ColPayforgper="";
                $ColHrsforgper="";
               if (strpos($forgiveness_period, '8 week') !== false) {
                  // echo "8 week empHrsForgPer24[i]:".$empHrsForgPer[$i]."   "."empPayForgPer24[i]:".$empPayForgPer[$i]."   "."empHireDate[i]".$empHireDate[$i];
                   
                    $Hrsforgper=$empHrsForgPer[$i];
                    $Payforgper=$empPayForgPer[$i];
                    $ColPayforgper="empPayForgPer";
                    $ColHrsforgper="empHrsForgPer";
               }
               else{
                  // echo "24 week empHrsForgPer24[i]:".$empHrsForgPer24[$i]."   "."empPayForgPer24[i]:".$empPayForgPer24[$i]."   "."empHireDate[i]".$empHireDate[$i];
                    $Hrsforgper=$empHrsForgPer24[$i];
                    $Payforgper=$empPayForgPer24[$i];
                    $ColPayforgper=0;
                    $ColHrsforgper=0;
                    $ColPayforgper="empPayForgPer24";
                    $ColHrsforgper="empHrsForgPer24";
               }
                $data = array( 
               'cust_id'=>$cust_id,
                'empFname'=>$empFname[$i],
                'empHireDate'=>$empHireDate[$i],
                'termination_date'=>$termination_date[$i],
                'empSalHrlyType'=>$empSalHrlyType[$i],
                'emp2019_100Kplus'=>$emp2019_100Kplus[$i],
                'empSalRateCurrent'=>$empSalRateCurrent[$i],
                'empHrsFeb15'=>$empHrsFeb15[$i],
                'empPayFeb15'=>$empPayFeb15[$i],
                'empHrsLookbackPer'=>$empHrsLookbackPer[$i],
                'empPayLookbackPer'=>$empPayLookbackPer[$i],
                'empHrsLookbackPer2'=>$empHrsLookbackPer2[$i],
                'empPayLookbackPer2'=>$empPayLookbackPer2[$i],
                'empHrsQ120'=>$empHrsQ120[$i],
                'empPayQ120'=>$empPayQ120[$i],
                'empHrsSafeHarbor2'=>$empHrsSafeHarbor2[$i],
                'empPaySafeHarbor2'=>$empPaySafeHarbor2[$i],
                "$ColHrsforgper"=>$Hrsforgper,
                "$ColPayforgper"=>$Payforgper,
                'empSSN4'=>$empSSN4[$i],
                'empHrsCurrentPer'=>$empHrsCurrentPer[$i],
                'empPayCurrentPer'=>$empPayCurrentPer[$i],
              );
            $this->MainModel->insert($data,"pay_imp_schemployeestable");
            }
       }
       
       
       
       $this->updateActivity("Forgiveness-3508-SchedA");
        header("Location: ".base_url()."Form3508/applyForForgiveness/Data updated successfully~Saved~success");
        die();

    }
    
    public function clearForgivenessData(){
        $this->checkUser();
        $this->MainModel->deleteRows('customer_id',$this->session->userdata('cust_id'),"pay_imp_employees_info");
        $this->MainModel->deleteRows('customer_id',$this->session->userdata('cust_id'),"pay_imp_import_record");
        $this->MainModel->deleteRows('cust_id',$this->session->userdata('cust_id'),"pay_imp_ownerpayrollsummary");
        $this->MainModel->deleteRows('customer_id',$this->session->userdata('cust_id'),"pay_imp_payroll_info");
        $this->MainModel->deleteRows('cust_id',$this->session->userdata('cust_id'),"pay_imp_schemployeestable");
        
        echo "success";
    }
        

    		
    		
		public function show3508PDF($n=0){
    		$this->checkUser();
		    $data=array();
		    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		       
		        
		        if($n==="a"||$n==="c"){
		           
        			$this->session->set_userdata("step_1",$this->session->userdata("step_1a"));
        			$this->session->set_userdata("step_2",$this->session->userdata("step_2a"));
        			$this->session->set_userdata("step_3",$this->session->userdata("step_3a"));
        			$this->session->set_userdata("step_4",$this->session->userdata("step_4a"));
        			$this->session->set_userdata("step_5",$this->session->userdata("step_5a"));
        			$this->session->set_userdata("Tot_empBox2",$this->session->userdata("Tot_empBox2a"));
        			$this->session->set_userdata("empBox2_ar",	$this->session->userdata("empBox2a_ar"));
        			$this->session->set_userdata("empBox5_ar",$this->session->userdata("empBox5a_ar"));
        			$this->session->set_userdata("Tot_empBox5",$this->session->userdata("Tot_empBox5a"));
		        }
		        else if($n==="b"||$n==="d"){
		            
        			$this->session->set_userdata("step_1",$this->session->userdata("step_5b"));
        			$this->session->set_userdata("step_2",$this->session->userdata("step_5b"));
        			$this->session->set_userdata("step_3",$this->session->userdata("step_5b"));
        			$this->session->set_userdata("step_4",$this->session->userdata("step_5b"));
        			$this->session->set_userdata("step_5",$this->session->userdata("step_5b"));
        			$this->session->set_userdata("Tot_empBox2",$this->session->userdata("Tot_empBox2b"));
        			$this->session->set_userdata("empBox2_ar",$this->session->userdata("empBox2b_ar"));
        			$this->session->set_userdata("empBox5_ar",$this->session->userdata("empBox5b_ar"));
        			$this->session->set_userdata("Tot_empBox5",$this->session->userdata("Tot_empBox5b"));
		        }
		        $this->session->set_userdata("post", $_POST);
		        
		    }
			$this->loadView("forms/show3508pdf",$data);
            //$this->generatePDF();
		}
        
        //$this->load->view('forms/form3508PDF',$data);
        function generatePDF(){
    		$this->checkUser();
            include_once realpath(APPPATH.'../').'/assets/libraries/dompdf/autoload.inc.php';
    		$view =	$this->load->view('forms/download3508pdf', '',true);
          
            $options = new Options();
            $options->set('isRemoteEnabled', true);
    
            $dompdf = new Dompdf($options);
            $dompdf->set_option("isPhpEnabled", true);
            
            $dompdf->loadHTML($view);
          
    
            $dompdf->setPaper('A4', 'portairt');
    
    		$dompdf->render();
    		
    		$dompdf->stream("file",array("Attachment" => false));
        }
        
                
    	/*
--------------------------
BEGIN OF FUNCTION
--------------------------
*/    	function show3508table($message=""){
			$message=urldecode($message);
			$this->checkUser();
			$data=array();
		   
			$cust_id=$this->session->userdata('cust_id');
			$data["scheduledata"]=$this->MainModel->getwhere($cust_id,"scheduleatable");
			 $data["schemployeesdata"]=$this->MainModel->fetchschemployeeData($cust_id,"pay_imp_schemployeestable");
			 $data["payrolldata"]=$this->MainModel->getwhere($cust_id,"payrolltable");
			$data["companydata"]=$this->MainModel->getwhere($cust_id,"companytable");
			$data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
			$data["userdata"]=$this->MainModel->getwhere($cust_id,"usertable");
			$data["filedata"]=$this->MainModel->getFileWhere($cust_id,"companyInfo","filestable");
			$data["loandata"]=$this->MainModel->getwhere($cust_id,"loantable");
			$nonpayrolldata=$this->MainModel->getwhere($cust_id,"nonpayrolltable");
			$payrolldata=$this->MainModel->getwhere($cust_id,"payrolltable");
			// $ownerdata=$this->MainModel->getwhere($cust_id,"ownertable");
			$ownerdata=$this->MainModel->getwhere($cust_id,"pay_imp_ownerpayrollsummary");
			
			$data["selectedmenu"]=0;
			$data["formval"]=0;
		   
			if($message!=''){
				$data["message"]=$message;
			}
		  
		
			$cust_id=$this->session->userdata('cust_id');
			$scheduledata=$this->MainModel->getwhere($cust_id,"scheduleatable");
			$schemployeesdata=$this->MainModel->fetchschemployeeData($cust_id,"pay_imp_schemployeestable");
			$NumEmp_Feb15= $NumEmp_LookbackPer= $NumEmp_Q120= $NumEmp_ForgPer= $NumEmp_SafeHarbor2 = 0 ;
			
			$payroll_schedule = $payrolldata->payroll_schedule;

			switch ($payroll_schedule) {
				case "Daily":
					$divideBy = 8;
					break;
				case "Weekly":
					$divideBy = 40;
					break;
				case "BiWeekly":
					$divideBy = 80;
					break;
				case "SemiMonthly":
					$divideBy = 88;
					break;
				case "Monthly":
					$divideBy = 176;
					break;
				case "Qtrly":
					$divideBy = 528;
					break;
				case "SemiAnnual":
					$divideBy = 1056;
					break;
				case "Annual":
					$divideBy = 2112;
					break;
				case "Other":
					$divideBy = 2112;
					echo '<script>alert("You have selected OTHER payroll schedule. We will use 2112 annual hours for calculations!\\n");</script>';
					break;
			}		
			
			echo "<style> table, th, td {border: 1px solid black;}</style>";
			echo "<h3>Cust id - ".$cust_id;
			echo "</h3><br>payrolll schedule - ".$payroll_schedule;
			echo "<br>divideBy - ".$divideBy;

			
			// SafeHarbor2 Feb 15-Apr 26 = 71 days = 10.1 weeks																

			$FTE1method_Feb15_ar=array();
			$FTE2fraction_Feb15_ar=array();
			$FTE1method_Forg_ar=array();
			$FTE2fraction_Forg_ar=array();
			$FTE1method_SafeHarbor2_ar=array();
			$FTE2fraction_SafeHarbor2_ar=array();
			$FTE2fraction_Forg_ar=array();
			$empname_ar =array();
			$emp100Kplus_ar =array();
			$empBox1_ar =array();
			$empBox2a_ar=array();
			$empBox2b_ar=array();
			$empBox3_ar =array();
			$empBox4_ar=array();
			$empBox5a_ar =array();
			$empBox5b_ar	=array();

			$whichForgPeriodSelected=$MaxEmpPay=0;
			if (strpos($scheduledata->forgiveness_period, '8 week') !== false) {
				$whichForgPeriodSelected=8;
				$MaxEmpPay = 15385.00;
				$MaxOwnerpay = 15385.00;
			}
			else{
				$whichForgPeriodSelected=24;
				$MaxEmpPay = 46154.00;
				$MaxOwnerpay = 20833;
			}
			echo "<br>whichForPeriodSelected - ".$whichForgPeriodSelected;
			echo "<br><br><h2>SCHEDULE A WORKSHEET <br></h2> <table>";

			$row=count($schemployeesdata);
			for($i=0;$i<$row;$i++){
				$empBox1_ar[$i] = 0;
				$empBox2a_ar[$i] = 0;
				$empBox2b_ar[$i] = 0;
				$empBox3_ar[$i] = 0;
				$empBox4_ar[$i]=0;
				$empBox5a_ar[$i]=0;
				$empBox5b_ar[$i]=0;

				$FTE1method_SafeHarbor2_ar[$i] = 0.0;
				$FTE2fraction_SafeHarbor2_ar[$i] = 0.0;
				$FTE1method_Feb15_ar[$i] = 0.0;
				$FTE2fraction_Feb15_ar[$i]=0.0;
				$FTE1method_Current_ar[$i]=0.0;
				$FTE2fraction_Current_ar[$i]=0.0;
				$FTE1method_Forg_ar[$i] =0.0;
				$FTE2fraction_Forg_ar[$i] =0.0;
				
				
				$empFname=$schemployeesdata[$i]->empFname;
				$empPayFeb15=$schemployeesdata[$i]->empPayFeb15;
				$empHrsFeb15=$schemployeesdata[$i]->empHrsFeb15;
				$empPayQ120=$schemployeesdata[$i]->empPayQ120;
				$empHrsQ120=$schemployeesdata[$i]->empHrsQ120;
				$empPaySafeHarbor2=$schemployeesdata[$i]->empPaySafeHarbor2;
				$empHrsSafeHarbor2=$schemployeesdata[$i]->empHrsSafeHarbor2;
				$empPayLookback2020=$schemployeesdata[$i]->empPayLookbackPer2;
				$empHrsLookback2020=$schemployeesdata[$i]->empHrsLookbackPer2;
				$empPayLookback2019=$schemployeesdata[$i]->empPayLookbackPer;
				$empHrsLookback2019=$schemployeesdata[$i]->empHrsLookbackPer;
				$empPayCurrent=$schemployeesdata[$i]->empPayCurrentPer;
				$empHrsCurrent=$schemployeesdata[$i]->empHrsCurrentPer;
				$empSalHrlyType=$schemployeesdata[$i]->empSalHrlyType;
				$emp2019_100Kplus=$schemployeesdata[$i]->emp2019_100Kplus;
				$empSalRateCurrent=$schemployeesdata[$i]->empSalRateCurrent;
				
				if ($whichForgPeriodSelected==24) {
					$empPayForgPer=MIN($schemployeesdata[$i]->empPayForgPer24,$MaxEmpPay);
					$empHrsForgPer=$schemployeesdata[$i]->empHrsForgPer24;
				} else {				
					$empPayForgPer=MIN($schemployeesdata[$i]->empPayForgPer,$MaxEmpPay);
					$empHrsForgPer=$schemployeesdata[$i]->empHrsForgPer;
				}
				
						
				$emp100Kplus_ar[$i] = $schemployeesdata[$i]->emp2019_100Kplus;
				$empname_ar[$i] = $schemployeesdata[$i]->empFname;
			
				// calculate how many weeks are we into - during forgiveness period - since its possible forgiveness period NOT over yet	
				$periodstartdate=trim(explode("To",explode("(",$scheduledata->forgiveness_period)[1])[0]);
				$diff = abs(strtotime($periodstartdate) - strtotime($scheduledata->forgiveness_period_date));
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				$totalNumDays = ($months*30)+$days;
				$NumWeeksForgPeriod=round(($totalNumDays/7),1);
				$RoundNumWeeksForgPeriod=round($NumWeeksForgPeriod,0);
				// echo "NumWeeksForgPeriod - ".$NumWeeksForgPeriod;  // i.e. $NumWeeksForgPeriod cannot be fractions - must be absolute #																

				// NumWeeks cannot be more than Forg Period Selected
				if ($NumWeeksForgPeriod > $whichForgPeriodSelected) {
					$NumWeeksForgPeriod = $whichForgPeriodSelected;   
				}
				
				/* echo "<br><br>periodstartdate - ".$periodstartdate;
				echo "<br>payroll data date - ".$scheduledata->forgiveness_period_date;
				echo "<br>years-months-days - ".$years."-".$months."-".$days;
				echo "<br>totalNumDays - ".$totalNumDays;
				echo "<br>NumWeeksForgPeriod - ".$NumWeeksForgPeriod;
				echo "<br>RoundNumWeeksForgPeriod - ".$RoundNumWeeksForgPeriod;	    
				*/
				
				// Calculate 2 FTE counts for EACH employee - for Forgiveness Period (Sch A Worksheet - Table 1 and Table 2 - Average FTE column)																	
				if ($empSalHrlyType == 'Salaried') {	
					// echo "<br><br>in <b><U>Salaried - </b></U>".$empSalHrlyType." - ".$empFname;        		    
					if($empPayForgPer>0){
							$FTE1method_Forg_ar[$i]=1.0;
							$FTE2fraction_Forg_ar[$i]=1.0;
					}
						
					if($empPaySafeHarbor2>0){
							$FTE1method_SafeHarbor2_ar[$i]=1.0;
							$FTE2fraction_SafeHarbor2_ar[$i]=1.0;
					}
						
					// echo "<br>empPayFeb15 >0 - ".$empPayFeb15;
					if ($empPayFeb15 > 0){
							$FTE1method_Feb15_ar[$i]=1.0;
							$FTE2fraction_Feb15_ar[$i]=1.0;
					}
					if ($empPayCurrent > 0){
							$FTE1method_Current_ar[$i]=1.0;
							$FTE2fraction_Current_ar[$i]=1.0;
					}				
				}
					// calculate FTE for hourly employee
				else {																	
					// echo "<br><br>in <b><U>Hrly - </b></U>".$empSalHrlyType." - ".$empFname;
						
					if ($empHrsForgPer/$NumWeeksForgPeriod  >= 40){          // Forgiveness Period upto today - may NOT be full 24 weeks yet																
						// echo "<br>in empHrsForgPer >= 40 ".$empHrsForgPer/$NumWeeksForgPeriod;
						$FTE1method_Forg_ar[$i] = 1.0;
						$FTE2fraction_Forg_ar[$i] = 1.0;			
					}
					else 
					{
						// echo "<br>in empHrsForgPer < 40 empHrsForgPer/NumWeeksForgPeriod ".$empHrsForgPer."/".$NumWeeksForgPeriod."=".$empHrsForgPer/$NumWeeksForgPeriod;
						if ($empPayForgPer>0) {
								$FTE1method_Forg_ar[$i] = 0.5 ;															
								$FTE2fraction_Forg_ar[$i]=min(1.0,round(($empHrsForgPer/$NumWeeksForgPeriod)/40,1) ) ;  // (round to 1 digit after decimal)
						}
						else {
								// echo "<br>in empPayForgPer = 0 ";
								$FTE1method_Forg_ar[$i] = 0.0 ;															
								$FTE2fraction_Forg_ar[$i]=0.0;
						}
					}																
										
					//BELOW ASSUMES EMPLOYEE WORKED ALL TIME IN  PERIOD - WHAT ABOUT EMPLOYEE WHO WAS TERMINATED "DURING" or STARTED "DURING" the period																	
					//NEED TO ADD LOGIC FOR "Hire Date" and "Termination Date" here below																	
						if ($empHrsSafeHarbor2/10.1 >= 40)  {         // SafeHarbor2 Feb 15-Apr 26 = 71 days = 10.1 weeks																
							// echo "<br>empHrsSafeHarbor2 >=40 -".$empHrsSafeHarbor2/10.1;
							$FTE1method_SafeHarbor2_ar[$i] = 1.0;
							$FTE2fraction_SafeHarbor2_ar[$i] = 1.0;
						}
						else{//empHrsSafeHarbor2 NOT EQUAL TO ZERO																
							//echo "<br>empHrsSafeHarbor2 <40 -".$empHrsSafeHarbor2/10.1;
							if ($empHrsSafeHarbor2>0) {
								$FTE1method_SafeHarbor2_ar[$i] = 0.5;														
								$FTE2fraction_SafeHarbor2_ar[$i]=min(1.0,round(($empHrsSafeHarbor2/10.1)/40,1)) ;  // (round to 1 digit after decimal)															
							} else {
								$FTE1method_SafeHarbor2_ar[$i] = 0.0;														
								$FTE2fraction_SafeHarbor2_ar[$i]=0.0;												
							}
						}   // UNSURE: NEED TO VERIFY if empHrsSafeHarbor2 = 0  then do nothing OR should we set the 2 vars to 0??																


																						
					//BELOW ASSUMES EMPLOYEE WORKED ALL TIME IN  PERIOD - WHAT ABOUT EMPLOYEE WHO WAS TERMINATED "DURING" or STARTED "DURING" the period																	
					//NEED TO ADD LOGIC FOR "Hire Date" and "Termination Date" here below																	
						if ($empHrsFeb15 >= $divideBy) {          // Feb 15 week = 1 week																
							$FTE1method_Feb15_ar[$i] = 1.0;
							$FTE2fraction_Feb15_ar[$i] = 1.0;
						}
						else {//empHrsFeb15 NOT EQUAL TO ZERO																
							if ($empHrsFeb15>0) {
								$FTE1method_Feb15_ar[$i] = 0.5;														
								$FTE2fraction_Feb15_ar[$i]=min(1.0,round(($empHrsFeb15)/$divideBy,1));   // (round to 1 digit after decimal)
							} else {
								$FTE1method_Feb15_ar[$i] = 0.0;														
								$FTE2fraction_Feb15_ar[$i]=0.0;
							}
						}   
						// UNSURE: NEED TO VERIFY if empHrsFeb15 = 0  then do nothing OR should we set the 2 vars to 0??																
						// ABOVE I AM NOT DIVIDING BY PAYROLL SCHEDULE e.g. if biweekly schedule and someone reports 70 hrs - I have to take 70/2=35 hours - BUT WEEKLY person will divide by 1															


						if ($empHrsCurrent >= $divideBy) {          																
							$FTE1method_Current_ar[$i] = 1.0;
							$FTE2fraction_Current_ar[$i] = 1.0;
						}
						else { 																
							if ($empHrsCurrent>0) {
								$FTE1method_Current_ar[$i] = 0.5;														
								$FTE2fraction_Current_ar[$i]=min(1.0,round(($empHrsCurrent)/$divideBy,1));   // (round to 1 digit after decimal)
							} else {
								$FTE1method_Current_ar[$i] = 0.0;														
								$FTE2fraction_Current_ar[$i]=0.0;
							}
						}   


					} // else of Hrly type
		
					$FTE1method_Feb15_ar[$i]=round($FTE1method_Feb15_ar[$i],1);
					$FTE2fraction_Feb15_ar[$i]=round($FTE2fraction_Feb15_ar[$i],1);
					$FTE1method_Forg_ar[$i]=round($FTE1method_Forg_ar[$i],1);
					$FTE2fraction_Forg_ar[$i]=round($FTE2fraction_Forg_ar[$i],1);
					$FTE1method_SafeHarbor2_ar[$i]=round($FTE1method_SafeHarbor2_ar[$i],1);
					$FTE2fraction_SafeHarbor2_ar[$i]=round($FTE2fraction_SafeHarbor2_ar[$i],1);
			
					// echo "<br><br><b>FTE1method_Feb15 - ".round($FTE1method_Feb15_ar[$i],1);
					// echo "<br>FTE2fraction_Feb15 - ".round($FTE2fraction_Feb15_ar[$i],1);
					// echo "<br>FTE1method_Forg- ".round($FTE1method_Forg_ar[$i],1);
					// echo "<br>FTE2fraction_Forg - ".round($FTE2fraction_Forg_ar[$i],1);
					// echo "<br>FTE1method_SafeHarbor2 - ".round($FTE1method_SafeHarbor2_ar[$i],1);
					// echo "<br>FTE2fraction_SafeHarbor2 - ".round($FTE2fraction_SafeHarbor2_ar[$i],1)."</b>";

		
						
						
					// empBox3   Calculate Salary/Hourly Wage Reduction - for Forgiveness Period (Sch A Worksheet - Table 1 and Table 2 - Salary Wage Reduction column)																	
					// We do NOT need to do Salary/Wage Reduction for employees earning > 100K in 2019																	
					// empBox2a/2b/5a/5b     FTE Reduction Boxes for >=100K and <100K																	

					// echo "<br>empPayQ120 - empHrsQ120 - ".$empPayQ120."-".$empHrsQ120;
					// echo "<br>empPayForgPer - empHrsForgPer - ".$empPayForgPer."-".$empHrsForgPer;
																						
					if ($empPayForgPer>0)
					{
						// echo "<br>empBox1 - ".$empBox1_ar[$i];

						if (($emp2019_100Kplus == "no") or ($emp2019_100Kplus == "not employed in 2019")) {      // i.e. include 100K+ people new hires in forgiveness period	
																							
							$empBox1_ar[$i] = $empPayForgPer;	
							$empBox2a_ar[$i] = $FTE1method_Forg_ar[$i];																
							$empBox2b_ar[$i] = $FTE2fraction_Forg_ar[$i]	;															
							
								$step1a = round($empPayForgPer/$empHrsForgPer,2);                // Calculate Avg Hrly Wage for ForgPeriod															
								// echo "<br>step1a = empPayForgPer/empHrsForgPer - ".$step1a."=".$empPayForgPer."/".$empHrsForgPer;
								if ($empPayQ120>0){
									$step1b = round($empPayQ120/$empHrsQ120,2);
									// echo "<br>empPayQ1 > 0 step1b - ".$step1b;
								}
								else {
									$step1b=0;
									// echo "<br>ELSE empPayQ1=0 step1b - ".$step1b;
								}         // Calculate Avg Hrly Wage for Q1 2020															
								//calculate empBox3								
	// echo "<br>Reduction - ".$empname_ar[$i]." step1a-".$step1a;							
	// echo "<br>Reduction step1b-".$step1b;							
								if  ($step1b==0){
									$empBox3_ar[$i]=0;
								}
								else {
									if ($step1a/$step1b >= 0.75){
									 $empBox3_ar[$i] = 0.0;// means NO 25% reduction 
									}  
									else{
										// calculate empbox3 HOW MUCH wage reduction 														
										if ($empPayFeb15>0)
										{
												$step2a = round($empPayFeb15/$empHrsFeb15,2);
												// echo "<br>Reduction step2a-".$step2a;
										}
										else  {     
											$step2a = 0.0 ;       // (wage on Feb 15)	
										}
										if ($empPaySafeHarbor2 >0)   {
												$step2b = round($empPaySafeHarbor2/$empHrsSafeHarbor2,2) ;
										// echo "<br>Reduction step2b-".$step2b;
										}
										else{  
												$step2b = 0.0;
										}// (calc avg rate during Safe Harbor Period 2)													
													// If 2.b. is equal to or greater than 2.a., skip to Step 3. Otherwise, proceed to 2.c.													
										if($step2b < $step2a)
										{
											$step2c = $empSalRateCurrent;
											// echo "<br>Reduction step2c-".$step2c;
											if ($step2c >= $step2a) 
											{		
												 $empBox3_ar[$i] = 0.0	;
											}
											else													
											{			// step 3												
												$step3a = round(($step1b*0.75),2);												
												$step3b = $step3a - $step1a;
											// echo "<br>Reduction step3a-".$step3a;
											// echo "<br>Reduction step3b-".$step3b;
												
												if ($empSalHrlyType == 'Hourly')  {												
													$step3c = round($empHrsQ120/13,2);  // avg hrs worked in Q1'2020 which was 13 weeks exact											
													$step3d = round($step3b*$step3c,2);
													
													if ($whichForgPeriodSelected == 24){	//IF SELECTED FORGIVENESS PERIOD IS 24 WEEKS {											
															$step3d = round($step3d * 24,2);
													}
													else{
														$step3d = round($step3d * 8,2);											
													}											
													$empBox3_ar[$i] = $step3d	;
													// echo "<br>Reduction Hourly- empBox3 = step3c-".$step3c;
													// echo "<br>Reduction Hourly- empBox3 = step3d-".$empBox3_ar[$i];
												}												
												else{       // salary
													if($whichForgPeriodSelected>=24){
														$step3e = round($step3b *24,2);  
													}
													else{
														$step3e = round($step3b*8,2);
													}	// (if 24 weeks) OR $step3b*8 (if 8 weeks)											
													$step3e = round($step3e/52,2);											
													$empBox3_ar[$i] = $step3e	;
													echo "<br>Reduction Salaried-empBox3 = step3e-".$empBox3_ar[$i];												
												}												
											}	     
										}
									}
								}
						}
						else {	// set FTE for > 100K employees who were there in 2019																	
								$empBox4_ar[$i] = $empPayForgPer;	
								if ($empPayForgPer>0 ) {    // if someone who didn't get paid in ForgPeriod																	
									$empBox5a_ar[$i] = $FTE1method_Forg_ar[$i];																
									$empBox5b_ar[$i] = $FTE2fraction_Forg_ar[$i];															
								}
								else {
									$empBox5a_ar[$i] = 0.0;																
									$empBox5b_ar[$i] = 0.0;															
								}
						}
					}
																						
					//SAVE $empBox2a/2b/3/5a/5b in employee's record in database 																	
					 // if ($empBox1_ar[$i]+$empBox4_ar[$i] > 0) {
						echo "<tr><td>".$empname_ar[$i];
						echo "</td><td> empBox1 - ".$empBox1_ar[$i]	;																		
						echo "</td><td> empBox2a - ".$empBox2a_ar[$i]	;																		
						echo "</td><td> empBox2b - ".$empBox2b_ar[$i]	;																		
						echo "</td><td> empBox3 - ".$empBox3_ar[$i]	;																		
						echo "</td><td> empBox4 - ".$empBox4_ar[$i]	;																		
						echo "</td><td> empBox5a - ".$empBox5a_ar[$i]	;																		
						echo "</td><td> empBox5b - ".$empBox5b_ar[$i]."</td></tr>"	;
					// }
					

					/*
					$empBox1_ar[$i] =$empBox1;
					$empBox2a_ar[$i]=$empBox2a;
					$empBox2b_ar[$i]=$empBox2b;
					$empBox3_ar[$i] =$empBox3;
					$empBox4_ar[$i]=$empBox4;
					$empBox5a_ar[$i] =$empBox5a;
					$empBox5b_ar[$i]	=$empBox5b;
					*/
				}
			//  *****************************																		
			// END foreachemployee LOOP															
			//  *****************************																		
						echo "</table>"	;	


			$WS_Table1_empName_ar =array();
			$WS_Table1_empID_ar =array();
			$WS_Table1_empBox1_ar =array();
			$WS_Table1_empBox2a_ar=array();
			$WS_Table1_empBox2b_ar=array();
			$WS_Table1_empBox3_ar =array();

			$WS_Table2_empName_ar =array();
			$WS_Table2_empID_ar =array();
			$WS_Table2_empBox4_ar=array();
			$WS_Table2_empBox5a_ar =array();
			$WS_Table2_empBox5b_ar	=array();

			$row=count($schemployeesdata);
			for($i=0;$i<$row;$i++){
				$WS_Table1_empName_ar[$i] ="";
				$WS_Table1_empID_ar[$i] ="";
				$WS_Table1_empBox1_ar[$i] =0;
				$WS_Table1_empBox2a_ar[$i] =0;
				$WS_Table1_empBox2b_ar[$i] =0;
				$WS_Table1_empBox3_ar[$i] =0;

				$WS_Table2_empName_ar[$i] ="";
				$WS_Table2_empID_ar[$i] ="";
				$WS_Table2_empBox4_ar[$i] =0;
				$WS_Table2_empBox5a_ar[$i] =0;
				$WS_Table2_empBox5b_ar[$i] =0;

				if ($empBox1_ar[$i]+$empBox4_ar[$i]>0)
				{
					if (($schemployeesdata[$i]->emp2019_100Kplus == "no") or ($schemployeesdata[$i]->emp2019_100Kplus == "not employed in 2019")) {      // i.e. include 100K+ people new hires in forgiveness period	
						$WS_Table1_empName_ar[$i] =$schemployeesdata[$i]->empFname;
						$WS_Table1_empID_ar[$i] =substr($schemployeesdata[$i]->empSSN4,-4);
						$WS_Table1_empBox1_ar[$i] =$empBox1_ar[$i];
						$WS_Table1_empBox2a_ar[$i] =$empBox2a_ar[$i];
						$WS_Table1_empBox2b_ar[$i] =$empBox2b_ar[$i];
						$WS_Table1_empBox3_ar[$i] =$empBox3_ar[$i];

					} else {
						$WS_Table2_empName_ar[$i] =$schemployeesdata[$i]->empFname;
						$WS_Table2_empID_ar[$i] =substr($schemployeesdata[$i]->empSSN4,-4);
						$WS_Table2_empBox4_ar[$i] =$empBox4_ar[$i];
						$WS_Table2_empBox5a_ar[$i] =$empBox5a_ar[$i];
						$WS_Table2_empBox5b_ar[$i] =$empBox5b_ar[$i];
					}
				}

			}

			$Tot_empBox1 = 0.0;
			$Tot_empBox2a = 0.0;
			$Tot_empBox2b = 0.0;
			$Tot_empBox3 = 0.0;
			echo "<br><br><h2><u>SCHEDULE A WORKSHEET - Table 1</u></h2> <table>";
			echo "<tr><td>Employee's Name";
			echo "</td><td>Employee Identifier";																		
			echo "</td><td>Cash Compensation (Box 1)";																		
			echo "</td><td>Average FTE - 1/0.5 method (Box 2a)";																		
			echo "</td><td>Average FTE - Fraction method (Box 2b)";																		
			echo "</td><td>Salary / Hourly Wage Reduction (Box 3)</td></tr>";																		
			$row=count($schemployeesdata);
			for($i=0;$i<$row;$i++){
				if ( ($WS_Table1_empBox1_ar[$i]>0) and ($WS_Table2_empBox4_ar[$i]==0))  
				{
					echo "<tr><td>".$WS_Table1_empName_ar[$i];
					echo "</td><td>".$WS_Table1_empID_ar[$i];																		
					echo "</td><td>".$WS_Table1_empBox1_ar[$i];																		
					echo "</td><td>".$WS_Table1_empBox2a_ar[$i];																		
					echo "</td><td>".$WS_Table1_empBox2b_ar[$i];																		
					echo "</td><td>".$WS_Table1_empBox3_ar[$i]."</tr>";

					$Tot_empBox1 = $Tot_empBox1 + $WS_Table1_empBox1_ar[$i];
					$Tot_empBox2a = $Tot_empBox2a + $WS_Table1_empBox2a_ar[$i];
					$Tot_empBox2b = $Tot_empBox2b + $WS_Table1_empBox2b_ar[$i];
					$Tot_empBox3 = $Tot_empBox3 + $WS_Table1_empBox3_ar[$i];
				}																		
			}
			$FTE_Reduction_a = round($scheduledata->ftemethod1,2) + round($scheduledata->ftemethod2,2) + round($scheduledata->ftemethod3,2);
			$FTE_Reduction_b = round($scheduledata->ftemethod4,2) + round($scheduledata->ftemethod5,2) + round($scheduledata->ftemethod6,2);
			$Tot_empBox2a = $Tot_empBox2a + $FTE_Reduction_a;
			$Tot_empBox2b = $Tot_empBox2b + $FTE_Reduction_b;
			echo "<tr></tr>";
			echo "<tr><td><b>FTE Reduction Exceptions:</b></td><td>&nbsp;</td><td>&nbsp;</td><td>".$FTE_Reduction_a."</td><td>".$FTE_Reduction_b."</td><td>&nbsp;</td></tr>";
			echo "<tr><td><b>Totals:</b></td><td>&nbsp;</td><td>Box 1=".$Tot_empBox1."</td><td>Box 2a=".$Tot_empBox2a."</td><td>Box 2b=".$Tot_empBox2b."</td><td>Box 3=".$Tot_empBox3."</td></tr>";

			echo "</table>"	;	

			$Tot_empBox4 = 0.0;
			$Tot_empBox5a = 0.0;
			$Tot_empBox5b = 0.0;
			echo "<br><br><h2><u>SCHEDULE A WORKSHEET - Table 2 </u></h2><table>";
			echo "<tr><td>Employee's Name";
			echo "</td><td>Employee Identifier";																		
			echo "</td><td>Cash Compensation (Box 4)";																		
			echo "</td><td>Average FTE - 1/0.5 method (Box 5a)";																		
			echo "</td><td>Average FTE - Fraction method (Box 5b)</td></tr>";																		
			$row=count($schemployeesdata);
			for($i=0;$i<$row;$i++){					
				if ($WS_Table2_empBox4_ar[$i]>0)
				{
					echo "<tr><td>".$WS_Table2_empName_ar[$i];
					echo "</td><td>".$WS_Table2_empID_ar[$i];																		
					echo "</td><td>".$WS_Table2_empBox4_ar[$i];																		
					echo "</td><td>".$WS_Table2_empBox5a_ar[$i];																		
					echo "</td><td>".$WS_Table2_empBox5b_ar[$i]."</tr>";																		

					$Tot_empBox4 = $Tot_empBox4 + $WS_Table2_empBox4_ar[$i];
					$Tot_empBox5a = $Tot_empBox5a + $WS_Table2_empBox5a_ar[$i];
					$Tot_empBox5b = $Tot_empBox5b + $WS_Table2_empBox5b_ar[$i];
				}																		
			}
			echo "<tr><td><b>Totals:</b></td><td>&nbsp;</td><td>Box 4=".$Tot_empBox4."</td><td>Box 5a=".$Tot_empBox5a."</td><td>Box 5b=".$Tot_empBox5b."</td></tr>";
			echo "</table>"	;	


						
																						
	  /*      
			//  *****************************																		
				// FTE Reduction Safe Harbor 2 calculations - in Sched A Worksheet below tables																			
					// RETURNS $FTE_A_Reduction_SafeHarbor_Applicable = "FALSE" or $line13 = 1.0																			
					// when $FTE_A_Reduction_SafeHarbor_Applicable = "FALSE" then line13 = line12 divided by line11																			
	*/				
				$FTE1_SafeHarbor2 = $FTE2_SafeHarbor2 = $NumEmp_SafeHarbor2 = 0.0;
				$FTE1_Current = $FTE2_Current = $NumEmp_Current = $empPayCurrent = 0.0;
				$FTE1_Feb15 = $FTE2_Feb15 = $NumEmp_Feb15 = 0.0;
				
				// echo "<h4><br>STARTING SH </h4>";
				$row=count($schemployeesdata);
					for($i=0;$i<$row;$i++){
						// echo "<br>empPaycurrent - ".$empPaycurrent=$schemployeesdata[$i]->empPaycurrent;

							$empPaySafeHarbor2=$schemployeesdata[$i]->empPaySafeHarbor2;
							if ($empPaySafeHarbor2 > 0) {
								if ($schemployeesdata[$i]->empSalHrlyType == 'Salaried') {
									$FTE1_SafeHarbor2 = $FTE1_SafeHarbor2+1;
									$FTE2_SafeHarbor2 = $FTE2_SafeHarbor2+1;
								}
								else {							
									$FTE1_SafeHarbor2 = $FTE1_SafeHarbor2+$FTE1method_SafeHarbor2_ar[$i];
									$FTE2_SafeHarbor2 = $FTE2_SafeHarbor2+$FTE2fraction_SafeHarbor2_ar[$i];
								}
								$NumEmp_SafeHarbor2 = $NumEmp_SafeHarbor2+1;
								// echo "<br>SH empName - FTE1_SafeHarbor2 - FTE2_SafeHarbor2 - ".$empFname=$schemployeesdata[$i]->empFname."-".$FTE1method_SafeHarbor2_ar[$i]."-".$FTE2fraction_SafeHarbor2_ar[$i];
							}  
						
							$empPayFeb15=$schemployeesdata[$i]->empPayFeb15;
							if ($empPayFeb15 > 0) {
								$FTE1_Feb15 = $FTE1_Feb15+$FTE1method_Feb15_ar[$i];
								$FTE2_Feb15 = $FTE2_Feb15+$FTE2fraction_Feb15_ar[$i];
								$NumEmp_Feb15 = $NumEmp_Feb15+1;
								// echo "</h4><br>Feb15 empName - FTE1_Feb15 - FTE2_Feb15 - ".$empFname=$schemployeesdata[$i]->empFname."-".$FTE1method_Feb15_ar[$i]."-".$FTE2fraction_Feb15_ar[$i];
							}
							
							$empPayCurrent=$schemployeesdata[$i]->empPayCurrentPer;
							if ($empPayCurrent > 0) {					
								$FTE1_Current = $FTE1_Current+$FTE1method_Current_ar[$i];
								$FTE2_Current = $FTE2_Current+$FTE2fraction_Current_ar[$i];
								$NumEmp_Current = $NumEmp_Current+1;
							}
					}
					// echo "<h4><br>ENDING SH </h4>";
		
					$step1a = $FTE1_SafeHarbor2;
					$step1b = $FTE2_SafeHarbor2;
					$step2a = $FTE1_Feb15;
					$step2b = $FTE2_Feb15;
					$step_3a="";
					$step_3b="";
					$step4a = $FTE1_Current;
					$step4b = $FTE2_Current;
					$step_5a="";
					$step_5b="";

					echo "<h2><u>FTE Reduction Safe Harbor 2:</u></h2>";
					echo "<br>Step 1a: average FTE between February 15, 2020 and April 26, 2020  <u>".$step1a."</u>";
					echo "<br>Step 1b: average FTE between February 15, 2020 and April 26, 2020  <u>".$step1b."</u>";
					echo "<br>Step 2a: total FTE in pay period inclusive of February 15, 2020  <u>".$step2a."</u>";
					echo "<br>Step 2b: total FTE in pay period inclusive of February 15, 2020  <u>".$step2b."</u>";
					


					// echo "<br>SH FTE NumEmp - ".$NumEmp_SafeHarbor2;
					// echo "<br>SH FTE1 Count / Step1a - ".$FTE1_SafeHarbor2;
					// echo "<br>SH FTE2 Count / Step1b - ".$FTE2_SafeHarbor2;
					
					// echo "<br>Feb15 FTE NumEmp - ".$NumEmp_Feb15;
					// echo "<br>Feb15 FTE1 Count  / Step2a - ".$FTE1_Feb15;
					// echo "<br>Feb15 FTE2 Count  / Step2b - ".$FTE2_Feb15;
					
					// Step3 - if FTE Feb15 > SH then goto Step 4, 
					// else FTE Reduction Safe Harbor 2 is not applicable and 
					// the Borrower must complete line 13 of PPP Schedule A by dividing line 12 by line 11 of that schedule
					$SchA_Line13a = 0.0;
					$FTE1_ReductionSH2Apply = "No";
					if ($step2a > $step1a) {
						//echo "<h2>total FTE today - NEED TO CALCULATE THIS step4a </h2>";
						// $step4a = calculate total FTE today
						echo "<br>Step 3a:  <u>Step 2a is greater than Step 1a. Go to Step 4a</u>";
                        $step_3a="Step 2a is greater than Step 1a. Go to Step 4a";
						if ($step4a >= $step2a) {
							$SchA_Line13a = 1.0;
							$FTE1_ReductionSH2Apply = "Yes";
						}
					}
					else {
					    $step_3a="FTE Reduction Safe Harbor 2 is not applicable";
						echo "<br>Step 3a: <u>FTE Reduction Safe Harbor 2 is not applicable</u>";	
					}
					
					$SchA_Line13b = 0.0;
					$FTE2_ReductionSH2Apply = "No";
					if ($step2b > $step1b) {
						// echo "<h2>total FTE today - NEED TO CALCULATE THIS step4b </h2>";
						// $step4b = calculate total FTE today
						echo "<br>Step 3b: <u>Step 2b is greater than Step 1b. Go to Step 4b</u>";
                        $step_3b="Step 2b is greater than Step 1b. Go to Step 4b";
						if ($step4b >= $step2b) {
							$SchA_Line13b = 1.0;
							$FTE2_ReductionSH2Apply = "Yes";
						}
					}	
					else {
                        $step_3b="FTE Reduction Safe Harbor 2 is not applicable";
						echo "<br>Step 3b: <u>FTE Reduction Safe Harbor 2 is not applicable</u>";	
					}

					echo "<br>Step4a: total FTE as of the earlier of December 31, 2020, and current: <u>".$FTE1_Current."</u>";
					echo "<br>Step4b: total FTE as of the earlier of December 31, 2020, and current: <u>".$FTE2_Current."</u>";
					
					if ($FTE1_ReductionSH2Apply == "Yes") {
						echo "<br>Step5a: <u>FTE Reduction Safe Harbor 2 has been satisfied.</u>";
                        $step_5a="FTE Reduction Safe Harbor 2 has been satisfied.";
					} else {
							echo "<br>Step5a: <u>FTE Reduction Safe Harbor 2 does not apply.</u>";
                        $step_5a="FTE Reduction Safe Harbor 2 does not apply.";
					}

					if ($FTE2_ReductionSH2Apply == "Yes") {
						echo "<br>Step5b: <u>FTE Reduction Safe Harbor 2 has been satisfied.</u>";
                        $step_5b="FTE Reduction Safe Harbor 2 has been satisfied.";
					} else {
							echo "<br>Step5b: <u>FTE Reduction Safe Harbor 2 does not apply.</u>";
                        $step_5b="FTE Reduction Safe Harbor 2 does not apply.";
					}
					
																										
			//  *****************************																		
			//  END FTE Reduction Safe Harbor 2 calculations - in Sched A Worksheet below tables																		
			//  *****************************																		
																			
																						
			//	IF usertable.debugstatus = "ON" {                      // add new field in usertable - will be set manually FOR ADMINS ONLY in MySQL - to troubleshoot calculations																		
			//		echo ALL employee table values AND all above variables like $step1a, $step1b  all to $step3e2 and empbox3																	
			//	}	USE SAME LOGIC IN forgivenesstable.php ALSO																	

		
		
		// CALCULATE VALUES FOR OUTPUT OF SCHEDULE A																			
		// Line 1. Enter Cash Compensation (Box 1) from PPP Schedule A Worksheet, Table 1:																		
		$SchA_Line1=0;
		$SchA_Line2a=0;
		$SchA_Line2b=0;
		$SchA_Line3=0;
		$SchA_Line4=0;
		$SchA_Line5a=0;
		$SchA_Line5b=0;
		$SchA_Line6=0;
		$SchA_Line7=0;
		$SchA_Line8=0;
		$SchA_Line9=0;
		$SchA_Line10=0;
		$SchA_Line11a=0;
		$SchA_Line11b=0;
		$SchA_Line12a=0;
		$SchA_Line12b=0;
		// $SchA_Line13a=0;
		// $SchA_Line13b=0;
		
		
		
		//below variables are temporary and will be removed later
		$empBox1 = $empPayForgPer;	//	if selected ForgPeriod = 8 weeks - can be MAX $15385 OR if selected ForgPeriod = 24 weeks - can be MAX $46154
		$empBox2a=0;
		$empBox2b=0;
		$empBox3=0;
		$empBox4=0;
		$empBox5a=0;
		$empBox5b=0;
		//above variables are temporary and will be removed later
				
				
	// echo "<h2>need to fix Sched A - Line 3 - </h2>If the average annual salary or hourly wage for each employee listed on the PPP
	// Schedule A Worksheet, Table 1 during the Covered Period or the Alternative Payroll Covered Period was at least 75% of such employee’s average annual salary or hourly wage between January 1, 2020 and March 31, 2020,  enter 0 on line 3<br>";
		$row=count($schemployeesdata);
		for($i=0;$i<$row;$i++){
			if (( $emp100Kplus_ar[$i] == "no") or ($emp100Kplus_ar[$i] == "not employed in 2019")) {
				$SchA_Line1=$SchA_Line1+$empBox1_ar[$i];		    
				$SchA_Line2a=$SchA_Line2a+$empBox2a_ar[$i];  // Line 1. Compensation (Worksheet Box 1)
				$SchA_Line2b=$SchA_Line2b+$empBox2b_ar[$i];	// Line 2. Average FTE (Box 2) (Worksheet, Table 1):											
				$SchA_Line3 = $SchA_Line3+$empBox3_ar[$i];//  REDUCTION
				if (($empBox3_ar[$i] > 0) and  ($empBox1_ar[$i] >0)) {
					echo "<br> ".$empname_ar[$i]." <100K //  line2a ".$empBox2a_ar[$i]." 2b ".$empBox2b_ar[$i]." reduction ".$empBox3_ar[$i];
				}
			}
			else {  //for  employees that make >= 100K or newly hired in 2020
				$SchA_Line4 =$SchA_Line4+ $empBox4_ar[$i];//  compesation 
				$SchA_Line5a =$SchA_Line5a+ $empBox5a_ar[$i];// for all employees																		
				$SchA_Line5b =$SchA_Line5b+ $empBox5b_ar[$i];// for all employees	
				// echo "<br> ".$empname_ar[$i]." >100K //  line5a ".$empBox5a_ar[$i]." 5b ".$empBox5b_ar[$i];
			}	
		}

	/*	echo "<br>SchA Line1 - ".$SchA_Line1;
		echo "<br>SchA Line2a - ".$SchA_Line2a;
		echo "<br>SchA Line2b - ".$SchA_Line2b;
		echo "<br>SchA Line3 - ".$SchA_Line3;
		echo "<br>SchA Line4 - ".$SchA_Line4;
		echo "<br>SchA Line5a - ".$SchA_Line5a;
		echo "<br>SchA Line5b - ".$SchA_Line5b;
	*/

		//DB. health insurance cost in user/payrollBenefits
		// echo "<h2>need to fix Sched A - Line 6 </h2> - not to include owner health insurance except for C-Corp";
			
		$health_cost=0;
		if($whichForgPeriodSelected>=24){
			$health_cost=$payrolldata->health24_cost;
		}
		else{
			$health_cost=$payrolldata->health8_cost;	
		}
		$SchA_Line6 =$health_cost; 			
		echo "<br><br><b>SchA Line6 - Health Insurance - </b>".$SchA_Line6;
			// MODIFY TEXT on TOP in user/payrollBenefits - Line 
			// [Make sure to not to include any health insurance costs for any “owners” (except if entity is a C-Corp)]   CHANGE TO															
			// in proper 8 or 24 selected period		
			//  [Make sure to not to include any health insurance costs for any “owners” (except if entity is a C-Corp, or less than 2% owner of S-Corp)]   															
			
		
		//Line 7. Total amount paid or incurred by Borrower for employer contributions to employee retirement plans																		
		//PLUS	SUM OF ALL OWNERES - Owner retirement contributions  (ONLY for DB.entity type S-Corp and C-corp owners) =  (2.5/12)*2019 owner_retirement_contribution																	
		// echo "<h2>need to fix Sched A - Line 7 </h2> - check OWNER retirement allowed for diff entity types";
		$retirement_cost=0;
		if($whichForgPeriodSelected>=24){
			$retirement_cost=$payrolldata->retirement24_cost;
		}
		else{
			$retirement_cost=$payrolldata->retirement8_cost;	
		}																	
		$SchA_Line7 = $retirement_cost;//DB. retirement cost in user/payrollBenefits																		
		echo "<br><b>SchA Line7 - Retirement - </b>".$SchA_Line7;
																				
		// Line 8. Total amount paid or incurred by Borrower for employer state and local taxes assessed on employee compensation																		
		//sum of 2 taxes  in user/payrollTaxes																		
		$tax_cost=0;
		if($whichForgPeriodSelected>=24){
			$tax_cost=$payrolldata->unemp24_contributions+ $payrolldata->state24_taxes;;
		}
		else{
			$tax_cost=$payrolldata->unemp8_contributions+ $payrolldata->state8_taxes;;	
		}																		
		$SchA_Line8 = $tax_cost;
		echo "<br><b>SchA Line8 - Taxes - </b>".$SchA_Line8;
																				
		// Line 9. Total amount paid to owner-employees/self-employed individual/general partners:																		
		// This amount may not be included in PPP Schedule A Worksheet, Table 1 or 2. If there is																		
		// more than one individual included, attach a separate table that lists the names of and																		
		// payments to each	
		
		
		
		
		  //sum of ALL owner ForgPeriod Payroll - subject to max/caps - $15385 max for 8 weeks - $20833 max for 24 weeks																		
		// echo "<h2>Sched A - Line 9 - owner is MINIMUM of 8/24wks-2019pay 20833/15385 or 2020ForgPer</h2>";
		$ownerpay_array=array();
		if (strpos($scheduledata->forgiveness_period, 'covered') !== false) {          
			if($whichForgPeriodSelected>=24){
				// $ownerpay_array= explode("~",$payrolldata->covered24_opay);
				$ownerpay_array= explode("~",$ownerdata->ownPayForgPer24);
			}
			else{            
				// $ownerpay_array= explode("~",$payrolldata->covered8_opay);
				$ownerpay_array= explode("~",$ownerdata->ownPayForgPer);
			}
		}
		else{
			if($whichForgPeriodSelected>=24){
				// $ownerpay_array= explode("~",$payrolldata->alternate24_opay);
				$ownerpay_array= explode("~",$ownerdata->ownPayForgPer24);
			}
			else{            
				// $ownerpay_array= explode("~",$payrolldata->alternate8_opay);
				$ownerpay_array= explode("~",$ownerdata->ownPayForgPer);
			}
		}
		
		// $owner2019_array= explode("~",$ownerdata->owner2019_pay);
		// $owner2019_count=count( explode("~",$ownerdata->owner2019_pay));
		$owner2019_array= explode("~",$ownerdata->ownPayLookbackPer);
		$owner2019_count=count( explode("~",$ownerdata->ownPayLookbackPer));
		$owner2019payAllowed=0;
		for($i=0;$i<$owner2019_count;$i++){
			$owner2019payAllowed = round( (2.5/12)*($owner2019_array[$i]),2);  // owner is allowed 2.5 months max of 2019 compensation
			// echo "<br>2020 ".$ownerpay_array[$i]."Max ".$MaxOwnerpay." <br>2019 ".$owner2019payAllowed;	
			$payroll8_powner=round(MIN(intval($ownerpay_array[$i]),$MaxOwnerpay, $owner2019payAllowed),2);
			$SchA_Line9=$SchA_Line9+$payroll8_powner;
		}
		
		// echo "<br>SchA Line9 - Owner Comp - ".$SchA_Line9;
						
						
		//Line 10. Payroll Costs (add lines 1, 4, 6, 7, 8, and 9):																		
		$SchA_Line10 = $SchA_Line1+$SchA_Line4+$SchA_Line6+$SchA_Line7+$SchA_Line8+$SchA_Line9;																
		
		// echo "<br>SchA Line10 - TOTAL PAYROLL COST - ".$SchA_Line10;
		
		// echo "<h2> show FTE Red SH 1 Checkbox - isn't it same as FORM YES NO Dropdown</h2>";


		//
		// BEGIN - SAFE HARBOR CALCULATIONS - for Sch A Line 11 
		//
		// echo "<h2> FTE Reduction SH2.. <u>VINU test this</u>. I am not sure if I 100% understand Worksheet Language IF SH2 applicable or NOT</h2>";
		// echo "<h3> start LookbackPer FTE Count 2020 </h3>";

		// 2020 look back period
		// Numweeks Jan1-2020 to Feb29-2020 = 8.57 and Feb15-2019 to Jun30-2019 = 19.43
		$FTE1_LookbackPer = $FTE2_LookbackPer = $empHrsLookbackPer = $CountNumEmpLookbackPeriod = 0;
		$NumWeeksLookbackPeriod2020 = 8.57 ; 
		$row=count($schemployeesdata);
		for($i=0;$i<$row;$i++){	
			if ($schemployeesdata[$i]->empPayLookbackPer2 > 0) {
				$empHrsLookback2020 = $schemployeesdata[$i]->empHrsLookbackPer2;
				$CountNumEmpLookbackPeriod = $CountNumEmpLookbackPeriod + 1;
				if ($schemployeesdata[$i]->empSalHrlyType == 'Salaried') {
					// echo "<br>".$empname_ar[$i]." in empHrsLookbackPer Salaried ";				
					$FTE1_LookbackPer = $FTE1_LookbackPer+1;
					$FTE2_LookbackPer = $FTE2_LookbackPer+1;
				}
				else {							
					if ($empHrsLookbackPer/$NumWeeksLookbackPeriod2020  >= 40){          																
						// echo "<br>".$empname_ar[$i]." in empHrsLookbackPer >= 40 ".round($schemployeesdata[$i]->empHrsLookbackPer2/$NumWeeksLookbackPeriod2020,2);
						$FTE1_LookbackPer = $FTE1_LookbackPer+1;
						$FTE2_LookbackPer = $FTE2_LookbackPer+1;
					}
					else {
						// echo "<br>".$empname_ar[$i]." in empHrsLookbackPer < 40 ".round($schemployeesdata[$i]->empHrsLookbackPer2/$NumWeeksLookbackPeriod2020,2);				
						$FTE1_LookbackPer = $FTE1_LookbackPer + 0.5 ;															
						$FTE2_LookbackPer = $FTE2_LookbackPer + min(1.0,round(($empHrsLookback2020/$NumWeeksLookbackPeriod2020)/40,1) );  
					}																
				}
			}
		}
		// echo "<br># of emp in Lookback Period 2020 -".$CountNumEmpLookbackPeriod;
		// echo "<br>FTE1 1/0.5 Lookback Period-".$FTE1_LookbackPer;
		// echo "<br>FTE2 fraction Lookback Period-".$FTE2_LookbackPer;
		// echo "<h4><br>ENDING Lookback </h4>";

		$SchA_Line11a = $FTE1_LookbackPer;
		$SchA_Line11b = $FTE2_LookbackPer;																		

		// REDO above same code for 2019 look back period
		// Numweeks Jan1-2020 to Feb29-2020 = 8.57 and Feb15-2019 to Jun30-2019 = 19.43
		$FTE1_LookbackPer = $FTE2_LookbackPer = $empHrsLookbackPer = $CountNumEmpLookbackPeriod = 0;
		$NumWeeksLookbackPeriod2019 = 19.43 ; 
		$row=count($schemployeesdata);
		for($i=0;$i<$row;$i++){	
			if ($schemployeesdata[$i]->empPayLookbackPer > 0) {
				$empHrsLookback2019 = $schemployeesdata[$i]->empHrsLookbackPer;
				$CountNumEmpLookbackPeriod = $CountNumEmpLookbackPeriod + 1;
				if ($schemployeesdata[$i]->empSalHrlyType == 'Salaried') {
					// echo "<br>".$empname_ar[$i]." in empHrsLookbackPer Salaried ";				
					$FTE1_LookbackPer = $FTE1_LookbackPer+1;
					$FTE2_LookbackPer = $FTE2_LookbackPer+1;
				}
				else {							
					if ($empHrsLookbackPer/$NumWeeksLookbackPeriod2019  >= 40){          																
						// echo "<br>".$empname_ar[$i]." in empHrsLookbackPer >= 40 ".round($schemployeesdata[$i]->empHrsLookbackPer/$NumWeeksLookbackPeriod2019,2);
						$FTE1_LookbackPer = $FTE1_LookbackPer+1;
						$FTE2_LookbackPer = $FTE2_LookbackPer+1;
					}
					else {
						// echo "<br>".$empname_ar[$i]." in empHrsLookbackPer < 40 ".round($schemployeesdata[$i]->empHrsLookbackPer/$NumWeeksLookbackPeriod2019,2);				
						$FTE1_LookbackPer = $FTE1_LookbackPer + 0.5 ;															
						$FTE2_LookbackPer = $FTE2_LookbackPer + min(1.0,round(($empHrsLookback2019/$NumWeeksLookbackPeriod2019)/40,1) );  
					}																
				}
			}
		}
		// echo "<h3>Lookback Period 2019</h3>";
		// echo "<br># of emp in Lookback Period 2019 -".$CountNumEmpLookbackPeriod;
		// echo "<br>FTE1 1/0.5 Lookback Period-".$FTE1_LookbackPer;
		// echo "<br>FTE2 fraction Lookback Period-".$FTE2_LookbackPer;
		// echo "<h4><br>ENDING Lookback </h4>";

		$SchA_Line11c = $FTE1_LookbackPer;
		$SchA_Line11d = $FTE2_LookbackPer;

		//
		// END SAFE HARBOR CALCULATIONS - for Sch A Line 11 
		//
		
		
		//Line 12
		$SchA_Line12a = $SchA_Line2a+$SchA_Line5a;																	
		$SchA_Line12b = $SchA_Line2b+$SchA_Line5b;																	

		//Line 13: Divide line 12 by line 11  
		// (or enter 1.0 - this check already done in earlier Worksheet code Safe Harbor Calculations
		$SchA_Line13c = $SchA_Line13d = 0;
		if ($SchA_Line13a < 1.0) {	
			$SchA_Line13a = round($SchA_Line12a/$SchA_Line11a,1); 
		}
		if ($SchA_Line13b < 1.0) {	
			$SchA_Line13b = round($SchA_Line12b/$SchA_Line11b,1);     
		}
		if ($SchA_Line13a < 1.0) {	
			$SchA_Line13c = round($SchA_Line12a/$SchA_Line11c,1); 
		}
		if ($SchA_Line13b < 1.0) {	
			$SchA_Line13d = round($SchA_Line12b/$SchA_Line11d,1);     
		}



																				
		//IF usertable.debugstatus = "ON" {                      // add new field in usertable - will be set manually FOR ADMINS ONLY in MySQL - to troubleshoot calculations																		
		//	echo ALL above NEW variables 																	
		//}	
		
		
		// $startdate=strtotime($periodstartdate);
		// $enddate=strtotime($scheduledata->forgiveness_period_date);
		$startdate="";
		$enddate="";
		if($whichForgPeriodSelected>=24){
			$startdate=strtotime($payrolldata->loan24_start);
			$enddate=strtotime($payrolldata->loan24_end);
		}
		else{            
			$startdate=$payrolldata->loan8_start;
			$enddate=$payrolldata->loan8_end;
		}

		$sum_utility=0;
		$sum_rent=0;
		$sum_mortgage=0;
		$i=1;
			$payees=explode("~",$nonpayrolldata->utility_payee);
			foreach($payees as $payee){
				$utilityamount=explode("~",$nonpayrolldata->utility_amount)[$i-1];
				$utility_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->utility_month)[$i-1])));
				$utility_date=strtotime(date(explode("~",$nonpayrolldata->utility_date)[$i-1]));

				if ((($utility_date >= $startdate) && ($utility_date <= $enddate))){
					$sum_utility=$sum_utility+ intval($utilityamount);
				}
				else if((($utility_month >= date('Y-m',$startdate)) && ($utility_month <= intval(date('Y-m',$enddate))))){
					$sum_utility=$sum_utility+ intval($utilityamount);
				}
				$i++; 
			}
			
			$i=1;
			$payees=explode("~",$nonpayrolldata->rent_payee);
			foreach($payees as $payee){
				$rentamount=explode("~",$nonpayrolldata->rent_amount)[$i-1];
				$rent_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->rent_month)[$i-1])));
				$rent_date=strtotime(date(explode("~",$nonpayrolldata->rent_date)[$i-1]));
				if ((($rent_date >= $startdate) && ($rent_date <= $enddate))){
					$sum_rent=$sum_rent+ intval($rentamount);
				}
				else if((($rent_month >= date('Y-m',$startdate)) && ($rent_month <= intval(date('Y-m',$enddate))))){
					$sum_rent=$sum_rent+ intval($rentamount);
				}
				
				$i++; 
			}
			
			
			$i=1;
			$payees=explode("~",$nonpayrolldata->mortgage_payee);
			foreach($payees as $payee){
				$mortgageamount=explode("~",$nonpayrolldata->mortgage_amount)[$i-1];
				$mortgage_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->mortgage_month)[$i-1])));
				$mortgage_date=strtotime(date(explode("~",$nonpayrolldata->mortgage_date)[$i-1]));

				if ((($mortgage_date >= $startdate) && ($mortgage_date <= $enddate))){
					$sum_mortgage=$sum_mortgage+ intval($mortgageamount);
				}
				else if((($mortgage_month >= date('Y-m',$startdate)) && ($mortgage_month <= intval(date('Y-m',$enddate))))){
					$sum_mortgage=$sum_mortgage+ intval($mortgageamount);
				}
				
				
				$i++; 
			}
			$data["sum_utility"]=$sum_utility;																	
			$data["sum_rent"]=$sum_rent;
			$data["sum_mortgage"]=$sum_mortgage;
			$data["SchA_Line1"]=$SchA_Line1;
			$data["SchA_Line2a"]=$SchA_Line2a;
			$data["SchA_Line2b"]=$SchA_Line2b;
			$data["SchA_Line3"]=$SchA_Line3;
			$data["SchA_Line4"]=$SchA_Line4;
			$data["SchA_Line5a"]=$SchA_Line5a;
			$data["SchA_Line5b"]=$SchA_Line5b;
			$data["SchA_Line6"]=$SchA_Line6;
			$data["SchA_Line7"]=$SchA_Line7;
			$data["SchA_Line8"]=$SchA_Line8;
			$data["SchA_Line9"]=$SchA_Line9;
			$data["SchA_Line10"]=$SchA_Line10;
			$data["SchA_Line11a"]=$SchA_Line11a;
			$data["SchA_Line11b"]=$SchA_Line11b;
			$data["SchA_Line11c"]=$SchA_Line11c;
			$data["SchA_Line11d"]=$SchA_Line11d;
			$data["SchA_Line12a"]=$SchA_Line12a;
			$data["SchA_Line12b"]=$SchA_Line12b;
			$data["SchA_Line13a"]=$SchA_Line13a;
			$data["SchA_Line13b"]=$SchA_Line13b;
			$data["SchA_Line13c"]=$SchA_Line13c;
			$data["SchA_Line13d"]=$SchA_Line13d;
			
	
			$this->session->set_userdata("empname_ar",$WS_Table1_empName_ar);
			$this->session->set_userdata("empID_ar",$WS_Table1_empID_ar);
			$this->session->set_userdata("empBox1_ar",$WS_Table1_empBox1_ar);
			$this->session->set_userdata("empBox2a_ar",$WS_Table1_empBox2a_ar);
			$this->session->set_userdata("empBox2b_ar",$WS_Table1_empBox2b_ar);
			$this->session->set_userdata("empBox3_ar",$WS_Table1_empBox3_ar);
			
			$this->session->set_userdata("Tot_empBox1",$Tot_empBox1);
			$this->session->set_userdata("Tot_empBox2a",$Tot_empBox2a);
			$this->session->set_userdata("Tot_empBox2b",$Tot_empBox2b);
			$this->session->set_userdata("Tot_empBox3",$Tot_empBox3);
			
			$this->session->set_userdata("empname100plus_ar",$WS_Table2_empName_ar);
			$this->session->set_userdata("empID100plus_ar",$WS_Table2_empID_ar);
			$this->session->set_userdata("empBox4_ar",$WS_Table2_empBox4_ar);
			$this->session->set_userdata("empBox5a_ar",$WS_Table2_empBox5a_ar);
			$this->session->set_userdata("empBox5b_ar",$WS_Table2_empBox5b_ar);
			
			$this->session->set_userdata("Tot_empBox4",$Tot_empBox4);
			$this->session->set_userdata("Tot_empBox5a",$Tot_empBox5a);
			$this->session->set_userdata("Tot_empBox5b",$Tot_empBox5b);
			
			
			
			$this->session->set_userdata("step_1a",$step1a);
			$this->session->set_userdata("step_1b",$step1b);
			$this->session->set_userdata("step_2a",$step2a);
			$this->session->set_userdata("step_2b",$step2b);
			$this->session->set_userdata("step_3a",$step_3a);
			$this->session->set_userdata("step_3b",$step_3b);
			$this->session->set_userdata("step_4a",$step4a);
			$this->session->set_userdata("step_4b",$step4b);
			$this->session->set_userdata("step_5a",$step_5a);
			$this->session->set_userdata("step_5b",$step_5b);
			//a=c
			//b=d
			echo "<h2>Form 3508</h2>";
		
			$this->loadView("forms/table3508",$data);
            //$this->load->view('forms/form3508PDF',$data);
		}
/*
--------------------------
END OF FUNCTION
--------------------------
*/
        
        public function loadView($view,$data){
            $this->load->view('template/head',$data);
    		$this->load->view($view);
            $this->load->view('template/footer');
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
    
    }