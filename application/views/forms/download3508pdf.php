<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Loan Form</title>
    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <style>
        /* General*/
        * {}
       table #mytable.underline,.underline{
            border-bottom:1px solid #555 !important;
        }
        body {
            color: #000 !important;

        }
     
        .bold {font-weight: 900 !important; 
            font-size: 15px !important;

        }
        small {
            color: black !important;

        }

        table.table.table-bordered {
            font-size: 8px;


        }

        table.table.details {
            font-size: 10px;
            color: #000 !important;
       

        }
        #mytable,tbody,
table#mytable td,table#mytable tr
{
    border: none ;
     height: 10px !important;
}
    
        .center {
            text-align: center !important;
        }
table.table-bordered{
    width:100%;
}
        table.table-bordered>tbody>tr>td {
            border: 1px solid black !important;
            color: black;
   


        }

        table.table-bordered>tbody>tr>th {
            border: 1px solid black !important;
            color: black !important;


        }


        input[type="text"] {
            border: none;
            background-color: transparent;
            outline: none;
            width: 74%;
            /*            margin-top: 6px;*/
            /*            margin-left: 6px;*/
        }



        textarea {
            border: none;
            resize: none;
            outline: none;
        }

        /*   input[type="checkbox"] {
            margin-top: 0px !important;
        }

         End General*/


        .tbl-loan tbody tr td:nth-child(2n+1) {
            background: #dadada;

        }
        

@page {
  size: A4 ;
}

        .loan-ftr {
            margin-top: 150px
        }
        .top-header td{
            font-size:14px;
        }
        .full_width{
            width: 100%;
        }
        .box{
            display: inline-block;
        }
th, td {
  height: 20px !important;
  

}
h6{font-size: 11px !important;}
*{
     font-size: 12px;
     
}

.lineheight *{line-height: 1.6 !important;}
.formrow *{line-height: 1.8 !important;}
h4{
     font-size: 18px !important;
}
.leftspace{padding: 5px  0 15px !important;
     
}
h5{
     font-size: 13px !important;
}
.fullspace{ padding: 2px 15px !important;}
    </style>
</head>

<body>
    
    		  <?php  
        		$val=$this->session->userdata("post");
        		$empname_ar=$this->session->userdata("empname_ar");
    			$empID_ar=$this->session->userdata("empID_ar");
    			$empBox1_ar=$this->session->userdata("empBox1_ar");
    			$empBox2_ar=$this->session->userdata("empBox2_ar");
    			$empBox3_ar=$this->session->userdata("empBox3_ar");
    			
    			$Tot_empBox1=$this->session->userdata("Tot_empBox1");
    			$Tot_empBox2=$this->session->userdata("Tot_empBox2");
    			$Tot_empBox3=$this->session->userdata("Tot_empBox3");
    			
    			$empname100plus_ar=$this->session->userdata("empname100plus_ar");
    			$empID100plus_ar=$this->session->userdata("empID100plus_ar");
    			$empBox4_ar=$this->session->userdata("empBox4_ar");
    			$empBox5_ar=$this->session->userdata("empBox5_ar");
    			
    			$Tot_empBox4=$this->session->userdata("Tot_empBox4");
    			$Tot_empBox5=$this->session->userdata("Tot_empBox5");
    			
    			$step_1=$this->session->userdata("step_1");
    			$step_2=$this->session->userdata("step_2");
    			$step_4=$this->session->userdata("step_4");
    
    		  ?>
    <main id="dbs_form">
        <div class="container">
            <header style="margin-top:100px;">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 text-left">
                           <!--  LOGO 
                            <img src="logo/loan_logo.JPG">-->
                        </div>
                        <div class="col-xs-6 col-sm-6  text-center">
                            <h4 >
                                <b>Paycheck Protection Program </b>
                            </h4>
                            <h5 class="center"><b>Loan Forgiveness Application Revised June 16, 2020</b></h5>
                            <h5 class="center"> <u><b>PPP Loan Forgiveness Calculation Form</b></u></h5>
                        </div>
                       <div class="col-xs-3 col-sm-3 text-right" >
                            <h6  style="margin-top:5px;">
                                <b>OMB Control Number 3245-0407</b>
                            </h6>
                            <h6><b>Expiration Date: 10/31/2020 </b></h6>
                        </div>
                    </div>
            </header>

            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="content top-header">
                        <table class=" table-bordered" cellspacing="0" cellpadding="0" style="text-align: center" style="margin-top:100px">
                            <tbody>
                                <tr style="background: #dadada;">

                                    <td><b>Business Legal Name (“Borrower”)</b></td>
                                    <td colspan="2" style="border-right:1px solid"><b>DBA or Tradename, if applicable</b></td>
                                </tr>
                                <tr>

                                    <td><?php echo $val["b_name"]?></td>
                                    <td colspan="2"><?php echo $val['trade_name']?></td>
                                   

                                </tr>
                                <tr style="background: #dadada;">

                                    <td><b>Business Address</b></td>
                                    <td><b>Business TIN (EIN, SSN)</b></td>
                                    <td><b>Business Phone</b></td>

                                </tr>
                                <tr>

                                    <td rowspan="3"><?php echo $val['b_address']?></td>
                                    <td><?php echo $val['tin_ssn']?></td>
                                    <td> <?php echo $val['phone']?></td>
                                </tr>
                                <tr>

                                  
                                    <td style="background: #dadada;"><b>Primary Contact</b></td>
                                    <td style="background: #dadada;"><b>E-mail Address</b></td>
                                </tr>
                                <tr>
                                  
                                    <td><?php echo $val['p_contact_name']?></td>
                                    <td> <?php echo $val['email']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
   
          
          
           <div class="row formrow" >
                
                <div class="col-xs-3">
                    <b>SBA PPP Loan Number:</b>
                </div>
                <div class="col-xs-2 underline center">
                    <?php echo $val['sba']?>
                </div>
                <div class="col-xs-3">
                     <b>Lender PPP Loan Number:</b>
                </div>
                <div class="col-xs-2 underline center">
                     <?php echo $val['loan_number']?>
                </div>
            </div>
             <div class="row formrow">
                
                <div class="col-xs-3">
                    <b>PPP Loan Amount:</b>
                </div>
                <div class="col-xs-2 underline center">
                    <?php echo $val['loan_amount']?>
                </div>
                <div class="col-xs-3">
                     <b>PPP Loan Disbursement Date:</b>
                </div>
                <div class="col-xs-2 underline center">
                     <?php echo $val['disbursement_date']?>
                </div>
            </div>
             <div class="row formrow">
                
                <div class="col-xs-4">
                    <b>Employees at Time of Loan Application:</b>
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['loantime_employees']?>
                </div>
                <div class="col-xs-4">
                     <b>Employees at Time of Forgiveness Application:</b>
                </div>
                <div class="col-xs-1 underline center">
                     <?php echo $val['forgivenesstime_employees']?>
                </div>
            </div>
             <div class="row formrow">

                <div class="col-xs-3">
                    <b>EIDL Advance Amount:</b>
                </div>
                <div class="col-xs-2 underline center">
                    <?php echo $val['eidl_grant_amount']?>
                </div>
                <div class="col-xs-3">
                     <b>EIDL Application Number:</b>
                </div>
                <div class="col-xs-2 underline center">
                     <?php echo $val['eidl_grant_app_num']?>
                </div>
            </div>
           
   <p>
        
                   <b>Payroll Schedule: </b> <span style="color : #555 !important ;"> The frequency with which payroll is paid to employees is:</span> 
     </p>           
       
            <div class="row formrow">
                <div class="col-xs-2">
                        <input type="checkbox" value="" id="Weekly"/> <b>Weekly</b>
                </div>
                <div class="col-xs-3">
                        <input type="checkbox" value="" id="BiWeekly"/> <b>BiWeekly</b> (every other week)
                </div>
                <div class="col-xs-2">
                        <input type="checkbox" value="" id="SemiMonthly"/> <b>Twice a month</b>
                </div>
                <div class="col-xs-2">
                        <input type="checkbox" value="" id="Monthly"/> <b>Monthly</b>
                </div>
                <div class="col-xs-2">
                        <input type="checkbox" value="" id="Qtrly" style="margin-top:10px"/> <b>Other</b>
                </div>
            </div>
            <script>
                $('#<?php echo $val['payroll_schedule']?>').prop('checked', true);
            </script>
         
          
            <div class="row formrow">

                <div class="col-xs-6">
                    <b>Covered Period:</b>
                </div>
                <div class="col-xs-5 underline center">
                    <?php echo $val['covered_period']?>
                </div>

            </div>
      
            <div class="row formrow">

                <div class="col-xs-6">
                    <b>Alternative Payroll Covered Period,if applicable:</b>
                </div>
                <div class="col-xs-5 underline center">
                    <?php echo $val['alternate_period']?>
                </div>

            </div>
         
            <div class="row formrow">

                <div class="col-xs-11">
                    
                    <b>If Borrower (together with affiliates, if applicable) received PPP loans in excess of $2 million, check here: </b> <input type="checkbox" disabled value="">
                </div>

            </div>
          
            <div class="row formrow">

                <div class="col-xs-11">
                    <b>Forgiveness Amount Calculation:</b>
                </div>

            </div>
            <div class="row formrow">
                <div class="col-xs-11">
                    <u>Payroll and Nonpayroll Costs
                    </u>
                </div>

            </div>
            <div class="row formrow">
                <div class="col-xs-8">
                    Line 1. Payroll Costs (enter the amount from PPP Schedule A, line 10):
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['SchA_Line10']?>
                </div>
            </div>
         
            <div class="row formrow">
                <div class="col-xs-8">
                    Line 2. Business Mortgage Interest Payments:
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['sum_mortgage']?>
                </div>
            </div>
           
            <div class="row formrow">
                <div class="col-xs-8">
                    Line 3. Business Rent or Lease Payments:
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['sum_rent']?>
                </div>
            </div>
         
            <div class="row formrow">
                <div class="col-xs-8">
                    Line 4. Business Utility Payments:
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['sum_utility']?>
                </div>

            </div>
        
            <div class="row formrow">

                <div class="col-xs-11">
                    <u>Adjustments for Full-Time Equivalency (FTE) and Salary/Hourly Wage Reductions
                    </u>
                </div>

            </div>
         
            <div class="row formrow">
                <div class="col-xs-8">
                    Line 5. Total Salary/Hourly Wage Reduction (enter the amount from PPP Schedule A, line 3)
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['SchA_Line3']?>
                </div>

            </div>
           
            <div class="row formrow">
                <div class="col-xs-8">
                    Line 6. Add the amounts on lines 1, 2, 3, and 4, then subtract the amount entered in line 5:
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['fapp_line6']?>
                </div>

            </div>
          
            <div class="row formrow">
                <div class="col-xs-8">
                    Line 7. FTE Reduction Quotient (enter the number from PPP Schedule A, line 13):
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['fapp_line7']?>
                </div>
            </div>
          
            <div class="row formrow">

                <div class="col-xs-10">
                    <u>Potential Forgiveness Amounts
                    </u>
                </div>
            </div>
      
            <div class="row formrow">
                <div class="col-xs-8">
                    Line 8. Modified Total (multiply line 6 by line 7)
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['fapp_line8']?>
                </div>
            </div>

            <div class="row formrow">
                <div class="col-xs-8">
                    Line 9. PPP Loan Amount
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['loan_amount']?>
                </div>

            </div>
          
            <div class="row formrow">
                <div class="col-xs-8">
                    Line 10. Payroll Cost 60% Requirement (divide line 1 by 0.60):
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['fapp_line10']?>
                </div>
            </div>
          

            <div class="row formrow ">

                <div class="col-xs-10">
                    <u>Forgiveness Amount
                    </u>
                </div>

            </div>
           
            <div class="row formrow">
                <div class="col-xs-8">
                    Line 11. Forgiveness Amount (enter the smallest of lines 8, 9, and10):
                </div>
                <div class="col-xs-3 underline center">
                    <?php echo $val['fapp_line11']?>
                </div>
            </div>  
            <br>  
         <footer>

        <span style="text-align: left ; color : #555 !important ; padding-top : 16px !important; padding-bottom: 0 !important;">SBA Form 3508 (06/20)<br>
            Page 1</span>


    </footer>
          
         <!--   <div style="page-break-after: always;"></div>-->
             
                 
           <header style="margin-top:100px;">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 text-left">
                           <!--  LOGO 
                            <img src="logo/loan_logo.JPG">-->
                        </div>
                        <div class="col-xs-6 col-sm-6  text-center">
                            <h4 style="margin-top: 5px;">
                                <b>Paycheck Protection Program </b>
                            </h4>
                            <h5 class="center"><b>Loan Forgiveness Application Revised June 16, 2020</b></h5>
                            <h5 class="center"> <u><b>PPP Loan Forgiveness Calculation Form</b></u></h5>
                        </div>
                        <div class="col-xs-3 col-sm-3 text-right" >
                            <h6  style="margin-top:5px;">
                                <b>OMB Control Number 3245-0407</b>
                            </h6>
                            <h6><b>Expiration Date: 10/31/2020 </b></h6>
                        </div>
                    </div>
            </header>
        
            <div class="row">

                <div class="col-xs-12">
                    <u><b>By Signing Below, You Make the Following Representations and Certifications on Behalf of the Borrower:</b>
                    </u>
                </div>
            </div>
            <br>
            <div class="row">

                <div class="col-xs-12">
                    The authorized representative of the Borrower certifies to all of the below by <b>initialing</b> next to each one

                </div>
            </div>
          
            <div class="row">
                <div class="col-xs-12">

                    <div class="load-form" style="padding: 10px;text-align: justify;">

                        ---The dollar amount for which forgiveness is requested:
                        <ul>
                            <li>was used to pay costs that are eligible for forgiveness (payroll costs to retain employees; business mortgage interest
                                payments; business rent or lease payments; or business utility payments);</li>
                            <li> includes all applicable reductions due to decreases in the number of full-time equivalent employees and
                                salary/hourly wage reductions;</li>
                            <li>includes payroll costs equal to at least 60% of the forgiveness amount;</li>
                            <li>if a 24-week Covered Period applies, does not exceed 2.5 months’ worth of 2019 compensation for any owneremployee or self-employed individual/general partner, capped at $20,833 per individual; and</li>
                            <li>if the Borrower has elected an 8-week Covered Period, does not exceed 8 weeks’ worth of 2019 compensation for
                                any owner-employee or self-employed individual/general partner, capped at $15,385 per individual.</li>

                        </ul>
                        ---I understand that if the funds were knowingly used for unauthorized purposes, the federal government may pursue recovery
                        of loan amounts and/or civil or criminal fraud charges.<br>
                        ---The Borrower has accurately verified the payments for the eligible payroll and nonpayroll costs for which the Borrower is
                        requesting forgiveness.<br>
                        ---I have submitted to the Lender the required documentation verifying payroll costs, the existence of obligations and service
                        (as applicable) prior to February 15, 2020, and eligible business mortgage interest payments, business rent or lease
                        payments, and business utility payments.<br>
                        ---The information provided in this application and the information provided in all supporting documents and forms is true
                        and correct in all material respects. I understand that knowingly making a false statement to obtain forgiveness of an
                        SBA-guaranteed loan is punishable under the law, including 18 U.S.C. 1001 and 3571 by imprisonment of not more than
                        five years and/or a fine of up to $250,000; under 15 U.S.C. 645 by imprisonment of not more than two years and/or a fine
                        of not more than $5,000; and, if submitted to a Federally insured institution, under 18 U.S.C. 1014 by imprisonment of not
                        more than thirty years and/or a fine of not more than $1,000,000.<br>
                        ---The tax documents I have submitted to the Lender are consistent with those the Borrower has submitted/will submit
                        to the IRS and/or state tax or workforce agency. I also understand, acknowledge, and agree that the Lender can share
                        the tax information with SBA’s authorized representatives, including authorized representatives of the SBA Office of
                        Inspector General, for the purpose of ensuring compliance with PPP requirements and all SBA reviews.<br>
                        ---I understand, acknowledge, and agree that SBA may request additional information for the purposes of evaluating the
                        Borrower’s eligibility for the PPP loan and for loan forgiveness, and that the Borrower’s failure to provide information
                        requested by SBA may result in a determination that the Borrower was ineligible for the PPP loan or a denial of the
                        Borrower’s loan forgiveness application.<br>
                        ---If the Borrower has checked the box for FTE Reduction Safe Harbor 1 on PPP Schedule A, the Borrower was unable
                        to operate between February 15, 2020 and the end of the Covered Period at the same level of business activity as
                        before February 15, 2020 due to compliance with requirements established or guidance issued between March 1, 2020
                        and December 31, 2020, by the Secretary of Health and Human Services, the Director of the Centers for Disease Control
                        and Prevention, or the Occupational Safety and Health Administration, related to the maintenance of standards of sanitation,
                        social distancing, or any other work or customer safety requirement related to COVID-19.

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-12">
                    The Borrower’s eligibility for loan forgiveness will be evaluated in accordance with the PPP regulations and guidance issued by SBA
                    through the date of this application. SBA may direct a lender to disapprove the Borrower’s loan forgiveness application if SBA
                    determines that the Borrower was ineligible for the PPP loan.

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-6">
                    <input type="text" name="" placeholder="" style="border: 0.5px solid;width:100%">
                    <p> Signature of Authorized Representative of Borrower</p>
                </div>
                <div class="col-xs-5">
                    <input type="text" name="" placeholder="" style="border: 0.5px solid;width:100%"> Date
                </div>
            </div><br>
            <div class="row">

                <div class="col-xs-6">
                    <input type="text" name="" placeholder="" style="border: 0.5px solid;width:100%">
                    <p> Print Name</p>
                </div>
                <div class="col-xs-5">
                    <input type="text" name="" placeholder="" style="border: 0.5px solid;width:100%"> Title
                </div>
            </div>
            
            
              <br>  
         <footer>

        <span style="text-align: left ; color : #555 !important ; padding-top : 16px !important; padding-bottom: 0 !important;">SBA Form 3508 (06/20)<br>
            Page 2</span>


    </footer>
            
            <div style="page-break-after: always;"></div>
             <div class="row">
                        <div class="col-xs-2 col-sm-2 text-left">
                           <!--  LOGO 
                            <img src="logo/loan_logo.JPG">-->
                        </div>
                        <div class="col-xs-5 col-sm-5  text-center">
                            <h4 style="margin-top: 5px;">
                                <b>Paycheck Protection Program </b>
                            </h4>
                            <h5 class="center"><b>Loan Forgiveness Application Revised June 16, 2020</b></h5>
                            <h5 class="center"> <u><b>PPP Loan Forgiveness Calculation Form</b></u></h5>
                        </div>
                        <div class="col-xs-4 col-sm-4 text-right" >
                            <h6  style="margin-top:5px;">
                                <b>OMB Control Number 3245-0407</b>
                            </h6>
                            <h6><b>Expiration Date: 10/31/2020 </b></h6>
                        </div>
                    </div>
            <div class="row">
                <div class="col-xs-10 text-center">
                    <u><b>PPP Schedule A</b>
                    </u>
                </div>

            </div>
            
            
            <div class="lineheight">
           
            <div class="row">

                <div class="col-xs-10">
                    <u>PPP Schedule A Worksheet, Table 1 Totals
                    </u>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-10">
                    Line 1. Enter Cash Compensation (Box 1) from PPP Schedule A Worksheet, Table 1:
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line1']?>
                </div>
            </div>
        
            <div class="row">


                <div class="col-xs-10">
                    Line 2. Enter Average FTE (Box 2) from PPP Schedule A Worksheet, Table 1:

                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line2']?>
                </div>

            </div>
         
            <div class="row">


                <div class="col-xs-10">
                    Line 3. Enter Salary/Hourly Wage Reduction (Box 3) from PPP Schedule A Worksheet,Table 1:
                    If the average annual salary or hourly wage for each employee listed on the PPP
                    Schedule A Worksheet, Table 1 during the Covered Period or the Alternative Payroll
                    Covered Period was at least 75% of such employee’s average annual salary or hourly
                    wage between January 1, 2020 and March 31, 2020, check here ☐ and enter 0 on line 3.

                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line3']?>
                </div>

            </div>

            <div class="row">

                <div class="col-xs-10">
                    <u>PPP Schedule A Worksheet, Table 2 Totals

                    </u>
                </div>

            </div>
         
            <div class="row">
                <div class="col-xs-10">
                    Line 4. Enter Cash Compensation (Box 4) from PPP Schedule A Worksheet, Table 2:
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line4']?>
                </div>

            </div>
         
            <div class="row">
                <div class="col-xs-10">
                    Line 5. Enter Average FTE (Box 5) from PPP Schedule A Worksheet, Table 2:
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line5']?>
                </div>

            </div>
          

            <div class="row">

                <div class="col-xs-10">
                    <u>Non-Cash Compensation Payroll Costs During the Covered Period or the Alternative Payroll Covered Period

                    </u>
                </div>

            </div>
     

            <div class="row">
                <div class="col-xs-10">
                    Line 6. Total amount paid or incurred by Borrower for employer contributions for employee health insurance:
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line6']?>
                </div>

            </div>
      
            <div class="row">
                <div class="col-xs-10">
                    Line 7. Total amount paid or incurred by Borrower for employer contributions to employee retirement plans:
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line7']?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-10">
                    Line 8. Total amount paid or incurred by Borrower for employer state and local taxes assessed on employee
                    compensation:
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line8']?>
                </div>

            </div>
        
            <div class="row">
                <div class="col-xs-11">
                    <u>Compensation to Owners</u>
                </div>


            </div>
            <div class="row">
                <div class="col-xs-10">
                    Line 9. Total amount paid to owner-employees/self-employedindividual/general partners:
                    This amount may not be included in PPP Schedule A Worksheet, Table 1 or 2. If there is
                    more than one individual included, attach a separate table that lists the names of and
                    payments to each.
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line9']?>
                </div>

            </div>
          
            <div class="row">
                <div class="col-xs-11">
                    <u>Total Payroll Costs</u>
                </div>


            </div>
            <div class="row">
                <div class="col-xs-10">
                    Line 10. Payroll Costs (add lines 1, 4, 6, 7, 8, and 9):
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line10']?>
                </div>

            </div>
          
            <div class="row">
                <div class="col-xs-12">
                    <u>Full-Time Equivalency (FTE) ReductionCalculation</u>
                   
                    <p>If you satisfy any of the following three criteria, check the appropriate box, skip lines 11 and 12, and enter 1.0 on line 13; otherwise,
                        complete lines 11, 12, and 13:</p>
                   
                    <p><b>No reduction in employees or average paid hours: </b>If you have not reduced the number of employees or the average paid hours of
                        your employees between January 1, 2020 and the end of the Covered Period, check here <input type="checkbox" id="employees_change"></p>

                    <script>
                    if("<?php echo $val['employees_change']?>"=="Yes"){
                        $('#employees_change').prop('checked', true);
                    }
                    </script>
                   


                    <b>FTE Reduction Safe Harbor 1: </b>If you were unable to operate between February 15, 2020, and the end of the Covered Period at the
                    same level of business activity as before February 15, 2020 due to compliance with requirements established or guidance issued
                    between March 1, 2020 and December 31, 2020, by the Secretary of Health and Human Services, the Director of the Centers for Disease
                    Control and Prevention, or the Occupational Safety and Health Administration related to the maintenance of standards for sanitation,
                    social distancing, or any other worker or customer safety requirement related to COVID-19, check here <input type="checkbox" id="safeharbor_1">
                  

                    <script>
                    if("<?php echo $val['fte_harbor_1']?>"=="Yes"){
                        $('#safeharbor_1').prop('checked', true);
                    }
                    </script>

                    <p><b>FTE Reduction Safe Harbor 2:</b> If you satisfy FTE Reduction Safe Harbor 2 (see PPP Schedule A Worksheet), check here 
                    <input type="checkbox" id="safeharbor_2"></p>
                    
                    <script>
                    if("<?php echo $val['fte_harbor_2']?>"=="Yes"){
                        $('#safeharbor_2').prop('checked', true);
                    }
                    </script>
                </div>


            </div>



            <div class="row">
                <div class="col-xs-10">
                    Line 11. Average FTE during the Borrower’s chosen referenceperiod:

                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line11']?>
                </div>

            </div>
       
            <div class="row">
                <div class="col-xs-10">
                    Line 12. Total Average FTE (add lines 2 and 5):
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line12']?>
                </div>

            </div>
       
            <div class="row">
                <div class="col-xs-10">
                    Line 13. FTE Reduction Quotient (divide line 12 by line 11) or enter 1.0 if any of the above criteria aremet:
                </div>
                <div class="col-xs-1 underline center">
                    <?php echo $val['SchA_Line13']?>
                </div>

            </div>
            </div>
             <br>
             
         <footer>

        <span style="text-align: left ; color : #555 !important ; padding-top : 16px !important; padding-bottom: 0 !important;">SBA Form 3508 (06/20)<br>
            Page 3</span>


    </footer>
          
            
          
               <header style="margin-top:100px;">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 text-left">
                           <!--  LOGO 
                            <img src="logo/loan_logo.JPG">-->
                        </div>
                        <div class="col-xs-6 col-sm-6  text-center">
                            <h4 style="margin-top: 5px;">
                                <b>Paycheck Protection Program </b>
                            </h4>
                            <h5 class="center"><b>Loan Forgiveness Application Revised June 16, 2020</b></h5>
                            <h5 class="center"> <u><b>PPP Loan Forgiveness Calculation Form</b></u></h5>
                        </div>
                        <div class="col-xs-3 col-sm-3 text-right" >
                            <h6  style="margin-top:5px;">
                                <b>OMB Control Number 3245-0407</b>
                            </h6>
                            <h6><b>Expiration Date: 10/31/2020 </b></h6>
                        </div>
                    </div>
            </header>
            
            <div class="row">

                <div class="col-xs-11 text-center">

                    <u><b>PPP Schedule A Worksheet</b></u>

                </div>

            </div>
 <div class="lineheight">

            <div class="row">

                <div class="col-xs-12">

                    <p class="bold"><b>Table 1:</b> List employees who:</p>
                    <ul>
                        <li>Were employed by the Borrower at any point during the Covered Period or the Alternative Payroll Covered Period whose
                            principal place of residence is in the United States; and
                        </li>

                        <li>Received compensation from the Borrower at an annualized rate of less than or equal to $100,000 for all pay periods in
                                2019 or were not employed by the Borrower at any point in 2019.</li>

                    </ul>

                </div>

            </div>

            <table class=" table-bordered top-header" cellspacing="0" cellpadding="0">

                <tbody>
                    <tr style="background: #dadada;">
                        <td><b>Employee's Name</b></td>
                        <td><b>Employee
                                Identifier</b></td>
                        <td><b>Cash Compensation</b></td>
                        <td><b>Average FTE</b></td>
                        <td><b>Salary / Hourly Wage
                                Reduction</b></td>
                    </tr>
                    <?php
                    $countRows=count($empname_ar);
                     for($i=0;$i<$countRows;$i++){
                     if(strlen($empID_ar[$i])<1){
                        continue;
                     }?>
                    <tr>
                        <td style="padding-left:20px;"><?php echo $empname_ar[$i]?></td>
                        <td style="padding-left:20px;"><?php echo $empID_ar[$i]?></td>
                        <td style="padding-left:20px;"><?php echo $empBox1_ar[$i]?></td>
                        <td style="padding-left:20px;"><?php echo $empBox2_ar[$i]?></td>
                        <td style="padding-left:20px;"><?php echo $empBox3_ar[$i]?></td>
                    </tr>
                    <?php
                    }
                    
                    ?>
                    <tr>
                        <td style="background: #dadada;"><b>FTE Reduction Exceptions:</b></td>
                        <td style="background: #dadada;"><input type="text" name="" placeholder=""></td>
                        <td style="background: #000;"><input type="text" name="" placeholder=""></td>
                        <td><h6><input type="text" name="" placeholder=""><h6></td>
                        <td style="background: #000;"><input type="text" name="" placeholder=""></td>
                    </tr>
                    <tr>
                        <td style="background: #dadada;"><b>Totals:</b></td>
                        <td style="background: #dadada;"><input type="text" name="" placeholder=""></td>
                        <td><b><?php echo $Tot_empBox1?></b></td>
                        <td><b><?php echo $Tot_empBox2?></b></td>
                        <td><b><?php echo $Tot_empBox3?></b></td>
                    </tr>


                </tbody>
            </table>


            <div class="row">

                <div class="col-xs-12">

                    <p><b>Table 2:</b> List employees who:</p>
                    <ul>
                        <li>Were employed by the Borrower at any point during the Covered Period or the Alternative Payroll Covered Period whose
                            principal place of residence is in the United States; and
                        </li>

                        <li>Received compensation from the Borrower at an annualized rate of more than $100,000 for any pay period in 2019.</li>

                    </ul>

                </div>

            </div>
            <div class="row">



                <div class="col-xs-8">





                    <table class=" table-bordered top-header" cellspacing="0" cellpadding="0" style="text-align: center">

                        <tbody>
                            <tr style="background: #dadada;">
                                <td><b>Employee's Name</b></td>
                                <td><b>Employee
                                        Identifier</b></td>
                                <td><b>Cash Compensation</b></td>
                                <td><b>Average FTE</b></td>

                            </tr>
                            
                            <?php
                            $countRows=count($empname100plus_ar);
                             for($i=0;$i<$countRows;$i++){
                             if(strlen($empID100plus_ar[$i])<1){
                                continue;
                             }?>
                            <tr>
                                <td style="padding-left:20px;"><?php echo $empname100plus_ar[$i]?></td>
                                <td style="padding-left:20px;"><?php echo $empID100plus_ar[$i]?></td>
                                <td style="padding-left:20px;"><?php echo $empBox4_ar[$i]?></td>
                                <td style="padding-left:20px;"><?php echo $empBox5_ar[$i]?></td>
                            </tr>
                            <?php
                            }
                            
                            ?>



                            <tr>
                                <td style="background: #dadada;"><b>Totals:</b></td>
                                <td style="background: #dadada;"><input type="text" name="" placeholder=""></td>
                                <td><b><?php echo $Tot_empBox4?></b></td>
                                <td><b><?php echo $Tot_empBox5?></b></td>

                            </tr>


                        </tbody>
                    </table>

                </div>


            </div>
            
          <!--  <div style="page-break-after: always;"></div>-->
            <div class="row">
                <div class="col-xs-10">
                    <p><u>FTE Reduction Safe Harbor 2:</u></p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-11">



                    <p>Stey 1:</p>

                    <p>Enter the borrower’s total average FTE between February 15, 2020 and April 26, 2020. Follow the same method that was used to calculate Average FTE in the PPP Schedule A Worksheet Tables. Sum across all employees and enter:
                        _______<u ><?php echo $step_1?></u>________</p>




                </div>
            </div>

            <div class="row">
                <div class="col-xs-11">




                    Step 2:


                    <p>Enter the borrower’s total FTE in the Borrower’s pay period inclusive of February 15, 2020. Follow the same method
                        that was used in step 1: _______<u><?php echo $step_2?></u>________</p>




                </div>
            </div>

            <div class="row">
                <div class="col-xs-11">


                    Step 3:


                    <p>If the entry for step 2 is greater than step 1, proceed to step 4. Otherwise, FTE Reduction Safe Harbor 2 is not
                        applicable and the Borrower must complete line 13 of PPP Schedule A by dividing line 12 by line 11 of that schedule</p>


                </div>

            </div>

            <div class="row">
                <div class="col-xs-11">

                    Step 4:

                    <p>Enter the borrower’s total FTE as of the earlier of December 31, 2020, and the date this application is submitted:
                    _______<u><?php echo $step_4?></u>________</p>


                </div>
            </div>
            <div class="row">
                <div class="col-xs-11">


                    Step 5:

                    <p>If the entry for step 4 is greater than or equal to step 2, enter 1.0 on line 13 of PPP Schedule A; the FTE Reduction Safe
                        Harbor 2 has been satisfied. Otherwise, FTE Reduction Safe Harbor 2 does not apply and the Borrower must complete
                        line 13 of PPP Schedule A by dividing line 12 by line 11 of that schedule.</p>

                </div>
               
            </div>
            </div>
            <br><br>
            <footer>

        <span style="text-align: left ; color : #555 !important ; padding-top : 16px !important; padding-bottom: 0 !important;">SBA Form 3508 (06/20)<br>
            Page 4</span>


    </footer>
            <!--<div style="page-break-after: always;"></div>-->
              <header style="margin-top:100px;">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 text-left">
                           <!--  LOGO 
                            <img src="logo/loan_logo.JPG">-->
                        </div>
                        <div class="col-xs-6 col-sm-6  text-center">
                            <h4 style="margin-top: 5px;">
                                <b>Paycheck Protection Program </b>
                            </h4>
                            <h5 class="center"><b>Loan Forgiveness Application Revised June 16, 2020</b></h5>
                            <h5 class="center"> <u><b>PPP Loan Forgiveness Calculation Form</b></u></h5>
                        </div>
                        <div class="col-xs-3 col-sm-3 text-right" >
                            <h6  style="margin-top:5px;">
                                <b>OMB Control Number 3245-0407</b>
                            </h6>
                            <h6><b>Expiration Date: 10/31/2020 </b></h6>
                        </div>
                    </div>
            </header>
        
            <div class="row">
                <div class="col-xs-11">
                    <p><u><b class="bold">PPP Borrower Demographic Information Form (Optional)</b></u></p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-11">
                    <p><b class="bold">Instructions</b></p>
                    <ol>

                        <li><u><b class="bold">Purpose.</b></u> Veteran/gender/race/ethnicity data is collected for program reporting purposes only</li>
                        <li><u><b class="bold">Description.</b></u> This form requests information about each of the Borrower’s Principals. Add additional sheets if necessary.</li>
                        <li> <u><b class="bold">Definition of Principal.</b></u> The term “Principal” means:
                            <ul>
                                <li>For a self-employed individual, independent contractor, or a sole proprietor, the self-employed individual, independent
                                    contractor, or sole proprietor</li>


                                <li>• For a partnership, all general partners and all limited partners owning 20% or more of the equity of the Borrower, or any
                                    partner that is involved in the management of the Borrower’s business.</li>
                                <li>For a corporation, all owners of 20% or more of the Borrower, and each officer and director.</li>
                                <li>For a limited liability company, all members owning 20% or more of the Borrower, and each officer and director.</li>
                                <li>Any individual hired by the Borrower to manage the day-to-day operations of the Borrower (“key employee”).</li>
                                <li>Any trustor (if the Borrower is owned by a trust)</li>
                                <li>For a nonprofit organization, the officers and directors of the Borrower.</li>

                            </ul>
                        </li>
                        <li><u><b class="bold">Principal Name. </b></u> Insert the full name of the Principal</li>
                        <li><u><b class="bold">Position. </b></u> Identify the Principal’s position; for example, self-employed individual; independent contractor; sole proprietor;
                            general partner; owner; officer; director; member; or key employee.</li>
                    </ol>
                </div>
            </div>
            


            <table class=" table-bordered top-header" cellspacing="0" cellpadding="0" style="margin-bottom: 0;">

                <tbody>
                    <tr style="background: #dadada;">
                        <td><b>Principal Name </b></td>
                        <td><b>Position</b></td>


                    </tr>
                    <tr>
                        <td><input type="text" name="" placeholder=""></td>
                        <td><input type="text" name="" placeholder=""></td>

                    </tr>



                </tbody>
            </table>
            <table class=" table-bordered tbl-loan top-header" cellspacing="0" cellpadding="0" style="margin-top:0">

                <tbody>

                    <tr>
                        <td>Veteran</td>
                        <td>1=Non-Veteran; 2=Veteran; 3=Service-Disabled Veteran; 4=Spouse of Veteran; X=Not
                            Disclosed</td>
                        <td><input type="text" name="" placeholder=""></td>


                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>M=Male; F=Female; X=Not Disclosed</td>
                        <td><input type="text" name="" placeholder=""></td>


                    </tr>
                    <tr>
                        <td>Race (more than 1
                            may be selected)</td>
                        <td>1=American Indian or Alaska Native; 2=Asian; 3=Black or African-American; 4=Native
                            Hawaiian or Pacific Islander; 5=White; X=Not Disclosed</td>
                        <td><input type="text" name="" placeholder=""></td>


                    </tr>
                    <tr>
                        <td>Ethnicity</td>
                        <td>H=Hispanic or Latino; N=Not Hispanic or Latino; X=Not Disclosed</td>
                        <td><input type="text" name="" placeholder=""></td>


                    </tr>





                </tbody>
            </table>

            <div class="row">
                <div class="col-xs-11 text-center">
                    <p><b>Disclosure is voluntary and will have no bearing on the loan forgiveness decision</b></p>


                </div>
            </div>
            <div class="row">
                <div class="col-xs-11">

                    <div class="loan-ftr">

                        <p><b>Paperwork Reduction Act </b>– You are not required to respond to this collection of information unless it displays a currently valid OMB Control
                            Number. The estimated time for completing this application, including gathering data needed, is 180 minutes. Comments about this time or the
                            information requested should be sent to Small Business Administration, Director, Records Management Division, 409 3rd St., SW, Washington DC
                            20416, and/or SBA Desk Officer, Office of Management and Budget, New Executive Office Building, Washington DC 20503.<b> PLEASE DO
                                NOT SEND FORMS TO THESE ADDRESSES.</b></p>
                    </div>

                </div> 
            </div>
 <footer>

        <span style="text-align: left ; color : #555 !important ; padding-top : 16px !important; padding-bottom: 0 !important;">SBA Form 3508 (06/20)<br>
            Page 5</span>


    </footer>

        </div>
      
    </main>
    
    
</body>

</html>
