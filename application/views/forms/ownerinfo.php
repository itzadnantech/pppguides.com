   <?php $this->load->view('User/sidebar');
?>
 <?php $this->load->view('User/topmenu');
?>  
 <div class="container-fluid formcon">
     <div class="row sk_headings">
  
         <a id="prevBtn" class="btn_default" href="<?php echo base_url()?>user/companyInfo"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous</a>
         <h2>Owner Details</h2>
         <a id="nextBtn" class="pull-right btn_default" href="<?php echo base_url()?>user/loanInfo"> Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
     </div>
     
       
     <div>
          <div class="topbtns">
             <?php if($this->session->userdata('access_level')=="RW"){ ?>
<button type="button" class="btn btn-info modelbtn " data-toggle="modal" data-target="#myModal">Upload documents</button>  
<?php }?> 
      <!--<a href="javascript:editformFields()"  class="btn btn-success">Edit Form</a>-->
     </div>
<!--Model-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content modalcontent">
                    <div class="modal-header">
                        <h3 class="subheading">Owner Details
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
                                                   

                                                    <input type="hidden" name="path" value="ownerInfo">

                                                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filename">
                                                        <small> Document Name</small>
                                                        <input type="file" name="file[]" class="form-control"> 
                                                    </div>


 
                                                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filetype">
                                                        <small>Document Type</small>
                                                        <select name="type[]" class="form-control" id="">
                                                            
                                                            <option value="Ownership Details">Ownership Details</option>
                                                            <option value="Owner Government Issue Photo ID">Owner Government Issue Photo ID</option>
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
                                        <span class="red pull-left"><button type="button" class="owneruploadbtn pull-left"><i style="color:green;" class="fa fa-plus"></i></button>Add Additional Document </span>
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
    
    
    <form method="post" action="<?php echo base_url()?>user/ownerInfoAction" id="form" class="checkform">
         <small class="red" style="margin-top:20px">* Click Save button after making any changes. Navigating away from the page without saving will result in loss of data</small>
     

         <h4 class="subheading1" style="position: relative;top: 30px; width: 17%;">Owner(s) Information</h4>
         <div class="border" style="margin-top: 20px;">
             <div class="row">
             <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                 <small>How many owner/partners does the company have</small>
                 <input type="number" maxlength="4" id="owner_count" name="owner_count" value="<?php echo $ownerdata->owner_count?>" placeholder="How many owner/partners does the company have " class="form-control quantity">
             </div>
         </div>
             <small style="margin-top:40px"> <input type="checkbox" id="copyPrimary"> Same as primary contact</small>

             <div style="margin-top:30px" id="ownerwindow">
                 <?php 
    $i=1;
            $names=explode("~",$ownerdata->first_name);
    foreach($names as $name){
                ?>
                 <h4 <?php if($i!=1){?>style="border-top:2px dashed #228bd2;margin-top:30px;padding-top:30px;" <?php } ?>class="subheading"> Owner<?php echo $i?></h4>
                 <div class="row ">
                     <div class="col-lg-11 col-sm-11 col-md-11 col-xs-11">
                         <div class="row ">
                             <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                 <small>First Name <small class="red">*</small></small>
                                 <input type="text" id="first_name" name="first_name[]" value="<?php echo explode("~",$ownerdata->first_name)[$i-1]?>" placeholder="only characters allowed " required class="form-control">
                             </div>
                             <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                 <small>Middle Initial</small>
                                 <input type="text" id="middle_initial" maxlength="1" pattern="[a-zA-Z]+" name="middle_initial[]" value="<?php echo explode("~",$ownerdata->middle_initial)[$i-1]?>" placeholder="only characters allowed" class="form-control middlename txtOnly">
                             </div>
                             <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                 <small>Last Name <small class="red">*</small></small>
                                 <input type="text" id="last_name" name="last_name[]"  value="<?php echo explode("~",$ownerdata->last_name)[$i-1]?>" pattern="[a-zA-Z]+" placeholder="only characters allowed" required class="form-control">
                             </div>
                         </div>
                         <div class="row ">
                             <div class="col-lg-6  col-sm-12 col-md-6 col-xs-12">
                                 <small> Title<small class="red">*</small></small>
                                 <input type="text" id="title" name="title[]" value="<?php echo explode("~",$ownerdata->title)[$i-1]?>" placeholder=" Last Title " required class="form-control txtOnly">
                             </div>
                           
                             <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                                 <small> Email <small class="red">*</small></small>
                                 <input type="email" id="email" name="email[]" value="<?php echo explode("~",$ownerdata->email)[$i-1]?>" placeholder="Owner Email" required class="form-control">
                             </div>

                         </div>
                         
                         
                         
                         <div class="row">
                               <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                                 <small> % Ownership</small>
                                 <input type="number" id="ownership_percentage" step="0.01" name="ownership_percentage[]" value="<?php echo explode("~",$ownerdata->ownership_percentage)[$i-1]?>" placeholder=" Ownership Percentage" class="form-control ownership_percentage" required>
                             </div>
                             
                             <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                                 <small> Owner 2019 Wages/Payroll <small class="red">*</small></small>
                                  <div style="position:relative">
                    <i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i> 
                                 <input type="text" id="owner2019_pay" name="owner2019_pay[]" step="0.01" value="<?php echo explode("~",$ownerdata->owner2019_pay)[$i-1]?>" placeholder="Owner 2019 Wages/Payroll" class="form-control quantity quantitys" required>
                             </div>
                             </div>
                         </div>
                         
                         
                         
                         <div class="row ">
                             <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                                 <small>Landline Business Phone <small class="red">*</small></small>
                                 <input type="text" maxlength="12" id="landline_phone" name="landline_phone[]" value="<?php echo explode("~",$ownerdata->landline_phone)[$i-1]?>" placeholder=" Landline Business Phone  " required class="form-control phone">
                             </div>
                             <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                                 <small>Landline Business Phone Extension </small>
                                 <input type="text" id="landline_extension" maxlength="5" name="landline_extension[]" value="<?php echo explode("~",$ownerdata->landline_extension)[$i-1]?>" placeholder=" Landline Business Phone Extension " class="form-control landline_extension ">
                             </div>
                         </div>
                         <div class="row ">
                             <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                                 <small>Cellular Phone (for txt messages) <small class="red">*</small></small>
                                 <input type="text" id="mobile_phone" name="mobile_phone[]" value="<?php echo explode("~",$ownerdata->mobile_phone)[$i-1]?>" placeholder=" Cellular Phone (for txt messages) " required class="form-control phone">
                             </div>
                             <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                                 <small>Cellular Phone Carrier </small>
                                 <select id="mobile_carrier" name="mobile_carrier[]" placeholder="Cellular Phone" class="form-control mobile_carrier">
                                     
                                    <option value="">Select</option>
                                    <option value="AT&T">AT&T</option>
                                    <option value="Verizon">Verizon</option>
                                    <option value="Sprint">Sprint</option>
                                    <option value="T-Mobile">T-Mobile</option>
                                    <option value="Cricket">Cricket</option>
                                    <option value="Other">Other</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div style="padding:0px 1important;" class="col-lg-1 col-sm-1 col-md-1 col-xs-1">
                         <?php if($i!=1){?>
                         <button type="button" class="removebtn"><i style="color:red" class="fa fa-times"></i></button>
                         <?php } ?>
                     </div>
                 </div>

                 <script type='text/javascript'>
                     $(document).ready(function() {
                         document.getElementsByClassName("mobile_carrier")[<?php echo $i-1;?>].value = "<?php echo explode("~",$ownerdata->mobile_carrier)[$i-1]?>";
                     });
                 </script>
                 <?php 
    $i++;
    } ?>
             </div>




             <div class="row">
                 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                     <small class="red pull-left"><button type="button" class="ownerdata pull-left"><i style="color:green;" class="fa fa-plus"></i></button>Add Additional Owners </small>
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
                                        
                                        <a href="<?php echo base_url()?>user/deleteFile/<?php echo $file->file_id."/".$file->filename."/ownerInfo"?>"  onclick="return confirm('Are you sure you want to delete?');"><i style="font-size:18px;color:red" class="fa fa-trash" aria-hidden="true"></i>
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

     <form method="post" action="<?php echo base_url()?>user/autoFillOwner" id="autoForm">
     </form>
 </div>

    <script>
    $( document ).ready(function() {
        editformFields();
    });
    </script>











