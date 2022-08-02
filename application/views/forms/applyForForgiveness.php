<?php $this->load->view('User/sidebar');
   ?>
<?php $this->load->view('User/topmenu');
   ?>
<style type="text/css">
   .fixed_col{
       position:absolute;
       width:150px;
       left:70px;
   }
   .row_color1 input,.row_color1 select{
       background-color:rgba( 255, 217, 253,0.3);
   }
   .row_color2 input,.row_color2 select{
       background-color:rgba( 217, 255, 218,0.3);
   }
   .row_color3 input,.row_color3 select{
       background-color:rgba( 161, 169, 255,0.2);
   }
   .tablecontent{
       
       margin-left:150px;
   }
   
   .my-custom-scrollbar {
   position: relative;
   height: 200px;
   overflow: auto;
   max-width: 1000px;
   }
   .table-wrapper-scroll-y {
   display: block;
   }
   .zero_margin{
   padding: 0px;
   margin: 0px;
   }
     table {
     border-collapse: collapse;
     border-spacing: 0;
     table-layout: fixed;
     width: 4000px;
     border: 1px solid #ddd;
     }
     th, td {
     text-align: left;
     padding: 0px!important;
     text-align:center;
     }
     .btn{
     width: 200px;
     float: center;
     }
     th{
     background-color: #228bd2;
     color: white;
     }
</style>
<div class="container-fluid  formcon">
   <!-- <input type="button" id="FormFillbtn" value="Fill Form">-->
   <form method="post" action="<?php echo base_url()?>Form3508/forgivenessAction" id="form">
      <div class="row sk_headings">
         <h2>Apply For Forgiveness </h2>
         <a id="nextBtn" class="pull-right btn_default" href=""> Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
      </div>
      <h4 class="subheading1"  style="position: relative;top: 30px; width: 37%;">Schedule A / 3508 / Worksheet Questions</h4>
      <div class="border1" >
         <div class="row ">
            <?php
               if ($companydata->entity_type!="Self-Employed/Sole Proprietor" ) {
               	?>
            <script type="text/javascript">
               $(document).ready(function(){
               $('.ppp_loan').attr('disabled', true);
               });
               
            </script>
            <?php }
               ?>
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
               <small>Did you include any employee salaries in the computation of average monthly payroll in the PPP LOAN Application<small class="red"></small><br></small><br>
               <select name="ppp_loan"   required class="form-control ppp_loan disable_div"  id="ppp_loan">
                  <option value="">Select</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
               </select>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 zero_margin">
            </div>
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
               <small>Have you reduced the number of employees OR the average paid hours of your employees between 1/1/2020 and the end of the Forgiveness Period
               <small class="red"></small></small>
               <select name="employees_change" id="employees_change"  required class="form-control disable_div ForgivenessPeriod">
                  <option value="">Select</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
               </select>
            </div>
         </div>
         <div class=" disable_div hdForgiveness">
            <div class="row ">
               <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <small>Which Period would you like to use for your forgiveness
                  <small class="red"></small></small>
                  <select name="forgiveness_period" id="forgiveness_period" placeholder="Entity Type" required class="form-control disable_div for_per hdForgiveness">
                     <option value="">Select</option>
                     <?php
                        $disbursementDateObj=date("Y-m-d",strtotime($loandata->disbursement_date));
                        $payroll8_startObj=date("Y-m-d",strtotime($payrolldata->payroll8_start));
                        $payroll8_endObj=date("Y-m-d",strtotime($payrolldata->payroll8_end));
                        $payroll24_startObj=date("Y-m-d",strtotime($payrolldata->payroll24_start));
                        $payroll24_endObj=date("Y-m-d",strtotime($payrolldata->payroll24_end));
                        $loan8_endObj=date("Y-m-d",strtotime($payrolldata->loan8_end));
                        $loan24_endObj=date("Y-m-d",strtotime($payrolldata->loan24_end));
                        
                        
                        $Is_shortPaySchedule=$payrolldata->payroll_schedule=='BiWeekly' || $payrolldata->payroll_schedule=='Daily' || $payrolldata->payroll_schedule=='Weekly';
                        $Is_longPaySchedule=$payrolldata->payroll_schedule=='Monthly' || $payrolldata->payroll_schedule=='SemiMonthly' ||$payrolldata->payroll_schedule=='Qtrly'  || $payrolldata->payroll_schedule=='SemiAnnual'  || $payrolldata->payroll_schedule=='Other';
                        
                        
                        if($disbursementDateObj<'2020-06-04' && ($Is_shortPaySchedule)){
                        ?>
                     <option value="8 week Alternate( <?php echo $payroll8_startObj;?> To <?php echo $payroll8_endObj;?>)">
                        8 week Alternate<span>( <?php echo $payroll8_startObj;?> To <?php echo $payroll8_endObj;?>)</span>
                     </option>
                     <option value="8 week Covered( <?php echo $disbursementDateObj;?> To <?php echo $loan8_endObj;?>)">
                        8 week Covered<span>( <?php echo $disbursementDateObj;?> To <?php echo $loan8_endObj;?>)</span> 
                     </option>
                     <option value="24 week Alternate( <?php echo $payroll24_startObj;?> To <?php echo $payroll24_endObj;?>)">
                        24 week Alternate<span>( <?php echo $payroll24_startObj;?> To <?php echo $payroll24_endObj;?>)</span>
                     </option>
                     <?php
                        }
                        
                        else if($disbursementDateObj<'2020-06-04' && ($Is_longPaySchedule)){
                        ?>
                     <option value="8 week Covered( <?php echo $disbursementDateObj;?> To <?php echo $loan8_startObj;?>)">
                        8 week Covered<span>( <?php echo $disbursementDateObj;?> To <?php echo $loan8_endObj;?>)</span> 
                     </option>
                     <?php
                        }
                        
                        
                        
                        else if($disbursementDateObj>='2020-06-04' && $Is_shortPaySchedule){
                        ?>
                     <option value="24 week Alternate( <?php echo $payroll24_startObj;?> To <?php echo $payroll24_endObj;?>)">
                        24 week Alternate<span>( <?php echo $payroll24_startObj;?> To <?php echo $payroll24_endObj;?>)</span>
                     </option>
                     <?php
                        }
                        
                        
                        ?>
                     <option value="24 week Covered ( <?php echo $disbursementDateObj;?> To <?php echo $loan24_endObj;?>)">
                        24 week Covered <span>( <?php echo $disbursementDateObj;?> To <?php echo $loan24_endObj;?>)</span>
                     </option>
                  </select>
               </div>
               <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 zero_margin">
               </div>
               <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <small>What type of employees do you have<small class="red"></small></small>
                  <select name="employee_type" id="employee_type"  placeholder="Entity Type" required class="form-control disable_div hdForgiveness employee_type">
                     <option value="">Select</option>
                     <option value="Salaried Only">Salaried Only</option>
                     <option value="Hourly Only">Hourly Only</option>
                     <option value="Both Salaried and Hourly">Both Salaried and Hourly</option>
                  </select>
               </div>
            </div>
            <div class="row ">
               <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                  <small>
                  Ending what Date are you providing Forgiveness Period  Data.<small class="red"></small></small>
                  <br>
                  <input class="form-control" type="Date" name="forgiveness_period_date" id="forgiveness_period_date" value="<?php echo $scheduledata->forgiveness_period_date ;?>">
               </div>
            </div>
         </div>
      </div>
      <h4 class="subheading1" style="position: relative;top: 30px; width: 23%;">Safe Harbor FTE Reductions</h4>
      <div class="border1" >
         <div class="row ">
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
               <small>Are you exempt from FTE Reduction due to Safe Harbor 1.
               <small title="The Borrower is exempt from the reduction in loan forgiveness based on a reduction in FTE employees if the Borrower, in good faith, is able to document that it was unable to operate between February 15, 2020, and the end of the Covered Period at the same level of business activity as before February 15, 2020, due to compliance with requirements established or guidance issued between March 1, 2020 and December 31, 2020, by the Secretary of Health and Human Services, the Director of the Centers for Disease Control and Prevention, or the Occupational Safety and Health Administration, related to the maintenance of standards for sanitation, social distancing, or any other worker or customer safety requirement related to COVID-19."><b>?</b></small>
               </small>
               <select name="fte_harbor_1"  id="disable_div"  placeholder="Entity Type" required class="form-control fte_harbor_1 disable_div FTEHarbor hdForgiveness" >
                  <option value="">Select</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
               </select>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 zero_margin">
            </div>
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
               <small>Are you exempt from FTE Reduction due to Safe Harbor 2.
               <small title="The Borrower is exempt from the reduction in loan forgiveness based on a reduction in FTE employees if both of the following conditions are met: (a) the Borrower reduced its FTE employee levels in the period beginning February 15, 2020, and ending April 26, 2020; and (b) the Borrower then restored its FTE employee levels by not later than December 31, 2020 to its FTE employee levels in the Borrower’s pay period that included February 15, 2020."><b>?</b></small>
               </small>
               <select name="fte_harbor_2" id="fte_harbor_2" placeholder="Entity Type" required class="form-control disable_div FTEHarbor hdForgiveness">
                  <option value="">Select</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
               </select>
            </div>
         </div>
      </div>
      
      <!--
      <h4 class="subheading1" style="position: relative;top: 30px; width: 34%;">FTE Counts for Lookback/Reference Period</h4>
      <div class="border1" >
         <div class="row ">
            <div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
               <small> <b>Provide average FTE Count for chosen Lookback/Reference period - rounded to nearest tenth.</b><small class="red"></small></small>
            </div>
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
               <br>
               <small>(FTE Method 1 or 0.5) (one of 2/15/19 - 6/30/19  or   1/1/20 - 2/29/20) </small>
               <input type="text"  name="lookbackreference_periodfull" value="<?php //echo $scheduledata->lookbackreference_periodfull ; ?>" class="form-control double_float filter_field">
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 zero_margin">
            </div>
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
               <br>
               <small>(Fractions FTE Method) (one of 2/15/19 - 6/30/19  or   1/1/20 - 2/29/20) </small>
               <input type="text"  name="lookbackreference_periodfraction" value="<?php //echo $scheduledata->lookbackreference_periodfraction ; ?>" class="form-control double_float filter_field">
            </div>
         </div>
      </div>
      
      -->
      <h4 class="subheading1" >FTE calculate</h4>
      <div class="border1" >
          <!--
         <div class="row ">
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
               <small >How would you like to calculate FTE Count.
               <small class="red"></small></small>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 zero_margin">
            </div>
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
               <select name="fte_Count_method" id="fte_Count_method" required class="form-control disable_div hdForgiveness select_fte" >
                  <option value="">Select</option>
                  <option value="0.5">1 or 0.5 - Salaried or employees working >= 40 hrs count as 1 FTE and others below 40 hours count as 0.5
                  </option>
                  <option value="0.8">Fractions for everyone - Salaried employees count as 1 - and hourly employees e.g. 30 hours weekly average count as 0.8 </option>
                  <option value="Both">Both</option>
               </select>
            </div>
         </div>
         -->
         <div class="row ">
            <div id="fte_method_1" >
               <small style="color:#228bd2">FTE method 1 – provide employee counts for 1/0.5 method </small>
               <div class="disable_div hdForgiveness" >
                  <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7">
                     <ul>
                        <li>
                           <small>Any positions for which the Borrower made a good-faith, written offer to rehire an individual who was an employee on February 15, 2020 and the Borrower was unable to hire similarly qualified employees for unfilled positions on or before December 31, 2020;</small>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                     <input type="text"  name="ftemethod1" value="<?php echo $scheduledata->ftemethod1 ; ?>" class="form-control single_float filter_field">
                  </div>
                  <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7">
                     <ul>
                        <li>	<small> Any positions for which the Borrower made a good-faith, written offer to restore any reduction in hours, at the same salary or wages, during the chosen Forgiveness Period and the employee rejected the offer</small></li>
                     </ul>
                  </div>
                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                     <input type="text"  name="ftemethod2" value="<?php echo $scheduledata->ftemethod2 ; ?>" class="form-control single_float filter_field">
                  </div>
                  <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7">
                     <ul>
                        <li><small>Any employees who during the chosen Forgiveness Period (a) were fired for cause, (b) voluntarily resigned, or (c) voluntarily requested and received a reduction of their hours</small></li>
                     </ul>
                  </div>
                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                     <input type="text"  name="ftemethod3" value="<?php echo $scheduledata->ftemethod3 ; ?>" class="form-control single_float filter_field">
                  </div>
               </div>
            </div>
            <div id="fte_method_2">
               <div class="disable_div hdForgiveness" >
                  <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7">
                     <small style="color:#228bd2">FTE method 2 – provide employee counts for Fraction method</small>
                     <ul>
                        <li>
                           <small>Any positions for which the Borrower made a good-faith, written offer to rehire an individual who was an employee on February 15, 2020 and the Borrower was unable to hire similarly qualified employees for unfilled positions on or before December 31, 2020;</small>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                     <br>
                     <input type="text"  name="ftemethod4" value="<?php echo $scheduledata->ftemethod4 ; ?>" class="form-control single_float filter_field">
                  </div>
                  <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7">
                     <ul>
                        <li>	<small> Any positions for which the Borrower made a good-faith, written offer to restore any reduction in hours, at the same salary or wages, during the chosen Forgiveness Period and the employee rejected the offer</small></li>
                     </ul>
                  </div>
                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                     <input type="text"  name="ftemethod5" value="<?php echo $scheduledata->ftemethod5 ; ?>" class="form-control single_float filter_field">
                  </div>
                  <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7">
                     <ul>
                        <li><small>Any employees who during the chosen Forgiveness Period (a) were fired for cause, (b) voluntarily resigned, or (c) voluntarily requested and received a reduction of their hours</small></li>
                     </ul>
                  </div>
                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                     <input type="text"  name="ftemethod6" value="<?php echo $scheduledata->ftemethod6 ; ?>" class="form-control single_float filter_field">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <h4 class="subheading1" >Table</h4>
      <div class="border1" >
         <small>* Hover on column titles to see help.</small>
         <div class="tablecontent" style="overflow-x:auto;">
            <table class="table table-bordered disable_div hdForgiveness " id="apply_forgiveness" >
               <tr>
                  <th class="fixed_col" style="height: 60px;" title="Full name of the employee">Employee Name</th>
                  <th style="width:  80px;" title="Employee's Last4 digits of Social Security # ">Last 4 SSN</th>
                  <th style="width:  150px;" title="Date on which employee was hired">Hire Date</th>
                  <th style="width:  150px;" title="Termination / Separatation Date (if no longer active)">End Date</th>
                  <th style="width:  120px;" title="Is Employee 'Salaried' or 'Hourly'">Sal/Hrly</th>
                  <th style="width:  120px;" title="Answer YES or NO - Did this employee receive wages in 2019 that were equal or more than 100K on an annualized basis">Paid 100K+ in 2019</th>
                  <th style="width:  95px;" title="Hourly Rate as of Today (CURRENT) or 12/31/20 whichever is earlier
                     Leave blank if employee no longer employed
                     (for salaried employee - take annual salary, divide it by 52, and then again divide by 40)">
                     Current Hourly Rate
                  </th>
                  <th style="width:  95px;" title="1 WEEK that includes 2/15/2020
                     Total Hours Paid this 1 week 
                     Leave blank if employee not employed on 2/15/2020
                     (use 40 hrs/week for Salaried)">
                     Hrs paid week of 2/15/20
                  </th>
                  <th style="width:  95px;" title="1 WEEK that includes 2/15/2020
                     Total Hours Paid this 1 week 
                     Leave blank if employee not employed on 2/15/2020
                     (use 40 hrs/week for Salaried)">
                     $ paid week of 2/15/20
                  </th>
                  <th style="width:  95px;" title="">
                     Hrs Paid Lookback 2019
                  </th>
                  <th style="width:  95px;" title="">
                     $ Paid Lookback 2019
                  </th>
                  <th style="width:  95px;" title="Lookback / Reference Period 
                     Total Hours Paid 
                     Leave blank if employee not employed 
                     (use 40 hrs/week for Salaried)
                     (2/15/19-6/30/19) 
                     OR 
                     (1/1/20-2/29/20)">
                     Hrs Paid Lookback 2020
                  </th>
                  <th style="width:  95px;" title="Lookback / Reference Period 
                     Total Gross Pay 
                     Leave blank if employee not employed 
                     (2/15/19-6/30/19)  OR (1/1/20-2/29/20)">
                     $ Paid Lookback 2020
                  </th>
                  <th style="width:  95px;" title="Quarter 1'2020 
                     Total Hours Paid 
                     Leave blank if employee not employed 
                     (use 40 hrs/week for Salaried)
                     (1/1/20-3/31/20)">
                     Hrs Paid Q1 2020
                  </th>
                  <th style="width:  95px;" title="Quarter 1'2020 
                     Total Gross Pay 
                     Leave blank if employee not employed 
                     (1/1/20-3/31/20)">
                     $ Paid Q1 2020
                  </th>
                  <th style="width:  95px;" title="Safe Harbor 2 
                     Total Hours Paid 
                     Leave blank if employee not employed 
                     (use 40 hrs/week for Salaried)
                     (2/15/20-4/26/20)">
                     Hrs Paid Safe Harbor2
                  </th>
                  <th style="width:  95px;" title="Safe Harbor 2 
                     Total Gross Pay 
                     Leave blank if employee not employed 
                     (2/15/20-4/26/20)">
                     $ Paid Safe Harbor 2
                  </th>
                  <th style="width:  95px;" title="Forgiveness Period 
                     Total Hours Paid 
                     (use 40 hrs/week for Salaried)
                     (Show Dates) - (8or24 Covered/Alternate ForgPeriod selected in above question)">
                     Hrs Paid Forgiveness Period
                  </th>
                  <th style="width:  95px;" title="Forgiveness Period  
                     Total Gross Pay 
                     (Show Dates) - (8or24 Covered/Alternate ForgPeriod selected in above question)">
                     $ Paid Forgiveness Period
                  </th>
                  <th style="width:  95px;" title="Hrs/Pay from Most Recent Payroll, not to exceed 12/31/2020">
                     Hrs Paid - Current Payroll
                  </th>
                  <th style="width:  95px;" title="Hrs/Pay from Most Recent Payroll, not to exceed 12/31/2020">
                     $ Paid - Current Payroll
                  </th>
               </tr>
               <?php
                  $color_row=1;
                  $row=count($schemployeesdata);
                  
                  for($i=0;$i<$row;$i++){
                  if( $schemployeesdata[$i]->cust_id=$this->session->userdata('cust_id')){
                  ?>
               <tr class="row_color<?php echo $color_row?>">
                  <td ><input type="text" name="empFname[]" value="<?php echo $schemployeesdata[$i]->empFname;?>" placeholder=""  class="form-control fixed_col" ></td>
                  <td ><input type="text" name="empSSN4[]" value="<?php echo $schemployeesdata[$i]->empSSN4;?>" placeholder=""  class="form-control four_digit"></td>
                  <td ><input type="Date" name="empHireDate[]" value="<?php echo $schemployeesdata[$i]->empHireDate;?>" placeholder=""  class="form-control"></td>
                  <td ><input type="date" name="termination_date[]" value="<?php echo $schemployeesdata[$i]->termination_date;?>" placeholder=""  class="form-control"></td>
                  <td >
                     <select name="empSalHrlyType[]" id="empSalHrlyType<?php echo $i?>" class="form-control" >
                        <option value="">Select</option>
                        <option value="Salaried">Salaried</option>
                        <option value="Hourly">Hourly</option>
                     </select>
                  </td>
                  <script>
                     $("#empSalHrlyType<?php echo $i?>").val('<?php echo $schemployeesdata[$i]->empSalHrlyType;?>');
                  </script>
                  <td >
                     <select name="emp2019_100Kplus[]" id="emp2019_100Kplus<?php echo $i?>" placeholder=""  class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="not employed in 2019">Not employed in 2019</option>
                     </select>
                  </td>
                  <script>
                     $("#emp2019_100Kplus<?php echo $i?>").val('<?php echo $schemployeesdata[$i]->emp2019_100Kplus;?>');
                  </script>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empSalRateCurrent[]" value="<?php echo $schemployeesdata[$i]->empSalRateCurrent;?>" placeholder=""  class="form-control quantitys onemillion">
                     </div>
                  </td>
                  <td >
                     <input type="text" name="empHrsFeb15[]" value="<?php echo $schemployeesdata[$i]->empHrsFeb15;?>" placeholder=""  class="form-control quantity quantitys">
                  </td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayFeb15[]" value="<?php echo $schemployeesdata[$i]->empPayFeb15;?>" placeholder=""  class="form-control quantitys onemillion">
                     </div>
                  </td>
                  <td ><input type="text" name="empHrsLookbackPer[]" value="<?php echo $schemployeesdata[$i]->empHrsLookbackPer;?>" placeholder=""  class="form-control quantitys"></td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayLookbackPer[]" value="<?php echo $schemployeesdata[$i]->empPayLookbackPer;?>" placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <td ><input type="text" name="empHrsLookbackPer2[]" value="<?php echo $schemployeesdata[$i]->empHrsLookbackPer2;?>" placeholder=""  class="form-control quantitys"></td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayLookbackPer2[]" value="<?php echo $schemployeesdata[$i]->empPayLookbackPer2;?>" placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <td ><input type="text" name="empHrsQ120[]" value="<?php echo $schemployeesdata[$i]->empHrsQ120;?>" placeholder=""  class="form-control double_float quantity quantitys"></td>
                  <td>
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayQ120[]" value="<?php echo $schemployeesdata[$i]->empPayQ120;?>" placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <td ><input type="text" name="empHrsSafeHarbor2[]" value="<?php echo $schemployeesdata[$i]->empHrsSafeHarbor2;?>" placeholder=""  class="form-control double_float quantity quantitys"></td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPaySafeHarbor2[]" value="<?php echo $schemployeesdata[$i]->empPaySafeHarbor2;?>" placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <?php if (strpos($scheduledata->forgiveness_period, '8 week') !== false) {?>
                  <td ><input type="text" name="empHrsForgPer[]" value="<?php echo $schemployeesdata[$i]->empHrsForgPer;?>" placeholder=""  class="form-control double_float quantity quantitys"></td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayForgPer[]" value="<?php echo $schemployeesdata[$i]->empPayForgPer;?>" placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <?php } 
                     else { ?>
                  <td ><input type="text" name="empHrsForgPer24[]" value="<?php echo $schemployeesdata[$i]->empHrsForgPer24;?>" placeholder=""  class="form-control double_float quantity quantitys"></td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayForgPer24[]" value="<?php echo $schemployeesdata[$i]->empPayForgPer24;?>" placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <?php } ?>
                  <td ><input type="text" name="empHrsCurrentPer[]" value="<?php echo $schemployeesdata[$i]->empHrsCurrentPer;?>"  placeholder=""  class="form-control double_float quantitys "></td>
                  <td>
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>
                        <input type="text" name="empPayCurrentPer[]" value="<?php echo $schemployeesdata[$i]->empPayCurrentPer;?>"  placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <?php 
                  if($i!=0){ ?>
                  <td><button type="button" title="Remove row" style="border:none;background:none;" class="removerow"><i style="color:red; padding-top:8px" class="fa fa-times"></i></button></td>
                   <?php 
                  }
                  ?>
               </tr>
               <?php	}	
                      
                      $color_row++;
                      if($color_row>=4){
                          $color_row=1;
                      }
                  }
                  ?>
               <?php
                  $row=count($schemployeesdata);
                  $totalrow=0;
                  $countrow=0;
                  	for($i=0;$i<$row;$i++){
                  if( $schemployeesdata[$i]->cust_id=$this->session->userdata('cust_id')){
                      $totalrow=$totalrow+1;
                  }}
                  if($totalrow<11)
                  {
                      $countrow=10-$totalrow;
                  }
                  else{
                      $countrow=1;
                  }
                  for($i=0;$i< $countrow;$i++){
                  
                  
                  ?>
               <tr class="copy_paste_row">
                  <td ><input type="text" name="empFname[]"  placeholder=""  class="form-control fixed_col" ></td>
                  <td ><input type="text" name="empSSN4[]"  placeholder=""  class="form-control four_digit"></td>
                  <td ><input type="Date" name="empHireDate[]"  placeholder=""  class="form-control"></td>
                  <td ><input type="date" name="termination_date[]"  placeholder=""  class="form-control"></td>
                  <td >
                     <select name="empSalHrlyType[]"  placeholder=""  class="form-control empSalHrlyType "  >
                        <option value="">Select</option>
                        <option value="Salaried">Salaried</option>
                        <option value="Hourly">Hourly</option>
                     </select>
                  </td>
                  <td >
                     <select name="emp2019_100Kplus[]"  placeholder=""  class="form-control" >
                        <option value="yes">Yes</option>
                        <option value="no">No
                        <option value="not employed in 2019">Not employed in 2019</option>
                     </select>
                  </td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empSalRateCurrent[]"  placeholder=""  class="form-control quantitys onemillion">
                     </div>
                  </td>
                  <td >
                     <input type="text" name="empHrsFeb15[]"  placeholder=""  class="form-control quantity quantitys">
                  </td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayFeb15[]"  placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <td ><input type="text" name="empHrsLookbackPer[]"  placeholder=""  class="form-control quantity quantitys"></td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayLookbackPer[]"  placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <td ><input type="text" name="empHrsLookbackPer2[]"  placeholder=""  class="form-control quantity quantitys"></td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayLookbackPer2[]"  placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <td ><input type="text" name="empHrsQ120[]"  placeholder=""  class="form-control double_float"></td>
                  <td>
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayQ120[]"  placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <td ><input type="text" name="empHrsSafeHarbor2[]"  placeholder=""  class="form-control double_float"></td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPaySafeHarbor2[]"  placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <?php if (strpos($scheduledata->forgiveness_period, '8 week') !== false) {?>
                  <td ><input type="text" name="empHrsForgPer[]"  placeholder="" value="0.00"  class="form-control double_float"></td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayForgPer[]" placeholder="" value="0.00"  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <?php } 
                     else { ?>
                  <td ><input type="text" name="empHrsForgPer24[]" value="0.00"  placeholder=""  class="form-control double_float"></td>
                  <td >
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayForgPer24[]" value="0.00" placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
                  <?php } ?>
                  <td ><input type="text" name="empHrsCurrentPer[]" value="0.00"  placeholder=""  class="form-control double_float"></td>
                  <td>
                     <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                        <input type="text" name="empPayCurrentPer[]"  placeholder=""  class="form-control  quantitys onemillion">
                     </div>
                  </td>
               </tr>
               <?php		}
                  ?>
            </table>
         </div>
            <button type="button" title="Add new row" class="forgivenessrow addForgivnessRow"><i style="color:green;padding-top:3px;" class="fa fa-plus"></i></button>
         <br>
         <br>
         <div class="row">
            <div class="col-md-3">
               <button type="button" id="uploadbtn" class="btn btn-success">Upload</button>
            </div>
            <div class="col-md-3">
               <button class="btn btn-primary" id="savebtn" type="submit">Save</button>
            </div>
            <div class="col-md-3">
               <button class="btn btn-info"  type="button" id="btnModalshow" class="">Calculate</button>
            </div>
            <div class="col-md-3">
               <a class="btn btn-warning" id="showtable">3508 PDF</a>
            </div>
         </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
   </form>
</div>
<?php
if(isset($period_name)){ ?>
<div class="modal" id="myModal">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Select Dates</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <?php
            $week=0;
            if (strpos($period_name,'8') !== false) {
                $week=8;
            }
            else{
                $week=24;
            }
         ?>
         <div class="modal-body">
            <form id="DatesForm" method="post">
               <div class="row">
                  <div class="col-md-6">
                     <label>Begin <?php echo $period_name;?></label>
                     <input type="text" name="Alt_Period_Begin_<?php echo $week;?>" placeholder="YYYY-MM-DD" readonly value="<?php echo $datefrom;?>" class="form-control datepicker" required />
                  </div>
                  <div class="col-md-6">
                     <label>End <?php echo $period_name;?></label>
                     <input type="text" name="Alt_Period_End_<?php echo $week;?>" placeholder="YYYY-MM-DD" readonly value="<?php echo $dateto;?>" class="form-control datepicker" required />
                  </div>
               </div>
               
               
               <input type="submit" style="display:none;" id="hiddenSubmit" />
            </form>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <img src="<?php echo base_url('assets/excelimport/loader.gif'); ?>"  id="clacLoader" style="width:10%;display:none;" />&nbsp;
            <button type="button" class="btn btn-primary" id="btnCalculate">Start Process</button>
         </div>
      </div>
   </div>
</div>
<?php
}
?>



<script type="text/javascript">
    $(document).ready(function(){
    function checkData(){
        if(<?php echo $row?>>0){
            return true;
        }
        else{
         swal("Fill Data", "Please fill employee data to access this feature");
         return false;
        }
    } 
   
     $("#showtable").click(function(){
         if(checkData()){
           window.location.href="<?php echo base_url()?>Form3508/show3508table";
         }
     })
     $("#btnModalshow").click(function(){
           $("#myModal").modal({
             backdrop:'static',
             keyboard:false
           });
     })
   
     $("#btnCalculate").click(function(e){
   
       if(!$("#DatesForm")[0].checkValidity())
     {
       $("#hiddenSubmit").trigger("click");
     }else{
     
       var Alt_Period_Begin_8 = $("input[name=Alt_Period_Begin_8]").val();
       var Alt_Period_End_8 = $("input[name=Alt_Period_End_8]").val();
       var Alt_Period_Begin_24 = $("input[name=Alt_Period_Begin_24]").val();
       var Alt_Period_End_24 = $("input[name=Alt_Period_End_24]").val();
   
       if(Alt_Period_Begin_8 > Alt_Period_End_8 || Alt_Period_Begin_24 > Alt_Period_End_24)
       {
         alert("Invalid Dates Selection, Please Check and Reselect dates!");
       }else{
        // alert(Alt_Period_Begin_8);
        // alert(Alt_Period_Begin_24);
       
   
       $("#clacLoader").show();
   
       $.ajax({
         type:'post',
         url:"<?php echo base_url('output'); ?>",
         data:$("#DatesForm").serialize()
       }).done(function(resp){
        //alert(resp);
         if(resp.code == 200)
         {
             $("#clacLoader").hide();
         
            $('#myModal').modal('toggle');
           // swal("Success", "Data saved in database Successfully", "success");
            swal("Success", "Data saved in database Successfully", "success").then(function(){ 
               location.reload();
               }
            );
               //    location.reload();
         }
         else
         {
           $("#clacLoader").hide();
           alert("Somthing Went Wrong!");
         }
         console.log(resp);
   
       }).fail(function(resp){
   
         console.log(resp);
   
       });
     }
   
     }
   
     });
    
   });

   $(document).ready(function(){
       $("#uploadbtn").click(function(e){
           e.preventDefault();
           swal({
                title: "Delete all previous data?",
                text: "Once deleted, you will not be able to recover employee data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                      $.ajax({
                  	    type: "POST",
                  	    url:"<?php echo base_url("form3508/clearForgivenessData")?>",
                  	    dataType: 'text',
                  	    async: false,
                  	    success: function(obj) {
                  	        window.location.href = "<?php echo base_url();?>user/importExcel";
                  	    }
                  	});
                } 
              });
          
   });
          $("#ppp_loan,#employees_change").change(function(){
              var selectedopt = $(this).children("option:selected").val();
              if (selectedopt=="No") {
                  $('select').attr('disabled', 'disabled');
                  $('input').attr('disabled', 'disabled');
                  $('#ppp_loan').removeAttr('disabled');
                  $('#employees_change').removeAttr('disabled');
                  alert("	Based on your answer, and your entity type, you do not need to fill Schedule A or Worksheet Below, as you qualify to submit Forgiveness Form 3508EZ");
                  
                  //alert("Based on your answer, you do not need to fill ????? Schedule A or Worksheet Below (SEE 3508 page 3 - Full-Time Equivalency (FTE) Reduction Calculation - 1st criteria above SafeHarbors)");
                 
              }
              else{
                  $('select').removeAttr('disabled', 'disabled');
                  $('input').removeAttr('disabled', 'disabled');
              }
          });
          
          $("select.FTEHarbor").change(function(){
              var selectedopt = $(this).children("option:selected").val();
              if (selectedopt=="Yes") {
              alert("No need to do FTE Reduction Calculation");
              }
          });
        
        /*   
      $("select.select_fte").change(function(){
      var selectedopt = $(this).children("option:selected").val();
          changeMenu(selectedopt);
      });
      
     
      function changeMenu(selectedopt){
        if (selectedopt=="Both") {
        document.getElementById("fte_method_2").style.display = "block";
        document.getElementById("fte_method_1").style.display = "block";
        }
        else if (selectedopt=="0.8") {
            document.getElementById("fte_method_2").style.display = "block";
            document.getElementById("fte_method_1").style.display = "none";
        }
        else if (selectedopt=="0.5") {
            document.getElementById("fte_method_2").style.display = "none";
            document.getElementById("fte_method_1").style.display = "block";
        }
    }*/


    $("#ppp_loan").val('<?php echo $scheduledata->ppp_loan; ?>');
    $("#employees_change").val('<?php echo $scheduledata->employees_change?>');
    $(".fte_harbor_1").val('<?php echo $scheduledata->fte_harbor_1; ?>');
    $(".for_per").val('<?php echo $scheduledata->forgiveness_period;?>');
    $("#fte_harbor_2").val('<?php echo $scheduledata->fte_harbor_2; ?>');
    $("#employee_type").val('<?php echo $scheduledata->employee_type;?>');
    
    //$("#fte_Count_method").val('<?php //echo $scheduledata->fte_Count_method;?>');
    //changeMenu('<?php //echo $scheduledata->fte_Count_method;?>');

});
</script>