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


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      <h2>Sign In</h2>
      
      <p>Sign in to your PPPGuides account to access our solutions.</p>
    </div> 
    <!-- Login Form -->
    <form method="post" action="<?php echo base_url()?>user/loginAction" enctype="application/x-www-form-urlencoded" id="ajaxForm">
  <h5 class="pull-left logintab"> User ID</h5> <br>
    
      <input type="email" class="second  frmctrl form-control" required name="email" placeholder="User ID">
    <h5 class="pull-left logintab">Password</h5><br>
      <input type="password" id="password" class="fadeIn third frmctrl form-control" name="password" required placeholder="Password">
       <div class="pull-left logintab"><input type="checkbox"  class="logincheckbox" > Remember my user ID</div>
    <div style="margin-left:50px;padding-top:20px;text-align:left" class="formstatus"></div>
      <button type="submit" required class="fadeIn login" >  <i class="fa fa-lock" aria-hidden="true"></i>  Sign In</button>
      <p>By clicking Sign in, you agree to our <a href="<?php echo base_url()?>user/termsandconditionlogin">Terms</a>
 and have read and acknowledge our US <a href="<?php echo base_url()?>user/termsandconditionlogin">Privacy Statement</a>.</p>
    </form>
    <!-- Remind Passowrd --><br> 
   
    

    <div id="formFooter">
         <a class="underlineHover" href="#" data-toggle="modal" data-target="#myModal">I forgot my Password</a><br>
    <a class="underlineHover" id="signupspace" href="<?php echo base_url()?>user/signup"><b>New User?</b> Click here to sign up and create a new account</a>
     
    </div>
  </div>
</div>
<?php $this->view('template/forgotpass');?>