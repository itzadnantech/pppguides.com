 <?php $this->load->view('User/sidebar');
?>
<?php $this->load->view('User/topmenu');
?> 
    <div class="container-fluid  formcon">
        <div class="row sk_headings">
            <a id="prevBtn" class="btn_default"  href="<?php echo base_url()?>user/ownerInfo"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous</a>
                <h2>PPP EIDL Loan Details</h2>  
            <a id="nextBtn" class="pull-right btn_default" href="<?php echo base_url()?>user/nonPayroll"> Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
         
        <div>
            <div class="topbtns">
             <?php if($this->session->userdata('access_level')=="RW"){ ?>
<button type="button" class="btn btn-info modelbtn " data-toggle="modal" data-target="#myModal">Upload documents</button>  
<?php }?>
        
<!--  <a href="javascript:editformFields()"  class=" btn btn-success">Edit Form</a> -->
</div>
<!--Model-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content modalcontent">
                    <div class="modal-header">
                        <h3 class="subheading">Loan Details
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
 <input type="hidden" name="path" value="loaninfo">

                                                <div class="row">
                                                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filename ">
                                                        <small> Document Name</small>
                                                        <input type="file" name="file[]" class="form-control"> 
                                                    </div>



                                                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12  filetype">
                                                        <small>Document Type</small>
                                                        <select name="type[]" class="form-control" id="">
                
                                                            <option value="PPP Loan – Application">PPP Loan – Application</option>
                                                            <option value="PPP Loan  - Bank Note ">PPP Loan  - Bank Note </option>
                                                            <option value="PPP Loan - Bank Deposit Proof">PPP Loan - Bank Deposit Proof</option>
                                                            <option value="EIDL Loan - Application">EIDL Loan - Application</option>
                                                            <option value="EIDL Loan – Bank Note">EIDL Loan – Bank Note</option> 
                                                            <option value="EIDL Loan - Bank Deposit Proof">EIDL Loan - Bank Deposit Proof</option>
                                                            <option value="EIDL Grant - Application">EIDL Grant - Application</option>
                                                            <option value="EIDL Grant – Bank Note">EIDL Grant – Bank Note</option>
                                                            <option value="EIDL Grant - Bank Deposit Proof">EIDL Grant - Bank Deposit Proof</option>
                                                            <option value="Bank Statement">Bank Statement</option>
                                                            <option value="Other">Other</option>


                                                        </select> </div>
                                                        <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filedis ">
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
                                        <span class="red pull-left"><button type="button" class="loanuploadbtn pull-left"><i style="color:green;" class="fa fa-plus"></i></button>Add Additional Document </span>
                                    </div>
                                    <div class="center">
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
    <form method="post" action="<?php echo base_url()?>user/loanInfoAction" id="form">
  
       <small class="red" style="margin-top:20px">* Click Save button after making any changes. Navigating away from the page without saving will result in loss of data</small>
        <h4 class="subheading1" style="position: relative;top: 35px; width: 14%;">PPP Loan Details </h4>
        <div   class="border" style="margin-top: 24px;" >

            <div class="row ">
            <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small for="">PPP Loan Amount<small class="red">*</small></small>
                    <div style="position:relative">
                        <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i><input type="text" id="loan_amount" step="0.01" max="10000000" name="loan_amount" value="<?php  echo number_format($loandata->loan_amount, 2, '.', ',');  ?>" placeholder="PPP Loan Amount " required class="form-control quantity quantitys">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small for="">PPP Loan Disbursement Date<small class="red">*</small></small>
               
                    <input type="date" id="disbursement_date" name="disbursement_date" value="<?php echo $loandata->disbursement_date?>" placeholder="PPP Loan Disbursement Date " required class="form-control"  min="2020-04-01"  max="2020-08-08">
                </div>
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small for="">PPP Lender/Bank Name</small>
               
                    <input type="text" id="bank_name" name="bank_name" value="<?php echo $loandata->bank_name?>" placeholder="Lender/Bank Name " class="form-control txtOnly ">
                </div>
            </div>
            
            <div class="row ">
               
            
                
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
    <small> Employees at Time of PPP Loan Application<small class="red">*</small></small>
        <input type="number" id="loantime_employees" name="loantime_employees"   placeholder="Employees at Time of Loan Application " required class="form-control quantity" value="<?php echo $loandata->loantime_employees?>">
    </div>
    <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <small> Employees at Time of Forgiveness Application (today) <small class="red">*</small></small>
                    <input type="number" id="forgivenesstime_employees" name="forgivenesstime_employees" maxlength="100" placeholder="Employees at Time of Forgiveness Application (today)" value="<?php echo $loandata->forgivenesstime_employees?>" required class="form-control quantity">
                </div>
            </div>



            <div class="row ">
          
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small for="">SBA PPP Loan / Note Number </small>
                    <input type="text" id="sba" name="sba" value="<?php echo $loandata->sba?>" placeholder="SBA PPP Loan / Note Number " class="form-control loan">
                </div>
           
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small for="">Lender PPP Loan Number </small>
               
                    <input type="number" maxlength="10" id="loan_number" name="loan_number" value="<?php echo $loandata->loan_number?>" placeholder="Lender PPP Loan Number" class="form-control numOnly quantity">
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <br>
                    <input  title="You cannot change this field. If this applies to you, you need to consult our Professional Advisor" type="checkbox" disabled value=""><span title="You cannot change this field. If this applies to you, you need to consult our Professional Advisor"> If Borrower (together with affiliates, if applicable) received PPP loans in excess of $2 million, check here: </span> 
                </div>
            </div>
            </div>
            
            
            
             
        <h4 class="subheading1" style="position: relative;top: 35px; width: 19%;">EIDL Loan/Grant Details </h4>
        <div   class="border" style="margin-top: 24px;" >
            
            
            
              <div class="row ">
          
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                   
                    <small for="">EIDL Loan Amount<small class="red">*</small> <small>(enter 0 if none)</small>  </small>
               <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i> <input type="text" id="eidl_amount" step="0.01" name="eidl_amount" value="<?php echo number_format($loandata->eidl_amount, 2, '.', ','); ?>"  placeholder="EIDL Loan Amount  " class="form-control quantity quantitys">
                 </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small for="">EIDL Application Number</small>
                
                    <input type="text" id="Eidl_app_number" name="Eidl_app_number" value="<?php echo $loandata->Eidl_app_number?>" placeholder="EIDL Application Number "  class="form-control  loan">
                </div>
            
             <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small for="">EIDL Loan Date</small>
                
                    <input type="date" id="eidl_loan_date" name="eidl_loan_date" value="<?php echo $loandata->eidl_loan_date?>"   class="form-control">
                </div>
            </div>
            
            
                  <div class="row ">
          
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small for="">EIDL Grant Amount  </small>
               <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>
                    <input type="text" id="eidl_grant_amount" step="0.01" name="eidl_grant_amount" min="0"  value="<?php  echo number_format($loandata->eidl_grant_amount, 2, '.', ','); ?>" placeholder="EIDL Grant Amount " class="form-control quantitys quantity ">
                </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small for="">EIDL Grant Application Number</small>
                
                    <input type="number" id="eidl_grant_app_num" name="eidl_grant_app_num" value="<?php echo $loandata->eidl_grant_app_num?>" placeholder="EIDL Grant Application Number "  class="form-control  quantity">
                </div>
            
             <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small for="">EIDL Grant Date</small>
                
                    <input type="date" id="edit_grant_date" name="edit_grant_date" value="<?php echo $loandata->edit_grant_date?>"   class="form-control">
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
                                        <a href="<?php echo base_url()?>user/deleteFile/<?php echo $file->file_id."/".$file->filename."/loanInfo"?>"  onclick="return confirm('Are you sure you want to delete?');"><i style="font-size:18px;color:red" class="fa fa-trash" aria-hidden="true"></i>
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
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 center"> 
              <?php if($this->session->userdata('access_level')=="RW"){ ?>
            <button type="submit"  class="btn btn-success savebtn" >Save </button>
<?php }?>
                </div>
        </div>
        </form>
    </div>

<script>
$(document).ready(function(){
  $(".quantitys").blur(function(){
        this.value = parseFloat(this.value.replace(/,/g, ""))
                    .toFixed(2)
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

  });
});


  
</script>


   