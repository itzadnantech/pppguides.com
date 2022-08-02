<?php 
    if(strlen($this->session->userdata("admin_id"))>0){ 
        $this->load->view('admin/navbar');
    }
    else{
        $this->load->view('User/sidebar');
    }
?>
<div class="ho_main">
       
          <div   class="border passchangedivs"  > 
      <h2 class="sk_headings accountheading" >Profile panel </h2>
                <p>You can check or change your registration details here.</p>
        <div class="row">
            <div class="col-sm-12">
                
            
            
                    <h4><a href="<?php echo base_url()?>user/changeEmail" class="subheading">Email address change</a></h4>
                    <p>Click here to change your e-mail address and subscribe to the notification e-mail</p>
               
                    
            </div> 
            <div class="col-sm-12">
               
            
                    <h4><a href="<?php echo base_url()?>user/changePassword" class="subheading">Change Password</a></h4>
                    <p>Click here to change the password required for login.</p>
                
                    
            </div>
             <div class="col-sm-12">
               
            
               <h4><a href="<?php echo base_url()?>user/securityquestions" class="subheading">Security Questions</a></h4>
               <p>Click here to answer the security questions .</p>
           
               
       </div>

        </div>
        </div>
        
        
        
</div>