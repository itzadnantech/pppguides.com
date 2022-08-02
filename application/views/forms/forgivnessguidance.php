 <?php
        $alternate8_start='';
        $alternate8_end='';
        $alternate24_start='';
        $alternate24_end='';
        
        $alternate8_rent=0;
        $alternate24_rent=0;
        
        $alternate8_mortgage=0;
        $alternate24_mortgage=0;
        
        $alternate8_utility=0;
        $alternate24_utility=0;
        $isalternate8_over="No";
        $isalternate24_over="No";
        $alternate8_wover=0;
        $alternate24_wover=0;
        
        $show_alternate="No";
        if($payrolldata->payroll_schedule=="Daily"||$payrolldata->payroll_schedule=="Weekly"||$payrolldata->payroll_schedule=="BiWeekly"){
            $show_alternate="Yes";
        }
        
  if($show_alternate=="Yes"){
    //get dates from loan table
        $alternate8_start=strtotime(date($payrolldata->payroll8_start));
        $alternate8_end=strtotime(date($payrolldata->payroll8_end));

        $alternate24_start = strtotime(date($payrolldata->payroll24_start));
        $alternate24_end = strtotime(date($payrolldata->payroll24_end));
        
        
        
        
        $i=1;
        $payees=explode("~",$nonpayrolldata->rent_payee);
        foreach($payees as $payee){
            $rentamount=explode("~",$nonpayrolldata->rent_amount)[$i-1];
            $rent_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->rent_month)[$i-1])));
            $rent_date=strtotime(date(explode("~",$nonpayrolldata->rent_date)[$i-1]));
            
            if ((($rent_date >= $alternate8_start) && ($rent_date <= $alternate8_end))){
                $alternate8_rent=$alternate8_rent+ intval($rentamount);
            }
            else if((($rent_month >= date('Y-m',$alternate8_start)) && ($rent_month <= intval(date('Y-m',$alternate8_end))))){
                $alternate8_rent=$alternate8_rent+ intval($rentamount);
            }
            
            if ((($rent_date >= $alternate24_start) && ($rent_date <= $alternate24_end))){
                $alternate24_rent=$alternate24_rent+ intval($rentamount);
            }
            else if((($rent_month >= date('Y-m',$alternate24_start)) && ($rent_month <= intval(date('Y-m',$alternate24_end))))){
                $alternate24_rent=$alternate24_rent+ intval($rentamount);
            }
            
            $i++; 
        }
        
        
        $i=1;
        $payees=explode("~",$nonpayrolldata->mortgage_payee);
        foreach($payees as $payee){
            $mortgageamount=explode("~",$nonpayrolldata->mortgage_amount)[$i-1];
            $mortgage_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->mortgage_month)[$i-1])));
            $mortgage_date=strtotime(date(explode("~",$nonpayrolldata->mortgage_date)[$i-1]));
            
            if ((($mortgage_date >= $alternate8_start) && ($mortgage_date <= $alternate8_end))){
                $alternate8_mortgage=$alternate8_mortgage+ intval($mortgageamount);
            }
            else if((($mortgage_month >= date('Y-m',$alternate8_start)) && ($mortgage_month <= intval(date('Y-m',$alternate8_end))))){
                $alternate8_mortgage=$alternate8_mortgage+ intval($mortgageamount);
            }
            
            if ((($mortgage_date >= $alternate24_start) && ($mortgage_date <= $alternate24_end))){
                $alternate24_mortgage=$alternate24_mortgage+ intval($mortgageamount);
            }
            else if((($mortgage_month >= date('Y-m',$alternate24_start)) && ($mortgage_month <= intval(date('Y-m',$alternate24_end))))){
                $alternate24_mortgage=$alternate24_mortgage+ intval($mortgageamount);
            }
            
            $i++; 
        }
        
        $i=1;
        $payees=explode("~",$nonpayrolldata->utility_payee);
        foreach($payees as $payee){
            $utilityamount=explode("~",$nonpayrolldata->utility_amount)[$i-1];
            $utility_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->utility_month)[$i-1])));
            $utility_date=strtotime(date(explode("~",$nonpayrolldata->utility_date)[$i-1]));
            
            if ((($utility_date >= $alternate8_start) && ($utility_date <= $alternate8_end))){
                $alternate8_utility=$alternate8_utility+ intval($utilityamount);
            }
            else if((($utility_month >= date('Y-m',$alternate8_start)) && ($utility_month <= intval(date('Y-m',$alternate8_end))))){
                $alternate8_utility=$alternate8_utility+ intval($utilityamount);
            }
            
            if ((($utility_date >= $alternate24_start) && ($utility_date <= $alternate24_end))){
                $alternate24_utility=$alternate24_utility+ intval($utilityamount);
            }
            else if((($utility_month >= date('Y-m',$alternate24_start)) && ($utility_month <= intval(date('Y-m',$alternate24_end))))){
                $alternate24_utility=$alternate24_utility+ intval($utilityamount);
            }
            
            $i++; 
        }
        
        if(time()>$alternate8_end){
            $isalternate8_over="Yes";
        }
        //echo time()."    ".$alternate8_end;
        if(time()>$alternate24_end){
            $isalternate24_over="Yes";
        }
        
        $alternate8_wover=floor((time()-$alternate8_end)/60/60/24/7);
        if($alternate8_wover<0){
            $alternate8_wover=0;
        }
        
        $alternate24_wover=floor((time()-$alternate24_end)/60/60/24/7);
        if($alternate24_wover<0){
            $alternate24_wover=0;
        }
        
        
        
        
        }
        else{
            $alternate8_start=strtotime(date($payrolldata->loan8_start));
        $alternate8_end=strtotime(date($payrolldata->loan8_end));

        $alternate24_start = strtotime(date($payrolldata->loan24_start));
        $alternate24_end = strtotime(date($payrolldata->loan24_end));
        
        
        
        
        $i=1;
        $payees=explode("~",$nonpayrolldata->rent_payee);
        foreach($payees as $payee){
            $rentamount=explode("~",$nonpayrolldata->rent_amount)[$i-1];
            $rent_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->rent_month)[$i-1])));
            $rent_date=strtotime(date(explode("~",$nonpayrolldata->rent_date)[$i-1]));
            
            if ((($rent_date >= $alternate8_start) && ($rent_date <= $alternate8_end))){
                $alternate8_rent=$alternate8_rent+ intval($rentamount);
            }
            else if((($rent_month >= date('Y-m',$alternate8_start)) && ($rent_month <= intval(date('Y-m',$alternate8_end))))){
                $alternate8_rent=$alternate8_rent+ intval($rentamount);
            }
            
            if ((($rent_date >= $alternate24_start) && ($rent_date <= $alternate24_end))){
                $alternate24_rent=$alternate24_rent+ intval($rentamount);
            }
            else if((($rent_month >= date('Y-m',$alternate24_start)) && ($rent_month <= intval(date('Y-m',$alternate24_end))))){
                $alternate24_rent=$alternate24_rent+ intval($rentamount);
            }
            
            $i++; 
        }
        
        
        $i=1;
        $payees=explode("~",$nonpayrolldata->mortgage_payee);
        foreach($payees as $payee){
            $mortgageamount=explode("~",$nonpayrolldata->mortgage_amount)[$i-1];
            $mortgage_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->mortgage_month)[$i-1])));
            $mortgage_date=strtotime(date(explode("~",$nonpayrolldata->mortgage_date)[$i-1]));
            
            if ((($mortgage_date >= $alternate8_start) && ($mortgage_date <= $alternate8_end))){
                $alternate8_mortgage=$alternate8_mortgage+ intval($mortgageamount);
            }
            else if((($mortgage_month >= date('Y-m',$alternate8_start)) && ($mortgage_month <= intval(date('Y-m',$alternate8_end))))){
                $alternate8_mortgage=$alternate8_mortgage+ intval($mortgageamount);
            }
            
            if ((($mortgage_date >= $alternate24_start) && ($mortgage_date <= $alternate24_end))){
                $alternate24_mortgage=$alternate24_mortgage+ intval($mortgageamount);
            }
            else if((($mortgage_month >= date('Y-m',$alternate24_start)) && ($mortgage_month <= intval(date('Y-m',$alternate24_end))))){
                $alternate24_mortgage=$alternate24_mortgage+ intval($mortgageamount);
            }
            
            $i++; 
        }
        
        $i=1;
        $payees=explode("~",$nonpayrolldata->utility_payee);
        foreach($payees as $payee){
            $utilityamount=explode("~",$nonpayrolldata->utility_amount)[$i-1];
            $utility_month=intval(date('Y-m', strtotime(explode("~",$nonpayrolldata->utility_month)[$i-1])));
            $utility_date=strtotime(date(explode("~",$nonpayrolldata->utility_date)[$i-1]));
            
            if ((($utility_date >= $alternate8_start) && ($utility_date <= $alternate8_end))){
                $alternate8_utility=$alternate8_utility+ intval($utilityamount);
            }
            else if((($utility_month >= date('Y-m',$alternate8_start)) && ($utility_month <= intval(date('Y-m',$alternate8_end))))){
                $alternate8_utility=$alternate8_utility+ intval($utilityamount);
            }
            
            if ((($utility_date >= $alternate24_start) && ($utility_date <= $alternate24_end))){
                $alternate24_utility=$alternate24_utility+ intval($utilityamount);
            }
            else if((($utility_month >= date('Y-m',$alternate24_start)) && ($utility_month <= intval(date('Y-m',$alternate24_end))))){
                $alternate24_utility=$alternate24_utility+ intval($utilityamount);
            }
            
            $i++; 
        }
        
        if(time()>$alternate8_end){
            $isalternate8_over="Yes";
        }
        //echo time()."    ".$covered8_end;
        if(time()>$alternate24_end){
            $isalternate24_over="Yes";
        }
        
        $alternate8_wover=floor((time()-$alternate8_end)/60/60/24/7);
        if($alternate8_wover<0){
            $alternate8_wover=0;
        }
        
        $alternate24_wover=floor((time()-$alternate24_end)/60/60/24/7);
        if($alternate24_wover<0){
            $alternate24_wover=0;
        }
        
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
               
        
        
        
        $loan_amount=$loandata->loan_amount;
 
        //echo "<br>1.	60pLoanAmt  ".
        $loan_amount60=$loandata->loan_amount*0.60;//1
        
        //echo "<br>2.	40pLoanAmt ".
        $loan_amount40=$loandata->loan_amount*0.40;//2
        
       // echo "<br>3.	NumEmp_PPP_LoanApp  ".
       $loantime_employees=$loandata->loantime_employees;//3
        
       // echo "<br>4.	NumEmp_PPP_Forgiveness   ".
       $forgivenesstime_employees=$loandata->forgivenesstime_employees;//4
        $alternate8_tstart="";
        $alternate8_tend="";
        $alternate24_start="";
        $alternate24_end="";
        $payroll8_tcost=0;
        $payroll24_tcost=0;
        
        
          if($show_alternate=="Yes"){
        //echo "<br>5.	Alt8wkPerBegin ".
        $alternate8_tstart=$payrolldata->payroll8_start;//5
        
       // echo "<br>6.	Alt8wkPerEnd ".
       $alternate8_tend=$payrolldata->payroll8_end;//6
        
       // echo "<br>7.	Alt24wkPerBegin ".
       $alternate24_start = $payrolldata->payroll24_start;//7
        
       // echo "<br>8.	Alt24wkPerEnd ".
       $alternate24_end = $payrolldata->payroll24_end;//8
          
       //  echo "<br>9.	AltNumWeeksOver8wk ".
       $alternate8_wover;//9
         
       // echo "<br>10.	AltNumWeeksOver24wk ".
       $alternate24_wover;//10
        
       //echo "<br>payroll8_tcost ".
       $payroll8_tcost= $payrolldata->alternate8_cost+$payrolldata->unemp8_contributions+ $payrolldata->state8_taxes+$payrolldata->health8_cost+ $payrolldata->retirement8_cost;//11
        
        //echo "<br>payroll24_tcost ".
        $payroll24_tcost=$payrolldata->alternate24_cost+$payrolldata->unemp24_contributions+ $payrolldata->state24_taxes+$payrolldata->health24_cost+ $payrolldata->retirement24_cost;//12
        }
        
        else{
            //echo "<br>5.	Alt8wkPerBegin ".
        $alternate8_tstart=$payrolldata->loan8_start;//5
        
       // echo "<br>6.	Alt8wkPerEnd ".
       $alternate8_tend=$payrolldata->loan8_end;//6
        
       // echo "<br>7.	Alt24wkPerBegin ".
       $alternate24_start = $payrolldata->loan24_start;//7
        
       // echo "<br>8.	Alt24wkPerEnd ".
       $alternate24_end = $payrolldata->loan24_end;//8
        
       //echo "<br>payroll8_tcost ".
       $payroll8_tcost= $payrolldata->covered8_cost+$payrolldata->unemp8_contributions+ $payrolldata->state8_taxes+$payrolldata->health8_cost+ $payrolldata->retirement8_cost;//11
        
        //echo "<br>payroll24_tcost ".
        $payroll24_tcost=$payrolldata->covered24_cost+$payrolldata->unemp24_contributions+ $payrolldata->state24_taxes+$payrolldata->health24_cost+ $payrolldata->retirement24_cost;//12
        
        }
        
        
       // echo "<br>13.	SumAltRent_8wk  ".
       $alternate8_rent;//13
        
       // echo "<br>15.	SumAltMortInt_8wk  ".
       $alternate8_mortgage;//14
        
       // echo "<br>17.	SumAltUtil_8wk  ".
       $alternate8_utility;//15
        
        
       // echo "<br>14.	SumAltRent_24wk ".
       $alternate24_rent;//16
        
       // echo "<br>16.	SumAltMortInt_24wk ".
       $alternate24_mortgage;//17
        
       // echo "<br>18.	SumAltUtil_24wk ".
       $alternate24_utility;//18
        
       // echo "<br>19.	SumAltNonPayroll_8wk ".
       $alternate8_nopayroll=$alternate8_rent+$alternate8_mortgage+$alternate8_utility;//19
            
      //  echo "<br>20.	SumAltNonPayroll_24wk  ".
      $alternate24_nopayroll=$alternate24_rent+$alternate24_mortgage+$alternate24_utility;//20
        
       // echo "<br>21.	Is8wkAltOver".
       $isalternate8_over;//21
        
      //  echo "<br>22.	Is24wkAltOver ".
      $isalternate24_over;//22
        $payroll8_array=array();
        $payroll24_array=array();
        
        if($show_alternate=="Yes"){
        $payroll8_array= explode("~",$payrolldata->alternate8_opay);
        
        $payroll24_array= explode("~",$payrolldata->alternate24_opay);
        }
        else{
        $payroll8_array= explode("~",$payrolldata->covered8_opay);
        
        $payroll24_array= explode("~",$payrolldata->covered24_opay);
        }
        $owner8_tpay=0;
        $owner24_tpay=0;
        $payroll2019_array= explode("~",$ownerdata->owner2019_pay);
        //echo count($payroll2019_array);
        $i=0;
        foreach($payroll8_array as $payroll8_owner){
            $payroll8_powner=intval($payroll8_owner);
            $owner8_tpay=$owner8_tpay+$payroll8_powner;
        //echo "<br>8wkPayroll_". explode("~",$ownerdata->first_name)[$i]." ".$payroll8_powner;//23
           $i++;     
        } 
        $i=0;
        foreach($payroll24_array as $payroll24_owner){
            $payroll24_powner=intval($payroll24_owner);
            $owner24_tpay=$owner24_tpay+$payroll24_powner;
      // echo "<br>24wkPayroll_".explode("~",$ownerdata->first_name)[$i]." ".$payroll24_powner;//23
           $i++;       
        } 
        $i=0;
        foreach($payroll2019_array as $payroll2019_owner){
            $payroll2019_powner=intval($payroll2019_owner);
       // echo "<br>2019_Payroll_".explode("~",$ownerdata->first_name)[$i]." ".$payroll2019_powner;//23
            $i++;      
        } 
        
    
    
    
        
             $eidl_loan_amount=$loandata->eidl_amount;  
            $eidl_loan_date=strtotime(date($loandata->eidl_loan_date));
            $eidl_grant_amount=$loandata->eidl_grant_amount;
            $eidl_grant_date=strtotime(date($loandata->edit_grant_date));
            
            $EntityType = $companydata->entity_type;
?>




<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1">
       <i class="fa fa-bars" aria-hidden="true"></i>
      </button>
    <div class="row collapse navbar-collapse" id="collapse-1">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <ul class="nav nav-tabs tabhover">
                <li><a class="<?php if($formval==5){echo 'active';}?>" href="<?php echo base_url()?>user/forgivenessTable">Forgiveness Table  </a></li>
                <?php 
                    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
                    ?>
                <li><a href="#"  data-toggle="modal" data-target="#eightweekmodal" >8 week Guidance</a></li>
                <?php } ?>
                <li><a href="#"  data-toggle="modal" data-target="#twentyfourweekmodal">24 week Guidance  </a></li>
                <li><a href="#"  data-toggle="modal" data-target="#EIDLmodal">EIDL Guidance  </a></li>
                <li id=""><a href=<?php          
                    if($selectedplan->show_guidance=="yes"){
                        echo "'".base_url()."Form3508/applyForForgiveness"."'";
                    }
                    else{
                        echo '"#" data-toggle="modal" data-target="#ApplyGuidance"';
                    }
                ?>>Schedule-A/3508 </a></li>
                </ul>
            
        </div>
    </div>
    <div class="modal fade" id="ApplyGuidance" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="subheading">Apply for Forgiveness</h3>
                </div>
                <div class="modal-body">
                    <p>Only upgraded plan users can see guidance and recommendations on how to maximize PPP Loan Forgiveness. <a href="<?Php echo base_url();?>user/pricing">Upgrade</a> your account to enable this feature.</p>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    

<div class="modal fade" id="EIDLmodal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
                
          <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3 class="subheading">EIDL Guidance</h3>
        </div>
        <div class="modal-body">
               <?php          
              if($selectedplan->show_guidance=="no")//to not show this condition for now
    {?>
        
        <p>Only upgraded plan users can see guidance and recommendations on how to maximize PPP Loan Forgiveness. <a href="<?Php echo base_url();?>user/pricing">Upgrade</a> your account to enable this feature.</p>
        
   <?php  } else{
            ?>
        <h4 class="subheading2">EIDL Guidance</h4>
                                <div class="border bordersetting">
                                <ul>
                                   <?php 
                                        if($eidl_grant_amount==""&& $eidl_loan_amount==""){
                                            ?>
                                    <li>
                                    You did not receive any EIDL Grant or EIDL Loan. Therefore there is no related guidance available that has any effect on your PPP Loan Forgiveness.
                                    </li>
                                    
                                    <?php
                                        }else{
                                    ?>
                                    
                                   <?php 
                                        if($eidl_grant_amount>0){
                                            ?>
                                            <h4 class="subheading">Payroll guidance</h4>
                                    <li>You received EIDL Grant of  $<?php echo number_format($eidl_grant_amount, 2, '.', ',');?> which does not effect PPP Loan Forgiveness</li>
                                    
                                    <?php
                                        }
                                    if($eidl_loan_amount  > 0 && $eidl_loan_date  < strtotime(date("2020-04-03"))){
                                        ?>
                                    <li>You received EIDL Loan of  $<?php echo number_format($eidl_loan_amount, 2, '.', ',');?> on <?php echo date("m-d-Y", strtotime($loandata->eidl_loan_date)) ;?>. If you used any of EIDL Loan for payroll costs, and your bank/lender did not subtract EIDL loan for calculating PPP Loan amount, you require Professional Guidance. <span class="bu">PPPGuides recommends</span> that you contact us to discuss your specific situation</li>
                                    <?php
                                    }
                                    
                                    if($eidl_loan_amount  > 0 && $eidl_loan_date  > strtotime(date("2020-04-03"))){
                                        ?>
                                    <li>You received EIDL Loan of  $<?php echo number_format($eidl_loan_amount, 2, '.', ',');?> on <?php echo date("m-d-Y", strtotime($loandata->eidl_loan_date)) ;?>. Under PPP Loan and PPP Forgiveness guidelines, you cannot use any EIDL Loan dollars for any payroll costs. If you have, <span class="bu">PPPGuides recommends</span> that you contact us to discuss your specific situation.</li>
                                    <?php
                                    }
                                    ?>
                                    
                                    
                                    
                                    
                                    
                                </ul>
                                </div> 
                                
        
        <?php }} ?>
        </div>
       
      </div>
    </div>
  </div>


<div class="modal fade" id="eightweekmodal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
                
          <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3 class="subheading">8 week Guidance</h3>
        </div>
        <div class="modal-body">
               <?php          
              if($selectedplan->show_guidance=="no")
    {?>
        
        <p>Only upgraded plan users can see guidance and recommendations on how to maximize PPP Loan Forgiveness. <a href="<?Php echo base_url();?>user/pricing">Upgrade</a> your account to enable this feature.</p>
        
   <?php  } else{
            ?>
        <h4 class="subheading2">8 Week Guidance </h4>
                                <div class="border bordersetting">
                                <ul>
                                   <?php 
                                        if($isalternate8_over=="Yes"){
                                            ?>
                                    <li>
                                    Your 8 weeks forgiveness period is already over. PPPGuides will ignore 8 week forgiveness, as there are better chances of higher forgiveness with 24 weeks.
                                    </li>
                                    
                                    <?php
                                        }else{
                                    ?>
                                    
                                   <?php 
                                        if($loan_amount60>=$payroll8_tcost){
                                            ?>
                                            <h4 class="subheading">Payroll guidance</h4>
                                    <li>
                                        
                                    	Under PPP guidelines, a business must spend at least 60% of loan amount on payroll.  You have spent $<?php echo $payroll8_tcost;?> under 8 weeks forgiveness plan, whereas you <span class="bu">must spend at least $<?php echo number_format($loan_amount60);?>. This is a show stopper</span>. You have some work to do </li><li>
                                    Any non-owner employee may be paid up to maximum of $15,385 during 8 weeks forgiveness period. </li><li>
                                    <span class="bu">PPPGuides recommends</span> that you look into increasing your payroll costs by 
                                    <ol><li>hiring additional employees </li>
                                    <li>giving a raise to one or more employees </li>
                                    <li> pay 8 weeks pro-rated portion of annual bonuses early </li>
                                    <li> Pay any unpaid commissions that you would pay later now . </li>
                                    <li>Pay any incurred, but unpaid wages like sick days / vacation days during forgiveness period.</li>
                                    </ol>
                                    </li>
                                    <?php
                                        }
                                    else{
                                        ?>
                                    <li>Under PPP guidelines, a business must spend at least 60% of loan amount on payroll.  You have spent $<?php echo $payroll8_tcost;?> under 8 weeks forgiveness plan, which is greater than minimum amount of $<?php echo number_format($loan_amount60);?>. <span class="bu">You are in a good shape.</span></li>
                                    <?php
                                    }
                                    ?>
                                    
                                    
                                    
                                    <?php 
                                    $i=0;
                                    //echo count($payroll8_array);
                                        foreach($payroll8_array as $payroll8_owner){
                                            
                                            $payroll8_powner=intval($payroll8_owner);
                                            if(strlen($ownerdata->owner2019_pay)<2){?>
                                            
                                    <br>
                                    <?php if($i==0){?>
                                            <h4 class="subheading">Owner guidance</h4> 
                                      <?php      
                                    }
                                    ?>
                                    <ul>
                                    <li style="color:red">Application is looking for owner and there is no owner entered.</li>
                                </ul>
                                            
                                            <?php
                                           // echo $i;
                                                break;
                                            }
                                            $owner2019_pay= $payroll2019_array[$i];
                                            $payroll8_improve=$payroll8_powner - (($owner2019_pay/52)*8);
                                               if($payroll8_improve<0 && $payroll8_powner < 15385 ) { 
                                           ?> 
                                    <br>
                                    <?php if($i==0){?>
                                            <h4 class="subheading">Owner guidance</h4> 
                                      <?php      
                                    }
                                    ?>
                                    <ul>
                                        <li> This guidance is for owner <span class="u"> <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?> </span>
                                    <li>Under PPP guidelines, a business can pay each owner up to $15,385 during 8 week forgiveness period, as long as it does not exceed owner’s 8 week wages paid in 2019. </li>
                                        <li>You reported that <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?>  received $<?php echo number_format($payroll8_powner);?> in 8 week forgiveness period, and <?php echo explode("~",$ownerdata->first_name)[$i]?> average 8 week 2019 payroll was $<?php echo number_format($owner2019_pay/52*8, 2, '.', ',');?>.</li>
                                        <?php if ((15385 - $payroll8_powner)>0){?>
                                        <li>To increase forgiveness, <span class="bu">PPPGuides recommends</span> that the business pay <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?> an additional $<?php echo number_format(15385 - $payroll8_powner);?>.</li> 
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <li>You have paid <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?> $<?php echo $payroll8_powner;?> which is more than allowed. Per PPP Guidelines, only $15,385 amount can be used towards 8-week forgiveness period.
</li>

                                        <?php 
                                        }
                                        ?>
                                        <li><span class="bu">NOTE:</span> This does not apply if <?php echo explode("~",$ownerdata->first_name)[$i]?>   <?php echo explode("~",$ownerdata->last_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?>  also owns or is affiliated with another business that received a PPP loan. $15,385 maximum allowed for owners, during 24 week forgiveness period, is across all businesses <?php echo explode("~",$ownerdata->first_name)[$i]?> owns.
                                        </li>
                                    
                                    </ul>
                                        
                                                
                                                
                                                
                                                
                                                 
                                                <?php 
                                               }
                                                $i++;
                                        }
                                    
                                    ?>
                                    
                                    
                                    
                                    
                                    
                                   <?php 
                                        if($loan_amount40>=$alternate8_nopayroll){
                                            ?>
                                    <br>
                                            
                                            <h4 class="subheading">Non-payroll guidance</h4>
                                    <li>
                                    	Under PPP guidelines, a business can spend <b>no more than 40%</b> of loan amount on non-payroll costs like Rent, Mortgage Interest and Eligible Utilities.</li>
                                    <li>  You have spent $<?php echo $alternate8_nopayroll;?> under 8 weeks forgiveness plan, which is less than maximum allowed amount of $<?php echo number_format($loan_amount40);?>. </li>
                                    <li>  <span class="bu">PPPGuides recommends</span> that you can increase your forgiveness by
                                    <ol><li>Checking if there are other eligible non-payroll costs you didn’t account for (Rent, Mortgage Interest and Eligible Utilities). </li>
                                    <li>These costs can be incurred during forgiveness period, but paid at a later date. </li>
                                    <li>These costs can also be incurred prior to forgiveness period, but paid during forgiveness period
                                    </ol>
                                    </li>
                                    <?php
                                        }
                                    else{
                                        ?>
                                    <br>
                                            
                                            <h4 class="subheading">Non-payroll guidance</h4>
                                    <li>Under PPP guidelines, a business must spend <b>no more than 40%</b> of loan amount on payroll.  </li>
                                    <li>You have spent $<?php echo $alternate8_nopayroll;?> under 8 weeks forgiveness plan, whereas you can spend maximum $<?php echo number_format($loan_amount40);?>. <b>Your forgiveness amount will be reduced</b> by $<?php echo number_format($loan_amount40 - $alternate8_nopayroll);?>.</li>
                                    <li><span class="bu">PPPGuides recommends</span> you account for this reduction of $<?php echo number_format($loan_amount40 - $alternate8_nopayroll);?>, and look into payroll costs to manage these reductions.
                                    </li>
                                    <?php
                                    }}
                                    ?>
                                    
                                    
                                   
                                   
                                    
                                    <h4 class="subheading">General Guidance</h4>
                                    
                                     
                                     <li>
                                    <b>Safe Harbor</b> – if an employee was laid off/left/forced to not work due to Government Mandates – when lockdown over – if employer emails old employee to return – and employee refuses – that “documentation” , combined with notification to State’s Unemployment Department, can  can be used to obtain forgiveness for that employee (using that employee FTE count and Wages). <span class="bu">PPPGuides recommends</span> that you consult a professional to assure that your documentation is adequate to count these “unpaid” wages as “payroll costs”. PPPGuides has professionals who can help you with this. Please contact us to receive this help.</li>
                                    
                                        <?php 
                                            if($EntityType="C-Corp"){ 
                                            ?>
                                            <li><b>For clarification on next 3 items </b>– see Question 8 at this <a href="https://www.sba.gov/sites/default/files/2020-08/PPP%20Loan%20Forgiveness%20FAQs%208-4-20.pdf">link</a>
                                            <ul>
                                            
                                            <li><u>Health insurance contributions (for C-corporation owners) </u>- Employer contributions for health insurance ARE eligible for additional forgiveness for owners of C-corporation (any % ownership) </li>
                                            
                                            <li><u>Owner compensation (for C-corporation owners) </u>- eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 employee cash compensation (subject to a cap of $20,833 for 24 week forgiveness period, and a cap of $15,385 for 8 week forgiveness period) (these caps are across all businesses the owner owns, that received a PPP loan) </li>
                                            
                                            <li><u>Owner retirement contributions  (for C-corporation owners) </u> - eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 employer retirement contribution
                                            </ul>
                                            </li>
                                            
                                            <?php
                                            }else if($EntityType="S-Corp"){
                                            ?>
                                            <li><b>For clarification on next 3 items </b>– see Question 8 at this <a href="https://www.sba.gov/sites/default/files/2020-08/PPP%20Loan%20Forgiveness%20FAQs%208-4-20.pdf">link</a>
                                            <ul>
                                            
                                            <li><u>Health insurance contributions (for S-corporation owners) </u> - Employer contributions for health insurance are NOT eligible for additional forgiveness for owners of S-corporation with 2% or more ownership in the business or their family members.</li>
                                            
                                            <li><u>Owner compensation (for S-corporation owners) </u>- eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 employee cash compensation (subject to a cap of $20,833 for 24 week forgiveness period, and a cap of $15,385 for 8 week forgiveness period) (these caps are across all businesses the owner owns, that received a PPP loan) </li>
                                            
                                            <li><u>Owner retirement contributions  (for S-corporation owners) </u>- eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 employer retirement contribution
                                            </ul>
                                            </li>
                                            
                                            <?php
                                            }else if($EntityType="Partnership"){
                                            ?>
                                            <li><b>For clarification on next 2 items</b> – see Question 8 at this <a href="https://www.sba.gov/sites/default/files/2020-08/PPP%20Loan%20Forgiveness%20FAQs%208-4-20.pdf">link</a>
                                            <ul>
                                            <li><u>Health insurance, Retirement, or State or local tax contributions (for Partnership Owners)</u> - Employer contributions for health insurance, retirement of state/local taxes are NOT eligible for additional forgiveness  </li>
                                            
                                            <li><u>Owner compensation (for Partnership owners)</u>- eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 net earnings (computed from 2019 IRS Form 1065 Schedule K-1 box 14a (reduced by box 12 section 179 expense deduction, unreimbursed partnership expenses deducted on their IRS Form 1040 Schedule SE, and depletion claimed on oil and gas properties) multiplied by 0.9235). Compensation is only eligible for loan forgiveness if the payments to partners are made during the Covered Period or Alternative Payroll Covered Period. 
                                            </ul>
                                            </li>
                                            
                                            <?php
                                            }else if($EntityType="Self-Employed/Sole Proprietor"){
                                            ?>
                                            <li><b>For clarification on next 2 items</b> – see Question 8 at this <a href="https://www.sba.gov/sites/default/files/2020-08/PPP%20Loan%20Forgiveness%20FAQs%208-4-20.pdf">link</a> 
                                            <ul>
                                            
                                            <li><u>Health insurance, Retirement, or State or local tax contributions (for Self-Employed/Sole Propreitor owners)</u> - Employer contributions for health insurance, retirement of state/local taxes are NOT eligible for additional forgiveness </li>
                                            
                                            <li><u>Owner compensation (for Self-Employed/Sole Proprietor)</u> - eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 profit, as reported on Schedule C line-31 or Schedule-F line-34, (or for a new businesses, the estimated 2020 Schedule C (or Schedule F)  referenced in question 10 of PPP Loan). If the borrower did not submit its 2019 IRS Form 1040 Schedule C (or F) to the Lender when the borrower initially applied for the loan, it must be included with the borrower’s forgiveness application.
                                            </ul>
                                            </li>
                                            
                                            
                                            <?php
                                            }
                                            ?>
                                    <li><b>Incurred Retirement Plan Contributions</b> pro-rated portion (8 or 24 week) – that you may be ‘expecting’ to contribute later, <span class="bu">PPPGuides recommends</span> that you pay them prior to 12/31/2020 (preferably during the forgiveness period).</li>
                                    
                                    <li><b>Payoff State Unemployment Insurance Deficit </b> – Several businesses can expect that their Unemployment accounts are in deficit. <span class="bu">PPPGuides recommends</span> that you call your state unemployment, and payoff any deficits prior to 12/31/2020. These costs can be included in “State and Local Taxes”. </li>

                                    <li><b>State Unemployment Insurance Premiums</b>– Several businesses can expect that their Unemployment Insurance rates have or will go up, as a result of extensive Covid-19 related unemployment claims. You may be able to Pay Off some of these expenses earlier. <span class="bu">PPPGuides recommends</span> that you contact you state’s unemployment insurance department to make sure your UI rate is accurate when running payroll. </li>
                                    <li><b>Other State Insurance/Retirement/ Disability/Aflac Insurance/Section 125 Cafeteria Plan Expenses:</b> Similar to State Unemployment, many states have other taxes/insurances (e.g. New York has NYS SDI State Disability Insurance). These may be eligible as payroll costs for PPP Forgiveness application. <span class="bu">PPPGuides recommends</span> that you consult a professional to assure that your documentation is adequate to count these “unpaid” wages as “payroll costs”. PPPGuides has professionals who can help you with this. Please contact us to receive this help.</li>
                                    <li><b>Health Savings Account / HSA:</b> If your business had a HSA plan in effect on 2/15/2020, you may be able to count employer contributions to these accounts as a payroll / benefit expense. These can be paid after forgiveness period ends, but no later than 12/31/2020. </li>
                                    <li><b>Health benefits of Ex-employees:</b> If your business pays for any health benefits for any old/terminated employees, these expenses may be eligible as benefits expense and can be included as benefits costs.</li>
                                    <li><b>Other State/Local Taxes:</b> Several states and localities like NJ, MA, Nevada, Newark Nj, Oregon, NYC area counties have unique taxes (e.g. NYC area has MTA Commuter Taxes). These expenses can be used as payroll costs in your PPP Forgiveness application.  <span class="bu">PPPGuides recommends</span> that you verify that you are including any taxes specific to your state / county / local jurisdiction.
                                        </li>

                                        </ul>
                                </div> 
                                
        
        <?php }?>
        </div>
       
      </div>
    </div>
  </div>






  <div class="modal fade" id="twentyfourweekmodal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h3 class="subheading">24 week Guidance</h3>
    
        </div>
        <div class="modal-body">
   <?php          
              if($selectedplan->show_guidance=="no")
    {?>
        <p>Only upgraded plan users can see guidance and recommendations on how to maximize PPP Loan Forgiveness. <a href="<?Php echo base_url();?>user/pricing">Upgrade</a> your account to enable this feature.</p>
        
   <?php  } else{
            ?>
            
        <h4 class="subheading2">24 Week Guidance </h4>
                                <div class="border bordersetting">
                                    <ul>
                                   <?php 
                                        if($isalternate24_over=="Yes"){
                                            ?>
                                    <li>
                                    Your 24 weeks forgiveness period is already over. There are limited options available to increase forgiveness. Please add package for Professional Assistance to receive personal recommendations from a PPPGuides professional.
                                    </li>
                                    
                                    <?php
                                        }else{
                                    ?>
                                        
                                        
                                        
                                        <?php 
                                        if($loan_amount60>=$payroll24_tcost){
                                            ?>
                                            
                                            <h4 class="subheading">Payroll guidance</h4>
                                    <li>
                                    	Under PPP guidelines, a business must spend at least 60% of loan amount on payroll.  You have spent $<?php echo $payroll24_tcost;?> under 24 weeks forgiveness plan, whereas you <span class="bu">must spend at least $<?php echo number_format($loan_amount60);?>. This is a show stopper</span>. You have some work to do </li><li>
                                    Any non-owner employee may be paid up to maximum of $15,385 during 24 weeks forgiveness period. </li><li>
                                    <span class="bu">PPPGuides recommends</span> that you look into increasing your payroll costs by 
                                    <ol><li>hiring additional employees </li>
                                    <li>giving a raise to one or more employees </li>
                                    <li> pay 24 weeks pro-rated portion of annual bonuses early </li>
                                    <li> Pay any unpaid commissions that you would pay later now . </li>
                                    <li>Pay any incurred, but unpaid wages like sick days / vacation days during forgiveness period.</li>
                                    </ol>
                                    </li>
                                    <?php
                                        }
                                    else{
                                        ?>
                                    <li>Under PPP guidelines, a business must spend at least 60% of loan amount on payroll.  You have spent $<?php echo $payroll24_tcost;?> under 24 weeks forgiveness plan, which is greater than minimum amount of $<?php echo number_format($loan_amount60);?>. <span class="bu">You are in a good shape.</span></li>
                                    <?php
                                    }
                                    ?>
                                        
                                       <?php 
                                    $i=0;
                                        foreach($payroll24_array as $payroll24_owner){
                                            $payroll24_powner=intval($payroll24_owner);
                                            if(strlen($ownerdata->owner2019_pay)<2){?>
                                            
                                    <br>
                                    <?php if($i==0){?>
                                            <h4 class="subheading">Owner guidance</h4> 
                                      <?php      
                                    }
                                    ?>
                                    <ul>
                                    <li style="color:red">Application is looking for owner and there is no owner entered.</li>
                                </ul>
                                            
                                            <?php
                                           // echo $i;
                                                break;
                                            }
                                            $owner2019_pay= $payroll2019_array[$i];
                                            $payroll24_improve=$payroll24_powner - (($owner2019_pay/52)*24);
                                               if($payroll24_improve<0 && $payroll24_powner < 20833 ) { 
                                           ?> 
                                    <br>
                                    <?php if($i==0){?>
                                            <h4 class="subheading">Owner guidance</h4> 
                                      <?php      
                                    }
                                    ?>
                                    <ul>
						  <li> This guidance is for owner <span class="u"> <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?> </span>

                                    <li>Under PPP guidelines, a business can pay each owner up to $20,833 during 24 week forgiveness period, as long as it does not exceed owner’s (2.5/12) times 2019 wages.</li>
                                        <li>You reported that <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?>  received $<?php echo number_format($payroll24_powner);?> in 24 week forgiveness period, and <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?>  average 24 week 2019 payroll was $<?php echo number_format($owner2019_pay/52*24, 2, '.', ',');?>.</li>
                                       <?php if ((20833 - $payroll24_powner)>0){?>
                                        <li>To increase forgiveness, <span class="bu">PPPGuides recommends</span> that the business pay <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?> an additional $<?php echo number_format(20833 -$payroll24_powner);?>.</li> 
                                        <?php } else {
                                            ?>
                                            <li>You have paid <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?> $<?php echo $payroll24_powner;?>, which is more than allowed. Per PPP Guidelines, only $20,833 amount can be used towards 24-weel forgiveness period.</li>

                                            
                                            <?php
                                        } ?>
                                        <li>	<span class="bu">NOTE:</span> This does not apply if <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?> also owns or is affiliated with another business that received a PPP loan. $20,833 maximum allowed for owners, during 24 week forgiveness period, is across all businesses <?php echo explode("~",$ownerdata->first_name)[$i]?> <?php echo explode("~",$ownerdata->last_name)[$i]?>  owns.
                                        </li>
                                    
                                    </ul>
                                        
                                                
                                                
                                                
                                                
                                                 
                                                <?php 
                                               }
                                                $i++;
                                        }
                                    
                                    ?> 
                                    
                                    
                                        
                                        
                                        <?php 
                                        if($loan_amount40>=$alternate24_nopayroll){
                                            ?>
                                    <br>
                                            <h4 class="subheading">Non-payroll guidance</h4>
                                    <li>
                                    	Under PPP guidelines, a business can spend <b>no more than 40%</b> of loan amount on non-payroll costs like Rent, Mortgage Interest and Eligible Utilities.</li>
                                    <li>  You have spent $<?php echo $alternate24_nopayroll;?> under 24 weeks forgiveness plan, which is less than maximum allowed amount of $<?php echo number_format($loan_amount40);?>. </li>
                                    <li>  <span class="bu">PPPGuides recommends</span> that you can increase your forgiveness by
                                    <ol><li>Checking if there are other eligible non-payroll costs you didn’t account for (Rent, Mortgage Interest and Eligible Utilities). </li>
                                    <li>These costs can be incurred during forgiveness period, but paid at a later date. </li>
                                    <li>These costs can also be incurred prior to forgiveness period, but paid during forgiveness period
                                    </ol>
                                    </li>
                                    <?php
                                        }
                                    else{
                                        ?>
                                    <br>
                                            <h4 class="subheading">Non-payroll guidance</h4>
                                    <li>Under PPP guidelines, a business must spend <b>no more than 40%</b> of loan amount on payroll.  </li>
                                    <li>You have spent $<?php echo $alternate24_nopayroll;?> under 24 weeks forgiveness plan, whereas you can spend maximum $<?php echo number_format($loan_amount40);?>. <b>Your forgiveness amount will be reduced</b> by $<?php echo number_format($loan_amount40 - $alternate24_nopayroll);?>.</li>
                                    <li><span class="bu">PPPGuides recommends</span> you account for this reduction of $<?php echo number_format($loan_amount40-$alternate24_nopayroll);?>, and look into payroll costs to manage these reductions.
                                    </li>
                                    <?php
                                    }}
                                    ?> <h4 class="subheading">General Guidance</h4>
                                        <li>
                                    <b>Safe Harbor</b> – if an employee was laid off/left/forced to not work due to Government Mandates – when lockdown over – if employer emails old employee to return – and employee refuses – that “documentation”, combined with notification to State’s Unemployment Department, can be used to obtain forgiveness for that employee (using that employee FTE count and Wages). <span class="bu">PPPGuides recommends</span> that you consult a professional to assure that your documentation is adequate to count these “unpaid” wages as “payroll costs”. PPPGuides has professionals who can help you with this. Please contact us to receive this help.</li>
                                    
                                    <?php 
                                            if($EntityType="C-Corp"){ 
                                            ?>
                                            <li><b>For clarification on next 3 items </b>– see Question 8 at this <a href="https://www.sba.gov/sites/default/files/2020-08/PPP%20Loan%20Forgiveness%20FAQs%208-4-20.pdf">link</a>
                                            <ul>
                                            
                                            <li><u>Health insurance contributions (for C-corporation owners) </u>- Employer contributions for health insurance ARE eligible for additional forgiveness for owners of C-corporation (any % ownership) </li>
                                            
                                            <li><u>Owner compensation (for C-corporation owners) </u>- eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 employee cash compensation (subject to a cap of $20,833 for 24 week forgiveness period, and a cap of $15,385 for 8 week forgiveness period) (these caps are across all businesses the owner owns, that received a PPP loan) </li>
                                            
                                            <li><u>Owner retirement contributions  (for C-corporation owners) </u> - eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 employer retirement contribution
                                            </ul>
                                            </li>
                                            
                                            <?php
                                            }else if($EntityType="S-Corp"){
                                            ?>
                                            <li><b>For clarification on next 3 items </b>– see Question 8 at this <a href="https://www.sba.gov/sites/default/files/2020-08/PPP%20Loan%20Forgiveness%20FAQs%208-4-20.pdf">link</a>
                                            <ul>
                                            
                                            <li><u>Health insurance contributions (for S-corporation owners) </u> - Employer contributions for health insurance are NOT eligible for additional forgiveness for owners of S-corporation with 2% or more ownership in the business or their family members.</li>
                                            
                                            <li><u>Owner compensation (for S-corporation owners) </u>- eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 employee cash compensation (subject to a cap of $20,833 for 24 week forgiveness period, and a cap of $15,385 for 8 week forgiveness period) (these caps are across all businesses the owner owns, that received a PPP loan) </li>
                                            
                                            <li><u>Owner retirement contributions  (for S-corporation owners) </u>- eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 employer retirement contribution
                                            </ul>
                                            </li>
                                            
                                            <?php
                                            }else if($EntityType="Partnership"){
                                            ?>
                                            <li><b>For clarification on next 2 items</b> – see Question 8 at this <a href="https://www.sba.gov/sites/default/files/2020-08/PPP%20Loan%20Forgiveness%20FAQs%208-4-20.pdf">link</a>
                                            <ul>
                                            <li><u>Health insurance, Retirement, or State or local tax contributions (for Partnership Owners)</u> - Employer contributions for health insurance, retirement of state/local taxes are NOT eligible for additional forgiveness  </li>
                                            
                                            <li><u>Owner compensation (for Partnership owners)</u>- eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 net earnings (computed from 2019 IRS Form 1065 Schedule K-1 box 14a (reduced by box 12 section 179 expense deduction, unreimbursed partnership expenses deducted on their IRS Form 1040 Schedule SE, and depletion claimed on oil and gas properties) multiplied by 0.9235). Compensation is only eligible for loan forgiveness if the payments to partners are made during the Covered Period or Alternative Payroll Covered Period. 
                                            </ul>
                                            </li>
                                            
                                            <?php
                                            }else if($EntityType="Self-Employed/Sole Proprietor"){
                                            ?>
                                            <li><b>For clarification on next 2 items</b> – see Question 8 at this <a href="https://www.sba.gov/sites/default/files/2020-08/PPP%20Loan%20Forgiveness%20FAQs%208-4-20.pdf">link</a> 
                                            <ul>
                                            
                                            <li><u>Health insurance, Retirement, or State or local tax contributions (for Self-Employed/Sole Propreitor owners)</u> - Employer contributions for health insurance, retirement of state/local taxes are NOT eligible for additional forgiveness </li>
                                            
                                            <li><u>Owner compensation (for Self-Employed/Sole Proprietor)</u> - eligible for loan forgiveness up to the amount of 2.5/12 of their 2019 profit, as reported on Schedule C line-31 or Schedule-F line-34, (or for a new businesses, the estimated 2020 Schedule C (or Schedule F)  referenced in question 10 of PPP Loan). If the borrower did not submit its 2019 IRS Form 1040 Schedule C (or F) to the Lender when the borrower initially applied for the loan, it must be included with the borrower’s forgiveness application.
                                            </ul>
                                            </li>
                                            
                                            
                                            <?php
                                            }
                                            ?>
                                    
                                    
                                    <li><b>Incurred Retirement Plan Contributions</b> pro-rated portion (8 or 24 week) – that you may be ‘expecting’ to contribute later, <span class="bu">PPPGuides recommends</span> that you pay them prior to 12/31/2020 (preferably during the forgiveness period).</li>
                                    
                                    <li><b>Payoff State Unemployment Insurance Deficit </b> - Several businesses can expect that their Unemployment accounts are in deficit. <span class="bu">PPPGuides recommends</span> that you call your state unemployment, and payoff any deficits prior to 12/31/2020. These costs can be included in “State and Local Taxes”. </li>

                                    <li><b>State Unemployment Insurance Premiums</b>– Several businesses can expect that their Unemployment Insurance rates have or will go up, as a result of extensive Covid-19 related unemployment claims. You may be able to Pay Off some of these expenses earlier. <span class="bu">PPPGuides recommends</span> that you contact you state’s unemployment insurance department to make sure your UI rate is accurate when running payroll. </li>
                                    <li><b>Other State Insurance/Retirement/ Disability/Aflac Insurance/Section 125 Cafeteria Plan Expenses:</b> Similar to State Unemployment, many states have other taxes/insurances (e.g. New York has NYS SDI State Disability Insurance). These may be eligible as payroll costs for PPP Forgiveness application. <span class="bu">PPPGuides recommends</span> that you consult a professional to assure that your documentation is adequate to count these “unpaid” wages as “payroll costs”. PPPGuides has professionals who can help you with this. Please contact us to receive this help.</li>
                                    <li><b>Health Savings Account / HSA:</b> If your business had a HSA plan in effect on 2/15/2020, you may be able to count employer contributions to these accounts as a payroll / benefit expense. These can be paid after forgiveness period ends, but no later than 12/31/2020. </li>
                                    <li><b>Health benefits of Ex-employees:</b> If your business pays for any health benefits for any old/terminated employees, these expenses may be eligible as benefits expense and can be included as benefits costs.</li>
                                    <li><b>Other State/Local Taxes:</b> Several states and localities like NJ, MA, Nevada, Newark Nj, Oregon, NYC area counties have unique taxes (e.g. NYC area has MTA Commuter Taxes). These expenses can be used as payroll costs in your PPP Forgiveness application.<span class="bu">PPPGuides recommends</span> that you verify that you are including any taxes specific to your state / county / local jurisdiction. 
                                        </li></ul>
                                        
                                    
                                    </ul>
                                    
                                    
                                    
                                    <?php  }?>
                                </div>
       
        </div>
       
      </div>
    </div>
  </div>





  
  <div class="modal fade" id="generalweekmodal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
    
        </div>
        <div class="modal-body">
        </div>
       
      </div>
    </div>
  </div>
 