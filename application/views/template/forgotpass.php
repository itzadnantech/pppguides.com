  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h2 class="modal-title center">Forgot Password??</h2>
        </div>
          <form action="<?php echo base_url()?>user/forgotpass" method="post" id="ajaxForm1">
            <div class="modal-body center">
              <h5  class="pull-left logintab">Please enter the registered email id.</h5>
                <input type="email" name="email" class="frmctrl form-control" required>
                <div class="formstatus"></div>
            </div>
              
            <div class="modal-footer center">
                <button type="submit" class="login" >Send Email</button>
             
            </div>
            </form>
      </div>
      
    </div>
  </div>
