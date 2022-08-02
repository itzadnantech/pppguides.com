<?php $this->load->view('forms/payroll/topmenu');?>




<div class="model1btn">
  <div class="topbtns">
             <?php if($this->session->userdata('access_level')=="RW"){ ?>
<button type="button" class="btn btn-info modelbtn " data-toggle="modal" data-target="#myModal">Upload documents</button>  
<?php }?>
   <!--  <a href="javascript:editformFields()" class=" btn btn-success">Edit Form</a>-->
   </div>


    <!--Model-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content modalcontent">
                <div class="modal-header">
                    <h3 class="subheading">Payroll Cost
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


                                                <input type="hidden" name="path" value="payrollCost">

                                                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filename">
                                                    <small> Document Name</small>
                                                    <input type="file" name="file[]" class="form-control">
                                                </div>



                                                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filetype">
                                                    <small>Document Type</small>
                                                    <select name="type[]" class="form-control " id="">
                                                        <option value="SPayroll Report - 2020 Year-to-Date">Payroll Report - 2020 Year-to-Date </option>

                                                        <option value="Payroll Report - 2019 Year-to-Date">Payroll Report - 2019 Year-to-Date </option>

                                                        <option value="Full-Time Employee Explanation">Full-Time Employee Explanation</option>
                                                        <option value="Safe Harbor Proof Document">Safe Harbor Proof Document </option>

                                                        <option value="Bank Statement">Bank Statement</option>
                                                        <option value="Other">Other</option>


                                                    </select> </div>
                                                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filedis">
                                                    <small> Description</small>
                                                    <input type="text" name="description[]" placeholder="Description" class="form-control txtOnly ">
                                                </div>
                                            </div>



                                        </div>

                                        <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 ">
                                        

                                        </div>
                                    </div>
                                </div>


                                <div class="row btnmargin">
                                    <span class="red pull-left"><button type="button" class="costuploadbtn pull-left"><i style="color:green;" class="fa fa-plus"></i></button>Add Additional Document </span>
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
    <form method="post" action="<?php echo base_url()?>user/payrollCostAction" id="form">
         <small class="red" style="margin-top:20px">* Click Save button after making any changes. Navigating away from the page without saving will result in loss of data</small>
        <h4 class="subheading1" style="position: relative;top: 23px; width: 17%;">Important Information</h4>

        <div class="border">
            <p class="red">For any employees, or owners, make sure to reduce amounts to maximum allowed amounts</p>
            <ul>
                <li class="red">
                    8 weeks: Maximum $15,385 for employees and owners
                </li>
                <li class="red">
                    24 weeks: Maximum $46,154 for employees and $20,833 for owners
                </li>
                <li class="red">
                    Wages for all owners for 8 or 24 week forgiveness period cannot exceed owner’s average 2019 wages, subject to above maximums
                </li>
                <li class="red">If an owner owns any other companies that received PPP Loans, above owner maximums are for all companies/affiliates that an owner is associated with</li>
            </ul>
        </div>



    <?php 
    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
    ?>

        <h4 class="subheading1" style="position: relative;top: 23px; width: 13%;">8 weeks Period</h4>

        <div class="border">

            <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <h5 class="themecolor">Covered Period </h5>
                    <small>Total payroll costs from <?php echo date("m-d-Y", strtotime($payrolldata->loan8_start));?>  to <?php echo date("m-d-Y", strtotime($payrolldata->loan8_end));?> (Excluding owners pay)
                        <!--set date by php--></small>
                          <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>
                    <input type="text" name="covered8_cost" id="covered8_cost" class="form-control quantity quantitys" step="0.01" value="<?php echo  number_format($payrolldata->covered8_cost, 2, '.', ',')  ?>">
                </div>
                </div>

                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <h5 class="themecolor">Alternate Period </h5>
                    <small>Total payroll costs from <?php echo date("m-d-Y", strtotime($payrolldata->payroll8_start));?> to <?php echo date("m-d-Y", strtotime($payrolldata->payroll8_end));?> (Excluding owners pay)
                        <!--set date by php--></small>
                          <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>
                    <input type="text" name="alternate8_cost" id="alternate8_cost" class="form-control quantity quantitys" step="0.01" value=" <?php echo  number_format($payrolldata->alternate8_cost, 2, '.', ',') ;?>">
                </div>
                </div>
            </div>
            <?php
              $ownerarray= explode("~",$ownerdata->first_name);
                 $ownerarray2= explode("~",$ownerdata->last_name);
               $ownercount=count($ownerarray);
              for($i=0;$i<$ownercount;$i++){
              ?>


            <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <h5 class="themecolor">Covered Period </h5>
                    <small>Total payroll costs for <?php echo $ownerarray[$i] ." ".$ownerarray2[$i] ?> from <?php echo date("m-d-Y", strtotime($payrolldata->loan8_start));?> to <?php echo date("m-d-Y", strtotime($payrolldata->loan8_end));?></small>
                    <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>  <input type="text" name="covered8_opay[]" id="covered8_opay" class="form-control quantity quantitys" step="0.01" value="<?php if(isset(explode("~",$payrolldata->covered8_opay)[$i])&&intval($payrolldata->covered8_opay)){  echo number_format(explode("~",$payrolldata->covered8_opay)[$i], 2, '.', ',') ;}else{ echo "0.00";}  ?>">
                </div>
</div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <h5 class="themecolor">Alternate Period </h5>
                    <small>Total payroll costs for <?php echo $ownerarray[$i]  ." ".$ownerarray2[$i]?> from <?php echo date("m-d-Y", strtotime($payrolldata->payroll8_start));?> to <?php echo date("m-d-Y", strtotime($payrolldata->payroll8_end));?></small>
                     <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i> <input type="text" name="alternate8_opay[]" id="alternate8_opay" class="form-control quantity quantitys" step="0.01" value="<?php if(isset(explode("~",$payrolldata->alternate8_opay)[$i])&&intval($payrolldata->covered8_opay)){ echo number_format(explode("~",$payrolldata->alternate8_opay)[$i], 2, '.', ',') ;}else{ echo "0.00";} ?>">
                </div>
                </div>
            </div>
            <?php
               }?>
        </div>
<?php } ?>

        <h4 class="subheading1" style="position: relative;top: 23px; width: 14%;">24 weeks Period</h4>

        <div class="border">
            <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <h5 class="themecolor">Covered Period </h5>
                    <small>Total payroll costs from <?php echo date("m-d-Y", strtotime($payrolldata->loan24_start));?> to <?php echo date("m-d-Y", strtotime($payrolldata->loan24_end));?>  (Excluding owners pay)</small>
                     <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i> <input type="text" name="covered24_cost" id="covered24_cost" step="0.01" placeholder="" class="form-control quantity quantitys" value="<?php if($payrolldata->covered24_cost!=""){echo number_format($payrolldata->covered24_cost, 2, '.', ',') ;} ?>">
                </div>
</div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <h5 class="themecolor">Alternate Period </h5>
                    <small>Total payroll costs from <?php echo date("m-d-Y", strtotime($payrolldata->payroll24_start));?> to <?php echo date("m-d-Y", strtotime($payrolldata->payroll24_end));?>  (Excluding owners pay)</small>
                   <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>   <input type="text" name="alternate24_cost" id="alternate24_cost" step="0.01" class="form-control quantity quantitys" value="<?php if($payrolldata->alternate24_cost!=""){echo number_format($payrolldata->alternate24_cost, 2, '.', ',') ;} ?>">
                </div>
                </div>
            </div>
            <?php
              $ownerarray= explode("~",$ownerdata->first_name);
               $ownerarray2= explode("~",$ownerdata->last_name);
               $ownercount=count($ownerarray);
              for($i=0;$i<$ownercount;$i++){
              ?>
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <h5 class="themecolor">Covered Period </h5>
                    <small>Total payroll costs for <?php echo $ownerarray[$i]  ." ".$ownerarray2[$i]?> from <?php echo date("m-d-Y", strtotime($payrolldata->loan24_start));?> to <?php echo date("m-d-Y", strtotime($payrolldata->loan24_end));?> </small>
                    <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>  <input type="text" name="covered24_opay[]" id="covered24_opay" placeholder="" step="0.01" class="form-control quantity quantitys" value="<?php if(isset(explode("~",$payrolldata->covered24_opay)[$i])){echo number_format(explode("~",$payrolldata->covered24_opay)[$i], 2, '.', ',') ;} else{ echo "0.00";} ?>">
                </div>
</div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <h5 class="themecolor">Alternate Period </h5>
                    <small>Total payroll costs for <?php echo $ownerarray[$i]  ." ".$ownerarray2[$i]?> from <?php echo date("m-d-Y", strtotime($payrolldata->payroll24_start));?> to <?php echo date("m-d-Y", strtotime($payrolldata->payroll24_end));?> </small>
                 <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>     <input type="text" name="alternate24_opay[]" id="alternate24_opay" step="0.01" class="form-control quantity  quantitys" value="<?php if(isset(explode("~",$payrolldata->alternate24_opay)[$i])){ echo number_format(explode("~",$payrolldata->alternate24_opay)[$i], 2, '.', ',');}else{ echo "0.00";} ?>">
                </div>
                </div>
            </div>
            <?php 
                  }?>
        </div>

                    <h4 class="subheading1 modeltable"> Uploaded Document </h4>
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
                                        <a href="<?php echo base_url()?>user/deleteFile/<?php echo $file->file_id."/".$file->filename."/payrollCost"?>" onclick="return confirm('Are you sure you want to delete?');"><i style="font-size:18px;color:red" class="fa fa-trash" aria-hidden="true"></i>
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
        <div class="row">
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 center"> <?php if($this->session->userdata('access_level')=="RW"){ ?>
            <button type="submit"  class="btn btn-success savebtn" >Save </button>
<?php }?>
                </div>
        </div>
    </form>