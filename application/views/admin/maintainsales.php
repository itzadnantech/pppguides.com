<?php $this->load->view('admin/navbar');?>

<h3 class="subheading1" style="position: relative;top: 37px; width: 8%;">Sales ID</h3>
    <form action="<?php echo base_url()?>admin/maintainsalesaction" method="POST" autocomplete="off" id="myForm2">
           <div class="border1">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
          
              
               <div class="row ">
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small for="">Sales ID :</small>
           
                        <input type="text" class="form-control"  maxlength="12" placeholder="Enter sales id" name="sales_id" required>
                    </div>
                  
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small for="">Sales Description :</small>
           
                        <input type="text" class="form-control"  placeholder="Enter sales discriptions" name="sales_dis" required>
                    </div> 
                    
                    
             </div> 
            </div>
             </div>
              </div>
  
<h3 class="subheading1" style="position: relative;top: 37px; width: 35%;">Information for Emails Sent to Customer</h3>
     <div class="border1">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
         
          
                         <div class="row ">
                            
                       
                   
                    
                    </div>
                    <div class="row ">
                     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small for="">Sender Name to show in emails to customer :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email From Name" name="salesEmailName" required>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small for="">Sender email address to show in emails to customer :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email From Address" name="salesEmailAddress" required>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small for="">Sender Phone :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email Phone" name="salesEmailPhone" required>
                    </div>
                    </div>
                    
                         <div class="row ">
                             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small for="">Sales Email Txt1 :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email Txt1" name="salesEmailTxt1" required>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small for="">Sales Email Txt2 :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email Txt2 " name="salesEmailTxt2" >
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small for="">Sales Email Txt3 :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email Txt3" name="salesEmailTxt3" >
                    </div>
                      
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <small for="">Your website address for customer to login :</small>
           
                        <input type="text" class="form-control"  placeholder="Site Login URL" name="siteLoginURL" required>
                    </div>
                     
                    </div>
                    
                    
                    
                    
                    
                    
                  
         </div>

         </div>        
         </div>
           <div class="formstatus">
                        
                    </div>
 <div class="row ">
    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 centermid">
                           <input type="submit" value="Save"  class="adminregbtn"  class="btn-success">
                     </div>
                     </div>

  </form>
<br>
        <h3 class="subheading1" style="position: relative;top: 23px; width: 16%; "> Sales ID List</h3>
            <div class="border overf">
                <table class="table table-bordered tbl1">
                    <thead>
                        <tr>
                            <td>Reference ID </td>
                            <td>Sales ID</td>
                              <td>Sales Discription</td>
                               <td>Website Address</td>
                               <td>Email Sender’s Name</td>
                                <td>Sender’s Email Address</td>
                                 <td>Email Sender’s Phone</td>
                                  <td>Sales Email Txt1</td> 
                                  <td>Sales Email Txt2</td>
                                  <td>Sales Email Txt3</td>
                                 
                            <td>Sales Id Edit</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        //print_r($salesdata);
                          $countuser=count($salesdata);
                 
                          for($i=0;$i<$countuser;$i++)
                          {
                              
                        ?>
                              <tr>
                             
                                
                             <td><?php echo $salesdata[$i]->reference_id;?></td>
                                  <td><?php echo $salesdata[$i]->sales_id;?></td>
                                  <td><?php echo $salesdata[$i]->sales_dis;?></td>
                                  
                                  <td><?php echo $salesdata[$i]->siteLoginURL;?></td>
                                  <td><?php echo $salesdata[$i]->salesEmailName;?></td>
                                  <td><?php echo $salesdata[$i]->salesEmailAddress;?></td>
                                  
                                  
                                  <td><?php echo $salesdata[$i]->salesEmailPhone;?></td>
                                  <td><?php echo $salesdata[$i]->salesEmailTxt1;?></td>
                                  <td><?php echo $salesdata[$i]->salesEmailTxt2;?></td>
                                     <td><?php echo $salesdata[$i]->salesEmailTxt3;?></td>
                                  
                                  
                                  <td>
                               <a style="text-decoration:none" class="tooltips" data-toggle="modal" onclick="getdata(<?php echo $salesdata[$i]->reference_id?>,'<?php echo $salesdata[$i]->sales_id;?>')" data-target="#myModal" href=""> <i style="font-size:18px;margin-left:5px;color:green"  class="fa fa-pencil" aria-hidden="true"></i> <span class="tooltiptext" >Edit Sales ID</span> </a>
                              </tr>                      
                              <?php  
                              
                          }
                      
                        ?>
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
          <form action="<?php echo base_url()?>admin/updateSalesData" method="POST" autocomplete="off" id="myForm">
              
         
          
                         <div class="row ">
                            
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <small for="">Sales ID :</small>
           
                        <input type="text" class="form-control"  maxlength="12" placeholder="Enter sales id" name="sales_id" id="sales_id" required>
                        <input type="hidden" name="old_sales_id" id="old_sales_id" >
                    </div>
                  
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <small for="">Sales Description :</small>
           
                        <input type="text" class="form-control"  placeholder="Enter sales discriptions" name="sales_dis" id="sales_dis" required>
                    </div> 
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <small for="">Site Login URL :</small>
           
                        <input type="text" class="form-control"  placeholder="Site Login URL" name="siteLoginURL" id="siteLoginURL" required>
                    </div>
                    
                    </div>
                    <div class="row ">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <small for="">Sales Email From Name :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email From Name" name="salesEmailName" id="salesEmailName" required>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <small for="">Sales Email From Address :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email From Address" name="salesEmailAddress" id="salesEmailAddress" required>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <small for="">Sales Email Phone :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email Phone" name="salesEmailPhone" id="salesEmailPhone" required>
                    </div>
                    </div>
                    
                         <div class="row ">
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <small for="">Sales Email Txt1 :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email Txt1" name="salesEmailTxt1" id="salesEmailTxt1" required>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <small for="">Sales Email Txt2 :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email Txt2 " name="salesEmailTxt2"  id="salesEmailTxt2" >
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <small for="">Sales Email Txt3 :</small>
           
                        <input type="text" class="form-control"  placeholder="Sales Email Txt3" name="salesEmailTxt3" id="salesEmailTxt3">
                    </div>
                     
                     
                    </div>
                     <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 centermid">
                           <input type="submit" value="Update"  class="adminregbtn"  class="btn-success">
                     </div>
                     </div>
                    
                    
                    
                    
                     <div class="formstatus">
                        
                    </div>
                    </form>
      </div>
  
      
    </div>

  </div>
</div>

            </div>
            
            
            <script>
            function getdata(reference_id,sales_id){
                $.ajax({
    type: "POST",
    url:"<?php echo base_url("admin/getSelerData")?>"+"/"+reference_id+"/"+sales_id,
    dataType: 'json',

    async: false,
    success: function(obj) {//data will have what ever you echo'ed in controller
    
    console.log(obj);
 
        $("#sales_id").val(obj.sales_id);
        $("#old_sales_id").val(obj.sales_id);
         $("#sales_dis").val(obj.sales_dis);
         $("#siteLoginURL").val(obj.siteLoginURL);
         $("#salesEmailName").val(obj.salesEmailName);
         $("#salesEmailAddress").val(obj.salesEmailAddress);
         $("#salesEmailPhone").val(obj.salesEmailPhone);
         $("#salesEmailTxt1").val(obj.salesEmailTxt1);
         $("#salesEmailTxt2").val(obj.salesEmailTxt2);
         $("#salesEmailTxt3").val(obj.salesEmailTxt3);
      
       

    }

});
}
            </script>