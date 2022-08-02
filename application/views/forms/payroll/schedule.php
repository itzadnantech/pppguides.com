
<?php $this->load->view('forms/payroll/topmenu');?>
<form method="post" action="<?php echo base_url()?>user/payrollScheduleAction" id="form">
     <small class="red" style="margin-top:20px">* Click Save button after making any changes. Navigating away from the page without saving will result in loss of data</small>
<div class="row ">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
         <!--    <a href="javascript:editformFields()" class=" btn btn-success">Edit Form</a>-->
                </div>
            </div> 
             <h4 class="subheading1" style="position: relative;top: 23px; width: 7%;">General</h4>

        <div class="border">
            <div class="row ">
                 

                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <small>Payroll Schedule <small class="red">*</small> </small>
                <select class="form-control" id="payroll_schedule" name="payroll_schedule" required >
                
                    <option value="">Select</option>
                    <option value="Daily">Daily</option>
					<option value="Weekly">Weekly</option>
					<option value="BiWeekly">BiWeekly</option>
					<option value="SemiMonthly">SemiMonthly</option>
					<option value="Monthly">Monthly</option>
					<option value="Qtrly">Qtrly</option>
					<option value="SemiAnnual">SemiAnnual</option>
                    <option value="Annual">Annual</option>
                    <option value="Other">Other</option>
				  </select>    
                
               
                </div>

                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <small>Begin Pay Period Date after Loan Disbursement Date</small>
               <input type="date" min="2020-01-01"  max="2020-12-31" name="payroll_begin_date" class="form-control" id="payroll_begin_date" value="<?php echo $payrolldata->payroll_begin_date;?>" required>  
        
                </div>
            </div>
            <div class="row ">
            <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <small> Who provides your payroll services</small>
                <select class="form-control" id="payroll_service" name="payroll_service">
                

                    <option value="">Select</option>
                    <option value="Accountant">Accountant</option>
					<option value="Payroll Software">Payroll Software</option>
					<option value="Myself">Myself</option>
					<option value="Other">Other</option>
				  </select>    
                
               
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <small>Payroll Software</small>
                <select class="form-control" id="Payroll_software" name="Payroll_software" >
                

                <option value="">Select</option>
                <option value="ADP">ADP</option>
					<option value="Paychex">Paychex</option>
					<option value="Intuit">Intuit</option>
					<option value="Quickbooks">Quickbooks</option>
					<option value="Gusto">Gusto</option>
					<option value="Sage">Sage</option>
				
				  </select>    
                
                
                </div>
                </div> </div>
    <br>
    <?php 
    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
    ?>
      <h4 class="subheading1" style="position: relative;top: 23px; width: 12%;">8 Week Period</h4>

        <div class="border">
            <div class="row">
            <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 mright0 ">
                <small>Covered Period Begin Date</small> 
                <input type="date" id="loan8_start" name="loan8_start" class="form-control" value="<?php echo $loandata->disbursement_date;?>" readonly>
                </div>  
                <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12 allzero marginto ">
                <label for="" class="setlabal">to</label>
                </div>
                
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12  mleft0">
                <small>Covered Period End Date </small>
                <input type="date" readonly id="loan8_end" name="loan8_end" class="form-control" value="<?php echo $payrolldata->loan8_end;?>" readonly>
                </div>
                <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12 allzero marginto  ">
                <label for="" class="setlabal">or</label>
               
                </div>
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 mright0 ">
                <small>Alternate Period Begin Date </small>   
                <input type="date"  id="payroll8_start" name="payroll8_start" class="form-control" value="<?php echo $payrolldata->payroll8_start;?>" readonly>
                </div>
                <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12 allzero marginto ">
                <label for="" class="setlabal">to</label>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12  mleft0 ">
                <small>Alternate Period End Date</small>
                <input type="date"  id="payroll8_end" name="payroll8_end" class="form-control" value="<?php echo $payrolldata->payroll8_end;?>" readonly>
                </div>
            </div>
            </div>
            
            
            <?php } ?>
    <br>
 <h4 class="subheading1" style="position: relative;top: 23px; width: 13%;">24 Week Period </h4>

        <div class="border">
           

            <div class="row ">
            
            <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 mright0 ">
                <small>Covered Period Begin Date </small> 
                <input type="date" readonly id="loan24_start" name="loan24_start" class="form-control" value="<?php echo $loandata->disbursement_date;?>">
                </div>
                <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12 allzero marginto ">
                <label for="" class="setlabal">to</label>
               
                </div>
                
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12  mleft0">
                <small>Covered Period End Date </small>
                <input type="date" readonly id="loan24_end" name="loan24_end" class="form-control" value="<?php echo $payrolldata->loan24_end;?>">
                </div> 
                <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12 allzero marginto">
                <label for="" class="setlabal">or</label>
               
                </div>
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 mright0 ">
                <small>Alternate Period Begin Date</small>   
                <input type="date" readonly id="payroll24_start" name="payroll24_start" class="form-control" value="<?php echo $payrolldata->payroll24_start;?>">
                </div>
                <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12 allzero marginto ">
                <label for="" class="setlabal">to</label>
               
                </div>
                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12  mleft0">
                <small>Alternate Period End Date</small>
                <input type="date" readonly id="payroll24_end" name="payroll24_end" class="form-control" value="<?php echo $payrolldata->payroll24_end;?>">
                </div>
            </div>
                </div>
    <br>
            
            
            
                <!--<div style="margin-left:50px;" class="formstatus"></div>-->
      
            
        
              <div class=" center"> <?php if($this->session->userdata('access_level')=="RW"){ ?>
            <button type="submit"  class="btn btn-success savebtn" >Save </button>
<?php }?>
               
        </div>

            </form>

<script>
$("#payroll_schedule").val('<?php echo $payrolldata->payroll_schedule?>');
$("#payroll_service").val('<?php echo $payrolldata->payroll_service?>');
$("#Payroll_software").val('<?php echo $payrolldata->Payroll_software?>');
</script>
