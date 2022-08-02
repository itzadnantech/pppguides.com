<?php 
    if(strlen($this->session->userdata("admin_id"))>0){ 
        $this->load->view('admin/navbar');
    }
    else{
        $this->load->view('User/sidebar');
    }
?>


   
      <?php
      if(isset($msg)){    ?> 
          <div   class="border passchangedivs"  > 
      <h2 class="sk_headings accountheading" >Change Password </h2>
      <?php
      if($msg!=0){    ?>
        <p style="margin-top: 20px; "><span style="color: red">Warning: </span>
        <?php echo $msg; ?>
        <?php } ?>
      </p>
     
      
        <!---1st row--->
   
         
                <p>Enter the password you are currently using and the new password.</p>
          



        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <form action="<?php echo base_url()?>user/changePasswordAction" method="POST" autocomplete="off" id="myForm">
                    <div class="row ">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <small>   Current password :</small>
                    
                            <input type="password" class="form-control" id="currentpassword" placeholder="Current password" name="currentpassword" required>
                            
                        </div>
            
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small>    New password </small>
                      
                            <input type="password"  id="newpassword" class="third frmctrl form-control" name="newpassword" placeholder="New password"  autocomplete="nope" required pattern="^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" title="Must contain at least one number,one special character, one uppercase, and at least 8 characters">
                            
                        </div>
                
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     <small>       New password (confirmation) :</small>
                     
                         <input type="password"  id="confirmation" class="third frmctrl form-control" name="confirmpassword" placeholder="Retype new password"  autocomplete="nope" required pattern="^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" title="Must contain at least one number,one special character, one uppercase, and at least 8 characters">
                            </div>
                        <br><small class="pull-left" style="font-size:10px;padding-left:30px;display:block">* Must have 3 of Upper, Lower, Number, Special Character</small> <br>
                        </div>
                        <div class="formstatus"></div>
                    <div class="row ho_box5">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center">
                            <button type="submit" id="change" class="btn_default">change</button>
                        </div>
                    </div>
               
                </form>
            </div>
        </div>
  
        </div>
        <?php }
        else{
      ?>
           <div   class="border passchangedivs " >
      
      <h2 class="sk_headings accountheading" >Security Questions </h2>
 
   
    <form method="post" action="<?php echo base_url()?>user/checkAnswers" autocomplete="off" id="myForm2">

    <input type="hidden" name="path" value="changepassquestion">
    <p>Please answer at-least 2 questions.</p>
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 col-xs-12">

<small><?php echo $q_one ;?></small>
<input type="text" id = "a_one" name="a_one" placeholder="Answer" class="form-control">
        </div>
   <div class="col-sm-12 col-md-4 col-lg-4 col-xs-12">
   <small> <?php echo $q_two ; ?></small>
       <input type="text" id="a_two" name="a_two" placeholder="Answer" class="form-control">
   </div>
  
        <div class="col-sm-12 col-md-4 col-lg-4 col-xs-12">


<small><?php echo $q_three; ?></small>
<input type="text" id = "a_three" name="a_three" placeholder="Answer"  class="form-control">
        </div>
    </div>


   <div class="row">
   <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 center">
  
   <div style="margin-left:50px;" class="formstatus"></div>
      <input type="submit" class="btn_default" value="Check">
   </div>
   </div>
    </form>
        </div>

    <?php }
          
      
        ?>
