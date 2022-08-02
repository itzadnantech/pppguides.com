<?php $this->load->view('admin/navbar');?>

     <div   class="border passchangedivs1"  >
        <!---1st row---><h2 class="sk_headings accountheading" >Change Password </h2>
   
         
                <p>Enter the password you are currently using and the new password.</p>
          



        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <form action="<?php echo base_url()?>admin/updatePassword" method="POST" autocomplete="off" id="myForm">
                    <div class="row ">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <small>   Current password :</small>
                    
                            <input type="password" class="form-control" id="currentpassword" placeholder="8 or more alphanumeric characters" name="currentpassword" required>
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
  
 