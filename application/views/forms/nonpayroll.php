   <?php $this->load->view('User/sidebar');
?>
<?php $this->load->view('User/topmenu');
?>
    <div class="container-fluid formcon">
        <div class="row sk_headings">
            
            <a id="prevBtn" class="btn_default"  href="<?php echo base_url()?>user/loanInfo"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous</a>
                <h2>Non-Payroll Costs – Forgiveness Period</h2>  
            <a id="nextBtn" class="pull-right btn_default" href="<?php echo base_url()?>user/payrollSchedule"> Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
       
       <div>
            <div class="topbtns">
             <?php if($this->session->userdata('access_level')=="RW"){ ?>
<button type="button" class="btn btn-info modelbtn " data-toggle="modal" data-target="#myModal">Upload documents</button>  
<?php }?>
    <!--   <a href="javascript:editformFields()" class=" btn btn-success">Edit Form</a> -->
</div>

<!--Model-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content modalcontent">
                    <div class="modal-header">
                        <h3 class="subheading">Non-Payroll Costs
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </h3>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <form method="post" action="<?php echo base_url()?>user/uploadfile" enctype="multipart/form-data">

                                <h4 class="subheading2">Upload Document </h4>
                                <div class="border bordersetting">
                                    <div id="maincontent">


                                        <div class="row">


                                            <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">

                                                <div class="row">
                                                    

                                                    <input type="hidden" name="path" value="nonPayroll">


                                                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filename ">
                                                        <small> Document Name</small>
                                                        <input type="file" name="file[]" class="form-control"> 
                                                    </div>



                                                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filetype ">
                                                         <small>Document Type</small>
                                                        <select name="type[]" class="form-control" id="">
                                                            <option value="Rent Bill/Invoice/Statement">Rent Bill/Invoice/Statement</option>
                                                            <option value="Mortgage Interest Bill/Invoice/Statement">Mortgage Interest Bill/Invoice/Statement </option>
                                                            <option value="Utilities Bill/Invoice/Statement">Utilities Bill/Invoice/Statement</option>
                                                            <option value="Proof of Payment / Cancelled Check – Rent">Proof of Payment / Cancelled Check – Rent</option>
                                                            <option value="Proof of Payment / Cancelled Check – Mortgage Interest">Proof of Payment / Cancelled Check – Mortgage Interest</option> 
                                                            <option value="Proof of Payment / Cancelled Check – Utilities">Proof of Payment / Cancelled Check – Utilities</option>
                                                            <option value="Bank Statement">Bank Statement</option>
                                                            <option value="Other">Other</option>


                                                        </select> </div>

                                                        <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filedis">
                                                            <small> Description</small>
                                                            <input type="text" name="description[]" placeholder="Description" class="form-control txtOnly">
                                                        </div>
                                                </div>



                                            </div>

                                            <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 ">
                                           
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row btnmargin">
                                        <span class="red pull-left"><button type="button" class="nonpayrolluploadbtn pull-left"><i style="color:green;" class="fa fa-plus"></i></button>Add Additional Document </span>
                                    </div>
                                    <div class="row ">
                                        <span>
                                            <button type="submit" class="btn btn_default btnmargin2">Submit</button>
                                        </span>
                                    </div>
                        </div>
                            </form>
                    </div>
                </div>
                <div class="modal-footer ">
                </div>

            </div>

        </div>
       
</div>
 
<form method="post" action="<?php echo base_url()?>user/nonpayrollAction" autocomplete="on" id="form">

      <small class="red" style="margin-top:20px; margin-bottom:10px">* Click Save button after making any changes. Navigating away from the page without saving will result in loss of data</small>
<h4 class="subheading1" style="position: relative;top: 23px; width: 17%;">Important Note:</h4>

        <div class="border">
            <ul>
                <li class="red">
                    Only expenses that existed before 2/15/2020 and continued during forgiveness period are eligible.
                </li>
                <li class="red">
                    e.g. New Office / Property Leases entered after 2/15/2020 are not eligible. Only leases that were in force before 2/15/2020 and continued are eligible.
                </li>
                <li class="red">
                    Do not include prepayments.
                </li>
                 </ul>
        </div>
         <h4 class="subheading1" title="Covered period" style="position: relative;top: 31px; width: 5%;margin-top:0;">Rent </h4>
         <div class="border1">
       
            
                  
            
            <div id="rentwindow"> 
            
             <?php 
    $i=1;
            $payees=explode("~",$nonpayrolldata->rent_payee);
    foreach($payees as $payee){
                ?>
                <div class="row rentrow">
                    <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12">
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                        <small style="color:black">Payee</small>
                        <input type="text" name="rent_payee[]" value="<?php  echo explode("~",$nonpayrolldata->rent_payee)[$i-1]?>" placeholder="Company name "  class="form-control">
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12">
                        <small style="color:black">Amount</small>
                        <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i> 
                        <input type="text" name="rent_amount[]" step="0.01" value="<?php   echo number_format(explode("~",$nonpayrolldata->rent_amount)[$i-1], 2, '.', ',');  ?>" placeholder="Rent/lease amount"  class="form-control quantity quantitys">
                    </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                        <small style="color:black">Month rent for</small>
                        <input type="month" min="2019-01" max="2020-12" name="rent_month[]" value="<?php echo explode("~",$nonpayrolldata->rent_month)[$i-1]?>" class="form-control">
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-2 col-xs-12">
                        <small style="color:black">Date paid</small>
                        <input type="date" min="2020-01-01"  max="2020-12-31" name="rent_date[]" value="<?php echo explode("~",$nonpayrolldata->rent_date)[$i-1]?>" class="form-control">
                    </div>
                    <div style="padding:0px 1important;" class="col-lg-1 col-sm-12 col-md-1 col-xs-12">
                        <?php if($i!=1){?>
                         <button style="margin-top:20px;" type="button" class="removebtn"><i style="color:red" class="fa fa-times"></i></button>
                         <?php } ?>
                    </div>
                </div>
            <?php 
    $i++; } ?>
            </div>
    <button type="button" class="addrentdata adddata"><i style="color:green;padding-top:3px;" class="fa fa-plus"></i></button>
         </div>



         
            <h4 class="subheading1"  style="position: relative;top: 31px; width: 15%; " title="Amount of business mortgage interest payments paid or incurred during the Covered Period">Mortgage Interest </h4>
              
            <div class="border1">
            <div id="mortgagewindow">
            <?php 
    $i=1;
            $payees=explode("~",$nonpayrolldata->mortgage_payee);
    foreach($payees as $payee){
                ?> 
                <div class="row mortgagerow">
                    <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12">
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                        <small style="color:black">Payee</small>
                        <input type="text" name="mortgage_payee[]" value="<?php echo  explode("~",$nonpayrolldata->mortgage_payee)[$i-1]?>" placeholder="Company name "  class="form-control">
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12">
                        <small style="color:black">Amount</small>
                        <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i> 
                        <input type="text" name="mortgage_amount[]" step="0.01" value="<?php echo number_format(explode("~",$nonpayrolldata->mortgage_amount)[$i-1], 2, '.', ',');?>" placeholder="Mortgage interest amount"  class="form-control quantitys quantity">
                   </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                        <small style="color:black">Month interest for</small>
                        <input type="month" min="2019-01" max="2020-12" name="mortgage_month[]" value="<?php echo explode("~",$nonpayrolldata->mortgage_month)[$i-1]?>"  class="form-control">
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-2 col-xs-12">
                        <small style="color:black">Date paid</small>
                        <input type="date" min="2020-01-01"  max="2020-12-31" name="mortgage_date[]" value="<?php echo explode("~",$nonpayrolldata->mortgage_date)[$i-1]?>"  class="form-control">
                    </div>
                    <div style="padding:0px 1important;" class="col-lg-1 col-sm-12 col-md-1 col-xs-12">
                        <?php if($i!=1){?>
                         <button style="margin-top:20px;" type="button" class="removebtn"><i style="color:red" class="fa fa-times"></i></button>
                         <?php } ?>
                    </div>
                </div>
            
            <?php 
    $i++; } ?>
            </div>

<button type="button" class="addmortgagedata adddata"><i style="color:green;padding-top:3px;" class="fa fa-plus"></i></button>

            </div>
            
          
                    <h4 class="subheading1 " style="position: relative;top: 31px; width: 30%;"  title="Amount of business utility payments paid or incurred during the Covered Period">Utilities and Other Qualified Expenses </h4>
              
            <div class="border1">
            <div id="utilitywindow">
            <?php  
    $i=1;
            $payees=explode("~",$nonpayrolldata->utility_payee);
    foreach($payees as $payee){
                ?>
                <div class="row utilityrow">
                    <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12">
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-2 col-xs-12">
                        <small style="color:black">Payee</small>
                        <input type="text" name="utility_payee[]" value="<?php echo explode("~",$nonpayrolldata->utility_payee)[$i-1]?>" placeholder="Company name "  class="form-control">
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12">
                        <small style="color:black">Amount</small>
                        <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i> 
                        <input type="text" name="utility_amount[]" step="0.01" value="<?php echo number_format(explode("~",$nonpayrolldata->utility_amount)[$i-1], 2, '.', ',')   ?>" placeholder="Expenditure amount"  class="form-control quantitys quantity">
                    </div>
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12">
                        <small style="color:black">Utility Type</small>
                        <select class="form-control utility_type" name="utility_type[]" value="<?php echo $nonpayrolldata->utility_type;?>">
                             <option value="" class="translatable">Type</option>
                            <option value="Gas" class="translatable">Gas</option>
                            <option value="Electric" class="translatable">Electric</option>
                            <option value="Water" class="translatable">Water</option>
                            <option value="Cable" class="translatable">Cable</option>
                            <option value="Other" class="translatable">Other</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12">
                        <small style="color:black">Month Expense for</small>
                        <input style="min-width:160px;" type="month" min="2019-01" max="2020-12" name="utility_month[]" value="<?php echo explode("~",$nonpayrolldata->utility_month)[$i-1]?>"  class="form-control">
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-2 col-xs-12">
                        <small style="color:black">Date paid</small>
                        <input type="date" min="2020-01-01"  max="2020-12-31" name="utility_date[]" value="<?php echo explode("~",$nonpayrolldata->utility_date)[$i-1]?>"  class="form-control">
                    </div>
                    <div style="padding:0px 1important;" class="col-lg-1 col-sm-12 col-md-1 col-xs-12">
                        <?php if($i!=1){?>
                         <button style="margin-top:20px;" type="button" class="removebtn"><i style="color:red" class="fa fa-times"></i></button>
                         <?php 
                           } ?>
                    </div>
                </div>
            <script type='text/javascript'>
                     $(document).ready(function() {
                         document.getElementsByClassName("utility_type")[<?php echo $i-1;?>].value = "<?php echo explode("~",$nonpayrolldata->utility_type)[$i-1]?>";
                     });
                 </script>
            <?php $i++; } ?>
            </div>
            <button type="button" class="addutilitydata adddata"><i style="color:green;padding-top:3px;" class="fa fa-plus"></i></button>
            </div>
            
                    <h4 class="subheading1 modeltable" > Uploaded Document </h4>
                    <div class="border">


                        <table class="table table-bordered tbl1">
                            <thead>
                                <tr>
                                    <td>Document Name </td>
                                    <td>Document Type</td>
                                    <td>Description</td>
                                    <td>Uploaded at</td>
                                    <td>Action</td>
                                </tr>

                            </thead>
                            <tbody>
                                <?php if(is_array($filedata)||is_object($filedata)){
                                    foreach($filedata as $file){
                                  ?>
                                    

                                <tr>
                                    <td><?php echo $file->filename;?></td>
                                    <td><?php echo $file->filetype;?></td>
                                    <td><?php echo $file->filedescription;?></td>
                                    <td><?php echo $file->date_time;?></td>
                                    <td class="iconsetting">
                                        
                                        <a style="text-decoration:none"  href="<?php echo base_url()?>assets/documents/<?php echo $file->filename;?>"><i style="font-size:18px;margin-right:10px;color:green" class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?php echo base_url()?>user/deleteFile/<?php echo $file->file_id."/".$file->filename."/nonPayroll"?>"  onclick="return confirm('Are you sure you want to delete?');"><i style="font-size:18px;color:red" class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>

                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
            
            <div style="margin-left:50px;" class="formstatus"></div>
            <div class="row">
             <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 center"> <?php if($this->session->userdata('access_level')=="RW"){ ?>
            <button type="submit"  class="btn btn-success savebtn" >Save </button>
<?php }?>
            
                </div>
                </div>
        </form>
    </div>




