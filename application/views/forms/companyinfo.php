<?php $this->load->view('User/sidebar');
?>
<?php $this->load->view('User/topmenu');
?>

<div class="container-fluid  formcon">
    <div class="row sk_headings">
        <h2>Company Details</h2>

        <a id="nextBtn" class="pull-right btn_default" href="<?php echo base_url()?>user/ownerInfo"> Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
    </div>

    <div>
         <div class="topbtns">
             <?php
             if($this->session->userdata('access_level')=="RW"){ ?>
<button type="button" class="btn btn-info modelbtn " data-toggle="modal" data-target="#myModal">Upload documents</button>  
<?php }?>
             
      <!--       <a href="javascript:editformFields()" class=" btn btn-success">Edit Form</a> -->
        </div>
        <!--Model-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content modalcontent">
                    <div class="modal-header">
                        <h3 class="subheading">Company Details
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

                                            <input type="hidden" name="path" value="companyInfo">

                                                    

                                                    <div class="row">

                                                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filename ">
                                                        <small> Document Name</small>
                                                        <input type="file" name="file[]" class="form-control "> 
                                                    </div>



                                                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 filetype">
                                                        <small>Document Type</small>
                                                        <select name="type[]" class="form-control " id="">
                                                            <option value="Incorporation Certificate">
                                                                Incorporation Certificate
                                                            </option>
                                                            <option value="EIN/TIN proof">EIN/TIN proof</option>
                                                            <option value="IRS Formation Document">IRS Formation Document</option>
                                                            <option value="State Formation Document">State Formation Document</option>
                                                            <option value="Other">Other</option>


                                                        </select>
                                                    </div>


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
                                        <span class="red pull-left"><button type="button" class="maincontent  pull-left"><i style="color:green;" class="fa fa-plus"></i></button>Add Additional Document </span>
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

    <form method="post" action="<?php echo base_url()?>user/companyInfoAction" id="form">

    <small class="red" style="margin-top:20px">* Click Save button after making any changes. Navigating away from the page without saving will result in loss of data</small>

<h4 class="subheading1"  style="position: relative;top: 30px; width: 23%;" >General Company Questions</h4>
        <div class="border1">
            
            
             <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    Are you a seasonal business?
                    <input type="radio" name="seasonalbusiness" id="seasonalbusiness" value="Yes"  <?php if($companydata->seasonalbusiness === 'Yes') echo 'checked="checked"';?>  required class="radiobtn"  > Yes
                    <input type="radio" name="seasonalbusiness" id="seasonalbusiness" value="No" <?php if($companydata->seasonalbusiness === 'No') echo 'checked="checked"';?>  required class="radiobtn"  > No
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    Are you a franchise business? 
                        <input type="radio" name="franchisebusiness" id="franchisebusiness" value="Yes"  <?php if($companydata->franchisebusiness === 'Yes') echo 'checked="checked"';?> required class="radiobtn"   > Yes
                       <input type="radio" name="franchisebusiness" id="franchisebusiness" value="No"  <?php if($companydata->franchisebusiness === 'No') echo 'checked="checked"';?> required  class="radiobtn" > No
                </div>

            </div>
            </div>
        <h4 class="subheading1" >Company Details</h4>
        <div class="border1">
            <div class="row ">

                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small>Entity Type<small class="red">*</small></small>

                    <select name="entity_type" id="entity_type" placeholder="Entity Type" required class="form-control">
                        <option value="">Select</option>
                        <option value="S-Corp">S-Corp</option>
                        <option value="C-Corp">C-Corp</option>
                        <option value="Partnership">Partnership</option>
                        <option value="Self-Employed/Sole Proprietor">Self-Employed/Sole Proprietor</option>
                        <option value="Non-Profit">Non-Profit</option>
                    </select>

                </div>
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small>Business Legal Name (“Borrower”) <small class="red">*</small></small>



                    <input type="text" id="business_name" name="business_name" value="<?php echo $companydata->business_name?>" placeholder="Business Legal Name (“Borrower”)" required class="form-control">
                </div>
                <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
                    <small>DBA or Tradename </small>
                    <input type="text" id="trade_name" name="trade_name" value="<?php echo $companydata->trade_name?>" placeholder="DBA or Tradename" class="form-control txtOnly">
                </div>

            </div>




            <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small id="ein_label">EIN/TIN</small>
                    <input type="text" maxlength="11" name="ein" id="ein" value="<?php echo $companydata->ein?>"  placeholder="99-9999999 " class="form-control ein">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small id="ssn_label">SSN</small>
                    <input type="text" maxlength="11" name="ssn" id="ssn" value="<?php echo $companydata->ssn?>" placeholder="000-00-0000" class="form-control ssn">
                </div>

            </div>








        </div>
        <h4 class="subheading1 widthten">Address</h4>
        <div class="border1">

            <div class="row ">

                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Street Address 1 <small class="red">*</small> </small>
                    <input type="text" name="street_address1" id="street_address1" value="<?php echo $companydata->street_address1?>" placeholder="Street Address 1" required class="form-control">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Street Address 2 </small>
                    <input type="text" name="street_address2" id="street_address2" value="<?php echo $companydata->street_address2?>" placeholder="Street Address 2  " class="form-control">
                </div>
            </div>


            <div class="row ">

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <small>City <small class="red">*</small></small>
                    <input type="text" id="city" name="city" value="<?php echo $companydata->city?>" placeholder="City " required class="form-control">
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <small>Zip <small class="red">*</small></small>
                    <input type="text" id="zip" maxlength="5" name="zip" value="<?php echo $companydata->zip?>" placeholder=" Zip " required class="form-control zip">

                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <small>State<small class="red">*</small></small>
                    <select id="state" name="state" value="<?php echo $companydata->state?>" id="addressstate" placeholder="State " required class="form-control">
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>



                    </select>

                </div>
            </div>
        </div>

        <h4 class="subheading1" style="width: 13%;">Primary Contact </h4>
        <div class="border1">
            <div class="row ">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <small>First Name <small class="red">*</small></small>
                    <input type="text" id="first_name" name="first_name"  value="<?php echo $userdata->first_name;?>" maxlength="50" placeholder="only characters allowed " required class="form-control">
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <small>Middle Initial</small>
                    <input type="text" id="middle_initial" maxlength="1" pattern="[a-zA-Z]+" name="middle_initial" value="<?php echo $userdata->middle_initial?>" placeholder=" only characters allowed "  class="form-control middlename txtOnly">
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <small>Last Name <small class="red">*</small></small>
                    <input type="text" id="last_name" name="last_name" value="<?php echo $userdata->last_name?>" maxlength="50" placeholder="only characters allowed " required class="form-control">
                </div>
            </div>


            <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small> Title<small class="red">*</small></small>
                    <input type="text" id="title" name="title" value="<?php echo $userdata->title?>" maxlength="50" placeholder="Primary Contact - Title " required class="form-control">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small> Email <small class="red">*</small></small>
                    <input type="email" id="email" name="email" value="<?php echo $userdata->email?>" maxlength="100" placeholder="Primary Contact - Email " required class="form-control" readonly>
                </div>
            </div>


            <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Landline Business Phone <small class="red">*</small></small>
                    <input type="text" id="landline_phone" maxlength="12" name="landline_phone" value="<?php echo $userdata->landline_phone?>" placeholder="Landline Business Phone " required class="form-control phone">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Landline Business Phone Extension</small>

                    <input type="text" id="landline_extension" maxlength="5" name="landline_extension" value="<?php echo $userdata->landline_extension?>" placeholder=" Landline Business Phone Extension " class="form-control landline_extension">

                </div>
            </div>

            <div class="row ">

                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Cellular Phone (for txt messages) <small class="red">*</small></small>
                    <input type="text" id="mobile_phone" required name="mobile_phone" value="<?php echo $userdata->mobile_phone?>" placeholder="Primary Contact - Landline Business Phone Extension" class="form-control phone">
                </div>

                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <small>Cellular Phone Carrier (for txt messages)</small>
                    <select id="mobile_carrier" name="mobile_carrier" class="form-control">

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
                                        <?php if($this->session->userdata('access_level')=="RW"){ ?><a style="text-decoration:none" href="<?php echo base_url()?>user/deleteFile/<?php echo $file->file_id."/".$file->filename."/companyInfo"?>"  onclick="return confirm('Are you sure you want to delete?');"><i style="font-size:18px;color:red" class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
<?php }?>
                                        
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
    $("#entity_type").val('<?php echo $companydata->entity_type?>');
    $("#state").val('<?php echo $companydata->state?>');
    $("#mobile_carrier").val('<?php echo $userdata->mobile_carrier?>');
</script>
<script type='text/javascript'>
 


    $(document).ready(function() {
        $(".numOnly").keypress(function(e) {
            var key = e.keyCode;
            if (key >= 48 && key <= 57) {
                e.preventDefault();
            }
        });
    });
</script>