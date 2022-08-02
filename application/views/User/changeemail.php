<?php 
    if(strlen($this->session->userdata("admin_id"))>0){ 
        $this->load->view('admin/navbar');
    }
    else{
        $this->load->view('User/sidebar');
    }
?>
 <!---1st row--->        <div   class="border passchangedivs"  >
  <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ho_header_1">
                <h2 class="sk_headings accountheading">Email address change / Notification email subscription setting</h2>
                <p>Please enter the email address you would like to register</p>
            </div>
        </div>
        <div class="row">
     
                <form action="<?php echo base_url()?>user/updateEmail" method="POST" autocomplete="off" id="myForm">
                 
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <small>Email address :</small>
                            <input type="email" class="form-control" id="hoemail" placeholder="Enter email" name="email" required>
                        </div>  
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center">
                    <div class="formstatus"></div>
                            <button type="submit" class="btn_default">Send</button>
                        </div>

                

                </form>
            </div>
        

</div>