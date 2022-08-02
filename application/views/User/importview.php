<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Payroll Import</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/excelimport/dist/css/adminx.css" media="screen" />

    <!--
      # Optional Resources
      Feel free to delete these if you don't need them in your project
    -->
  </head>
  <body>
    <div class="adminx-container">
      

      <!-- expand-hover push -->
    

      <!-- adminx-content-aside -->
      <div class="adminx-content">
        <!-- <div class="adminx-aside">

        </div> -->

        <div class="adminx-main-content">
          <div class="container-fluid">
           
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title">Employees Information 
                   
                    </div>
    
                    <nav class="card-header-actions">
                     

    
                      <a href="<?php echo base_url('dismiss'); ?>" style="font-weight:bold;font-style:italic;" class="pull-left btn-sm btn btn-danger" id="">Dismiss</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <button class="pull-left btn-sm btn btn-primary" style="font-weight:bold;" id="saveChanges">Save</button>
                    </nav>
                  </div>
                  <div class="card-body collapse show" id="card1">
					<?php if($this->session->flashdata('errormsg1')){?>

							<div class="alert alert-danger"><?php
								echo $this->session->flashdata('errormsg1')
								
								?></div>

					<?php } ?>


          <?php if($this->session->flashdata('successmsg1')){?>

<div class="alert alert-success"><?php
  echo $this->session->flashdata('successmsg1')
  
  ?></div>

<?php } ?>

<?php 
    $first_name_arr=explode("~",$ownerdata->first_name);
    $last_name_arr=explode("~",$ownerdata->last_name);
    $email_arr=explode("~",$ownerdata->email);
    $count=count($first_name_arr);
        $selectlist="<select class='form-control' id='ownerlist'><option value=''>select</option>";
    for($i=0;$i<$count;$i++){
        $selectlist=$selectlist."<option value='".$first_name_arr[$i]."~".$email_arr[$i]."~".$last_name_arr[$i]."'>".$first_name_arr[$i].", ".$last_name_arr[$i] ."</option>";
    }
        $selectlist=$selectlist."<select>";
        echo "<div style='display:none'>".$selectlist."</div>";
        
?>
<form method="post" id="savechangesForm" action="<?php echo base_url('makeowner'); ?>">
<p style="font-weight:bold;font-style:italic;">Please Select All Owners in this list and click SAVE. If there are not Owners in this report click Dismiss.</p>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th><input type="checkbox" class="all-checkbox" /></th>
                <th>Employee Name</th> 
                <th>Owner List</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($employee_info as $row){?>
        <tr>
                <th id=""><input type="checkbox" name="sub_checkbox[]" class="sub-checkbox" value="<?php echo $row->id; ?>" /></th>
                <th><?php echo $row->employee_name; ?></th>
                <th id="owner<?php echo $row->id; ?>"></th>
            </tr>
            <?php  } ?>

        </tbody>
        <tfoot>
            <tr>
            <!-- <th><input type="checkbox" class="all-checkbox" /></th> -->
                <!-- <th>Customer ID#</th>
                <th>Employee ID</th> -->
                <!-- <th>Employee Name</th> -->
                <!-- <th>Hire Date</th>
                <th>Termination Date</th>
                <th>Hire AS</th>
                <th>Is Owner</th>
                <th>Status</th> -->
                <!-- <th>Pay Frequency</th> -->
            </tr>
        </tfoot>
    </table>
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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/excelimport/dist/js/vendor.js"></script>
    <script src="<?php echo base_url('assets'); ?>/excelimport/dist/js/adminx.js"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="./excelimport/dist/js/vendor.js"></script>
    <script src="./excelimport/dist/js/adminx.vanilla.js"></script-->
    <script>
      $(document).ready(function(){
        $(".sub-checkbox").change(function(e) {
            var val=$(this).val();
            if(this.checked) {
                var el=$("#ownerlist").clone();
                el.attr("name", "id~"+val);
                $("#owner"+val).html(el);
            }
            else{
                $("#owner"+val).html('');
            }
        });


        $(".all-checkbox").click(function(){
            $('.sub-checkbox').not(this).prop('checked', this.checked);
            
            $('.sub-checkbox').each(function (index, obj) {
                var val=$(this).val();
                if(this.checked) {
                    
                    $("#owner"+val).html($("#ownerlist").clone());
                }
                else{
                    $("#owner"+val).html('');
                }
            });
            
            
});

    $("#saveChanges").click(function(){

        if($('.sub-checkbox:checkbox:checked').length == 0)
        {
            alert("Please Select at least One Checkbox!");
        }else{

          

            $("#savechangesForm").submit();
        }

    });

      });
    </script>
  </body>
</html>