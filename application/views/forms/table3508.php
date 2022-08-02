<?php //$this->load->view('User/sidebar');
?>
<?php //$this->load->view('User/topmenu');
?>
<style type="text/css">
 .col-md-2{
     border:1px solid black;
     padding: 20px 0px;
 }
</style>
<div style="padding-left:100px;" class="container-fluid  formcon">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2"style="background:#bad9f5"><b>FTE type 1/0.5<br>2020 Lookback (a)</b></div>
        <div class="col-md-2" style="background:#bad9f5"><b>FTE type 1/0.5<br>2019 Lookback (c)</b></div>
        <div class="col-md-2"style="background:#bad9f5"><b>FTE type Fractions<br>2020 Lookback (b)</b></div>
        <div class="col-md-2"style="background:#bad9f5"><b>FTE type Fractions<br>2019 Lookback (d)</b></div>
    </div>
    <div class="row">
        <div class="col-md-2">Business Legal Name (“Borrower”)</div>
        <div class="col-md-2"><?php echo $companydata->business_name?></div>
        <div class="col-md-2"><?php echo $companydata->business_name?></div>
        <div class="col-md-2"><?php echo $companydata->business_name?></div>
        <div class="col-md-2"><?php echo $companydata->business_name?></div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2">DBA or Tradename, if applicable</div>
        <div class="col-md-2"><?php echo $companydata->trade_name?></div>
        <div class="col-md-2"><?php echo $companydata->trade_name?></div>
        <div class="col-md-2"><?php echo $companydata->trade_name?></div>
        <div class="col-md-2"><?php echo $companydata->trade_name?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Business Address</div>
        <div class="col-md-2"><?php echo $companydata->street_address1?>, <?php echo $companydata->street_address2?>, <?php echo $companydata->city?>, <?php echo $companydata->zip?>, <?php echo $companydata->state?></div>
        <div class="col-md-2"><?php echo $companydata->street_address1?>, <?php echo $companydata->street_address2?>, <?php echo $companydata->city?>, <?php echo $companydata->zip?>, <?php echo $companydata->state?></div>
        <div class="col-md-2"><?php echo $companydata->street_address1?>, <?php echo $companydata->street_address2?>, <?php echo $companydata->city?>, <?php echo $companydata->zip?>, <?php echo $companydata->state?></div>
        <div class="col-md-2"><?php echo $companydata->street_address1?>, <?php echo $companydata->street_address2?>, <?php echo $companydata->city?>, <?php echo $companydata->zip?>, <?php echo $companydata->state?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Business TIN (EIN, SSN)</div>
        <div class="col-md-2"><?php echo $companydata->ein?> <?php echo $companydata->ssn?></div>
        <div class="col-md-2"><?php echo $companydata->ein?> <?php echo $companydata->ssn?></div>
        <div class="col-md-2"><?php echo $companydata->ein?> <?php echo $companydata->ssn?></div>
        <div class="col-md-2"><?php echo $companydata->ein?> <?php echo $companydata->ssn?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Business Phone</div>
        <div class="col-md-2"><?php echo $userdata->landline_extension?>-<?php echo $userdata->landline_phone?></div>
        <div class="col-md-2"><?php echo $userdata->landline_extension?>-<?php echo $userdata->landline_phone?></div>
        <div class="col-md-2"><?php echo $userdata->landline_extension?>-<?php echo $userdata->landline_phone?></div>
        <div class="col-md-2"><?php echo $userdata->landline_extension?>-<?php echo $userdata->landline_phone?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Primary Contact</div>
        <div class="col-md-2"><?php echo $userdata->first_name;?> <?php echo $userdata->last_name?></div>
        <div class="col-md-2"><?php echo $userdata->first_name;?> <?php echo $userdata->last_name?></div>
        <div class="col-md-2"><?php echo $userdata->first_name;?> <?php echo $userdata->last_name?></div>
        <div class="col-md-2"><?php echo $userdata->first_name;?> <?php echo $userdata->last_name?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">E-mail Address</div>
        <div class="col-md-2"><?php echo $userdata->email?></div>
        <div class="col-md-2"><?php echo $userdata->email?></div>
        <div class="col-md-2"><?php echo $userdata->email?></div>
        <div class="col-md-2"><?php echo $userdata->email?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">SBA PPP Loan Number:</div>
        <div class="col-md-2"><?php echo $loandata->sba?></div>
        <div class="col-md-2"><?php echo $loandata->sba?></div>
        <div class="col-md-2"><?php echo $loandata->sba?></div>
        <div class="col-md-2"><?php echo $loandata->sba?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Lender PPP Loan Number</div>
        <div class="col-md-2"><?php echo $loandata->loan_number?></div>
        <div class="col-md-2"><?php echo $loandata->loan_number?></div>
        <div class="col-md-2"><?php echo $loandata->loan_number?></div>
        <div class="col-md-2"><?php echo $loandata->loan_number?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">PPP Loan Amount:</div>
        <div class="col-md-2"><?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?></div>
        <div class="col-md-2"><?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?></div>
        <div class="col-md-2"><?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?></div>
        <div class="col-md-2"><?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">PPP Loan Disbursement Date</div>
        <div class="col-md-2"><?php echo $loandata->disbursement_date?></div>
        <div class="col-md-2"><?php echo $loandata->disbursement_date?></div>
        <div class="col-md-2"><?php echo $loandata->disbursement_date?></div>
        <div class="col-md-2"><?php echo $loandata->disbursement_date?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Employees at Time of Loan Application:</div>
        <div class="col-md-2"><?php echo $loandata->loantime_employees?></div>
        <div class="col-md-2"><?php echo $loandata->loantime_employees?></div>
        <div class="col-md-2"><?php echo $loandata->loantime_employees?></div>
        <div class="col-md-2"><?php echo $loandata->loantime_employees?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Employees at Time of Forgiveness Application</div>
        <div class="col-md-2"><?php echo $loandata->forgivenesstime_employees?></div>
        <div class="col-md-2"><?php echo $loandata->forgivenesstime_employees?></div>
        <div class="col-md-2"><?php echo $loandata->forgivenesstime_employees?></div>
        <div class="col-md-2"><?php echo $loandata->forgivenesstime_employees?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">EIDL Advance Amount:</div>
        <div class="col-md-2"><?php  echo number_format($loandata->eidl_grant_amount, 2, '.', ','); ?></div>
        <div class="col-md-2"><?php  echo number_format($loandata->eidl_grant_amount, 2, '.', ','); ?></div>
        <div class="col-md-2"><?php  echo number_format($loandata->eidl_grant_amount, 2, '.', ','); ?></div>
        <div class="col-md-2"><?php  echo number_format($loandata->eidl_grant_amount, 2, '.', ','); ?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">EIDL Application Number</div>
        <div class="col-md-2"><?php echo $loandata->eidl_grant_app_num?></div>
        <div class="col-md-2"><?php echo $loandata->eidl_grant_app_num?></div>
        <div class="col-md-2"><?php echo $loandata->eidl_grant_app_num?></div>
        <div class="col-md-2"><?php echo $loandata->eidl_grant_app_num?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Payroll Schedule</div>
        <div class="col-md-2"><?php echo $payrolldata->payroll_schedule?></div>
        <div class="col-md-2"><?php echo $payrolldata->payroll_schedule?></div>
        <div class="col-md-2"><?php echo $payrolldata->payroll_schedule?></div>
        <div class="col-md-2"><?php echo $payrolldata->payroll_schedule?></div>
    </div>
    <?php 
        $forgPeriod=0;
		if (strpos($scheduledata->forgiveness_period, '8 week') !== false) {
			$forgPeriod=8;
		}
		else{
			$forgPeriod=24;
		}
    ?>
    <div class="row">
        <div class="col-md-2">Covered Period</div>
        <?php 
         $coveredPeriod="";
         $alternatePeriod="";
            if($forgPeriod==8){
                ?>
                    <div class="col-md-2"><?php echo  $coveredPeriod=date("m-d-Y", strtotime($loandata->disbursement_date)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->loan8_end));?>;?> </div>
        
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($loandata->disbursement_date)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->loan8_end));?>;?> </div>
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($loandata->disbursement_date)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->loan8_end));?>;?> </div>
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($loandata->disbursement_date)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->loan8_end));?>;?> </div>
   
                <?php
            }else {
                ?>
                    <div class="col-md-2"><?php echo $coveredPeriod=date("m-d-Y", strtotime($loandata->disbursement_date)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->loan24_end));?> </div>
        
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($loandata->disbursement_date)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->loan24_end));?> </div>
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($loandata->disbursement_date)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->loan24_end));?> </div>
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($loandata->disbursement_date)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->loan24_end));?> </div>
   
                <?php
            }
        ?>
    </div>
    
    <div class="row">
        <div class="col-md-2">Alternative Payroll Covered Period, if applicable</div>
        <?php 
            if($forgPeriod==8){
                ?>
                    <div class="col-md-2"><?php echo $alternatePeriod=date("m-d-Y", strtotime($payrolldata->payroll8_start)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->payroll8_end));?></div>
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($payrolldata->payroll8_start)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->payroll8_end));?></div>
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($payrolldata->payroll8_start)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->payroll8_end));?></div>
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($payrolldata->payroll8_start)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->payroll8_end));?></div>
                <?php
            }else {
                ?>
                    <div class="col-md-2"><?php echo $alternatePeriod=date("m-d-Y", strtotime($payrolldata->payroll24_start)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->payroll24_end));?></div>
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($payrolldata->payroll24_start)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->payroll24_end));?></div>
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($payrolldata->payroll24_start)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->payroll24_end));?></div>
                    <div class="col-md-2"><?php echo date("m-d-Y", strtotime($payrolldata->payroll24_start)). '<b> to </b>' .date("m-d-Y", strtotime($payrolldata->payroll24_end));?></div>
                <?php
            }
        ?>
        
    </div>
    
    <div class="row">
        <div class="col-md-2">If Borrower (together with affiliates, if applicable) received PPP loans in excess of $2 million, check here:</div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 1. Payroll Costs (enter the amount from PPP Schedule A, line 10):</div>
        <div class="col-md-2"><?php echo $fapp_line1=$SchA_Line10?></div>
        <div class="col-md-2"><?php echo $SchA_Line10?></div>
        <div class="col-md-2"><?php echo $SchA_Line10?></div>
        <div class="col-md-2"><?php echo $SchA_Line10?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 2. Business Mortgage Interest Payments</div>
        <div class="col-md-2"><?php echo $fapp_line2=$sum_mortgage?></div>
        <div class="col-md-2"><?php echo $sum_mortgage?></div>
        <div class="col-md-2"><?php echo $sum_mortgage?></div>
        <div class="col-md-2"><?php echo $sum_mortgage?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 3. Business Rent or Lease Payments</div>
        <div class="col-md-2"><?php echo $fapp_line3=$sum_rent?></div>
        <div class="col-md-2"><?php echo $sum_rent?></div>
        <div class="col-md-2"><?php echo $sum_rent?></div>
        <div class="col-md-2"><?php echo $sum_rent?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 4. Business Utility Payments</div>
        <div class="col-md-2"><?php echo $fapp_line4=$sum_utility?></div>
        <div class="col-md-2"><?php echo $sum_utility?></div>
        <div class="col-md-2"><?php echo $sum_utility?></div>
        <div class="col-md-2"><?php echo $sum_utility?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 5. Total Salary/Hourly Wage Reduction (enter the amount from PPP Schedule A, line 3):</div>
        <div class="col-md-2"><?php echo $fapp_line5=$SchA_Line3?></div>
        <div class="col-md-2"><?php echo $SchA_Line3?></div>
        <div class="col-md-2"><?php echo $SchA_Line3?></div>
        <div class="col-md-2"><?php echo $SchA_Line3?></div>
    </div>
    <div class="row">
        <div class="col-md-2">Line 6. Add the amounts on lines 1, 2, 3, and 4, then subtract the amount entered in line 5:</div>
        <div class="col-md-2"><?php echo $fapp_line6=$fapp_line1+$fapp_line2+$fapp_line3+$fapp_line4-$fapp_line5?></div>
        <div class="col-md-2"><?php echo $fapp_line1+$fapp_line2+$fapp_line3+$fapp_line4-$fapp_line5?></div>
        <div class="col-md-2"><?php echo $fapp_line1+$fapp_line2+$fapp_line3+$fapp_line4-$fapp_line5?></div>
        <div class="col-md-2"><?php echo $fapp_line1+$fapp_line2+$fapp_line3+$fapp_line4-$fapp_line5?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 7. FTE Reduction Quotient (enter the number from PPP Schedule A, line 13):</div>
        <div class="col-md-2"><?php echo $fapp_line7a=$SchA_Line13a?></div>
        <div class="col-md-2"><?php echo $fapp_line7c=$SchA_Line13c?></div>
        <div class="col-md-2"><?php echo $fapp_line7b=$SchA_Line13b?></div>
        <div class="col-md-2"><?php echo $fapp_line7d=$SchA_Line13d?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 8. Modified Total (multiply line 6 by line 7)</div>
        <div class="col-md-2"><?php echo $fappline8a=number_format($fapp_line8a=$fapp_line6*$fapp_line7a, 1, '.', ',') ?></div>
        <div class="col-md-2"><?php echo $fappline8c=number_format($fapp_line8c=$fapp_line6*$fapp_line7c, 1, '.', ',') ?></div>
        <div class="col-md-2"><?php echo $fappline8b=number_format($fapp_line8b=$fapp_line6*$fapp_line7b, 1, '.', ',') ?></div>
        <div class="col-md-2"><?php echo $fappline8d=number_format($fapp_line8d=$fapp_line6*$fapp_line7d, 1, '.', ',') ?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2"><span style="font-style:underline;background-color:yellow">Line 9. PPP Loan Amount</span></div>
        <div class="col-md-2"><?php  
        $fapp_line9=$loandata->loan_amount;
        echo number_format($loandata->loan_amount, 2, '.', ',');  ?></div>
        <div class="col-md-2"><?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?></div>
        <div class="col-md-2"><?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?></div>
        <div class="col-md-2"><?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 10. Payroll Cost 60% Requirement (divide line 1 by 0.60):</div>
        <?php $fapp_line10=$fapp_line1/0.6;?>
        <div class="col-md-2"><?php echo number_format($fapp_line10, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($fapp_line10, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($fapp_line10, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($fapp_line10, 2, '.', ',');?></div>
    </div>
    <div class="row">
        <div class="col-md-2"><span style="font-style:underline;background-color:yellow">Line 11. Forgiveness Amount</span> (enter the smallest of lines 8, 9, and 10):</div>
        <div class="col-md-2"><?php echo $fappline11a=number_format(min(array($fapp_line8a,$fapp_line9,$fapp_line10)), 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo $fappline11c=number_format(min(array($fapp_line8c,$fapp_line9,$fapp_line10)), 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo $fappline11b=number_format(min(array($fapp_line8b,$fapp_line9,$fapp_line10)), 2, '.', ',')?></div>
        <div class="col-md-2"><?php echo $fappline11d=number_format(min(array($fapp_line8d,$fapp_line9,$fapp_line10)), 2, '.', ',')?></div>
    </div>
    
    
    
    <h2>Schedule A</h2>
    
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2" style="text-align:center"><button onclick="setValues('a')" class="btn btn-info">Print PDF</button></div>
        <div class="col-lg-2" style="text-align:center"><button onclick="setValues('c')" class="btn btn-info">Print PDF</button></div>
        <div class="col-lg-2" style="text-align:center"><button onclick="setValues('b')" class="btn btn-info">Print PDF</button></div>
        <div class="col-lg-2" style="text-align:center"><button onclick="setValues('d')" class="btn btn-info">Print PDF</button></div>
    </div>
    <div class="row">
        <div class="col-md-2">Line 1. Enter Cash Compensation (Box 1) from PPP Schedule A Worksheet, Table 1:</div>
        <div class="col-md-2"><?php echo number_format($SchA_Line1, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line1, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line1, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line1, 2, '.', ',');?></div>
    </div>
    <div class="row">
        <div class="col-md-2">Line 2. Enter Average FTE (Box 2) from PPP Schedule A Worksheet, Table 1:</div>
        <div class="col-md-2"><?php echo $SchALine2a=$SchA_Line2a+$scheduledata->ftemethod1+ $scheduledata->ftemethod2+ $scheduledata->ftemethod3?></div>
        <div class="col-md-2"><?php echo $SchALine2c=$SchA_Line2b+$scheduledata->ftemethod1+ $scheduledata->ftemethod2+ $scheduledata->ftemethod3?></div>
        <div class="col-md-2"><?php echo $SchALine2b=$SchA_Line2a+$scheduledata->ftemethod4+ $scheduledata->ftemethod5+ $scheduledata->ftemethod6?></div>
        <div class="col-md-2"><?php echo $SchALine2d=$SchA_Line2b+$scheduledata->ftemethod4+ $scheduledata->ftemethod5+ $scheduledata->ftemethod6?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 3. Enter Salary/Hourly Wage Reduction (Box 3) from PPP Schedule A Worksheet, Table 1:</div>
        <div class="col-md-2"><?php echo $SchA_Line3?></div>
        <div class="col-md-2"><?php echo $SchA_Line3?></div>
        <div class="col-md-2"><?php echo $SchA_Line3?></div>
        <div class="col-md-2"><?php echo $SchA_Line3?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 4. Enter Cash Compensation (Box 4) from PPP Schedule A Worksheet, Table 2:</div>
        <div class="col-md-2"><?php echo $SchA_Line4?></div>
        <div class="col-md-2"><?php echo $SchA_Line4?></div>
        <div class="col-md-2"><?php echo $SchA_Line4?></div>
        <div class="col-md-2"><?php echo $SchA_Line4?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 5. Enter Average FTE (Box 5) from PPP Schedule A Worksheet, Table 2:</div>
        <div class="col-md-2"><?php echo $SchA_Line5a?></div>
        <div class="col-md-2"><?php echo $SchA_Line5b?></div>
        <div class="col-md-2"><?php echo $SchA_Line5a?></div>
        <div class="col-md-2"><?php echo $SchA_Line5b?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 6. Total amount paid or incurred by Borrower for employer contributions for employee health insurance</div>
        <div class="col-md-2"><?php echo number_format($SchA_Line6, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line6, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line6, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line6, 2, '.', ',');?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 7. Total amount paid or incurred by Borrower for employer contributions to employee retirement plans</div>
        <div class="col-md-2"><?php echo number_format($SchA_Line7, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line7, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line7, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line7, 2, '.', ',');?></div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2">Line 8. Total amount paid or incurred by Borrower for employer state and local taxes assessed on employee compensation</div>
        <div class="col-md-2"><?php echo number_format($SchA_Line8, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line8, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line8, 2, '.', ',');?></div>
        <div class="col-md-2"><?php echo number_format($SchA_Line8, 2, '.', ',');?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 9. Total amount paid to owner-employees/self-employed individual/general partners:</div>
        <div class="col-md-2"><?php echo $SchA_Line9?></div>
        <div class="col-md-2"><?php echo $SchA_Line9?></div>
        <div class="col-md-2"><?php echo $SchA_Line9?></div>
        <div class="col-md-2"><?php echo $SchA_Line9?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 10. Payroll Costs (add lines 1, 4, 6, 7, 8, and 9):</div>
        <div class="col-md-2"><?php echo $SchA_Line10?></div>
        <div class="col-md-2"><?php echo $SchA_Line10?></div>
        <div class="col-md-2"><?php echo $SchA_Line10?></div>
        <div class="col-md-2"><?php echo $SchA_Line10?></div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2">Checkbox - No reduction in employees or average paid hours</div>
        <div class="col-md-2"><?php echo $scheduledata->employees_change?></div>
        <div class="col-md-2"><?php echo $scheduledata->employees_change?></div>
        <div class="col-md-2"><?php echo $scheduledata->employees_change?></div>
        <div class="col-md-2"><?php echo $scheduledata->employees_change?></div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2">Checkbox - FTE Reduction Safe Harbor 1</div>
        <div class="col-md-2"><?php echo $scheduledata->fte_harbor_1?></div>
        <div class="col-md-2"><?php echo $scheduledata->fte_harbor_1?></div>
        <div class="col-md-2"><?php echo $scheduledata->fte_harbor_1?></div>
        <div class="col-md-2"><?php echo $scheduledata->fte_harbor_1?></div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2">Checkbox - FTE Reduction Safe Harbor 2</div>
        <div class="col-md-2"><?php echo $scheduledata->fte_harbor_2?></div>
        <div class="col-md-2"><?php echo $scheduledata->fte_harbor_2?></div>
        <div class="col-md-2"><?php echo $scheduledata->fte_harbor_2?></div>
        <div class="col-md-2"><?php echo $scheduledata->fte_harbor_2?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 11. Average FTE during the Borrower’s chosen reference period</div>
        <div class="col-md-2"><?php echo $SchA_Line11a?></div>
        <div class="col-md-2"><?php echo $SchA_Line11c?></div>
        <div class="col-md-2"><?php echo $SchA_Line11b?></div>
        <div class="col-md-2"><?php echo $SchA_Line11d?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 12. Total Average FTE (add lines 2 and 5):</div>
        <div class="col-md-2"><?php echo $SchA_Line12a?></div>
        <div class="col-md-2"><?php echo $SchA_Line12b?></div>
        <div class="col-md-2"><?php echo $SchA_Line12a?></div>
        <div class="col-md-2"><?php echo $SchA_Line12b?></div>
    </div>
    
    <div class="row">
        <div class="col-md-2">Line 13. FTE Reduction Quotient (divide line 12 by line 11) or enter 1.0 if any of the above criteria are met</div>
        <div class="col-md-2"><?php echo $SchA_Line13a?></div>
        <div class="col-md-2"><?php echo $SchA_Line13c?></div>
        <div class="col-md-2"><?php echo $SchA_Line13b?></div>
        <div class="col-md-2"><?php echo $SchA_Line13d?></div>
    </div>
    
</div>

    <form action="<?php echo base_url()?>Form3508/show3508PDF" method="post" id="pdfForm">
        <input type="hidden" name="b_name" value="<?php echo $companydata->business_name?>">
        <input type="hidden" name="trade_name" value="<?php echo $companydata->trade_name?>">
        <input type="hidden" name="b_address" value="<?php echo $companydata->street_address1?>, <?php echo $companydata->street_address2?>, <?php echo $companydata->city?>, <?php echo $companydata->zip?>, <?php echo $companydata->state?>">
        <input type="hidden" name="tin_ssn" value="<?php echo $companydata->ein?> <?php echo $companydata->ssn?>">
        <input type="hidden" name="phone" value="<?php echo $userdata->landline_extension?>-<?php echo $userdata->landline_phone?>">
        <input type="hidden" name="p_contact_name" value="<?php echo $userdata->first_name;?> <?php echo $userdata->last_name?>">
        <input type="hidden" name="email" value="<?php echo $userdata->email?>">
        <input type="hidden" name="sba" value="<?php echo $loandata->sba?>">
        <input type="hidden" name="loan_number" value="<?php echo $loandata->loan_number?>">
        <input type="hidden" name="loan_amount" value="<?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?>">
        <input type="hidden" name="disbursement_date" value="<?php echo $loandata->disbursement_date?>">
        <input type="hidden" name="loantime_employees" value="<?php echo $loandata->loantime_employees?>">
        <input type="hidden" name="forgivenesstime_employees" value="<?php echo $loandata->forgivenesstime_employees?>">
        <input type="hidden" name="eidl_grant_amount" value="<?php  echo number_format($loandata->eidl_grant_amount, 2, '.', ','); ?>">
        <input type="hidden" name="eidl_grant_app_num" value="<?php echo $loandata->eidl_grant_app_num?>">
        <input type="hidden" name="payroll_schedule" value="<?php echo $payrolldata->payroll_schedule?>">
        <input type="hidden" name="covered_period" value="<?php echo $coveredPeriod?>">
        <input type="hidden" name="alternate_period" value="<?php echo $alternatePeriod?>">
        <input type="hidden" name="two_million" value="<?php echo "";?>">
        <input type="hidden" name="SchA_Line10" value="<?php echo $SchA_Line10?>">
        <input type="hidden" name="sum_mortgage" value="<?php echo $sum_mortgage?>">
        <input type="hidden" name="sum_rent" value="<?php echo $sum_rent?>">
        <input type="hidden" name="sum_utility" value="<?php echo $sum_utility?>">
        <input type="hidden" name="SchA_Line3" value="<?php echo $SchA_Line3?>">
        <input type="hidden" name="fapp_line6" value="<?php echo $fapp_line6?>">
        <input type="hidden" name="fapp_line7" id="fapp_line7" >
        <input type="hidden" name="fapp_line8" id="fapp_line8" >
        <input type="hidden" name="loan_amount" value="<?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?>">
        <input type="hidden" name="fapp_line10" value="<?php echo number_format($fapp_line10, 2, '.', ',');?>">
        <input type="hidden" name="fapp_line11" id="fapp_line11" >
        <input type="hidden" name="SchA_Line1" value="<?php echo number_format($SchA_Line1, 2, '.', ',');?>">
        <input type="hidden" name="SchA_Line2" id="SchA_Line2">
        <input type="hidden" name="SchA_Line3" value="<?php echo $SchA_Line3?>">
        <input type="hidden" name="SchA_Line4" value="<?php echo $SchA_Line4?>">
        <input type="hidden" name="SchA_Line5" id="SchA_Line5">
        <input type="hidden" name="SchA_Line6" value="<?php echo number_format($SchA_Line6, 2, '.', ',');?>">
        <input type="hidden" name="SchA_Line7" value="<?php echo number_format($SchA_Line7, 2, '.', ',');?>">
        <input type="hidden" name="SchA_Line8" value="<?php echo number_format($SchA_Line8, 2, '.', ',');?>">
        <input type="hidden" name="SchA_Line9" value="<?php echo $SchA_Line9?>">
        <input type="hidden" name="SchA_Line10" value="<?php echo $SchA_Line10?>">
        <input type="hidden" name="employees_change" value="<?php echo $scheduledata->employees_change?>">
        <input type="hidden" name="fte_harbor_1" value="<?php echo $scheduledata->fte_harbor_1?>">
        <input type="hidden" name="fte_harbor_2" value="<?php echo $scheduledata->fte_harbor_2?>">
        <input type="hidden" name="SchA_Line11" id="SchA_Line11">
        <input type="hidden" name="SchA_Line12" id="SchA_Line12">
        <input type="hidden" name="SchA_Line13" id="SchA_Line13">
    </form>
    
    <script>
        function setValues(n){
            if(n=="a"){
                $("#fapp_line7").val("<?php echo $fapp_line7a?>");
                $("#fapp_line8").val("<?php echo $fappline8a?>");
                $("#fapp_line11").val("<?php echo $fappline11a?>");
                $("#SchA_Line2").val("<?php echo $SchALine2a?>");
                $("#SchA_Line5").val("<?php echo $SchA_Line5a?>");
                $("#SchA_Line11").val("<?php echo $SchA_Line11a?>");
                $("#SchA_Line12").val("<?php echo $SchA_Line12a?>");
                $("#SchA_Line13").val("<?php echo $SchA_Line13a?>");
            }
            else if(n=="c"){
                $("#fapp_line7").val("<?php echo $fapp_line7c?>");
                $("#fapp_line8").val("<?php echo $fappline8c?>");
                $("#fapp_line11").val("<?php echo $fappline11c?>");
                $("#SchA_Line2").val("<?php echo $SchALine2c?>");
                $("#SchA_Line5").val("<?php echo $SchA_Line5b?>");
                $("#SchA_Line11").val("<?php echo $SchA_Line11c?>");
                $("#SchA_Line12").val("<?php echo $SchA_Line12b?>");
                $("#SchA_Line13").val("<?php echo $SchA_Line13c?>");
            }
            else if(n=="b"){
                $("#fapp_line7").val("<?php echo $fapp_line7b?>");
                $("#fapp_line8").val("<?php echo $fappline8b?>");
                $("#fapp_line11").val("<?php echo $fappline11b?>");
                $("#SchA_Line2").val("<?php echo $SchALine2b?>");
                $("#SchA_Line5").val("<?php echo $SchA_Line5a?>");
                $("#SchA_Line11").val("<?php echo $SchA_Line11b?>");
                $("#SchA_Line12").val("<?php echo $SchA_Line12a?>");
                $("#SchA_Line13").val("<?php echo $SchA_Line13b?>");
            }
            else if(n=="d"){
                $("#fapp_line7").val("<?php echo $fapp_line7d?>");
                $("#fapp_line8").val("<?php echo $fappline8d?>");
                $("#fapp_line11").val("<?php echo $fappline11d?>");
                $("#SchA_Line2").val("<?php echo $SchALine2d?>");
                $("#SchA_Line5").val("<?php echo $SchA_Line5b?>");
                $("#SchA_Line11").val("<?php echo $SchA_Line11d?>");
                $("#SchA_Line12").val("<?php echo $SchA_Line12b?>");
                $("#SchA_Line13").val("<?php echo $SchA_Line13d?>");
            }
            $('#pdfForm').attr('action',$('#pdfForm').attr('action')+"/"+n);
            $("#pdfForm").submit();
        }
        
    </script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    