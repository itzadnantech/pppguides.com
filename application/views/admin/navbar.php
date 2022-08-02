<div class="container-fluid">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo ucfirst($admindata->ws_name)?> Menu</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul style="margin-left:30px;" class="nav navbar-nav">
        <li><a class="border-white" href="<?php echo base_url()?>admin/adminhome"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
        <!--<li><a class="border-white" href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Messages</a></li>-->
        <li><a class="border-white" href="<?php echo base_url()?>user/account"><i class="fa fa-user" aria-hidden="true"></i> Manage account</a></li>
        <li><a class="border-white" href="<?php echo base_url()?>admin/registeruser"><i class="fa fa-user-plus" aria-hidden="true"></i> Add New User</a></li>
         <li><a class="border-white" href="<?php echo base_url()?>admin/maintainsales"><i class="fa fa-font-awesome" aria-hidden="true"></i> Maintain Sales ID</a></li>
         <li><a class="border-white" href="<?php echo base_url()?>admin/customInvoices"><i class="fa fa-print" aria-hidden="true"></i> Custom Invoices</a></li>
         <li><a class="border-white" href="<?php echo base_url()?>admin/promoCodes"><i class="fa fa-get-pocket" aria-hidden="true"></i> Promo-Codes</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($admindata->role)."-".$admindata->cust_id; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>admin/logout">Log-out <?php echo $this->session->userdata("email");?></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


    
<script type='text/javascript'>
    switch(<?php echo $selectedmenu;?>) {
  case 0:
    $('#home').addClass("active");
    break;
  case 1:
    $('#messages').addClass("active");
    break;
  case 2:
    $('#account').addClass("active");
    break;
  case 3:
    $('#registerperson').addClass("active");
    break;
    case 4:
    $('#maintainsales').addClass("active");
    break;

}
</script>

