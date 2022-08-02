<?php $this->load->view('forms/payroll/topmenu');?>
<form method="post" action="<?php echo base_url()?>user/payrollInfo/Data updated successfully~Saved~success" id="form">
   
<div class="row "> 
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <h4 class="subheading">Forgiveness Related Information</h4>
                </div>
            </div>
  <small class="red" style="margin-top:20px">* Click Save button after making any changes. Navigating away from the page without saving will result in loss of data</small>
<div class="row "> 

<div class="col-l col-sm-1 col-md-1 col-xs-1"  style="margin-right: 0; padding-right: 0; text-align: right;">
<span class="outer"><small class="round">1</small></span> 
</div>
                <div class="col-lg-9 col-sm-9 col-md-9 col-xs-9" style="margin-left: 0; padding-left: 0;">
                  <small class="data">Did you reduce employee wages by 25% of more, from 2/15/2020 to end of 8 or 24 week forgiveness period </small>
    </div>



    <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1">
        <input type="radio" name="wage_reduction" value = "yes" disabled> Yes
    </div>
    <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1">
        <input type="radio" name="wage_reduction" value = "no" checked> No
</div>
</div>
<br>
<div class="row ">
<div class="col-l col-sm-1 col-md-1 col-xs-1" style="margin-right: 0; padding-right: 0; text-align: right;">
<span class="outer"><small class="round">2</small></span>
</div>
                <div class="col-lg-9 col-sm-9 col-md-9 col-xs-9" style="margin-left: 0; padding-left: 0;">
				
              <small class="data">If you reduced employee wages by 25% of more, from 2/15/2020 to end of 8 or 24 week forgiveness period  have those wages been restored back to 2/15/2020 level </small>
                </div>
            
    
			
                <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1">
                    <input type="radio" name="wage_restored" class="wage_restored" disabled value = "yes"> Yes
                </div>
                <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1">
				    <input type="radio" name="wage_restored" class="wage_restored" value = "" checked> No
				</div>
            </div>
            
            
            
            <div class="row "> 

<div class="col-l col-sm-1 col-md-1 col-xs-1"  style="margin-right: 0; padding-right: 0; text-align: right;">
<span class="outer"><small class="round">3</small></span> 
</div>
                <div class="col-lg-9 col-sm-9 col-md-9 col-xs-9" style="margin-left: 0; padding-left: 0;">
                  <small class="data">Did you reduce FTE Count (between 2/15/2020 and 4/26/2020), and have the FTE count have been restored back to these earlier levels by 12/31/2020 (or as of this forgiveness application date, whichever is earlier)</small>
    </div>



    <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1">
        <input type="radio" name="FTE_reduction" value = "yes" disabled> Yes
    </div>
    <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1">
        <input type="radio" name="FTE_reduction" value = "no" checked> No
</div>
</div>
            
            
            <div style="margin-left:50px;" class="formstatus"></div>
<div class="row">
                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 center"> <?php if($this->session->userdata('access_level')=="RW"){ ?>
            <button type="submit"  class="btn btn-success savebtn" >Save </button>
<?php }?>
                </div>
            </div>

        </form>