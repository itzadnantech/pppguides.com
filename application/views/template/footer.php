


</div>  
</div>
  </div>
  </div>
  </div>
<script type='text/javascript'>
    $( document ).ready(function() {
    <?php if(isset($message)&&strlen($message)>15){
            echo "var status=`".$message."`.split('~');";
        echo "swal(status[1], status[0], status[2]);";
        
}
    ?>
    
    
	var uri = window.location.toString();
	if (uri.indexOf("~") > 0) {
	    var clean_uri = uri.substring(0, uri.lastIndexOf("/"));
	    window.history.replaceState({}, document.title, clean_uri);
	}
});

</script>
<div id="footer">
    <div class="footer-in">
      <div class="container">
        <div class="footer-center">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 wow fadeIn">
              <div class="logo-text-ctr">
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--footer-->
  <div class="clearfix"></div>
  <script src="<?php echo base_url();?>assets/js/inputmask.js"></script>
  <script src="<?php echo base_url();?>assets/js/sweetalert.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
</body>
</html>