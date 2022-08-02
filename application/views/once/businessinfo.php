
    <div  style="max-width:870px; margin-top:60px;" class="container-fluid  formcon">
        <div class="row sk_headings">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h2>Personal Information</h2>
            </div>
        </div>
        <small class="subheading ">Please enter the correct information.</small>

        <form method="post" action="<?php echo base_url()?>user/businessInfoAction" id="myForm">
        <h4 class="subheading1" style="width:23%; top: 23px;">Business Information</h4>
        <div class="border">
       
        <div class="row ">
        <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <small>Business Legal Name (“Borrower” name on PPP Loan Application) <small class="red">*</small></small>
                    <input type="text" id = "business_name"  name="business_name" placeholder="Business Legal Name (“Borrower”)/DBA or Tradename" value="<?php echo $businessdata->business_name; ?>" required class="form-control">
                </div>
                
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>PPP Loan Amount<small class="red">*</small></small>
                      <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i> 
                    
                    <input type="text" id="loan_amount" step="0.01" max="10000000" name="loan_amount" value="<?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?>" placeholder="PPP Loan Amount " required class="form-control quantity quantitys">
                </div>
                </div>
                 </div>
            <div class="row ">
           
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>PPP Loan Disbursement Date <small class="red">*</small></small>
                    <input type="Date"  min="2020-04-01"  max="2020-08-08" value="<?php echo $loandata->disbursement_date; ?>" name="disbursement_date" id="disbursement_date"  required class="form-control">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <small>PPP Loan Lender / Bank Name </small>
                    <input type="text" name="bank_name" id="bank_name" value="<?php echo $loandata->bank_name; ?>"  class="form-control">
                </div>
            </div>

            <div class="row ">
            
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                <small>How did you hear about us<small class="red">*</small></small>
                    <select  id="hear_about_us"  name="hear_about_us"   required class="form-control"  >
                    <option value="Friend">Friend</option>
                    <option value="Google">Google</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Other">Other</option>
				  </select> 
                </div>
            </div>
            </div>

                <div class="formstatus"></div>
            <div class="row sk_headings">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <button type="button"  id="saveBtn1" class="btn_default pull-left" disabled readonly>Previous </button>

<button type="submit" id="saveBtn2" class="btn_default pull-right" >Next </button>
    </div>
</div>
    </form>
    </div>
<script>
$("#hear_about_us").val('<?php echo $userdata->hear_about_us; ?>');
</script>




   