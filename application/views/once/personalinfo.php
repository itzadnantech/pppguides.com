

    <div  style="max-width:800px; margin-top:60px;" class="container-fluid  formcon">
        <div class="row sk_headings">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h2>Personal Information     </h2>
                
            </div>
 
        </div>
        <small class="subheading ">Please enter the correct information.</small>
  
        <form method="post" action="<?php echo base_url()?>user/personalInfoAction" id="myForm">

        <h4 class="subheading1" style="width: 32%; top: 23px;">Primary Contact Information</h4>
        <div class="border" >


       


        <div class="row ">

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
        <small>First Name <small class="red">*</small></small>
        <input type="text" id="first_name" name="first_name" value="<?php echo $userdata->first_name; ?>"  maxlength="50" placeholder="only characters allowed " required class="form-control ">
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
        <small>Middle Initial</small>
        <input type="text" id="middle_initial" maxlength="1"  pattern="[A-Za-z]+" value="<?php echo $userdata->middle_initial; ?>" name="middle_initial"  placeholder=" only characters allowed " class="form-control middlename txtOnly">
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
    <small>Last Name <small class="red">*</small></small>  
        <input type="text" id="last_name" name="last_name" value="<?php echo $userdata->last_name; ?>" maxlength="50" placeholder="only characters allowed " required class="form-control ">
    </div>
</div>

    <div class="row ">
    <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
    <small> Title<small class="red">*</small></small>
        <input type="text" id="title" name="title" value="<?php echo $userdata->title; ?>"  maxlength="50" placeholder="Primary Contact - Title " required class="form-control">
    </div>
    <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
    <small> Email <small class="red">*</small></small>
        <input type="email" id="email" name="email" value="<?php echo $userdata->email; ?>" maxlength="100" placeholder="Primary Contact - Email " required class="form-control" readonly>
    </div>
    </div>


 
<div class="row ">

       
    <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
    <small>Landline Business Phone <small class="red">*</small></small>    
        <input type="text" id="landline_phone" maxlength="12" value="<?php echo $userdata->landline_phone; ?>" name="landline_phone" placeholder="Landline Business Phone" required class="form-control phone" >
    </div>
    <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
    <small>Landline Business Phone Extension </small> 
        <input type="text" id="landline_extension"  maxlength="5" value="<?php echo $userdata->landline_extension; ?>" name="landline_extension" placeholder="Landline Business Phone Extension " class="form-control landline_extension">
    </div>
</div>






<div class="row ">

    <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
    <small>Cellular Phone (for txt messages) <small class="red">*</small></small> 
        <input type="text" id="mobile_phone" name="mobile_phone" maxlength="12" value="<?php echo $userdata->mobile_phone; ?>"  placeholder="Primary Contact - Landline Business Phone Extension" required class="form-control phone">
    </div>

    <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
    <small>Cellular Phone Carrier (for txt messages)</small> 
       



    <select id="mobile_carrier" name="mobile_carrier"  class="form-control">
        <option value="">Select</option>
        <option value="AT&T">AT&T</option>
        <option value="Verizon">Verizon</option>
        <option value="Sprint">Sprint</option>
        <option value="T-Mobile">T-Mobile</option>
        <option value="Cricket">Cricket</option>
        <option value="Other">Other</option>
    </select>
    </div>

  
</div>

<div style="margin-left:50px;" class="formstatus"></div>

</div>


                <div class="formstatus"></div>

<div class="row sk_headings">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <a type="button"  href="<?Php echo base_url()?>user/businessInfo" id="saveBtn1" class="btn_default pull-left" >Previous </a>

<button type="submit"id="saveBtn2" class="btn_default pull-right" >Next </button>
    </div>
</div>

            
     
    </form>
    </div>


<script>
$("#mobile_carrier").val('<?php echo $userdata->mobile_carrier; ?>');
</script>


<script>
    $(document).ready(function() {
    //  9 : numeric
    //  a : alphabetical
    //  * : alphanumeric
    $("#ein").inputmask("99-9999999");
    $("#ssn").inputmask("999-99-9999");
    $(".zip").inputmask("*****");
    $('.middlename').inputmask("a");


    $(".phone").inputmask("999-999-9999");

    $(".landline_extension").inputmask("99999");

   
});
</script>

<script type='text/javascript'>
     $(".mobile_carrier").val('');



     $('.txtOnly').keypress(function (e) {
			var regex = new RegExp("^[a-zA-Z]+$");
			var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
			if (regex.test(str)) {
				return true;
			}
			else
			{
			e.preventDefault();
			$('.error').show();
			$('.error').text('Please Enter Alphabate');
			return false;
			}
        });
        


        $(".mobile_carrier").val('');


 </script>