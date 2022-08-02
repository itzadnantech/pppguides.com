<div  style="max-width:800px; margin-top:60px;" class="container-fluid  formcon">
    <div class="row sk_headings">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <h2 >Terms and Conditions </h2>

        </div>

    </div>

    <div class="border" style="margin-top: 20px;">
    <div class="termsdetails" >
<?php echo $terms?>
 
    </div>
    <div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <form action="">
        <input type="checkbox" class="agreecheckbox"><b> I agree to terms & conditions.</b> 
        <br>
        <p>We may utilize e-Signature if necessary. You agree to consent to use electronic signatures and to receive disclosures and other information in an electronic form.   We are require d to provide you with certain.</p>
    </div>
    </div>
    </div>

    <div class="row sk_headings">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

<a href="<?Php echo base_url()?>user/thanks" id="saveBtn2" class="btn_default pull-right" >Next </a>
    </div>
</div></form>
</div>


<script>
    $('#saveBtn2').hide();
  $(document).ready(function () {

        $('.agreecheckbox').click(function () {
            if ($(this).prop('checked')) {
           // do what you need here     
          $('#saveBtn2').show();
        }
        else {
           // do what you need here         
           $('#saveBtn2').hide();
        }
           
        });
    });
</script>