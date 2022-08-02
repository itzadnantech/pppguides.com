
<div class="row steps" style="text-align:center;margin-top:20px; height: 40px;">
 
<div class="col-lg-2 col-sm-12 col-md-2 col-xs-12" > <span><a class="step step1 <?php if($formval==0){echo 'active';}?>" href="<?php echo base_url()?>user/companyInfo">1. Company Details  <i class="fa <?php echo $statusdata->companytable;?>" aria-hidden="true"></i></a></span> </div> 
<div class="col-lg-2 col-sm-12 col-md-2 col-xs-12" >  <span><a class="step  <?php if($formval==1){echo 'active';}?>" href="<?php echo base_url()?>user/ownerInfo">2. Owner Details  <i class="fa <?php echo $statusdata->ownertable;?>" aria-hidden="true"></i></a></span> </div> 
<div class="col-lg-2 col-sm-12 col-md-2 col-xs-12" >  <span><a class="step  <?php if($formval==2){echo 'active';}?>" href="<?php echo base_url()?>user/loanInfo">3. Loan Details  <i class="fa <?php echo $statusdata->loantable;?>" aria-hidden="true"></i></a></span> </div>
<div class="col-lg-2 col-sm-12 col-md-2 col-xs-12" > <span><a class="step  <?php if($formval==3){echo 'active';}?>" href="<?php echo base_url()?>user/payrollSchedule">4. Payroll Cost  <i class="fa <?php echo $statusdata->payrollinfo;?>" aria-hidden="true"></i></a></span> </div>
<div class="col-lg-2 col-sm-12 col-md-2 col-xs-12" >   <span><a class="step  step5 <?php if($formval==4){echo 'active';}?>" href="<?php echo base_url()?>user/nonpayroll">5. Non Payroll Cost  <i class="fa <?php echo $statusdata->nonpayrolltable?>" aria-hidden="true"></i></a></span> </div>
    <div class="col-lg-2 col-sm-12 col-md-2 col-xs-12" > <span><a class="step  <?php if($formval==5){echo 'active';}?>" href="<?php echo base_url()?>user/forgivenessTable">6. Forgiveness  <i class="fa fa-calculator" aria-hidden="true"></i></a></span> </div>
  </div> 


  
<script>
    $(document).ready(function() {
    //  9 : numeric
    //  a : alphabetical
    //  * : alphanumeric
    $(".ein").inputmask("99-9999999");
    $(".ssn").inputmask("999-99-9999");
    $(".zip").inputmask("*****");
    $('.middlename').inputmask("a");


    $(".phone").inputmask("999-999-9999");

    $(".landline_extension").inputmask("99999");

    $("#loanapplication").inputmask("99999");
    $("#forgivenessapplication").inputmask("99999");

    $("#ownerpartners").inputmask("9999");

    $("#vcode").inputmask("999-999");
});
</script>

<script type='text/javascript'>

   		/*  $(".txtOnly").keypress(function (e) {
         
            if (e.which != 8 && e.which != 0 && (e.which <= 64 || e.which >= 123 )  &&  e.which != 32 ) {
   
          
            return false;
        }
        
        
	var regex = new RegExp("^[a-zA-Z]+\s+$");
			var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
			if (regex.test(str)) {
				return true;
			}
			else
			{
			e.preventDefault();
			$('.txtOnly').show();
			$('.txtOnly').text('Please Enter Alphabet');
			return false;
			}
		});*/
 </script>