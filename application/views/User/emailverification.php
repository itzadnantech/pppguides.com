<?php 
    if(strlen($this->session->userdata("admin_id"))>0){ 
        $this->load->view('admin/navbar');
    }
    else{
        $this->load->view('User/sidebar');
    }
?>

 <div   class="border passchangedivs"  >
  
      <h2 class="sk_headings accountheading"  > Check your Email  <i class="fa fa-envelope " aria-hidden="true"></i></h4>

    <form method="post" action="<?php echo base_url()?>user/emailcheckVerCode" id="myForm">
    <div class="row"> 
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
     
      Enter the verification Code we send to your email :<small class="red">Let's make sure it's You </small>
     
     <input type="text" id = "vcode" name="vcode" placeholder="000-000" required class="form-control">
      </div>
    </div>
    
    
 
   
      
    <div style="margin-left:30px;" class="formstatus"></div>
        <div class="row"> 
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center" >
      <input type="submit" class="login btn_default" value="Verify">
        </div>
    </div>
    </form>


    <!-- Remind Passowrd --><br> 

    <form id="alertForm" method="post" action="<?php echo base_url()?>user/resendCode">
    <button type="submit" class="like-a" id="resend">Resend Code</button>
    </form>
  </div>
</div>
</div>