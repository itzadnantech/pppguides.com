<?php $this->load->view('admin/navbar');?>
<br>
<h3 class="subheading1" style="position: relative;top: 23px; width: 16%; "> Invoices List</h3>
<div class="border overf">
	<table class="table table-bordered tbl1">
		<thead>
			<tr>
				<td>Invoice Id</td>
				<td>Customer Id</td>
				<td>Amount</td>
				<td>Generated on</td>
				<td>Due Date</td>
				<td>Status</td>
				<td>Edit</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			    //print_r($invoicedata); 
			    $countuser=count($invoicedata); 
			    for($i=0;$i<$countuser;$i++) { ?>
			<tr>
				<td>
					<?php echo $invoicedata[$i]->invoice_id;?></td>
				<td>
					<?php echo $invoicedata[$i]->cust_id;?></td>
				<td>
					<b>$ </b><?php echo number_format($invoicedata[$i]->amount, 2, '.', ',');?></td>
				<td>
					<?php echo date('m-d-Y',strtotime($invoicedata[$i]->current_date));?></td>
				<td>
					<?php echo date('m-d-Y',strtotime($invoicedata[$i]->due_date));?></td>
				<td>
					<?php echo $invoicedata[$i]->status;?></td>
				
				<td>
				    <?php if ($invoicedata[$i]->status=="pending"){?>
					<a style="text-decoration:none" class="tooltips" data-toggle="modal" onclick="getdata(<?php echo $invoicedata[$i]->invoice_id?>)" data-target="#myModal" href=""> <i style="font-size:18px;margin-left:5px;color:green" class="fa fa-pencil" aria-hidden="true"></i>  <span class="tooltiptext">Edit Invoice</span> 
					</a>
					<?php } ?>
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
					<h3 class="subheading">Invoice Information <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </h3>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url()?>admin/updateCustomInvoices" method="POST" autocomplete="off" id="invoiceForm1">
						<div class="row ">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Customer Id :</small>
						        <input  type="number" class="form-control" placeholder="Enter customer id" name="cust_id" id="cust_id" required>
								<input type="hidden" name="invoice_id" id="invoice_id">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Amount :</small>
            					<div style="position:relative">
                                    <i style="position:absolute;left:4px;top:9px;"  class="fa fa-dollar"></i>
                                    <input type="text" id="amount" step="0.01" max="10000000" name="amount" placeholder="Enter amount" required class="form-control quantity quantitys">
                                </div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Generated on :</small>
								<input type="date" class="form-control" placeholder="Enter current date" name="current_date" id="current_date" readonly required>
					        </div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <small for="">Due date :</small>
								<input type="date" class="form-control" placeholder="Enter due date" name="due_date" id="due_date" required>
							</div>
        					<div class="col-md-12 hidden" style="margin-top:10px;" id="url"> <small for="">Note :</small>
        						Customer URL will be <label><?php echo base_url()."user/payBill/"?><span id="showcust_id"></span></label>
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
	function getdata(invoice_id){
            $.ajax({
        	    type: "POST",
        	    url:"<?php echo base_url("admin/getRow")?>"+"/"+invoice_id+"/invoice_id/custominvoicetable",
        	    dataType: 'json',
        	
        	    async: false,
        	    success: function(obj) {//data will have what ever you echo'ed in controller
        	        console.log(obj);
        	        $("#cust_id").val(obj.cust_id);
        	        $("#invoice_id").val(obj.invoice_id);
        	        $("#amount").val(obj.amount);
        	         $("#current_date").val(obj.current_date);
        	         $("#due_date").val(obj.due_date);
        	    }
    	});
	}
</script>