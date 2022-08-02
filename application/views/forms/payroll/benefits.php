<?php $this->load->view('forms/payroll/topmenu');?>
<div class="model1btn">
<div class="topbtns">
    
             <?php if($this->session->userdata('access_level')=="RW"){ ?>
<button type="button" class="btn btn-info modelbtn " data-toggle="modal" data-target="#myModal">Upload documents</button>  
<?php }?> 
 <!--<a href="javascript:editformFields()" class=" btn btn-success">Edit Form</a>-->
   </div>

    
    <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content modalcontent">
                    <div class="modal-header">
                        <h3 class="subheading">Benefits
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
                                                  

                                                    <input type="hidden" name="path" value="payrollBenefits">

                                                    
                                                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filename">
                                                        <small> Document Name</small>
                                                        <input type="file" name="file[]" class="form-control"> 
                                                    </div>



                                                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filetype">
                                                        <small>Document Type</small>
                                                        <select name="type[]" class="form-control" id="">
                                                            <option value="Benefit – Health Insurance - Bill/Invoice/Statement">Benefit – Health Insurance - Bill/Invoice/Statement</option>
                                                            <option value="Benefit – Health Insurance – Proof of Payment/Cancelled Check">Benefit – Health Insurance – Proof of Payment/Cancelled Check</option>
                                                            <option value="Benefit – Retirement - Bill/Invoice/Statement">Benefit – Retirement - Bill/Invoice/Statement</option>
                                                            <option value="Benefit – Retirement – Proof of Payment/Cancelled Check">Benefit – Retirement – Proof of Payment/Cancelled Check</option>
                                                            <option value="Benefit – Other Benefit - Bill/Invoice/Statement">Benefit – Other Benefit - Bill/Invoice/Statement</option>
                                                            <option value="Benefit – Other Benefit  – Proof of Payment/Cancelled Check">Benefit – Other Benefit  – Proof of Payment/Cancelled Check</option>
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
                                        <span class="red pull-left"><button type="button" class="benefituploadbtn pull-left"><i style="color:green;" class="fa fa-plus"></i></button>Add Additional Document </span>
                                    </div>
                                    <div class="row ">
                                        <span>
                                            <button type="submit" class="btn btn_default btnmargin2">Submit</button>
                                        </span>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                </div>

            </div>

        </div>
    



    </div>






<form method="post" action="<?php echo base_url()?>user/payrollBenefitsAction" id="form">
    
     <small class="red" style="margin-top:20px">* Click Save button after making any changes. Navigating away from the page without saving will result in loss of data</small>

<h4 class="subheading1" style="position: relative;top: 21px; width: 10%;">Introduction</h4>
             
               <div   class="border" >
              <ul>
            <li>Make sure to deduct any employee contributions towards health insurance</li>
 			<li>Make sure to not to include any health insurance costs for any “owners” (except if entity is a C-Corp)</li>
 			<li>Make sure to not to include any retirement contributions for any “owners”</li> 
            </ul>
</div>


   
    <?php 
    if(date("Y-m-d",strtotime($loandata->disbursement_date))<'2020-06-04'){
    ?>
<h4 class="subheading1" style="position: relative;top: 21px; width: 13%;">8 weeks Period</h4>
              
              <div   class="border" >
              <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Employer costs for employee health insurance<small class="red">*</small> <small>(Enter 0 if none)</small></small>
                  <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>   <input type="text" name="health8_cost" step="0.01" placeholder="999999.99" class="form-control quantitys quantity" value="<?php echo number_format($payrolldata->health8_cost, 2, '.', ','); ?>">
                </div>
            </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Employer costs towards retirement plan contributions<small class="red">*</small> <small>(Enter 0 if none)</small></small>
                  <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>   <input type="text" name="retirement8_cost" step="0.01" placeholder="999999.99" class="form-control quantitys quantity" value="<?php echo number_format($payrolldata->retirement8_cost, 2, '.', ',');  ?>">
                </div>
                </div>
            </div>
</div>
<?php } ?>

<h4 class="subheading1" style="position: relative;top: 21px; width: 14%;">24 weeks Period</h4>
              
<div   class="border" >
              <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Employer costs for employee health insurance<small class="red">*</small> <small>(Enter 0 if none)</small>  </small>
                   <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>  <input type="text" name="health24_cost" step="0.01" placeholder="999999.99" class="form-control quantitys quantity" value="<?php echo number_format($payrolldata->health24_cost, 2, '.', ',');  ?>">
                </div>
           </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Employer costs towards retirement plan contributions<small class="red">*</small> <small>(Enter 0 if none)</small></small>
                  <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>   <input type="text" name="retirement24_cost" step="0.01" placeholder="999999.99" class="form-control quantitys quantity" value="<?php echo number_format($payrolldata->retirement24_cost, 2, '.', ','); ?>">
                </div>
                </div>
            </div>
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
                                        <a href="<?php echo base_url()?>user/deleteFile/<?php echo $file->file_id."/".$file->filename."/payrollBenefits"?>"  onclick="return confirm('Are you sure you want to delete?');"><i style="font-size:18px;color:red" class="fa fa-trash" aria-hidden="true"></i>
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

