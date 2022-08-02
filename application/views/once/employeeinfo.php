<div style="max-width:800px; margin-top:60px;" class="container-fluid  formcon ">
    <div class="row sk_headings">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <h2>Personal Information </h2>

        </div>

    </div>

    <small class="subheading ">Please enter the correct information.</small>

    <form method="post" action="<?php echo base_url()?>user/employeeInfoAction" id="myForm">
    <h4 class="subheading1" style="width: 32%; top: 23px;">PPP LOAN Information</h4>
        <div class="border">

           

            <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Employees at Time of Loan Application</small>
                    <input type="number" step ="0.01" id="loantime_employees" name="loantime_employees" placeholder="Employees at Time of Loan Application " value="<?php echo $loandata->loantime_employees; ?>" required class="form-control">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Employees at Time of Forgiveness Application (today)</small>
                    <input type="number" step ="0.01" id="forgivenesstime_employees" name="forgivenesstime_employees" maxlength="100" placeholder="Employees today / at the time of forgiveness application" value="<?php echo $loandata->forgivenesstime_employees; ?>" required class="form-control">
                </div>
            </div>




            <div style="margin-left:50px;" class="formstatus"></div>
        </div>

        <div class="row sk_headings">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <a type="button" href="<?Php echo base_url()?>user/personalInfo" id="saveBtn1" class="btn_default pull-left">Previous </a>

                <button type="submit" id="saveBtn2" class="btn_default pull-right">Submit </button>
            </div>
        </div>




    </form>
</div>