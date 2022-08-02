<?php $this->load->view('User/sidebar');
   ?>
<?php $this->load->view('User/topmenu');?>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1">
<i class="fa fa-bars" aria-hidden="true"></i>
</button>
<div class="row collapse navbar-collapse" id="collapse-1">
   <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <ul class="nav nav-tabs tabhover">
         <li><a href="<?php echo base_url()?>user/forgivenessTable">Forgiveness Table  </a></li>
         <li><a href="<?php echo base_url()?>user/forgivenessTable" >Guidance </a></li>
         <li ><a href=<?php          
            echo "'".base_url()."Form3508/applyForForgiveness"."'";
            ?>>Schedule-A/3508</a>
         </li>
      </ul>
   </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/excelimport/dist/css/adminx.css" media="screen" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" media="screen" />
<div class="adminx-content">
   <div class="adminx-main-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8">
               <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                     <div class="card-header-title">Import Data</div>
                  </div>
                  <div class="card-body collapse show" id="card1">
                     <?php if($this->session->flashdata('errormsg')){?>
                     <div class="alert alert-danger"><?php
                        echo $this->session->flashdata('errormsg')
                        
                        ?></div>
                     <?php } ?>
                     <?php if($this->session->flashdata('successmsg')){?>
                     <div class="alert alert-success"><?php
                        echo $this->session->flashdata('successmsg')
                        
                        ?></div>
                     <?php } ?>
                     <form method="post" id="formImport" action="<?php echo base_url('import/all'); ?>" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-md-6">
                              <label>Customer Id</label>
                              <input type="text"  name="customer_id" placeholder="Customer Id" class="form-control" value="<?php echo $cust_id?>" readonly required/>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Select Vendor</label>
                              <select name="select_vendor" class="form-control" id="SelectVendor" required>
                                 <option value="" selected>Select Vendor</option>
                                 <option value="1">ADP</option>
                                 <option value="2">Intuit</option>
                                 <option value="3">Quickbooks</option>
                                 <option value="4">Paychex</option>
                                 <option value="5">Standard Template</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Select Data Type</label>
                              <select name="data_type" class="form-control" id="data_type" required>
                                 <option value="" selected>Select Data Type</option>
                                 <option value="Employee Summary">Employees Information</option>
                                 <option value="Payroll Summary">Payroll Information</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Pay Frequency</label>
                              <select name="pay_frequency" class="form-control" id="PayFreeQuency" required>
                                 <!-- <option value="">Pay Frequency</option> -->
                                 <option value="weekly" selected>Weekly</option>
                                 <option value="biweekly">Biweekly</option>
                                 <option value="monthly">Monthly</option>
                                 <option value="semi-monthly">Semi-Monthly</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <label>Import File</label>
                              <input type="file" style="overflow: hidden;" accept=".xls,.xlsx" name="imported_file" class="form-control" required/>
                           </div>
                        </div>
                        <hr />
                        <div class="row">
                           <div class="col-md-12">
                              <span class="loader-div" style="display:none;">	
                              Uploading Information - Please Wait...&nbsp;<img src="<?php echo base_url('assets/excelimport/loader.gif'); ?>" style="width:4%;" />
                              <br /><br />
                              </span>
                              <button type="submit"  class="btn btn-primary btn-click" onclick="showGif()">Import</button>
                              
                        
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!-- If you prefer jQuery these are the required scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/excelimport/dist/js/vendor.js"></script>
<script src="<?php echo base_url('assets'); ?>/excelimport/dist/js/adminx.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- If you prefer vanilla JS these are the only required scripts -->
<!-- script src="./excelimport/dist/js/vendor.js"></script>
   <script src="./excelimport/dist/js/adminx.vanilla.js"></script-->
<script>
function showGif(){
    $(".loader-div").show();
}
   $("#SelectVendor").val('<?php
      $sw=$payrolldata->Payroll_software;
      if($sw=="ADP"){
         echo 1; 
      }
      elseif($sw=="Intuit"){
          echo 2;
      }
      elseif($sw=="Quickbooks"){
          echo 3;
      }
      elseif($sw=="Paychex"){
          echo 4;
      }
      
      ?>');
   $("#PayFreeQuency").val('<?php 
      $ps= $payrolldata->payroll_schedule;
      if($ps=="Weekly"){
         echo "weekly"; 
      }
      elseif($ps=="BiWeekly"){
          echo "biweekly";
      }
      elseif($ps=="Monthly"){
          echo "monthly";
      }
      elseif($ps=="Semi-Monthly"){
          echo "semi-monthly";
      }
      
      ?>');
   
   
</script>