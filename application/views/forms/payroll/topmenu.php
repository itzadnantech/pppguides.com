<?php $this->load->view('User/sidebar');
?>
<?php $this->load->view('User/topmenu');
?>
 
<div class="container-fluid  formcon">
    <div class="row sk_headings">
        <a id="prevBtn" class="btn_default" href="<?php echo base_url()?>user/nonPayroll"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous</a>
        <h2>Payroll Costs – Forgiveness Period</h2> 
    </div>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1">
       <i class="fa fa-bars" aria-hidden="true"></i>
      </button>
    <div class="row collapse navbar-collapse" id="collapse-1">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <ul class="nav nav-tabs tabhover">
                <li><a href="<?php echo base_url()?>user/payrollSchedule" class="se1 <?php if($paymenu==0){echo "active";}?>" id="genralbtn">Payroll Schedule/Periods  <i class="fa <?php echo $statusdata->payrollschedule;?>" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo base_url()?>user/payrollCost" class="se1 <?php if($paymenu==1){echo "active";}?>" id="parollbtn">Payroll Cost  <i class="fa <?php echo $statusdata->payrollcost;?>" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo base_url()?>user/payrollTaxes" class="se1 <?php if($paymenu==2){echo "active";}?>" id="statebtn">State/Local Taxes  <i class="fa <?php echo $statusdata->payrolltaxes;?>" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo base_url()?>user/payrollBenefits" class="se1 <?php if($paymenu==3){echo "active";}?>" id="benefitsbtn">Benefits  <i class="fa <?php echo $statusdata->payrollbenefits;?>" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo base_url()?>user/payrollInfo" class="se1 <?php if($paymenu==4){echo "active";}?>" id="forgiveness">Forgiveness Related Information  <i class="fa <?php echo $statusdata->payrollinfo;?>" aria-hidden="true"></i></a></li>
   
            </ul>
            
        </div>
    </div>