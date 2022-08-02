<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-24678919-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-24678919-3');
</script>

<!—Zoho Chat  -->
<script type="text/javascript"> window.ZohoHCAsap=window.ZohoHCAsap||function(a,b){ZohoHCAsap[a]=b;};(function(){var d=document;var s=d.createElement("script");s.type="text/javascript";s.defer=true;s.src="https://desk.zoho.com/portal/api/web/inapp/537390000000186045?orgId=723800863";d.getElementsByTagName("head")[0].appendChild(s);})(); </script>

<!—Zoho Knowledgebase -->
<script type="text/javascript">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode:"8a86dbb09e760276c187f9f94a360ef03a1babd1960a6e1066c0d940249f548b", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>");</script>


<div class="container-fluid">   
        <div class="row ho_topmainarea">
            <div class="col-lg-2 col-md-2  col-xs-2 col-sm-2">
                <div class="row ho_sidebar ho_adsidebar ho_clr_white" id="ho_sidebar">
                    <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12">
                       
                        <ul>  
                            <li> <h3><?php echo ucfirst($this->session->userdata("ws_name"));?></h3></li>
                            <li> <h3><?php echo $this->session->userdata("cust_id");?></h3></li>
                            <li> <a href="javascript:void(0)" class="ho_closebtn" onclick="closeNav()">x</a></li>
                            <li id="home"><a href="<?php echo base_url()?>user/companyInfo"><i class="fa fa-home fa-2x" aria-hidden="true"></i> Home</a></li>
                            <!--<li id="messages"><a href="<?php //echo base_url();?>user/messages"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i> Messages</a></li>-->
                            <li id="account"><a href="<?php echo base_url()?>user/account"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i> Manage account</a></li>
                            <li id="faq"><a href="<?php echo base_url()?>user/faq"><i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i> FAQ</a></li>
                            
                            <li id="help"><a href="<?php echo base_url()?>user/contactsupport"><i class="fa fa-phone fa-2x" aria-hidden="true"></i> Contact Support </a></li>
                            
                            <li><a href="<?php echo base_url();?>user/logout"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>

            </div>
<!--end sidebar-->

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
<div class="ho_hide widfull ho_darkgray">
<button class="ho_openbtn btn_default ho_clr_white widfull" onclick="openNav()"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> <a href="<?php echo base_url();?>" class="logo ho_clr_white">PPP Forms</a></button>
</div>
<div class="ho_messagearea" id="main">

     

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
    $('#faq').addClass("active");
    break;
  case 4:
    $('#help').addClass("active");
    break;
    case 5:
    $('#calculate').addClass("active");
    break;

}
</script>