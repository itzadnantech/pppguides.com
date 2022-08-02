<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      <h4 > Change Password</h4>
    </div> 
    <!-- Login Form -->
    <form method="post" action="<?php echo base_url()?>user/loginAction" id="myForm">
    <label for="" class="pull-left">
    Current password :
 </label>
 <input type="password" class="fadeIn second frmctrl" id="currentpassword" placeholder="8 or more alphanumeric characters" name="currentpassword" required>
  
      <label for="" class="pull-left">New password :</label>
      <input type="password" id="password" class="fadeIn third frmctrl" name="newassword" placeholder="Password">
  
      <label for="" class="pull-left"> New password (confirmation) :</label>
      <input type="password" id="password" class="fadeIn third frmctrl" name="confirmation" placeholder="Password">
  
      <div style="margin-left:50px;" class="formstatus"></div>
      <input type="submit" class="fadeIn login btn_default" value="change">
    </form>
    <!-- Remind Passowrd --><br> 
   
    

    <div id="formFooter">
 
    </div>
  </div>
</div>
