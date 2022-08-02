<?php $this->load->view('admin/navbar');?>
<h3 class="subheading1" style="position: relative;top: 37px; width: 22%;">Generate Discount Code</h3>
<form action="<?php echo base_url()?>admin/promoCodesAction" method="POST" autocomplete="off" id="myForm">
	<div class="border1">
				<div class="row ">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> <small for="">Code :</small>
						<input type="text" class="form-control alphaNondecNumberOnly uppercase" maxlength="20" placeholder="Enter code" name="code" required>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> <small for="">Based on :</small>
						<select class="form-control"  name="based_on" id="basedon" required>
        						    <option value=''>Select</option>
						    <option value='dollars'>Dollars</option>
						    <option value="percentage">Percentage</option>
						</select>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> <small for="">Discount :</small>
    					<input type="number" class="form-control" placeholder="Enter discount amount/percentage" name="discount" id="p_discount" required>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> <small title="If want to apply to specific customer" for="">Customer id:</small>
    					<input type="number" class="form-control" placeholder="Leave blank if code is for all customers" name="cust_id">
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> <small for="">Current Date :</small>
						<input type="date" class="form-control" placeholder="Enter current date" name="current_date" value="<?php echo date("Y-m-d");?>" readonly required>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> <small for="">Expiry Date :</small>
						<input type="date" class="form-control" min="<?php echo date("Y-m-d");?>" placeholder="Enter expiry date" name="expiry_date" required>
					</div>
					
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> <small for="">Status :</small>
						<select class="form-control"  name="status" required>
						    <option value='active'>Active</option>
						    <option value="inactive"> Inactive</option>
						</select>
					</div>
					<div class="col-md-12 hidden" style="margin-top:10px;" id="url"> <small for="">Note:</small>
						<label>Code field</label> will be used at customer side. Only use upper case letters with no spaces
					</div>
				</div>
	    <div class="formstatus"></div>
		<div class="centermid">
			<input type="submit" value="Save" class="adminregbtn" class="btn-success">
		</div>
	</div>
</form>
<br>
<h3 class="subheading1" style="position: relative;top: 23px; width: 20%; "> Discount Codes List</h3>
<div class="border overf">
	<table class="table table-bordered tbl1">
		<thead>
			<tr>
				<td>Cust_id</td>
				<td>Code</td>
				<td>Based on</td>
				<td>Discount</td>
				<td>Generated on</td>
				<td>Expiry Date</td>
				<td>Status</td>
				<td>Edit</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			    //print_r($promodata); 
			    $countuser=count($promodata); 
			    for($i=0;$i<$countuser;$i++) { 
			        $dicount="";
    			    if($promodata[$i]->based_on=="dollars"){
    			        $dicount="<b>$ </b>".$promodata[$i]->discount;
                    }
                    else{
    			        $dicount=$promodata[$i]->discount."<b> %</b>";
                    }
			    ?>
			<tr><td>
					<?php echo $promodata[$i]->cust_id;?>
				</td>
				<td>
					<?php echo $promodata[$i]->code;?></td>
				<td>
					<?php echo ucfirst($promodata[$i]->based_on);?></td>
				<td>
					<?php echo $dicount;?></td>
				<td>
					<?php echo date('m-d-Y',strtotime($promodata[$i]->current_date)) ;?></td>
				<td>
					<?php echo date('m-d-Y',strtotime($promodata[$i]->expiry_date));?></td>
				<td>
					<?php echo ucfirst($promodata[$i]->status);?>
				</td>
				
				<td>
					<a style="text-decoration:none" class="tooltips" data-toggle="modal" onclick="getdata(<?php echo $promodata[$i]->promo_id?>)" data-target="#myModal" href=""> <i style="font-size:18px;margin-left:5px;color:green" class="fa fa-pencil" aria-hidden="true"></i>  <span class="tooltiptext">Edit Promo code</span> 
					</a>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="subheading">Discount Code Information <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </h3>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url()?>admin/updatePromoCodes" method="POST" autocomplete="off" id="myForm2">
						<div class="row ">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">code :</small>
						        <input  type="text" class="form-control alphaNondecNumberOnly uppercase"  placeholder="Enter code" name="code" id="code" required>
								<input type="hidden" name="old_code" id="old_code">
								<input type="hidden" name="promo_id" id="promo_id">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Discount :</small>
						        
    					        <input type="number" class="form-control" placeholder="Enter discount amount/percentage" name="discount" id="discount" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Based on :</small>
            					
        						<select class="form-control"  name="based_on" id="based_on" required>
        						    <option value=''>Select</option>
        						    <option value='dollars'>Dollars</option>
        						    <option value="percentage">Percentage</option>
        						</select>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Generated on :</small>
								<input type="date" class="form-control" placeholder="Enter current date" name="current_date" id="current_date" readonly required>
					        </div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Expiry date :</small>
								<input type="date" class="form-control" placeholder="Enter expiry date" name="expiry_date" id="expiry_date" required>
							</div>
        					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Status :</small>
        						<select class="form-control"  name="status" id="status" required>
        						    <option value='active'>Active</option>
        						    <option value="inactive"> Inactive</option>
        						</select>
        					</div>
							
        					<div class="col-md-12 hidden" style="margin-top:10px;" id="url"> <small for="">Note :</small>
						        <label>Code field</label> will be used at customer side. Only use upper case letters with no spaces
        					</div>
						</div>
						<div class="formstatus"></div>
						<div class="row ">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 centermid">
								<input type="submit" value="Update" class="adminregbtn" class="btn-success">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function getdata(promo_id){
	                $.ajax({
	    type: "POST",
	    url:"<?php echo base_url("admin/getRow")?>"+"/"+promo_id+"/promo_id/promocodestable",
	    dataType: 'json',
	
	    async: false,
	    success: function(obj) {//data will have what ever you echo'ed in controller
	        console.log(obj);
	        $("#code").val(obj.code);
	        $("#promo_id").val(obj.promo_id);
	        $("#old_code").val(obj.code);
	        $("#based_on").val(obj.based_on);
	        $("#discount").val(obj.discount);
	        $("#current_date").val(obj.current_date);
	        $("#expiry_date").val(obj.expiry_date);
	        $("#status").val(obj.status);
	    }
	});
	}
	
	
</script>