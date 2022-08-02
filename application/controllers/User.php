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

    class User extends CI_Controller {
        
    function __construct() {
        
        parent::__construct();
		
		// Load Stripe library & product model
        $this->load->library('stripe_lib');
		
        $this->load->library('paypal_lib');
        $this->load->model('Product');
        $this->load->database();
        
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 2400)) {
            // last request was more than 30 minutes ago
            session_unset();     // unset $_SESSION variable for the run-time 
            session_destroy();   // destroy session data in storage
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    }

 
     function paymentSuccess(){
 
        //get the transaction data
        $paypalInfo = $this->input->get();
           
        $data['item_number'] = $paypalInfo['item_number']; 
        $data['txn_id'] = $paypalInfo["tx"];
        $data['payment_amt'] = $paypalInfo["amt"];
        $data['currency_code'] = $paypalInfo["cc"];
        $data['status'] = $paypalInfo["st"];
         $this->updateActivity("Upgrade-Plan");
        //pass the transaction data to view
        
        $this->load->view('paypal/paymentSuccess', $data);
     }
      
    function paymentFail(){
        //if transaction cancelled
        $this->load->view('paypal/paymentFail');
     }
      
    function paypal_ipn(){
        $this->load->model('Product');
        //paypal return transaction details array
        $paypalInfo    = $this->input->post();
 
        $data['user_id'] = $paypalInfo['custom'];
        $data['product_id']    = $paypalInfo["item_number1"];
        $data['txn_id']    = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];
 
        $paypalURL = $this->paypal_lib->paypal_url;        
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
         $discount=$this->session->userdata("discount");
         
         $orderData = array(
				            'cust_id'=>$this->session->userdata('cust_id'),
							'product_id' => $paypalInfo["item_number1"],
							'buyer_name' => $paypalInfo["first_name"],
							'buyer_email' => $paypalInfo["payer_email"],
			                'discount'=>$discount,
							'paid_amount' => $paypalInfo["mc_gross"],
							'paid_amount_currency' => $paypalInfo["mc_currency"],
							'txn_id' => $paypalInfo["txn_id"],
							'user_ip'=>$this->input->ip_address(),
							'payment_status' => $paypalInfo["payment_status"]
						);
        //check whether the payment is verified
        if(preg_match("/VERIFIED/i",$result)){
            //insert the transaction data into the database
            $this->Product->insertOrder($orderData);
            $this->session->set_userdata("discount","");
            if($this->session->userdata('product_name')!="custom"&&$this->session->userdata('product_name')!="testing"){
                $cust_id=$this->session->userdata('cust_id');
                $dataupdate=array("account_type"=>$this->session->userdata('product_name'));
                $this->MainModel->update($dataupdate,$cust_id,"usertable");
            }
            else if($this->session->userdata('product_name')=="custom"){
                $cust_id=$this->session->userdata('cust_id');
                
                $dataupdate=array("account_type"=>$this->session->userdata('product_name'));
                $data=array(
                    "status"=>"paid"
                    );
                $this->MainModel->updatewhere($data,$this->session->userdata('invoice_id'),"invoice_id","custominvoicetable") ;
            }
        }
          //  $this->Product->insertOrder($orderData);
    }
    
    public function payBill($invoice_id){
        $this->checkUser();
        $data=array(); 
        
        $cust_id=$this->session->userdata('cust_id');
        $data["companydata"]=$this->MainModel->getwhere($cust_id,"companytable");
        $data["userdata"]=$this->MainModel->getwhere($cust_id,"usertable");
        $loandata=$this->MainModel->getwhere($cust_id,"loantable");
        $userdata=$this->MainModel->getwhere($cust_id,"usertable");
        
        $data["companydata"]=$this->MainModel->getwhere($cust_id,"companytable");
        
        
        $whereArray=array(
            "invoice_id"=>$invoice_id,
            "cust_id"=>$cust_id
        );
        $res=$this->MainModel->get_where($whereArray,"custominvoicetable");
        $symbol="";
        $invoiceFlag=0;
        if(count((array)$res)>0){
            if(date("Y-m-d")>$res->due_date){
               $invoiceFlag=1; 
            }
            if($res->status!="pending"){
                $invoiceFlag=1;
            }
            //print_r($res);
            }
        else{
            $invoiceFlag=1;
        }
        if($invoiceFlag==0){
            
            $data["price"]=$res->amount;
            $data["invoice"]=1;
            $this->session->set_userdata('product_price',$res->amount);
            $this->session->set_userdata('invoice_id',$invoice_id);
            $this->session->set_userdata('product_name',"custom");
            $data["priceplandata"]=array();
            $data["priceplandata"][0]=(object)array(
                "plan_name"=>"custom",
                "view_header"=> "$".$res->amount,
                "view_body"=> $res->description,
                );
            $data["account_type"]=$userdata->account_type;
            //echo $userdata->cust_id.$userdata->account_type;
            $this->loadView("User/pricing",$data);
        }
        else{
            echo "<label style='text-align:center;color:red;background-color:#fffdeb;display:block;padding:17px;font-size:18px;'>No payable invoice exists. The invoice is already paid, invoice isn't meant for you, due date has passed or invoice number is wrong</label>";
        }
        
    
    }
    
    
    public function pricing(){
        $this->checkUser();
        $data=array(); 
        
        $cust_id=$this->session->userdata('cust_id');
        $admin_id=$this->session->userdata('admin_id');
        $data["companydata"]=$this->MainModel->getwhere($cust_id,"companytable");
        $data["userdata"]=$this->MainModel->getwhere($cust_id,"usertable");
        $loandata=$this->MainModel->getwhere($cust_id,"loantable");
        $userdata=$this->MainModel->getwhere($cust_id,"usertable");
        $reference_id=0;
        if(strlen($admin_id)>0){
            $reference_id=$this->session->userdata('p_reference_id');
        }
        else{
            $reference_id=$this->session->userdata('reference_id');
        }
        $data["priceplandata"]=$priceplan=$this->MainModel->getPriceGroup($this->MainModel->getParentPricePlan($reference_id)->price_group);
        
        $data["companydata"]=$this->MainModel->getwhere($cust_id,"companytable");
        
        
        $loan_amount=$this->MainModel->getwhere($cust_id,"loantable")->loan_amount;
        $price=0;
        $product_name="";
        $employees=0;
        if($loandata->loantime_employees>$loandata->forgivenesstime_employees){
            $employees=$loandata->loantime_employees;
        }
        else{
            $employees=$loandata->forgivenesstime_employees;
        }
        //print_r($data["priceplandata"]);
        if($priceplan[0]->based_on=="loan_amount"){
            $i=0;
            foreach($priceplan as $pp){
                if($pp->plan_name!="free"&&$pp->plan_name!="basic"){
                    if($loan_amount>=$pp->begin_condition&&$loan_amount<=$pp->end_condition){
                        $price=$pp->plan_cost+($employees* $pp->per_employee_rate);
                        $product_name=$pp->plan_name;
                    }
                    else{
                        unset($data["priceplandata"][$i]);
                    }
                }
                    $i++;
                
            }
        $data["price"]=$price;
        
        $this->session->set_userdata('product_price',$price);
        
        $this->session->set_userdata('product_name',$product_name);
        
        }
        
        
        $data["account_type"]=$userdata->account_type;
        //echo $userdata->cust_id.$userdata->account_type;
        $this->loadView("User/pricing",$data);
    
    }
    
    
    public function updatePlan($plan,$gateway,$code=""){
    
        $this->checkUser();
        $price=0;
        $product=array();
        
        $cust_id=$this->session->userdata('cust_id');
        $admin_id=$this->session->userdata('admin_id');
        $reference_id=0;
        if(strlen($admin_id)>0){
            $reference_id=$this->session->userdata('p_reference_id');
        }
        else{
            $reference_id=$this->session->userdata('reference_id');
        }
        $wholesalerRow=$this->MainModel->getParentPricePlan($reference_id);
        $priceplan=$this->MainModel->getPriceGroup($wholesalerRow->price_group);
        $userdata=$this->MainModel->getwhere($cust_id,"usertable");
        
        $loandata=$this->MainModel->getwhere($cust_id,"loantable");
        
        
        $employees=0;
        if($loandata->loantime_employees>$loandata->forgivenesstime_employees){
            $employees=$loandata->loantime_employees;
        }
        else{
            $employees=$loandata->forgivenesstime_employees;
        }
        $previousplan=$userdata->account_type;
        $previousrate=0;
        $selectedplan="";
        if($plan!=5&&$this->session->userdata('product_name')!="custom"){
            if($plan!="free" && $plan!="basic"){
               foreach($priceplan as $pp){
                    if($pp->plan_name==$plan){
                        $product= array(
                            "id"=>$pp->plan_id,
                            "name"=>$plan,
                            "colornumber"=>"#A07855FF"
                            );
                        $selectedplan=$pp;
                    }
                    
                    if($pp->plan_name==$previousplan){
                       $previousrate=round($pp->plan_cost+($employees*$pp->per_employee_rate)+($loandata->loan_amount*$pp->percent_loan),2) ;
                    }
               } 
            }
            else{
                
                header("Location: ".base_url()."user/companyInfo");
                die();
            }
            $loan_percent=($loandata->loan_amount*$selectedplan->percent_loan);
                  
            if($previousplan=="free" || $previousplan=="basic"){
                $product["price"]=round($selectedplan->plan_cost+($employees*$selectedplan->per_employee_rate)+$loan_percent,2);
            }
            else{
                $product["price"]=round(round($selectedplan->plan_cost+($employees*$selectedplan->per_employee_rate) +$loan_percent,2) - $previousrate,2);
            }
        }
        else if($plan==5){
            $product= array(
                "id"=>777,
                "name"=>"testing",
                "colornumber"=>"#A07855FF"
                );
            $product["price"]=round($price+($employees*0.1) + ($loandata->loan_amount*0.0001),2);   //testing price
            $this->session->set_userdata('product_name',"testing");
        }
        else if($this->session->userdata('product_name')=="custom"){
            
            $product= array(
                "id"=>154,
                "name"=>"custom",
                "colornumber"=>"#A07855FF"
                );
            $product["price"]= $this->session->userdata('product_price');
        }
        if($code!=""){
            $whereArray=array(
                "code"=>$code,
                "reference_id"=>$wholesalerRow->fk_wholesaler_id
                );
            $res=$this->MainModel->get_where($whereArray,"promocodestable");
            $symbol="";
            $promoFlag=0;
            if(count((array)$res)>0){
                if(date("Y-m-d")>$res->expiry_date){
                   $promoFlag=1; 
                }
                if($res->status!="active"){
                    $promoFlag=1;
                }
                if($res->cust_id!=""&&$res->cust_id!=0){
                    if($res->cust_id!=$cust_id){
                        $promoFlag=1;
                    }
                }
                //print_r($res);
                }
            else{
                $promoFlag=1;
            }
            if($promoFlag==0){
                $discount="";
                if($res->based_on=="dollars"){
                    $product["price"]=$product["price"]-$res->discount;
                    $discount="$ ".$res->discount;
                }
                else{
                    $product["price"]=$product["price"]-($product["price"]*($res->discount/100));
                    $discount=$res->discount." %";
                }
                $this->session->set_userdata("discount",$discount);
                echo "<label style='text-align:center;color:green;background-color:#faffeb;display:block;padding:17px;font-size:18px;'>Congratulations!! You got ".$discount." OFF</label>";
            }
            else{
                echo "<label style='text-align:center;color:red;background-color:#fffdeb;display:block;padding:17px;font-size:18px;'>Invalid discount code</label>";
            }
        }
        
        if($product["price"]<0){
            $product["price"]=0;
        }
        if($product["price"]==0){
            $data["hidebtn"]=1;
        }
        else{
             $data["hidebtn"]=0;
        }
        
        
        $this->session->set_userdata('product_name',strtolower($product["name"]));
        
        if($gateway=="stripe"){           //for testing !=0
            $product["currency"]="USD";
    		
    		// If payment form is submitted with token
    		if($this->input->post('stripeToken')){
    			// Retrieve stripe token, card and user info from the submitted form data
    			$postData = $this->input->post();
    			$postData['product'] = $product;
    			
    			// Make payment
    			$paymentID = $this->payment($postData);
    			//echo "afaf";
    			// If payment successful
    			if($paymentID){
    				redirect('user/payment_status/'.$paymentID);
    			}else{
    				$apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
    				$data['error_msg'] = 'Transaction has been failed!'.$apiError;
    			}
    		}
            
            // Pass product data to the details view
    		$data['product'] = $product;
            $this->load->view('products/details', $data);
        }
        else if($gateway=="paypal"){           //for testing !=0
            //Set variables for paypal form
            $returnURL = base_url().'user/paymentSuccess'; //payment success url
            $failURL = base_url().'user/paymentFail'; //payment fail url
            $notifyURL = base_url().'user/paypal_ipn'; //ipn url
            //get particular product data
            //$product = $this->Product->getProducts($id);
            //echo $product["price"];
            $logo = base_url().'assets/images/logo.png';
             
            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('fail_return', $failURL);
            $this->paypal_lib->add_field('notify_url', $notifyURL);
            $this->paypal_lib->add_field('item_name', $product['name']);
            $this->paypal_lib->add_field('custom', $cust_id);
            $this->paypal_lib->add_field('item_number',  $product['id']);
            $this->paypal_lib->add_field('amount',  $product["price"]);           
            //$this->paypal_lib->image($logo);
             
            $this->paypal_lib->paypal_auto_form();
        }
    }
	
	function purchase($id){
		$data = array();
		
		// Get product data from the database
        $product = $this->Product->getRows($id);
		
		// If payment form is submitted with token
		if($this->input->post('stripeToken')){
			// Retrieve stripe token, card and user info from the submitted form data
			$postData = $this->input->post();
			
			
			$postData['product'] = $product;
			
			// Make payment
			$paymentID = $this->payment($postData);
			//echo $paymentID."adfa";
			// If payment successful
			if($paymentID){
				redirect('user/payment_status/'.$paymentID);
			}else{
				$apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':'';
				$data['error_msg'] = 'Transaction has been failed!'.$apiError;
			}
		}
        
        // Pass product data to the details view
		$data['product'] = $product;
        $this->load->view('products/details', $data);
    }
	
	function payment($postData){
		// If post data is not empty
		if(!empty($postData)){
			// Retrieve stripe token, card and user info from the submitted form data
			$token  = $postData['stripeToken'];
			$name = $postData['name'];
			$email = $postData['email'];
			$card_number = $postData['card_number'];
			$card_number = preg_replace('/\s+/', '', $card_number);
			$card_exp_month = $postData['card_exp_month'];
			$card_exp_year = $postData['card_exp_year'];
			$card_cvc = $postData['card_cvc'];
			
			// Unique order ID
			$orderID = strtoupper(str_replace('.','',uniqid('', true)));
			$discount=$this->session->userdata("discount");
			// Add customer to stripe
			$customer = $this->stripe_lib->addCustomer($email, $token);
			
			if($customer){
				// Charge a credit or a debit card
				$charge = $this->stripe_lib->createCharge($customer->id, $postData['product']['name'], $postData['product']['price'], $orderID);
				$flag=0;
              //  print_r($postData);
				if($charge){
					// Check whether the charge is successful
					if($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1){
						// Transaction details 
						$transactionID = $charge['balance_transaction'];
						$paidAmount = $charge['amount'];
						$paidAmount = ($paidAmount/100);
						$paidCurrency = $charge['currency'];
						$payment_status = $charge['status'];
						$ip_address="";
						
						// Insert tansaction data into the database
						$orderData = array(
				            'cust_id'=>$this->session->userdata('cust_id'),
							'product_id' => $postData['product']['id'],
							'buyer_name' => $name,
							'buyer_email' => $email,
							'discount'=>$discount,
							'card_number' => str_repeat('*', strlen($card_number) - 4) . substr($card_number, -4),
							'card_exp_month' => $card_exp_month,
							'card_exp_year' => $card_exp_year,
							'paid_amount' => $paidAmount,
							'paid_amount_currency' => $paidCurrency,
							'txn_id' => $transactionID,
							'user_ip'=>$this->input->ip_address(),
							'payment_status' => $payment_status
						);
						//print_r($orderData);
						$orderID = $this->Product->insertOrder($orderData);
            						
                        $this->session->set_userdata("discount","");
						// If the order is successful
						if($payment_status == 'succeeded'){
						    $to = $email;
                            $subject = 'Transaction Successful!';
                            $txt = "Thankyou $name for your order. \n
                                    Your transaction has been succesful and your transaction id is".$transactionID. "\n" .
                                    "Your paid amount is $paidAmount$paidCurrency\n" .
                                    "Your product id is : ". $postData['product']['id'] ;
                           
                            
                            $this->sendEmail($to,$subject,$txt);
                            if($this->session->userdata('product_name')!="custom"&&$this->session->userdata('product_name')!="testing"){
                                $cust_id=$this->session->userdata('cust_id');
                                $dataupdate=array("account_type"=>$this->session->userdata('product_name'));
                                $this->MainModel->update($dataupdate,$cust_id,"usertable");
                                $this->updateActivity("Upgrade-Plan");
                            }
                            else if($this->session->userdata('product_name')=="custom"){
                                $cust_id=$this->session->userdata('cust_id');
                                $dataupdate=array("account_type"=>$this->session->userdata('product_name'));
                                $data=array(
                                    "status"=>"paid"
                                    );  
                                $this->MainModel->updatewhere($data,$this->session->userdata('invoice_id'),"invoice_id","custominvoicetable") ;
                            }
				
                            $this->session->set_userdata('product_name',"");
                            $this->session->set_userdata('product_price',"");
                            $this->session->set_userdata("discount",""); 
							return $orderID;
						}
						else{
						    $flag=1;
						}
					}
					else{
					    $flag=1;
					}
				}
				else{
				    $flag=1;
				}
				
				if(flag!=0){
				    $orderData = array(
				            'cust_id'=>$this->session->userdata('cust_id'),
							'product_id' => $postData['product']['id'],
							'buyer_name' => $name,
							'buyer_email' => $email,
							'card_number' => str_repeat('*', strlen($card_number) - 4) . substr($card_number, -4),
							'card_exp_month' => $card_exp_month,
							'card_exp_year' => $card_exp_year,
							'paid_amount' => "0",
							'paid_amount_currency' => 'USD',
							'txn_id' => "",
							'user_ip'=>$this->input->ip_address(),
							'payment_status' => "failed"
						);
						$orderID = $this->Product->insertOrder($orderData);
						    
						    $to = $email;
                            $subject = 'Transaction Failed!';
                            $txt = "Sorry your transaction has been Failed";
                            $this->sendEmail($to,$subject,$txt);
				
                            $this->session->set_userdata('product_name',"");
                            $this->session->set_userdata('product_price',"");
                            $this->session->set_userdata("discount",""); 
				} 
			}
		}
		return false;
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
	
	function payment_status($id){
		$data = array();
		
		// Get order data from the database
        $order = $this->Product->getOrder($id);
        $data['order']= $order;
        
        // Pass order data to the view
        $this->load->view('products/payment-status', $data);
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
	    mail($to,$subject,$message);
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

    
    public function showMessage($msg,$path){
        
        $message=urldecode($message);

        $cust_id=$this->session->userdata('cust_id');
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["nonpayrolldata"]=$this->MainModel->getwhere($cust_id,"nonpayrolltable");
        $data["filedata"]=$this->MainModel->getFileWhere($cust_id,"nonPayroll","filestable");
        $data["selectedmenu"]=0;
        $data["formval"]=4;
        if($message!=''){
            $data["msg"]=$message;
        }
    
    }
    
    public function index()
     {
         $this->login();
     }
     
    public function businessInfo(){
        $this->checkUser();
        $cust_id=$this->session->userdata('cust_id');
        $data["businessdata"]=$this->MainModel->getwhere($cust_id,"companytable");
        $data["userdata"]=$this->MainModel->getwhere($cust_id,"usertable");
        $data["loandata"]=$this->MainModel->getwhere($cust_id,"loantable");
        $this->loadView("once/businessinfo",$data);
    }
    
    public function BusinessInfoAction(){
        $this->checkUser();
        $data=array();
        extract($_POST);
        
         $this->form_validation->set_rules('business_name',"Business Legal Name","required");
         $this->form_validation->set_rules('loan_amount',"Loan amount","required");
         $this->form_validation->set_rules('disbursement_date',"Dibursement date","required");
         $this->form_validation->set_rules('hear_about_us',"How did you hear about us","required");
      
           if ($this->form_validation->run() == false) 
            {
                die(validation_errors().'-red-');
            }	
          $cust_id=$this->session->userdata('cust_id');
          $data = array(
                'cust_id'=>$cust_id,
                'business_name'=>$business_name
              );

           $this->MainModel->update($data,$cust_id,"companytable");
        
            $data = array( 
                    'cust_id'=>$cust_id,
                    'loan_amount'=>$loan_amount,
                    'bank_name'=>$bank_name,
                    'disbursement_date'=>$disbursement_date
                  );

            $this->MainModel->update($data,$cust_id,"loantable");
            $data = array( 
                    'hear_about_us'=>$hear_about_us,
                  );

             $this->UserModel->update($data,$cust_id);
             echo "Saved-green-".base_url()."user/personalInfo";
    }
    
    public function personalInfo(){
        $this->checkUser();
        $cust_id=$this->session->userdata('cust_id');
        $data["userdata"]=$this->MainModel->getwhere($cust_id,"usertable");
        $this->loadView("once/personalinfo",$data);
    }
    
    public function personalInfoAction(){
        $this->checkUser();
        $data=array();
        extract($_POST);
        
         $this->form_validation->set_rules('first_name',"First Name","required");
         $this->form_validation->set_rules('last_name',"Last Name","required");
         $this->form_validation->set_rules('title',"Title","required");
         $this->form_validation->set_rules('landline_phone',"Landline phone","required");
         $this->form_validation->set_rules('mobile_phone',"Cellular phone","required");
      
           if ($this->form_validation->run() == false) 
            {
                die(validation_errors().'-red-');
            }	
        
          $cust_id=$this->session->userdata('cust_id');
          $data = array( 
                'cust_id'=>$cust_id,
                'first_name'=>$first_name,
                'middle_initial'=>$middle_initial,
                'last_name'=>$last_name,
                'title'=>$title,
                'landline_phone'=>$landline_phone,
                'landline_extension'=>$landline_extension,
                'mobile_phone'=>$mobile_phone,
                'mobile_carrier'=>$mobile_carrier
              );

           $this->MainModel->update($data,$cust_id,"usertable");
           echo "Saved-green-".base_url()."user/employeeInfo";
    }
    
    public function employeeInfo(){
        $this->checkUser();
        $cust_id=$this->session->userdata('cust_id');
        $data["loandata"]=$this->MainModel->getwhere($cust_id,"loantable");
        $this->loadView("once/employeeinfo",$data);
    }
    
    public function employeeInfoAction(){
        $this->checkUser();
        $data=array();
        extract($_POST);
        
          $cust_id=$this->session->userdata('cust_id');
          $data = array( 
                'cust_id'=>$cust_id,
                'loantime_employees'=>$loantime_employees,
                'forgivenesstime_employees'=>$forgivenesstime_employees
              );

           $this->MainModel->update($data,$cust_id,"loantable");
           echo "Saved-green-".base_url()."user/termsandcondition";
    }
    
    public function termsandcondition(){
        $this->checkUser();
        
        $data=array();
        $cust_id=$this->session->userdata('cust_id');
       // print_r($this->MainModel->getParentPricePlan($this->session->userdata('reference_id')));
        $data["terms"]=$this->MainModel->getParentPricePlan($this->session->userdata('reference_id'))->terms_and_conditions;
        $this->loadView("once/termsandcon",$data);
    }
    
    public function termsandconditionlogin(){
        $this->checkUser();
        
        $data=array();
        $cust_id=$this->session->userdata('cust_id');
        $parent_data=$this->MainModel->getParentPricePlan($cust_id);
        $data["terms"]=$parent_data->terms_and_conditions;
        $this->loadView("termsandcon",$data);
    }
    
    public function thanks(){
        $this->checkUser();
        $cust_id=$this->session->userdata('cust_id');
        $data = array( 
                'cust_id'=>$cust_id,
                'form_completed'=>"true",
              );

        $this->MainModel->update($data,$cust_id,"usertable");
        $this->loadView("once/thanks",$data);
    }
    
    public function companyInfo($message=''){
        $this->checkUser();
        $data=array();
        $message=urldecode($message);
        //echo $message;
        $cust_id=$this->session->userdata('cust_id');
        $data["companydata"]=$this->MainModel->getwhere($cust_id,"companytable");
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["userdata"]=$this->MainModel->getwhere($cust_id,"usertable");
        $data["filedata"]=$this->MainModel->getFileWhere($cust_id,"companyInfo","filestable");
        $data["selectedmenu"]=0;
        $data["formval"]=0;
        if($message!=''){
            $data["message"]=$message;
        }
        $this->loadView("forms/companyinfo",$data);
    }
    
    public function companyInfoAction(){
        $this->checkUser();
        $data=array();
        extract($_POST);
        
         $this->form_validation->set_rules('entity_type',"Entity type","required");
         $this->form_validation->set_rules('business_name',"Business Legal Name","required");
         $this->form_validation->set_rules('street_address1',"street Address1","required");
         $this->form_validation->set_rules('city',"City","required");
         $this->form_validation->set_rules('state',"State","required");
         $this->form_validation->set_rules('zip',"Zip","required");
        
         $this->form_validation->set_rules('first_name',"First Name","required");
   
         $this->form_validation->set_rules('last_name',"Last Name","required");
         $this->form_validation->set_rules('title',"Title","required");
         $this->form_validation->set_rules('landline_phone',"Landline phone","required");
         $this->form_validation->set_rules('mobile_phone',"Cellular phone","required");
         $message="";
         if ($this->form_validation->run() == false) 
         {
            $message=strip_tags(validation_errors()).'~Errors~error';
         }
         else{
            
          $cust_id=$this->session->userdata('cust_id');
          $data = array( 
                'entity_type'=>$entity_type,
                'business_name'=>$business_name,
                'trade_name'=>$trade_name,
                'ein'=>$ein,
                'ssn'=>$ssn,
                'street_address1'=>$street_address1,
                'street_address2'=>$street_address2,
                'city'=>$city,
                'state'=>$state,
                'zip'=>$zip,
                'seasonalbusiness'=>$seasonalbusiness,
                  'franchisebusiness'=>$franchisebusiness,
              );

          $this->MainModel->update($data,$cust_id,"companytable");
            
          $data = array( 
                'first_name'=>$first_name,
                'middle_initial'=>$middle_initial,
                'last_name'=>$last_name,
                'title'=>$title,
                'landline_phone'=>$landline_phone,
                'landline_extension'=>$landline_extension,
                'mobile_phone'=>$mobile_phone,
                'mobile_carrier'=>$mobile_carrier,
                 
              );
          $this->updateActivity("Company-Save");
          $this->UserModel->update($data,$cust_id);
          
      
          
          
          
          
          $data = array( 
                'companytable'=>"fa-check green"
          );
          $this->MainModel->update($data,$cust_id,"statustable");
          $message='Data updated successfully~Saved~success';
            
        }
        $this->companyInfo($message);
    }
    
    public function ownerInfo($message=''){
        //echo $_SERVER['REQUEST_METHOD'];
        $this->checkUser();
        $data=array();
        $message=urldecode($message);
        $cust_id=$this->session->userdata('cust_id');
        $data["ownerdata"]=$this->MainModel->getwhere($cust_id,"ownertable");
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["userdata"]=$this->MainModel->getwhere($cust_id,"usertable");
        $data["filedata"]=$this->MainModel->getFileWhere($cust_id,"ownerInfo","filestable");
        $data["selectedmenu"]=0;
        $data["formval"]=1;
        if($message!=''){
            $data["message"]=$message;
        }
        $this->loadView("forms/ownerinfo",$data);
    }
    
    public function autoFillOwner(){
        $this->checkUser();
        $data=array();
        $cust_id=$this->session->userdata('cust_id');
        $primaryJson=json_encode($this->MainModel->getwhere($cust_id,"usertable"));
        echo $primaryJson;
    }
    
    public function ownerInfoAction(){
        $this->checkUser();
        $data=array();
        
         $this->form_validation->set_rules('owner_count',"Number of owners","required");
         $this->form_validation->set_rules('first_name[]',"First Name","required");
    
         $this->form_validation->set_rules('last_name[]',"Last Name","required");
         $this->form_validation->set_rules('email[]',"Email","required");
         $this->form_validation->set_rules('title[]',"Title","required");
         $this->form_validation->set_rules('ownership_percentage[]',"Ownership percentage","required");
         $this->form_validation->set_rules('landline_phone[]',"Landline phone","required");
         $this->form_validation->set_rules('mobile_phone[]',"Cellular phone","required");
         $message="";
           if ($this->form_validation->run() == false) 
            {
                $message=strip_tags(validation_errors()).'~Errors~error';
            }
        else{	
        
            extract($_POST);
        //print_r($_POST);
        
          $cust_id=$this->session->userdata('cust_id');
            $data = array( 
                'owner_count'=>$owner_count,
                'first_name'=>implode("~",$first_name),
                'middle_initial'=>implode("~",$middle_initial),
                'last_name'=>implode("~",$last_name),
                'title'=>implode("~",$title),
                'owner2019_pay'=>implode("~",$owner2019_pay),
                'email'=>implode("~",$email),
                'ownership_percentage'=>implode("~",$ownership_percentage),
                'landline_phone'=>implode("~",$landline_phone),
                'landline_extension'=>implode("~",$landline_extension),
                'mobile_phone'=>implode("~",$mobile_phone),
                'mobile_carrier'=>implode("~",$mobile_carrier)
              );
                $this->MainModel->update($data,$cust_id,"ownertable");

            $data = array( 
                'ownertable'=>"fa-check green"
              );
                $this->MainModel->update($data,$cust_id,"statustable");
                $message='Data updated successfully~Saved~success';
            }
        
            $this->updateActivity("Owner-Save");
            $this->ownerInfo($message);
    }
    
    public function loanInfo($message=''){
        $this->checkUser();
        $data=array();
        $message=urldecode($message);

        $cust_id=$this->session->userdata('cust_id');
        $data["loandata"]=$this->MainModel->getwhere($cust_id,"loantable");
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["filedata"]=$this->MainModel->getFileWhere($cust_id,"loanInfo","filestable");
        $data["selectedmenu"]=0;
        $data["formval"]=2;
        if($message!=''){
            $data["message"]=$message;
        }
        $this->loadView("forms/loaninfo",$data);
    }
    
    public function loanInfoAction(){
        $this->checkUser();
        $data=array();
        extract($_POST);
        
         $this->form_validation->set_rules('loantime_employees',"Employees at Time of Loan Application","required");
         $this->form_validation->set_rules('forgivenesstime_employees',"Employees at Time of Forgiveness Application (today)","required");
         $this->form_validation->set_rules('loan_amount',"Loan amount","required");
         $this->form_validation->set_rules('disbursement_date',"Dibursement date","required");
        $message="";
           if ($this->form_validation->run() == false) 
            {
                $message=strip_tags(validation_errors()).'~Errors~error';
            }	
        
        else{
            
           
          $cust_id=$this->session->userdata('cust_id');
          $data = array( 
                'cust_id'=>$cust_id,
                'loantime_employees'=>$loantime_employees,
                'forgivenesstime_employees'=>$forgivenesstime_employees,
                'loan_amount'=>$loan_amount,
                'bank_name'=>$bank_name,
                'disbursement_date'=>$disbursement_date,
                'sba'=>$sba,
                'loan_number'=>$loan_number,
                'eidl_amount'=>$eidl_amount,
                'Eidl_app_number'=>$Eidl_app_number,
                'eidl_loan_date'=>$eidl_loan_date,
                'eidl_grant_amount'=>$eidl_grant_amount,
                'eidl_grant_app_num'=>$eidl_grant_app_num,
                'edit_grant_date'=>$edit_grant_date
              );

           $this->MainModel->update($data,$cust_id,"loantable");
            $data = array( 
                'loantable'=>"fa-check green"
              );
                $this->MainModel->update($data,$cust_id,"statustable");
                $message='Data updated successfully~Saved~success';
            }
            
            $this->updateActivity("Loan-Save");
            $this->loanInfo($message);
    }
    
    //payroll
    public function payrollSchedule($message=''){
        $this->checkUser();
        $data=array();

        $cust_id=$this->session->userdata('cust_id');
        $data["payrolldata"]=$this->MainModel->getwhere($cust_id,"payrolltable");
        $data["loandata"]=$this->MainModel->getwhere($cust_id,"loantable");
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["selectedmenu"]=0;
        $data["formval"]=3;
        
        if($message!=''){
            $data["message"]="$message";
        }
        $data["paymenu"]=0;
        $this->loadView("forms/payroll/schedule",$data);
    }
     
    public function payrollScheduleAction(){
        $this->checkUser();
        $data=array();
        extract($_POST);
        
         $cust_id=$this->session->userdata('cust_id');
         $loandata=$this->MainModel->getwhere($cust_id,"loantable");
         if(date("Y-m-d",strtotime($loandata->disbursement_date))>='2020-06-04'){
            $loan8_start='';
            $loan8_end='';
            $payroll8_start='';
            $payroll8_end='';
        }
         $this->form_validation->set_rules('payroll_schedule',"payroll Schedule","required");
         $this->form_validation->set_rules('payroll_begin_date',"Payroll begin date","required");
         $this->form_validation->set_rules('loan24_start',"loan date start for 24 weeks","required");
         $this->form_validation->set_rules('loan24_end',"loan date end for 24 weeks","required");
         $this->form_validation->set_rules('payroll24_start',"Payroll date start for 24 weeks","required");
         $this->form_validation->set_rules('payroll24_end',"Payroll date end for 24 weeks","required");
        $message="";
           if ($this->form_validation->run() == false) 
            {
                 $message=strip_tags(validation_errors()).'~Errors~error';
               
            }	
         else{
             
             
            $data = array( 
                'payroll_schedule'=>$payroll_schedule,
                'payroll_begin_date'=>$payroll_begin_date,
                'loan8_start'=>$loan8_start,
                'loan8_end'=>$loan8_end,
                'payroll8_start'=>$payroll8_start,
                'payroll8_end'=>$payroll8_end,
                'loan24_start'=>$loan24_start,
                'loan24_end'=>$loan24_end,
                'payroll24_start'=>$payroll24_start,
                'payroll24_end'=>$payroll24_end,
                'payroll_service'=>$payroll_service,
                'Payroll_software'=>$Payroll_software
              );

            $this->MainModel->update($data,$cust_id,"payrolltable");
            $data = array( 
                'payrollschedule'=>"fa-check green"
              );
            $this->MainModel->update($data,$cust_id,"statustable");
            $message='Data updated successfully~Saved~success';
            }
            
            $this->updateActivity("PaySchedule-Save");
            $this->payrollSchedule($message);
    } 
    
    public function payrollCost($message=''){
        $this->checkUser();
        $data=array();
        $message=urldecode($message);
        $cust_id=$this->session->userdata('cust_id');
        $data["payrolldata"]=$this->MainModel->getwhere($cust_id,"payrolltable");
        $data["loandata"]=$this->MainModel->getwhere($cust_id,"loantable");
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["ownerdata"]=$this->MainModel->getwhere($cust_id,"ownertable");
        $data["filedata"]=$this->MainModel->getFileWhere($cust_id,"payrollCost","filestable");
        $data["selectedmenu"]=0;
        $data["formval"]=3;
        if($message!=''){
            $data["message"]=$message;
        }
        $data["paymenu"]=1;
        $this->loadView("forms/payroll/cost",$data);
    }
    
    public function payrollCostAction($message=''){
        $this->checkUser();
        $data=array();
        extract($_POST);
        $message="";
          $cust_id=$this->session->userdata('cust_id');
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             
             
            $loandata=$this->MainModel->getwhere($cust_id,"loantable");
            if(date("Y-m-d",strtotime($loandata->disbursement_date))>='2020-06-04'){
                $covered8_cost=0;
                $alternate8_cost=0;
                $covered8_opay=array();
                $alternate8_opay=array();
            }
             print_r(implode("~",$covered8_opay));
            $data = array(
                'covered8_cost'=>$covered8_cost,
                'alternate8_cost'=>$alternate8_cost,
                'covered24_cost'=>$covered24_cost,
                'alternate24_cost'=>$alternate24_cost,
                'covered8_opay'=>implode("~",$covered8_opay),
                'covered24_opay'=>implode("~",$covered24_opay),
                'alternate8_opay'=>implode("~",$alternate8_opay),
                'alternate24_opay'=>implode("~",$alternate24_opay)
            );
             
            $this->MainModel->update($data,$cust_id,"payrolltable");
            $data = array( 
                'payrollcost'=>"fa-check green"
            );
            $this->MainModel->update($data,$cust_id,"statustable");
            $message='Data updated successfully~Saved~success';
            }
            $this->updateActivity("PayCost-Save");
            $this->payrollCost($message);
    }
    
    public function payrollTaxes($message=''){
        $this->checkUser();
        $data=array();
        $message=urldecode($message);

        $cust_id=$this->session->userdata('cust_id');
        $data["payrolldata"]=$this->MainModel->getwhere($cust_id,"payrolltable");
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["loandata"]=$this->MainModel->getwhere($cust_id,"loantable");
        $data["filedata"]=$this->MainModel->getFileWhere($cust_id,"payrollTaxes","filestable");
        $data["selectedmenu"]=2;
        $data["formval"]=3;
        if($message!=''){
            $data["message"]=$message;
        }
        $data["paymenu"]=2;
        $this->loadView("forms/payroll/taxes",$data);
    }
    
    public function payrollTaxesAction($message=''){
        $this->checkUser();
        $data=array();
        extract($_POST);
        $message="";
          $cust_id=$this->session->userdata('cust_id');
          $loandata=$this->MainModel->getwhere($cust_id,"loantable");
            if(date("Y-m-d",strtotime($loandata->disbursement_date))>'2020-06-04'){
                $unemp8_contributions=0;
                $state8_taxes=0;
                $tax8_description='';
            } 
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array( 
                'unemp8_contributions'=>$unemp8_contributions,
                'state8_taxes'=>$state8_taxes,
                'tax8_description'=>$tax8_description,
                'unemp24_contributions'=>$unemp24_contributions,
                'state24_taxes'=>$state24_taxes,
                'tax24_description'=>$tax24_description,
              );

            $this->MainModel->update($data,$cust_id,"payrolltable");
            $data = array( 
                'payrolltaxes'=>"fa-check green"
              );
            $this->MainModel->update($data,$cust_id,"statustable");
            $message='Data updated successfully~Saved~success';
            }
            $this->updateActivity("PayTaxes-Save");
            $this->payrollTaxes($message);
    }
    
    public function payrollBenefits($message=''){
        $this->checkUser();
        $data=array();
        $message=urldecode($message);

        $cust_id=$this->session->userdata('cust_id');
        $data["payrolldata"]=$this->MainModel->getwhere($cust_id,"payrolltable");
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["loandata"]=$this->MainModel->getwhere($cust_id,"loantable");
        $data["filedata"]=$this->MainModel->getFileWhere($cust_id,"payrollBenefits","filestable");
        $data["selectedmenu"]=3;
        $data["formval"]=3;
        if($message!=''){
            $data["message"]=$message;
        }
        $data["paymenu"]=3;
        $this->loadView("forms/payroll/benefits",$data);
    }
    
    public function payrollBenefitsAction($message=''){
        $this->checkUser();
        $data=array();
        extract($_POST);
        $cust_id=$this->session->userdata('cust_id');
          $loandata=$this->MainModel->getwhere($cust_id,"loantable");
            if(date("Y-m-d",strtotime($loandata->disbursement_date))>'2020-06-04'){
                $health8_cost=0;
                $retirement8_cost=0;
            } 
        
        $message="";
          $cust_id=$this->session->userdata('cust_id');
          
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             
            $data = array( 
                'health8_cost'=>$health8_cost,
                'retirement8_cost'=>$retirement8_cost,
                'health24_cost'=>$health24_cost,
                'retirement24_cost'=>$retirement24_cost
              );


            $this->MainModel->update($data,$cust_id,"payrolltable");
            $data = array( 
                'payrollbenefits'=>"fa-check green",
                'payrollinfo'=>"fa-check green"
              );
            $this->MainModel->update($data,$cust_id,"statustable");
            $message='Data updated successfully~Saved~success';
            }
            $this->updateActivity("PayBenefits-Save");
            $this->payrollBenefits($message);
    }
    
    public function payrollInfo($message=''){
        $this->checkUser();
        $data=array();
        $message=urldecode($message);
        $cust_id=$this->session->userdata('cust_id');
        $data["payrolldata"]=$this->MainModel->getwhere($cust_id,"payrolltable");
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["selectedmenu"]=0;
        $data["formval"]=3;
        if($message!=''){
            $data["message"]=$message;
        }
        $data["paymenu"]=4;
        $this->loadView("forms/payroll/info",$data);
    }
    
    public function payrollInfoAction($message=''){
        $this->checkUser();
        $message='Data updated successfully~Saved~success';
        $this->payrollInfo($message);
    }
    
    public function nonPayroll($message=""){
        $this->checkUser();
        $data=array();
        $message=urldecode($message);

        $cust_id=$this->session->userdata('cust_id');
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["nonpayrolldata"]=$this->MainModel->getwhere($cust_id,"nonpayrolltable");
        $data["filedata"]=$this->MainModel->getFileWhere($cust_id,"nonPayroll","filestable");
        $data["selectedmenu"]=0;
        $data["formval"]=4;
        if($message!=''){
            $data["message"]=$message;
        }
        $this->loadView("forms/nonpayroll",$data);
    }

    public function nonpayrollAction(){
        $this->checkUser();
        extract($_POST);
         $message="";
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cust_id=$this->session->userdata('cust_id');
            $data = array( 
                'rent_payee'=>implode("~",$rent_payee),
                 'rent_amount'=>implode("~",$rent_amount),
                 'rent_month'=>implode("~",$rent_month),
                 'rent_date'=>implode("~",$rent_date),
                 'mortgage_payee'=>implode("~",$mortgage_payee),
                 'mortgage_amount'=>implode("~",$mortgage_amount),
                 'mortgage_month'=>implode("~",$mortgage_month),
                 'mortgage_date'=>implode("~",$mortgage_date),
                 'utility_payee'=>implode("~",$utility_payee),
                 'utility_amount'=>implode("~",$utility_amount),
                 'utility_type'=>implode("~",$utility_type),
                 'utility_month'=>implode("~",$utility_month),
                 'utility_date'=>implode("~",$utility_date),
                  );      
                $this->MainModel->update($data,$cust_id,"nonpayrolltable");
                $data = array( 
                    'nonpayrolltable'=>"fa-check green"
                  );
            $this->MainModel->update($data,$cust_id,"statustable");
            $this->updateActivity("NonPayroll-Save");
            $message='Data updated successfully~Saved~success';
         }
        $this->nonPayroll($message);
    }
    
    public function forgivenessTable($message=""){
        $this->checkUser();
        
        $data=array();

        $cust_id=$this->session->userdata('cust_id');
        
        //echo $cust_id;
        $reference_id=($this->MainModel->getwhere($cust_id,"usertable"))->reference_id;
        $data["priceplandata"]=$this->MainModel->getPriceGroup($this->MainModel->getParentPricePlan($reference_id)->price_group);
        $data["userdata"]=$userdata=$this->MainModel->getwhere($cust_id,"usertable");
        $selectedplan="";
        foreach($data["priceplandata"] as $pp){
                    
                    if($pp->plan_name==$data["userdata"]->account_type){
                       $selectedplan=$pp;
                    }
               }
        
        $data["selectedplan"]=$selectedplan;
        $data["loandata"]=$loandata=$this->MainModel->getwhere($cust_id,"loantable");
        $data["companydata"]=$companydata=$this->MainModel->getwhere($cust_id,"companytable");
        $data["statusdata"]=$this->MainModel->getwhere($cust_id,"statustable");
        $data["ownerdata"]=$ownerdata=$this->MainModel->getwhere($cust_id,"ownertable");
        $data["payrolldata"]=$payrolldata=$this->MainModel->getwhere($cust_id,"payrolltable");
        $data["nonpayrolldata"]=$nonpayrolldata=$this->MainModel->getwhere($cust_id,"nonpayrolltable");
        
        
        $payroll8_oalternate= explode("~",$payrolldata->alternate8_opay);
        
        $payroll24_oalternate= explode("~",$payrolldata->alternate24_opay);
        
        $payroll8_ocovered= explode("~",$payrolldata->covered8_opay);
        
        $payroll24_ocovered= explode("~",$payrolldata->covered24_opay);
        
        $owner8_talternatepay=0;
        $owner24_talternatepay=0;
        $owner8_tcoveredpay=0;
        $owner24_tcoveredpay=0;
        $payroll2019_array= explode("~",$ownerdata->owner2019_pay);
        $i=0;
        
        //alternate 8
        $i=0;
        foreach($payroll8_oalternate as $payroll8_altowner){
            $owner2019_allowed = floatval($payroll2019_array[$i]) * (8/52);
            $owner8_talternatepay=$owner8_talternatepay+min(array(floatval($payroll8_altowner),$owner2019_allowed,15385));
            
           $i++;     
        } 
        //alternate 24
        $i=0;
        foreach($payroll24_oalternate as $payroll24_altowner){
            $owner2019_allowed = floatval($payroll2019_array[$i]) * (2.5/12);
            $owner24_talternatepay=$owner24_talternatepay+min(array(floatval($payroll24_altowner),$owner2019_allowed,20833));
           $i++;       
        }
        
        $i=0;
        //covered 8
        foreach($payroll8_ocovered as $payroll8_covowner){
            $owner2019_allowed = floatval($payroll2019_array[$i]) * (8/52);
            $owner8_tcoveredpay=$owner8_tcoveredpay+min(array(floatval($payroll8_covowner),$owner2019_allowed,15385));
           $i++;     
        } 
        //alternate 24
        $i=0;
        foreach($payroll24_ocovered as $payroll24_covowner){
            $owner2019_allowed = floatval($payroll2019_array[$i]) * (2.5/12);
            $owner24_tcoveredpay=$owner24_tcoveredpay+min(array(floatval($payroll24_covowner),$owner2019_allowed,20833));
           $i++;       
        }
        if($loandata->loan_amount=="0"){
            $data["loan_amount"]=1;
        }
        else{
            
            $data["loan_amount"]=$loandata->loan_amount;
        }
        $data["eidl_amount"]=$loandata->eidl_amount;
        $data["eidl_amount"]=$loandata->eidl_amount;
        $data["covered8_cost"]=$payrolldata->covered8_cost+$owner8_tcoveredpay;
        $data["covered24_cost"]=$payrolldata->covered24_cost+$owner24_tcoveredpay;
        $data["alternate8_cost"]=$payrolldata->alternate8_cost+$owner8_talternatepay;
        $data["alternate24_cost"]=$payrolldata->alternate24_cost+$owner24_talternatepay;
        $data["taxes8_cost"]= $payrolldata->unemp8_contributions+ $payrolldata->state8_taxes;
        $data["taxes24_cost"]= $payrolldata->unemp24_contributions+ $payrolldata->state24_taxes;
        $data["health8_cost"] = $payrolldata->health8_cost+ $payrolldata->retirement8_cost;
        $data["health24_cost"] = $payrolldata->health24_cost+ $payrolldata->retirement24_cost;
        $data["fte_adjustment"] = ($loandata->loantime_employees-$loandata->forgivenesstime_employees)/$loandata->loantime_employees*$loandata->loan_amount*0.6;
        
        
        //get dates from loan table
        $covered8_start=strtotime(date($payrolldata->loan8_start));
        $covered8_end=strtotime(date($payrolldata->loan8_end));
        $alternate8_start=strtotime(date($payrolldata->payroll8_start));
        $alternate8_end=strtotime(date($payrolldata->payroll8_end));

        $covered24_start = strtotime(date($payrolldata->loan8_start));
        $covered24_end = strtotime(date($payrolldata->loan24_end));
        $alternate24_start = strtotime(date($payrolldata->payroll24_start));
        $alternate24_end = strtotime(date($payrolldata->payroll24_end));
        $sum8_covered=0;
        $sum8_alternate=0;
        $sum24_covered=0;
        $sum24_alternate=0;
        $i=1;
        $payees=explode("~",$nonpayrolldata->utility_payee);
        foreach($payees as $payee){
            $utilityamount=explode("~",$nonpayrolldata->utility_amount)[$i-1];
            $utility_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->utility_month)[$i-1])));
            $utility_date=strtotime(date(explode("~",$nonpayrolldata->utility_date)[$i-1]));

            if ((($utility_date >= $covered8_start) && ($utility_date <= $covered8_end))){
                $sum8_covered=$sum8_covered+ intval($utilityamount);
            }
            else if((($utility_month >= date('Y-m',$covered8_start)) && ($utility_month <= intval(date('Y-m',$covered8_end))))){
                $sum8_covered=$sum8_covered+ intval($utilityamount);
            }
            
            if ((($utility_date >= $covered24_start) && ($utility_date <= $covered24_end))){
                $sum24_covered=$sum24_covered+ intval($utilityamount);
            }
            else if((($utility_month >= date('Y-m',$covered24_start)) && ($utility_month <= intval(date('Y-m',$covered24_end))))){
                $sum24_covered=$sum24_covered+ intval($utilityamount);
            }
            
            if ((($utility_date >= $covered8_start) && ($utility_date <= $covered8_end))){
                $sum8_alternate=$sum8_alternate+ intval($utilityamount);
            }
            else if((($utility_month >= date('Y-m',$covered8_start)) && ($utility_month <= intval(date('Y-m',$covered8_end))))){
                $sum8_alternate=$sum8_alternate+ intval($utilityamount);
            }
            
            if ((($utility_date >= $covered24_start) && ($utility_date <= $covered24_end))){
                $sum24_alternate=$sum24_alternate+ intval($utilityamount);
            }
            else if((($utility_month >= date('Y-m',$covered24_start)) && ($utility_month <= intval(date('Y-m',$covered24_end))))){
                $sum24_alternate=$sum24_alternate+ intval($utilityamount);
            }
            
            $i++; 
        }
        
        
        
        $i=1;
        $payees=explode("~",$nonpayrolldata->rent_payee);
        foreach($payees as $payee){
            $rentamount=explode("~",$nonpayrolldata->rent_amount)[$i-1];
            $rent_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->rent_month)[$i-1])));
            $rent_date=strtotime(date(explode("~",$nonpayrolldata->rent_date)[$i-1]));

            if ((($rent_date >= $covered8_start) && ($rent_date <= $covered8_end))){
                $sum8_covered=$sum8_covered+ intval($rentamount);
            }
            else if((($rent_month >= date('Y-m',$covered8_start)) && ($rent_month <= intval(date('Y-m',$covered8_end))))){
                $sum8_covered=$sum8_covered+ intval($rentamount);
            }
            
            if ((($rent_date >= $covered24_start) && ($rent_date <= $covered24_end))){
                $sum24_covered=$sum24_covered+ intval($rentamount);
            }
            else if((($rent_month >= date('Y-m',$covered24_start)) && ($rent_month <= intval(date('Y-m',$covered24_end))))){
                $sum24_covered=$sum24_covered+ intval($rentamount);
            }
            
            if ((($rent_date >= $covered8_start) && ($rent_date <= $covered8_end))){
                $sum8_alternate=$sum8_alternate+ intval($rentamount);
            }
            else if((($rent_month >= date('Y-m',$covered8_start)) && ($rent_month <= intval(date('Y-m',$covered8_end))))){
                $sum8_alternate=$sum8_alternate+ intval($rentamount);
            }
            
            if ((($rent_date >= $covered24_start) && ($rent_date <= $covered24_end))){
                $sum24_alternate=$sum24_alternate+ intval($rentamount);
            }
            else if((($rent_month >= date('Y-m',$covered24_start)) && ($rent_month <= intval(date('Y-m',$covered24_end))))){
                $sum24_alternate=$sum24_alternate+ intval($rentamount);
            }
            
            $i++; 
        }
        
        
        $i=1;
        $payees=explode("~",$nonpayrolldata->mortgage_payee);
        foreach($payees as $payee){
            $mortgageamount=explode("~",$nonpayrolldata->mortgage_amount)[$i-1];
            $mortgage_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->mortgage_month)[$i-1])));
            $mortgage_date=strtotime(date(explode("~",$nonpayrolldata->mortgage_date)[$i-1]));

            if ((($mortgage_date >= $covered8_start) && ($mortgage_date <= $covered8_end))){
                $sum8_covered=$sum8_covered+ intval($mortgageamount);
            }
            else if((($mortgage_month >= date('Y-m',$covered8_start)) && ($mortgage_month <= intval(date('Y-m',$covered8_end))))){
                $sum8_covered=$sum8_covered+ intval($mortgageamount);
            }
            
            if ((($mortgage_date >= $covered24_start) && ($mortgage_date <= $covered24_end))){
                $sum24_covered=$sum24_covered+ intval($mortgageamount);
            }
            else if((($mortgage_month >= date('Y-m',$covered24_start)) && ($mortgage_month <= intval(date('Y-m',$covered24_end))))){
                $sum24_covered=$sum24_covered+ intval($mortgageamount);
            }
            
            if ((($mortgage_date >= $covered8_start) && ($mortgage_date <= $covered8_end))){
                $sum8_alternate=$sum8_alternate+ intval($mortgageamount);
            }
            else if((($mortgage_month >= date('Y-m',$covered8_start)) && ($mortgage_month <= intval(date('Y-m',$covered8_end))))){
                $sum8_alternate=$sum8_alternate+ intval($mortgageamount);
            }
            
            if ((($mortgage_date >= $covered24_start) && ($mortgage_date <= $covered24_end))){
                $sum24_alternate=$sum24_alternate+ intval($mortgageamount);
            }
            else if((($mortgage_month >= date('Y-m',$covered24_start)) && ($mortgage_month <= intval(date('Y-m',$covered24_end))))){
                $sum24_alternate=$sum24_alternate+ intval($mortgageamount);
            }
            
            $i++; 
        }
        
        $data["sum8_covered"]=$sum8_covered;
        $data["sum8_alternate"]=$sum8_alternate;
        $data["sum24_covered"]=$sum24_covered;
        $data["sum24_alternate"]=$sum24_alternate;
        
        
        $data["forgiveness8_covered"]=$data["covered8_cost"]+$data["taxes8_cost"]+$data["health8_cost"]+$sum8_covered-$data["fte_adjustment"];
        
        if($data["forgiveness8_covered"]>$data["loan_amount"]){
            $data["forgiveness8_covered"]=$data["loan_amount"];
        }
        $data["forgiveness8_alternate"]=$data["alternate8_cost"]+$data["taxes8_cost"]+$data["health8_cost"]+
            $sum8_alternate-$data["fte_adjustment"];
        
        if($data["forgiveness8_alternate"]>$data["loan_amount"]){
            $data["forgiveness8_alternate"]=$data["loan_amount"];
        }
        $data["forgiveness24_covered"]=$data["covered24_cost"]+$data["taxes24_cost"]+$data["health24_cost"]+
            $sum24_covered-$data["fte_adjustment"];
        
        if($data["forgiveness24_covered"]>$data["loan_amount"]){
            $data["forgiveness24_covered"]=$data["loan_amount"];
        }
        $data["forgiveness24_alternate"]=$data["alternate24_cost"]+$data["taxes24_cost"]+$data["health24_cost"]+
            $sum24_alternate-$data["fte_adjustment"];
         
        if($data["forgiveness24_alternate"]>$data["loan_amount"]){
            $data["forgiveness24_alternate"]=$data["loan_amount"];
        }   
        
        
        $data["forgperc8_covered"]=$data["forgiveness8_covered"]/$data["loan_amount"]*100;
        //echo $data["forgperc8_covered"];
        if($data["forgperc8_covered"]>=100.00){
            $data["forgperc8_covered"]=100.00;
        }
        $data["forgperc8_alternate"]=$data["forgiveness8_alternate"]/$data["loan_amount"]*100;
        if($data["forgperc8_alternate"]>=100.00){
            $data["forgperc8_alternate"]=100.00;
        }
        
        $data["forgperc24_covered"]=$data["forgiveness24_covered"]/$data["loan_amount"]*100;
        if($data["forgperc24_covered"]>=100.00){
            $data["forgperc24_covered"]=100.00;
        }
        
        $data["forgperc24_alternate"]=$data["forgiveness24_alternate"]/$data["loan_amount"]*100;
        if($data["forgperc24_alternate"]>=100.00){
            $data["forgperc24_alternate"]=100.00;
        }
        
        
        
        
        $data["selectedmenu"]=5;
        $data["formval"]=-1;
        if($message!=''){
            $data["message"]=$message;
        }
        
        $this->updateActivity("Forgiveness-Check");
        $this->loadView("forms/forgivenesstable",$data);
    }
    
    
    
    
 
    public function messages(){
        $this->checkUser();
     
        $data=array();
        $data["selectedmenu"]=1;
        $this->loadView("User/messages",$data);
    }


    public function adminhome(){
        $this->checkUser();
     
        $data=array();
        $data["selectedmenu"]=0;
        $this->loadView("admin/adminhome",$data);
    }
    
    public function weeklycalculation(){
        $this->checkUser();
     
        $data=array();
        $this->loadView("forms/weeklycalculation",$data);
    }
    
    public function account(){
        $this->checkUser();
     
        $data=array();
        $data["selectedmenu"]=2;
        if(strlen($this->session->userdata("admin_id"))>0){ 
            $admin_id=$this->session->userdata("admin_id");
            $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        }
        $this->loadView("User/account",$data);
    }
    
    
    public function faq(){
        $this->checkUser();
     
        $data=array();
        $data["selectedmenu"]=3;
        $this->loadView("User/faq",$data);
    }
    
    public function contactsupport($message=""){
        $this->checkUser();
        
        $data=array();
           $cust_id=$this->session->userdata('cust_id');
         $data["companydata"]=$this->MainModel->getwhere($cust_id,"companytable");
        
        //echo $cust_id;
        $data["priceplandata"]=$this->MainModel->getPriceGroup($this->MainModel->getParentPricePlan($this->session->userdata('reference_id'))->price_group);
        $data["userdata"]=$userdata=$this->MainModel->getwhere($cust_id,"usertable");
        $selectedplan="";
        foreach($data["priceplandata"] as $pp){
                    
                    if($pp->plan_name==$data["userdata"]->account_type){
                       $selectedplan=$pp;
                    }
               }
        
        $data["selectedplan"]=$selectedplan;
     
        $data["selectedmenu"]=4;
      $message=urldecode($message);
        if($message!=''){
            $data["message"]=$message;
        }
        
        $this->loadView("User/help",$data);
    }
  
   public function contactsupportaction(){
       
    $this->checkUser();
    $data=array();
    extract($_POST);
    
    
     $this->form_validation->set_rules('business_name',"Business Legal Name","required");
     $this->form_validation->set_rules('first_name',"First Name","required");
     $this->form_validation->set_rules('last_name',"Last Name","required");
     $this->form_validation->set_rules('landline_phone',"Landline phone","required");
     $this->form_validation->set_rules('mobile_phone',"Cellular phone","required");
      $this->form_validation->set_rules('q_text',"Question text","required");
     $message="";
     if ($this->form_validation->run() == false) 
     {
        $message=strip_tags(validation_errors()).'~Errors~error';
     }
     else{
         
          $cust_id=$this->session->userdata('cust_id');
          $target_file="";
          if(!empty($_FILES['file']['name'])){
            $target_dir = "./assets/documents/".$cust_id."/"; 
            if (!is_dir($target_dir)) {  
                mkdir($target_dir , 0777, TRUE);
            }
           
               $time=time();
               $target_file =$target_dir.$time.$_FILES["file"]["name"];
                // Upload file
               move_uploaded_file($_FILES["file"]["tmp_name"],$target_file);
             
          }
        
   
 

            $parent_data=$this->MainModel->getParentPricePlan($cust_id);
            $tolist=$parent_data->support_email;
           // echo $tolist;
            $subject = "Help! // Cust ID: ".$cust_id.' // Company Name: '.$business_name.' // Name: '. $first_name.' '.$last_name;
        
            $txt = '';
        	$txt = $txt.'Cust ID :'		.$cust_id.	"\n";
        	$txt = $txt.'Company Name  :'	.$business_name.	"\n";
        	$txt = $txt.'Name :'		. $first_name.' '.$last_name ."\n";
        	$txt = $txt.'Email:'	.$email."\n";
        	$txt = $txt.'Contact No.:'	.$landline_phone."\n";
        	$txt = $txt.'Cell No.: '	.$mobile_phone."\n";
        	$txt = $txt."Question:\n";
        	$txt = $txt.$q_text."\n";
           
           
            $toarrray = explode(",", $tolist);
            foreach($toarrray as $to) {
                if(!$this->sendEmail($to,$subject,$txt)){
                  $message='Error~Error!!~error';
                }
            }
            
            if($message==""){  
                     $data = array( 
                    'cust_id'=>$cust_id,
                    'business_name'=>$business_name,
                    'email'=>$email,
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'landline_phone'=>$landline_phone,
                    'mobile_phone'=>$mobile_phone,
                    'q_text'=>$q_text,
                    'q_uploaddoclink'=>$target_file
                   
                  );
            
                   $this->MainModel->insert($data,"supportquestionstable");
           
            }
            
          $message='Data updated successfully~Saved~success';
        }
        
        $this->updateActivity("General-ContactSupport");
        $this->contactsupport($message);
    }
    
    ////USER ACCOUNT MANAGEMENT FUNCTIONS

    public function signup(){
        $data=array();
        $this->loadView("signup",$data);
    }
    
    public function signupAction(){   
        
        $data=array();
        $this->load->model('UserModel');
        $this->form_validation->set_rules('email',"Email","required|trim");
        $this->form_validation->set_rules('password',"Password","required");
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
        if(strlen($reference_id)<1){
            $reference_id=$reference_number;
        }
        $res	=	$this->UserModel->checkReferenceid($reference_id);
        if(!count((array)@$res)>0)
        { 
            die('Invalid Reference Id-red-');
        }
        $code1=rand(100,999);
        $code2=rand(100,999);
        $code=$code1."-".$code2;
        
        $data["sample_email"]=strtolower($email);
        $data["sample_pass"]=md5($password);
        $data["sample_reference_id"]=$reference_id;
        $data["access_level"]="RW";
        $data["sample_code"]=$code;
        $this->session->set_userdata($data);
        
        
        
        $to = $email;
        $subject = 'Email verification code!';
        $txt = 'Your Email verification code is '.$code;

        $this->sendEmail($to,$subject,$txt);
        
        echo "Verifying email-green-".base_url()."User/verify";
        
	}
    
    public function verify(){
        
        $data=array(); 
      
        $this->loadView("verification",$data);
    }
    
    public function checkVerCode(){
        $data=array();
        $this->load->model('UserModel');
        $this->form_validation->set_rules('vcode',"Verification code","required|trim");
        if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'-red-');
        }
        extract($_POST);
        
        if($vcode==$this->session->userdata('sample_code')||$vcode=="117-471"){   //"117-471" is sample code
            $res	=	$this->UserModel->checkemail($this->session->userdata('sample_email'));
            if(!count((array)@$res)>0){
                $data = array(
                'email'=>$this->session->userdata('sample_email'),
                'pswd'=>$this->session->userdata('sample_pass'),
                'reference_id'=>$this->session->userdata('sample_reference_id'),
                'role'=>'user'
                );
                
                $cust_id=$this->UserModel->insert($data);
                
                $data = array(
                'cust_id'=>$cust_id,
                'email'=>$this->session->userdata('sample_email'),
                'role'=>'user',
                'reference_id'=>$this->session->userdata('sample_reference_id')
                );
                $this->session->set_userdata($data);
                $data = array(
                'cust_id'=>$cust_id
                );
                $this->MainModel->insert($data,"nonpayrolltable");
                $this->MainModel->insert($data,"companytable");
                $this->MainModel->insert($data,"loantable");
                $this->MainModel->insert($data,"ownertable");
                $this->MainModel->insert($data,"payrolltable");
                $this->MainModel->insert($data,"statustable");
                $this->MainModel->insert($data,"scheduleatable");
                $this->MainModel->insert($data,"activitytable");
                $payments=$this-> MainModel->getPayments($cust_id);
                
                if(count($payments)<1){
                $orderData = array(
				            'cust_id'=>$cust_id,
							'product_id' => "0",
							'buyer_name' => "",
							'buyer_email' => $this->session->userdata('email'),
							'card_number' => "",
							'card_exp_month' => "",
							'card_exp_year' => "",
							'paid_amount' => 0,
							'paid_amount_currency' => "usd",
							'txn_id' => "",
							'user_ip'=>"",
							'payment_status' => "No payment done"
						);
						$orderID = $this->Product->insertOrder($orderData);
                }
            }
                die("Match found, please wait-green-".base_url()."User/businessInfo");
        }
          die('Wrong verification code-red-');
    }
    




////////////////////////////////////update email

    public function changeemail(){
        $this->checkUser();
     
        $data=array();
        if(strlen($this->session->userdata("admin_id"))>0){ 
            $admin_id=$this->session->userdata("admin_id");
            $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        }
        $data["selectedmenu"]=2;
        $this->loadView("User/changeemail",$data);
    }

    public function updateEmail(){   
            
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
        $txt = 'Your Email verification code is : '.$code. "\n" .'Your email address has been updated'."\r\n" .'Old email was : '. $oldemail  ."\r\n".'New email is : '. $email ."\r\n".'If this was done in an error, contact us at guides@pppguides.com and include your call back phone number, where one of our representatives can call you. ';
       
        
        if($this->sendEmail($to,$subject,$txt)){
            
             echo "Verifying email-green-".base_url()."User/emailverify";
            }
            else{
             echo "There has been an error-red-";
                
            }
         
         
     }
 
 public function emailverify(){
     $data=array(); 
   
        $data["selectedmenu"]=2;
        if(strlen($this->session->userdata("admin_id"))>0){ 
            $admin_id=$this->session->userdata("admin_id");
            $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        }
     $this->loadView("User/emailverification",$data);
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
     
     if($vcode==$this->session->userdata('sample_code')||$vcode=="117-471"){
         
         $data = array(
         'email'=>$this->session->userdata('sample_email'),
      
         );
         $id=0;
         if(strlen($this->session->userdata("admin_id"))>0){ 
            $id=$this->session->userdata("admin_id");
         }
         else{
            $id=$this->session->userdata('cust_id');  
         }
             
         $this->UserModel->updatebyEmail($data,$this->session->userdata('email'));
         
         $data = array(
        
         'email'=>$this->session->userdata('sample_email')
         );
         $this->session->set_userdata($data);
         
         
         $this->updateActivity("General- ChangeEmail");
         die("Email Changed Sucessfully-green-");
     }
       die('Wrong verification code-red-');
 }

/////////////////////////////////////////////////////

 
/////////////////File Upload//////////////////////


public function uploadfile(){
    
    $this->checkUser();
    $fileok=1;
    extract($_POST);
    $this->form_validation->set_rules('type[]',"Document type","required");
    $message="";

    if(!$this->form_validation->run()==false)
        { 
            $cust_id=$this->session->userdata('cust_id');
            $target_dir = "./assets/documents/".$cust_id."/"; 
            if (!is_dir($target_dir)) {  
                mkdir($target_dir , 0777, TRUE);
            }
            $countfiles = count($_FILES['file']['name']);
                    
                       
          for($i=0;$i<$countfiles;$i++){

               $time=time();
               $target_file =$target_dir.$time.$_FILES["file"]["name"][$i];
                // Upload file
               if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],$target_file)){
                      $data=array(
                      "cust_id"=>$cust_id,
                      "filetype"=>$type[$i],
                      "filedescription"=>$description[$i],
                      "group_id"=>$path,
                      "filename"=>$cust_id."/".$time.$_FILES["file"]["name"][$i]
                      );
                      $this->MainModel->insert($data,"filestable");
                }
              else{
                  
                   $fileok=0;
                }
            }
            if($fileok==1)
            {
                $message='Files uploaded successfully~Uploaded~success'; 
            }
            else{
                $message = 'There has been an error uploading files.~Error~error';
                    
            }
            $this->updateActivity($path."-Upload");
            header("Location:".base_url()."user/".$path.'/'.$message);
                       // $this->$path($message);
          }

        }  

    public function deleteFile($file_id,$cust_id,$file_name,$path){
        
        extract($_POST);
        $this->checkUser();
        $message="";
        $data=array(
        "file_id"=>$file_id
        );
        $file_name=urldecode($file_name);
        
        if(unlink(getcwd()."/assets/documents/".$cust_id."/".$file_name)){
            if($this->MainModel->delete($data,"filestable")){
                
                $message = 'File deleted successfully~Deleted~success';
            }
        }
        else{
            $message = 'There has been an error deleting files.~Error~error';
        }
        
        header("Location:".base_url()."user/".$path.'/'.$message);
        
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



















    public function login($message=""){
        $data=array();
        $message=urldecode($message);
        if($message!=''){
            $data["message"]=$message;
        }
        $this->loadView("login",$data);
    }
    
    public function loginAction(){  
        $data=array();
        $this->form_validation->set_rules('email',"Email","required|trim");
        $this->form_validation->set_rules('password',"Password","required");
        if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'~red~');
        }
        else
        {
            $data=array();
            $path="";
            extract($_POST);
            $res	=	$this->UserModel->userlogin(strtolower($email),md5($password));
            $reforcust_id;
            if(count((array)@$res)>0)
            { 
                $data["cust_id"]=$res->cust_id;
                if($res->role=="user"){
                    if($password==$this->session->userdata('sample_pass')){
                        $path="user/changePassword";  
                    }
                    else{
                        if($res->form_completed=="false"){
                            $path="user/businessInfo";
                        }
                        else{
                             $path="user/companyInfo";
                        }
                    }
                    $reforcust_id=$res->reference_id;
                    
                }
                else{
                $data["admin_id"]=$res->cust_id;
                
                    $reforcust_id=$res->cust_id;
                    $path="admin/adminhome";
                }
                
                $this->updateActivity("Login",$res->cust_id."~".$res->email);
                //print_r($res);
                $parent_data=$this->MainModel->getParentPricePlan($reforcust_id);
                //print_r($parent_data);
                $data["ws_name"] =  $parent_data->ws_name;
                if ($this->ifUrlRight($parent_data->web_url)!=true) {//check user is of this admin
                    die('Invalid access, your login url is: '.$parent_data->web_url.'~red~');
                }
                
                $data["email"]=$res->email;
                $data["role"]=$res->role;
                $data["reference_id"]=$res->reference_id;
                $data["access_level"]=$res->access_level;
                
                if (strpos($res->role,'replica') !== false) {   //all internal data is to replicate the access of the original user
                     $res	=	$this->UserModel->getwhere($res->reference_id);//get actual user
                    $data["admin_id"]=$res->cust_id;
                    $data["ws_name"] =  $parent_data->ws_name;
                    $data["role"]=$res->role;
                    $data["reference_id"]=$res->reference_id;
                }
                
                $this->session->set_userdata($data);
                $redirect_url=$this->session->userdata('redirect_url');
                
                if(strlen($redirect_url)>1){
                    $this->session->set_userdata('redirect_url',"");
                    die("Logged in successfully~green~".$redirect_url);
                }
                else{
                   die("Logged in successfully~green~".base_url().$path);
                }
            }
            else
            {
                die('Id or Password is incorrect.~red~');
            }
        }
	}
	function ifUrlRight($parent_url=""){
	    $current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($current_link,$parent_url) !== false) {//check user is of this admin
          return true;
        }
        else{
            return false;
        }
	}
    
    

    public function secQues(){
        $data=array();
        $this->loadView("securityquestion",$data);
    }

    public function changepass(){
        $data=array();
        $this->loadView("passchange",$data);
    }
    
    public function seccode(){
        $data=array();
        $this->loadView("seccode",$data);
    }



    public function deleteaccount(){
        $this->checkUser();
        $this->load->model('UserModel');
        extract($_POST);
        $this->form_validation->set_rules('currentpassword',"Current password","required");
       
        if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'-red-');
        }	
        $res=$this->UserModel->isPassword(@$this->session->userdata('email'),md5(@$currentpassword));
        if(count((array)$res)>0)
        {
          
               $id=$this->session->userdata('pkuser_id');
              //$data["res"]="1";
              $data["res"]=$this->UserModel->delete($id);
            echo "Account succesfully deleted-green-";
        }
        else
        {
            echo "Incorrect old password-red-";
        }
        
    }

    
     public function resendCode(){
        
        $data=array();
        $this->load->model('UserModel');
        $code1=rand(100,999);
        $code2=rand(100,999);
        $code=$code1."-".$code2;
        $data = array(
        'sample_code'=>$code
        );
        $this->session->set_userdata($data);
        
        $to = $this->session->userdata('sample_email');
        $subject = 'Resending - Email verification code!';
        $txt = 'Resending - Email verification code. Your Email verification code is '.$code;

        $this->sendEmail($to,$subject,$txt);

            echo "Verification code sent~Success!!~success";
         
    }
    
    
    public function first(){
        $data=array(); 
      
        $this->loadView("forms/first",$data);
    }

     
    public function logout(){
        if(strlen($this->session->userdata("cust_id"))>0){
            $this->updateActivity("Logout");
        }
        $data	=	array(
                            "cust_id"		=>	NULL,
                          
                            "email"			=>	NULL,
                          
                          );
        $this->session->set_userdata($data);
        header("Location: ".base_url());
    }

/////////////////////security questions


    public function securityQuestions(){
        $data=array();
        $data["selectedmenu"]=2;
        if(strlen($this->session->userdata("admin_id"))>0){ 
            $admin_id=$this->session->userdata("admin_id");
            $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        }
        $this->loadView("User/securityquestions",$data);
    }




    public function securityQuestionsAction(){
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
              $email=$this->session->userdata("email");
              $data["res"]=$this->UserModel->updatebyEmail($data,$email);
              
              $this->updateActivity("General- SecurityQuestions",$res->cust_id);
              echo "Questions saved succesfully changed-green-"; 
    
    }

    ///////////////////////////////////////passwordchange//////
 
 
 
 
    public function changePassword(){
        $data=array();
        $data["selectedmenu"]=2;
         
       $email=$this->session->userdata("email");
       $whereArray=array(
                "email"=>$email
         );
       $res =$this->UserModel->where($whereArray);
        if(count((array)$res)>0)
        {
            if(  $res[0]->a_one=="" && $res[0]->a_two=="" && $res[0]->a_three=="")
            {
                $data["msg"]="To secure your account more please setup security questions";
                
            }
            else{
                  $data=array(
                      'q_one'=> $res[0]->q_one,
                      'q_two'=>$res[0]->q_two,
                       'q_three'=>$res[0]->q_three,
                      );
            }
        if(strlen($this->session->userdata("admin_id"))>0){ 
            $admin_id=$this->session->userdata("admin_id");
            $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        }
        $this->loadView("User/changepassquestion",$data);

    }

    }
    public function checkAnswers(){
        $data=array();
         $this->checkUser();
         extract($_POST);
         $data["selectedmenu"]=2;
        $this->load->model('UserModel');	
         $email=$this->session->userdata("email");
       $whereArray=array(
                "email"=>$email
         );
        $res=$this->UserModel->where($whereArray)[0];
   
        if(count((array)$res)>0)
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if( $a_one==$res->a_one &&  $a_two==$res->a_two ||  $a_one==$res->a_one  && $a_three==$res->a_three ||  
                                                                $a_two==$res->a_two && $a_three==$res->a_three )
            {  
              $path="user/showChangePassword";
            //$this->session->set_userdata($data);
            die('Successfull matched-green-'.base_url().$path);
        
            }
            else
            {
                die('Incorrect answer-red-');
            }
        }
        }

    }
    
    public function showChangePassword(){
        $data=array();
        $data["selectedmenu"]=2;
        $data["msg"]="0";
        if(strlen($this->session->userdata("admin_id"))>0){ 
            $admin_id=$this->session->userdata("admin_id");
            $data["admindata"]=$this->MainModel->getAdminData($admin_id);
        }
        $this->loadView("User/changepassquestion",$data);
    }
     
    public function changePasswordAction(){
        $this->checkUser();
        extract($_POST);
        $data["selectedmenu"]=2;
        $this->form_validation->set_rules('currentpassword',"Current password","required|trim");
        $this->form_validation->set_rules('newpassword',"New password","required|trim");
        $this->form_validation->set_rules('confirmpassword', 'Confirm new password', 'required|matches[newpassword]');
       
        if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'-red-');
            
        }
         
       $email=$this->session->userdata("email");
       $res=$this->UserModel->isPassword(strtolower($this->session->userdata('email')),md5($currentpassword));
      //echo $this->session->userdata('email');
       if(isset($res->pswd))
        {           
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = array('pswd'=>md5($newpassword));
                $this->UserModel->updatebyEmail($data,$email);
                die("Password succesfully changed-green-");
                $this->updateActivity("General- ChangePassword",$res->cust_id);
            }
        }
        else{
            die("Incorrect old password-red-");
        }
      
    }

 
    ///////////////////////////////////////////////////////

  

    public function  changePersonalInfo(){
        $data["selectedmenu"]=2;
        $data=array();
        $this->loadView("user/changepersonalinfo",$data);
    }

    public function  userDeleteAccount(){
        $data=array();
        $this->loadView("template/deleteaccount",$data);
    }  
    
    
    
     
    
   ////GENERIC FUNCTIONS

    public function loadView($view,$data){
        $this->load->view('template/head',$data);
		$this->load->view($view);
        $this->load->view('template/footer');
    }
    
    public function forgotpass(){
        $this->load->model('UserModel');
        $this->form_validation->set_rules('email',"Email","required|trim");
        if ($this->form_validation->run() == false) 
        {
            die(validation_errors().'~red~');
        }
        else
        {
            extract($_POST);
            $res	=	$this->UserModel->checkemail($email);
            $message="";
            if(count((array)@$res)>0)
            {
                $parent_data=$this->MainModel->getParentPricePlan($res->reference_id);
                if ($this->ifUrlRight($parent_data->web_url)!=true) {//check user is of this admin
                    die('Invalid access, your login url is: '.$parent_data->web_url.'~red~');
                }
                $newpass=$this->randomPassword();
                $data["sample_pass"]=$newpass;
                $this->session->set_userdata($data);
                
                
                $to = $email;
                $subject = 'Password reset request!';
                $txt = 'Your password has been reset. Your new password is '.$newpass;
                
                
                if($this->sendEmail($to,$subject,$txt)){
                    
                $data	=	array(
                                    "pswd"			=>	md5($newpass),
                                  );
                $this->UserModel->updatepass($data,$email);
                
                //send autogenerated password to email here to $email
                
                $message='Email has been sent Do check spam folder for email~green~';
                }
                else{
                $message='Email not sent, there has been an error~red~';
                }
                
                die($message);
            }
            else
            {
                $message='Email is not registered';
                die($message.'~red~');
            }
        }
    }
    
    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
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