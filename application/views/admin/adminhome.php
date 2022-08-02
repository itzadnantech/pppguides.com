<?php $this->load->view('admin/navbar');?>

            <h4 class="pull-right"><?php 
echo    date('Y-m-d');?></h4>
<style>
    table{
        font-size:13px;
    }
</style>


    <h4 class="subheading1 " style="position: relative;top: 23px; width: 11%;">Searching Filters</h4>
    <div class="border ">
    <form method="get" action="<?php echo base_url()?>admin/search" id="searchForm">
        <div class="row ">
            <div class="col-lg-11 col-sm-11 col-md-11 col-xs-11 ">

                <div class="row  ">
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                        <small>Company Name</small>
                        <input type="text " id="business_name" name="business_name" placeholder="(partial name search allowed)" class="form-control txtOnly">

                    </div>


                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                        <small>Price Plan</small><br>
                        <select id="account_type" name="account_type"  id="pakag" class="form-control ">
                                <option value="">Select</option>
                                <option value="free">Basic</option>
                                <option value="silver">Silver</option>
                                <option value="gold">Gold</option>
                                <option value="white-glove">White-Glove</option>
                              </select>

                    </div>

                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                        <small>EIN </small>
                        <input type="text " id="ein" name="ein" placeholder="(customer EIN/TIN)" id="ein" class="form-control ">
                    </div>

                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                        <small>SSN </small>
                        <input type="text " id="ssn" name="ssn" placeholder="(customer SSN)" id="ssn" class="form-control ">
                    </div>
                </div>


                <div class="row Create ">
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                        <small>Zip</small>
                        <input type="number " id="zip" name="zip" placeholder="customer zip " class="form-control zip">



                    </div>


                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                        <small>State</small>
                        <select name="state" id="state" class="form-control ">
                                <option value="">Select</option>
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

                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                        <small>First Name</small>
                        <input type="text " id="first_name" name="first_name" placeholder="(primary contact First Name)" class="form-control txtOnly">
                    </div>

                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                        <small>Last Name</small>
                        <input type="text " id="last_name" name="last_name" placeholder="(primary contact Last Name) " class="form-control txtOnly">
                    </div>
                </div>



                <div class="row Create">
                    <div class="col-lg-4 col-sm-12 col-md-6 col-xs-12 ">
                        <small>Loan Amount</small>
                        <div class="row ">
                            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5 gridsettingright">
                                <input type="number" step="0.01" id="loan_amount1" name="loan_amount1" placeholder="0" class="form-control gridsettingright ">
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 andclass">&</div>
                            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5 gridsettingleft">
                                 <input type="number" step="0.01" id="loan_amount2" name="loan_amount2" placeholder="10,000,000.00" class="form-control gridsettingleft">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                        <small>Email</small>
                        <input type="text" name="email" id="email" placeholder="primary contact Email " class="form-control ">
                    </div>
                    
                    <div class="col-lg-2 col-sm-12 col-md-2 col-xs-12 ">
                        <small>Cust id</small>
                        <input type="text" name="cust_id" id="cust_id" placeholder="Customer id" class="form-control ">
                    </div>
                    <?php if(strpos(strtolower($this->session->userdata('role')),"admin")!==FALSE){ ?>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                        <small>Whole Saler name</small>
                        <input type="text" name="ws_name" id="ws_name" placeholder="Whole saler name" class="form-control ">
                    </div>
                    <?php } ?>
                    

                </div>






                <div class="row">


                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 ">
                        <button type="submit" id="btn2" class=" pull-right">Search
                            </button>

                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 ">
                        <button type="button" id="btn3">Reset
                            </button>

                    </div>
                </div>
                </form>


            </div>






            <div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 ">
                <br>
                <button type="button" class="btn-default" id="viewFiltersbtn" ><i class="fa fa-plus"></i></button>
            </div>


        </div>



        <div class="row ">



        </div>









    </div>
                    <?php if(strpos(strtolower($this->session->userdata('role')),"admin")!==FALSE){ ?>
                <a href="javascript:downloadTable('<?php echo base_url()?>admin/')" class="btn-success exportbtn pull-right">Export to Excel </a>
    <?php } ?>

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">

            <h4 class="subheading1" style="position: relative;top: 23px; width: 12%; ">Customer List</h4>
            <div class="border overf">


                <table class="table table-bordered tbl1">
                    <thead>
                        <tr>
                            <td>Cust Id</td>
                            <td>Company Name </td>
                            <td>Price Plan</td>
                            
                    <?php if(strpos(strtolower($this->session->userdata('role')),"admin")!==FALSE){ ?>
                    <td>Wholesaler Name</td>
                    <?php } ?>
                            <td>EIN</td>
                            <td>Zip</td>
                            <td>F-Name</td>
                            <td>L-Name</td>
                            <td>Email </td>
                            <td>Loan Amount</td>
                            <td>Register on</td>
                            <td>$ Paid</td>
                             <td>Sales ID</td>
                             <td>Ref. Id</td>
                            <td>User</td>
                            <td>Sales</td>
                            <td>Invoice</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($result)) {?>
                        <?php 
                        
                        
                          $counter=count((array)$result);
                
                          for($i=0;$i<$counter;$i++)
                          {  
                        
                        //foreach($result as $res) {
                        if($result[$i]->role!="user"){ 
                            continue;
                        }
                        ?>

                        <tr>
                            <td><?php echo $result[$i]->cust_id ?></td>
                            <td><?php echo $result[$i]->business_name ?></td>
                            <td><?php echo ucfirst($result[$i]->account_type);?></td>
                            
                        <?php if($this->session->userdata('role')=="admin"){ ?>
                        <td><?php echo $result[$i]->ws_name;?></td>
                        <?php } ?>
                            <td><?php echo $result[$i]->ein;?></td>
                            
                            <td><?php echo $result[$i]->zip;?></td>
                            <td><?php echo $result[$i]->first_name;?></td>
                            <td><?php echo $result[$i]->last_name;?></td>
                            <td><?php echo $result[$i]->email;?></td>
                            <td><?php echo number_format($result[$i]->loan_amount);?></td>
                            <td><?php echo date('m/d/Y', strtotime($result[$i]->user_reg_date));?></td>
                        
                            <td>$<?php  echo number_format($result[$i]->paid_amount, 2, '.', ',');?></td>
                             <td contenteditable='true'><?php echo $result[$i]->sales_id;?></td>
                             <td><?php echo $result[$i]->reference_id;?></td>
                            <td>
                               <a style="text-decoration:none" class="tooltips" href="<?php echo base_url()?>admin/adminasuser/<?php echo $result[$i]->cust_id?>"><i style="font-size:18px;margin-left:5px;color:green" class="fa fa-pencil" aria-hidden="true"></i> <span class="tooltiptext">Edit User</span></a>
                               
                            </td>
                            <td>
                               
                                <a style="text-decoration:none" class="tooltips" data-toggle="modal" onclick="getdata(<?php echo $result[$i]->cust_id ;?>)" data-target="#myModal" href=""> <i style="font-size:18px;margin-left:5px;color:green"  class="fa fa-pencil" aria-hidden="true"></i> <span class="tooltiptext" >Edit Sales ID</span> </a>
                            </td>
                            <td>
                               
                                <a style="text-decoration:none" class="tooltips" data-toggle="modal" onclick="getInvoicedata(<?php echo $result[$i]->cust_id ;?>)" data-target="#invoiceModal" href=""> <i style="font-size:18px;margin-left:5px;color:green" class="fa fa-print" aria-hidden="true"></i> <span class="tooltiptext" >Generate Invoice</span> </a>
                            </td>
                        </tr>
                        <?php 
                           
                        
                        }?><?php }?>
                    </tbody>
                </table>
                
                <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
         <h3 class="subheading">User Information <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </h3>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url()?>admin/updateUserSalesIdReferenceId" method="POST" autocomplete="off" id="loadform2">
        <small>
           User ID
       </small>
        <small>
       <input type="number" id="cust_id" name="cust_id" class="form-control"  readonly >
        <small>
           First Name
       </small>
       <input type="text" id="firstName" class="form-control"  readonly >
         <small>     Company Name
       </small>
       <input type="text" id="company" class="form-control"  readonly >
        <small>Reference ID
       </small>
       <input type="text" id="reference_id" class="form-control"  name="reference_id">
       
             Sales ID
       </small>
       <input type="hidden" id="old_sales_id" class="form-control"  name="old_sales_id">
       <input type="hidden" id="old_reference_id" class="form-control"  name="old_reference_id">
       <select name="sales_id"  class="form-control" id="sales_id">
             <?php
                  $countuser=count((array)$salesdata);
        
                  for($i=0;$i<$countuser;$i++)
                  {   
                        echo '<option value="'. $salesdata[$i]->sales_id.'">'.$salesdata[$i]->sales_id.'</option>';
                  }
            ?>
       </select>
       
        <div class="center">
                    <span>
                            <button type="submit" class="btn btn_default ">Submit</button>
                                        </span>
                                    </div>
                                          <div class="formstatus">
                        
                    </div>
                                     </form>
      </div>
    
    </div>

  </div>
</div>

            </div>

        </div>
    </div>

	<!-- Modal -->
	<div id="invoiceModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="subheading">Create Custom Invoice <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </h3>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url()?>admin/customInvoicesAction" method="POST" autocomplete="off" id="invoiceForm1">
						<div class="row ">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Customer Id :</small>
						        <input  type="number" class="form-control" placeholder="Enter customer id" name="cust_id" id="in_cust_id" required readonly>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">First Name :</small>
						        <input  type="text" class="form-control" placeholder="Enter firstName" name="firstName" id="in_firstName" required readonly>
								<input type="hidden" name="invoice_id" id="invoice_id">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Company Name :</small>
						        <input  type="text" class="form-control" placeholder="Enter Company Name" name="company" id="in_company" required readonly>
								<input type="hidden" name="invoice_id" id="invoice_id">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Amount :</small>
            					<div style="position:relative">
                                    <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                                    <input type="text" id="amount" step="0.01" max="10000000" name="amount" placeholder="Enter amount" required class="form-control quantity quantitys">
                                </div>
							</div>
							
        					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Description :</small>
        						<textarea rows="3" maxlength="200" class="form-control" name="description"></textarea>
        					</div>
        					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Current Date :</small>
        						<input type="date" class="form-control" placeholder="Enter current date" name="current_date" value="<?php echo date("Y-m-d");?>" readonly required>
        					</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Due date :</small>
								<input type="date" class="form-control" placeholder="Enter due date" name="due_date" min="<?php echo date("Y-m-d");?>" 
								                        max="<?php echo date('Y-m-d', strtotime("+30 days"));?>" id="due_date" required>
							</div>
							
        					<div class="col-md-12 hidden" style="margin-top:10px;" id="url"> <small for="">Note :</small>
        						Customer URL will be <label><?php echo base_url()."user/payBill/"?><span id="showcust_id"></span></label>
        					</div>
						</div>
						<div class="formstatus"></div>
						<div class="row ">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 centermid">
								<input type="submit" value="Create" class="adminregbtn" class="btn-success">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>





  
<script>
    $(".close").click(function(){
        $("#invoiceForm1").trigger( "reset" );
    })


    $(document).ready(function() {
    //  9 : numeric
    //  a : alphabetical
    //  * : alphanumeric
    $("#ein").inputmask("99-9999999");
    $("#ssn").inputmask("999-99-9999");
    $(".zip").inputmask("*****");
});
</script>

<script type='text/javascript'>
     $('.txtOnly').keypress(function (e) {
			var regex = new RegExp("^[a-zA-Z]+$");
			var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
			if (regex.test(str)) {
				return true;
			}
			else
			{
			e.preventDefault();
			$('.error').show();
			$('.error').text('Please Enter Alphabet');
			return false;
			}
		});
 </script>
 
 
 <?php
if(isset($searchstring)){
    $searcharray=explode("&", $searchstring);
    echo "<script>";
        foreach($searcharray as $key){
            $searchvalue=explode('=',$key);
            if($searchvalue[1]!=""){
                 echo "$('#".$searchvalue[0]."').val('".$searchvalue[1]."');";
            }
        }
    echo "</script>";
}
?>
   <script>
    function getdata(cust_id){
        $.ajax({
            type: "POST",
            url:"<?php echo base_url("admin/getSalesData")?>"+"/"+cust_id,
            dataType: 'json',
        
            async: false,
            success: function(obj) {//data will have what ever you echo'ed in controller
            console.log(obj);
           
                $("#firstName").val(obj.first_name);
                $("#cust_id").val(obj.cust_id);
                $("#company").val(obj.company_name);
                $("#sales_id").val(obj.old_sales_id);
                 $("#reference_id").val(obj.reference_id);
                $("#old_sales_id").val(obj.old_sales_id);
                $("#old_reference_id").val(obj.reference_id);
        
            }
    
        });
    }
    </script>
    
    
   <script>
    function getInvoicedata(cust_id){
        $.ajax({
            type: "POST",
            url:"<?php echo base_url("admin/getSalesData")?>"+"/"+cust_id,
            dataType: 'json',
        
            async: false,
            success: function(obj) {//data will have what ever you echo'ed in controller
            console.log(obj);
           
                $("#in_firstName").val(obj.first_name);
                $("#in_cust_id").val(obj.cust_id);
                $("#in_company").val(obj.company_name);
                $("#in_reference_id").val(obj.reference_id);
        
            }
    
        });
    }
    </script>
