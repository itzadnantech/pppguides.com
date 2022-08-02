<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      <h2 > Check your Email  <i class="fa fa-envelope " aria-hidden="true"></i></h2>
    </div> 
    <!-- Login Form -->
    <form method="post" action="<?php echo base_url()?>user/checkVerCode" id="myForm">
  
    <h5  class="pull-left logintab">
    Enter the verification Code we sent to your email :
 </h5>
 <input type="text" id = "vcode" name="vcode" placeholder="000-000" required class="fadeIn second frmctrl form-control">
   
      
    <div style="margin-left:30px;" class="formstatus"></div>
      <input type="submit" class="fadeIn login " value="Verify">
    </form>
    <!-- Remind Passowrd --><br> 

    <form id="alertForm" method="post" action="<?php echo base_url()?>user/resendCode">
    <button type="submit" class="like-a" id="resend">Resend Code</button>
    </form>
  </div>
</div>
<?php $this->view('template/forgotpass');?>