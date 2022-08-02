<?php $this->load->view('User/sidebar');
?>
<?php $this->load->view('User/topmenu');
?>
<?php
$msg="";
        if($companydata->entity_type==""){
            $msg=$msg."<li>Company Details:  Entity type</li>";
        }
        
        
        if($ownerdata->owner_count==""){
            $msg=$msg."<li>Owner Count:  How many owner/partners does the company have</li>";
        }
        if($ownerdata->first_name==""){
            $msg=$msg."<li>Owner Details:  All fields for atleast one owner</li>";
        }
        if($ownerdata->owner2019_pay=="0"){
            $msg=$msg."<li>Owner Details:  Owner 2019 Wages/Payroll</li>";
        }
        if($ownerdata->ownership_percentage==""){
            $msg=$msg."<li>Owner Details:  % Ownership</li>";
        }
        

        
        
        if($loandata->loan_amount==""){
            $msg=$msg."<li>Loan Details:  Loan Amount</li>";
        }
        if($loandata->disbursement_date==""){
            $msg=$msg."<li>Loan Details:  PPP Loan Disbursement Date</li>";
        }
        if($loandata->loantime_employees==""){
            $msg=$msg."<li>Loan Details:  Employees at Time of PPP Loan Application</li>";
        }
        if($loandata->forgivenesstime_employees==""){
            $msg=$msg."<li>Loan Details:  Employees at Time of Forgiveness Application (today)</li>";
        }
        if($loandata->eidl_amount!="0"&&$loandata->eidl_loan_date==""){
            
            $msg=$msg."<li>Loan Details:  EIDL Loan Date</li>";
        }
        
//Payroll Schedule
//Begin Pay Period Date after Loan Disbursement Date (should be filled if "Payroll Schedule" = daily/weekly/biweekly – can be blank for any other Payroll Schedule)
        if($payrolldata->payroll_schedule==""){
            $msg=$msg."<li>Payroll Schedule:  Payroll Schedule</li>";
        }
        if(($payrolldata->payroll_schedule=="Daily"||$payrolldata->payroll_schedule=="Weekly"||$payrolldata->payroll_schedule=="BiWeekly")&&$payrolldata->payroll_begin_date==""){
            $msg=$msg."<li>Payroll Schedule:  Begin Pay Period Date after Loan Disbursement Date</li>";
        }
         if($msg!=""){
             $msg="<div class=\"container-fluid\"><div class=\"tabledeign\"><h3 class=\"fc_heading\">Calculate Forgiveness </h3><b style='color:red'>Following fields are must to calculate forgiveness<br></b><ul style='list-style-type:none'>".$msg."</ul></div></div>";
         echo $msg;
         }
         else{
             
         
         
         ?>
 <?php $this->load->view('forms/forgivnessguidance');
?>

<div class="container-fluid">
    <div class="tabledeign">
        <h3 class="fc_heading">Calculate Forgiveness </h3>
        <table class="table table-striped forgivnesstable">

            <thead> 
            
                <tr>
                    <th></th>
                    
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <th>Covered Period 8 Weeks<br><?php echo  date("m-d-Y", strtotime($payrolldata->loan8_start))." - ".date("m-d-Y", strtotime($payrolldata->loan8_end));?></th>
                    <?php } ?>
                    <th style="text-align:center">Covered Period 24 Weeks<br><?php echo date("m-d-Y", strtotime($payrolldata->loan24_start))." - ".date("m-d-Y", strtotime($payrolldata->loan24_end));?></th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <th>Alternate Period 8 Weeks<br><?php echo date("m-d-Y", strtotime($payrolldata->payroll8_start))." - ".date("m-d-Y", strtotime($payrolldata->payroll8_end));?></th>
                    <?php } ?>
                    <th style="text-align:center">Alternate Period 24 Weeks<br><?php echo date("m-d-Y", strtotime($payrolldata->payroll24_start))." - ".date("m-d-Y", strtotime($payrolldata->payroll24_end));?></th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="sideheading">Loan Amount</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php echo number_format($loan_amount, 2, '.', ',');?></td>
                    <?php } ?>
                    <td><?php echo number_format($loan_amount, 2, '.', ',');?></td>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php echo number_format($loan_amount, 2, '.', ',');?></td>
                    <?php } ?>
                    <td><?php echo number_format($loan_amount, 2, '.', ',');?></td>


                </tr>
                <tr>
                    <th class="sideheading">EIDL Advance</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td>-<?php echo number_format($eidl_amount, 2, '.', ',');?></td>
                    <?php } ?>
                    <td>-<?php echo number_format($eidl_amount, 2, '.', ',');?></td>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td>-<?php echo number_format($eidl_amount, 2, '.', ',');?></td>
                    <?php } ?>
                    <td>-<?php echo number_format($eidl_amount, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <th class="sideheading">Payroll Costs</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php echo number_format($covered8_cost, 2, '.', ',');?></td>
                    
                    <?php } ?>
                    <td><?php echo number_format($covered24_cost, 2, '.', ',');?></td>
                    
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php echo number_format($alternate8_cost, 2, '.', ',');?></td>
                    
                    <?php } ?>
                    <td><?php echo number_format($alternate24_cost, 2, '.', ',');?></td>
                </tr>
                <tr>

                    <th class="sideheading">State & Local Taxes</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php  echo number_format($taxes8_cost, 2, '.', ',');?></td>
                    <?php } ?>
                    <td><?php echo number_format($taxes24_cost, 2, '.', ',');?></td>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php  echo number_format($taxes8_cost, 2, '.', ',');?></td>
                    <?php } ?>
                    <td><?php echo number_format($taxes24_cost, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <th class="sideheading">Benefit Costs</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php  echo number_format($health8_cost, 2, '.', ',');?></td>
                    <?php } ?>
                    <td><?php echo number_format($health24_cost, 2, '.', ',');?></td>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php  echo number_format($health8_cost, 2, '.', ',');?></td>
                    <?php } ?>
                    <td><?php echo number_format($health24_cost, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <th class="sideheading">Non-Payroll Costs</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php echo number_format($sum8_covered, 2, '.', ',');?></td>
                    <?php } ?>
                    <td><?php echo number_format($sum24_covered, 2, '.', ',');?></td>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php echo number_format($sum8_alternate, 2, '.', ',');?></td>
                    <?php } ?>
                    <td><?php echo number_format($sum24_alternate, 2, '.', ',');?></td>
                </tr>
                <tr class="uperboder">
                    <th class="sideheading">FTE Adjustment</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td>-<?php echo number_format($fte_adjustment, 2, '.', ',');?></td>
                    <?php } ?>
                    <td>-<?php echo number_format($fte_adjustment, 2, '.', ',');?></td>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td>-<?php echo number_format($fte_adjustment, 2, '.', ',');?></td>
                    <?php } ?>
                    <td>-<?php echo number_format($fte_adjustment, 2, '.', ',');?></td>
                </tr>
                <tr>
                    <th class="sideheading smallsentence">25% Reduction in Wages Adjustment</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td>Not Calculated</td>
                    <?php } ?>
                    <td>Not Calculated</td>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td>Not Calculated</td>
                    <?php } ?>
                    <td>Not Calculated</td>
                </tr>
                <tr>
                    <th class="sideheading">Forgiveness</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php if($forgiveness8_covered<0){
                        echo $forgiveness8_covered=0;
                    }
                    else{
                        echo number_format($forgiveness8_covered, 2, '.', ',');
                    }?></td>
                    <?php } ?>
                    
                    <td><?php if($forgiveness24_covered<0){
                        echo $forgiveness24_covered=0;
                    }
                    else{ echo number_format($forgiveness24_covered, 2, '.', ',');}?></td>
                    
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    
                    <td><?php if($forgiveness8_alternate<0){
                        echo $forgiveness8_alternate=0;
                    }
                    else{ echo number_format($forgiveness8_alternate, 2, '.', ',');}?></td>
                    <?php } ?>
                    
                    <td><?php if($forgiveness24_alternate<0){
                        echo $forgiveness24_alternate=0;
                    }
                    else{ echo number_format($forgiveness24_alternate, 2, '.', ',');}?></td>
                </tr>
                <tr>
                    <th class="sideheading">% forgiveness</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php if($forgperc8_covered<0){
                        echo 0;
                    }
                    else{ echo number_format(round($forgperc8_covered,2),2, '.', '') . "%";}?></td>
                    <?php } ?>
                    
                    <td><?php if($forgperc24_covered<0){
                        echo 0;
                    }
                    else{ echo number_format( round($forgperc24_covered,2),2, '.', ''). "%";}?></td>
                    
                    
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php if($forgperc8_alternate<0){
                        echo 0;
                    }
                    else{ echo number_format( round($forgperc8_alternate,2),2, '.', ''). "%";}?></td>
                    <?php } ?>
                    
                    <td><?php if($forgperc24_alternate<0){
                        echo 0;
                    }
                    else{ echo number_format( round($forgperc24_alternate,2),2, '.', ''). "%";}?></td>
                </tr>
                
                <tr>
                    <th class="sideheading red">Return to SBA</th>
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    <td><?php echo number_format($loandata->loan_amount-$forgiveness8_covered, 2, '.', ',') ?></td>
                    <?php } ?>
                    <td><?php echo number_format($loandata->loan_amount-$forgiveness24_covered, 2, '.', ',') ?></td>
                    
                    
                    <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                    
                    <td><?php echo number_format($loandata->loan_amount-$forgiveness8_alternate, 2, '.', ',') ?></td>
                    <?php } ?>
                    
                    
                    <td><?php echo number_format($loandata->loan_amount-$forgiveness24_alternate, 2, '.', ',') ?></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td> <br>
                    
             <?php if($this->session->userdata('access_level')=="RW"){ ?>
                    <a href="<?Php echo base_url()?>user/pricing" class="linkbtn">Upgrade Plan</a> 
<?php }?>
                    
                    </td>
                    
                    <td colspan="4"><span style="font-size:14px"> Help me increase my forgiveness</span>
                        <br>
                        <span style="font-size:14px">
                            Our PPP Forgiveness Professionals can <b><i> <u> help guide you increase your forgiveness dollars </u> </i> </b>. Click to upgrade your plan, to receive professional guidance
                        </span>
                    </td>
                </tr>
                <tr>
                    <?php 
                    if(!($payrolldata->payroll_schedule=="Daily"||$payrolldata->payroll_schedule=="Weekly"||$payrolldata->payroll_schedule=="BiWeekly"))
                    {
                        echo "<span class='red'>Per PPP Guidelines, Alternate Period option is not  available to businesses that use payroll schedule other than (daily or weekly or biweekly)</span>";
                    }
                    ?>
                </tr>


            </tbody>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<?php } ?>
