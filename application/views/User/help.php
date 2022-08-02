<?php $this->load->view('User/sidebar');?>
<div   class="border passchangedivs1"  > 



      <h2 class="sk_headings accountheading" >Contact Support</h2>
      
      <?php if($selectedplan->show_support=="yes"){?>
        <form action="<?php echo base_url()?>user/contactsupportaction" method="POST" autocomplete="off" enctype="multipart/form-data" >
            <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <small>Your Company Name <small class="red">*</small></small>
            
                            
                                <input type="text" id="business_name" name="business_name" value="<?php echo $companydata->business_name?>" placeholder="Company Name" required class="form-control">
                            </div>
            </div>
            <div class="row ">

                   
             
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    <small>First Name <small class="red">*</small></small>
                    <input type="text" id="first_name" name="first_name" value="<?php echo $userdata->first_name;?>" maxlength="50" placeholder="First Name" required class="form-control">
                </div>
               
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    <small>Last Name <small class="red">*</small></small>
                    <input type="text" id="last_name" name="last_name" value="<?php echo $userdata->last_name?>" maxlength="50" placeholder="First Name" required class="form-control">
                </div>
            </div>
            

<div class="row">



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    <small>Your Contact Phone (if we need to call you)<small class="red">*</small> </small>

                  
<input type="text" id="landline_phone" maxlength="12" name="landline_phone" value="<?php echo $userdata->landline_phone?>" placeholder="Landline Phone " required class="form-control phone">
                </div>
             

                   



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
<small>Your Contact Phone (for text messages)<small class="red">*</small>  </small>
<input type="text" id="mobile_phone" required name="mobile_phone" value="<?php echo $userdata->mobile_phone?>" placeholder="Contact Phone " class="form-control phone">
                </div>
             
</div>
<div class="row">
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
<small>Your Contact Email<small class="red">*</small>  </small>
<input type="email" id="email" required name="email" value="<?php echo $userdata->email?>" placeholder="Contact Email " class="form-control">
                </div>
             
</div>





<div class="row">



<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <small>Enter your Support Question <small class="red">*</small></small>


<textarea id="q_text" name="q_text" required rows="3"  style="width:100%"></textarea>
                </div>
             
</div>


<div class="row">



<div class="col-lg-12 col-sm-12 col-md-6 col-xs-12">
                    <small>Upload any supporting document / screenshot</small>

<input type="file" name="file" class="form-control "> 
                </div>
             
</div>
                 <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center">
                            <button type="submit" class="btn_default">Submit your question to our support </button>
                        </div>
                    <div class="formstatus"></div>
                </form>
      </div>
      
      
      <?php }
      else{
          echo "Upgrade your plan to avail this service.";
      }
      
      ?>