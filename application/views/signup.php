<?php

        $reference_id="0";
?>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <div class="fadeIn first">
      <h2 >Sign Up</h2>
    </div> 
   
        <form method="post"  class="frmback " action="<?php echo base_url()?>user/signupAction" id="myForm" autocomplete="off">
       
       <h5  class="pull-left logintab">Email<small class="red">*</small></h5> 
        
        <input  type="email" class="second frmctrl form-control" name="email" placeholder="Email"  autocomplete="nope" required>
      
        <h5 class="pull-left logintab">Password<small class="red">*</small></h5><br> 
        <input type="password"  id="password" class="third frmctrl form-control" name="password" placeholder="Password"  autocomplete="nope" required pattern="^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" title="Must contain at least one number,one special character, one uppercase, and at least 8 characters">
       <br><small class="pull-left" style="font-size:10px;padding-left:30px;display:block">* Must have 3 of Upper, Lower, Number, Special Character</small> <br>
       
       <h5  class="pull-left logintab"><br>Reference Id</h5> 
        
        <input  type="number" class="second frmctrl form-control" name="reference_id" placeholder="Reference Id"  autocomplete="nope">
         <br>
         <small>Note: Email will be verified</small><br>
         <div style="margin-left:50px;" class="formstatus "></div>
         <input type="submit" class="login" id="signupBtn" value="Sign up">  
         <input type="hidden" name="name" value="">
         <input type="hidden" name="support_email" value="">
         <input type="hidden" name="phone" value="">
         <input type="hidden" name="price_group" value="">
         <input type="hidden" name="reference_number" value="<?php echo $reference_id?>">
        </form>

      <div id="formFooter" class="loginspace" >
    <a class="underlineHover"  href="<?php echo base_url()?>user/login">Already have an account? Signin</a>
    </div>
  </div>
  
</div>