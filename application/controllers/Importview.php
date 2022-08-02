<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importview extends CI_Controller {

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

    public function view_employee_file($file_id,$customer_id)
    {
        $data['employee_info'] = $this->db
        ->where('file_id',$file_id)
        ->where('customer_id',$customer_id)
        ->get('pay_imp_employees_info')->result();
        $this->load->Model("MainModel");
        $cust_id=$this->session->userdata("cust_id");
        $wheredata=array(
            "cust_id"=>$cust_id,
            );
        
        $data["ownerdata"]=$this->MainModel->get_where($wheredata,"ownertable");
        //print_r($data["ownerdata"]);
        $this->load->view('User/importview',$data);
    }

    public function update_owner_in_employee()
    {
        if(count($_POST['sub_checkbox']) > 0)
        {
            foreach($_POST['sub_checkbox'] as $id)
            {
                $this->db->where('id',$id)->update('pay_imp_employees_info',['is_owner'=>'TRUE']);
            }
            
            foreach($_POST as $key=>$value)
            {
                if(gettype($value)!=="array"&&strpos($key, 'id') !== false){
                    $key=explode("~",$key)[1];
                    if(strlen($value)>1){
                        $this->db->where('id',$key)->update('pay_imp_employees_info',['system_owner'=>"$value"]);
                    }
                   // print_r($key."  ".$value."      ");
                }
            }
            print_r($_POST);
            
            $this->session->set_flashdata('successmsg','Employee File Imported Successfully!');
            
            redirect('user/importExcel');
        }
        
    }

    public function dismiss()
    {

        $this->session->set_flashdata('successmsg','Employee File Imported Successfully!');

        redirect('user/importExcel'); 
    }

}

?>