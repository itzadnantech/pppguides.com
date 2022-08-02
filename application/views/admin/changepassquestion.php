<?php $this->load->view('admin/navbar');?>


   
      <?php
      if(isset($msg)){    ?> 
       <div   class="border passchangedivs1"  >
      <h2 class="sk_headings accountheading" >Change Password </h2>
        <p style="margin-top: 20px;"><span style="color: red">Warning: </span>
        <?php echo $msg; ?>
      </p >
     
      
        <!---1st row--->
   
         
                <p>Enter the password you are currently using and the new password.</p>
          



        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <form action="<?php echo base_url()?>admin/updatePassword" method="POST" autocomplete="off" id="myForm">
                    <div class="row ">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <small>   Current password :</small>
                    
                            <input type="password" class="form-control" id="currentpassword"  placeholder="8 or more alphanumeric characters" name="currentpassword" required>
                        </div>
            
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small>    New password </small>
                      
                            <input type="password" class="form-control" id="newassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="8 or more alphanumeric characters"  name="newpassword" required>
                        </div>
                
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     <small>       New password (confirmation) :</small>
                     
                            <input type="password" class="form-control" id="confirmation" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="8 or more alphanumeric characters"  name="confirmation" required>
                        </div>
                    </div>
 <div class="formstatus"></div>
                    <div class="row ho_box5">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center">
                            <button type="submit" id="change" class="adminregisbtn">change</button>
                        </div>
                    </div>
               
                </form>
            </div>
        </div>
  
        </div>
        <?php }
        else{
      ?>
   <div   class="border passchangedivs1"  >
      
      <h2 class="sk_headings accountheading" >Security Questions </h2>
 
   
    <form method="post" action="<?php echo base_url()?>admin/passwordvarquestionsact" autocomplete="off" id="myForm">

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
   <div style="margin-left:50px;" class="formstatus"></div>


   <div class="row">
   <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 center">
  
      <input type="submit" class="adminregisbtn" value="Check">
   </div>
   </div>
    </form>
        </div>

    <?php }
          
      
        ?>
