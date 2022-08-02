<div class="container-fluid">

    <div class="row" id="convenient">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <h4 style="text-align:center"><?php echo 'Customer Id: '.$userdata->cust_id;?>------<?php echo ' Company Name '.$companydata->business_name;?>------<?php echo ' Current Plan: '.$userdata->account_type;?></h4>

            <!--<h2>Convenient and affordable pricing plans for your PPP needs</h2>
            <p>All our pricing plans are designed to meet the needs of every individual customer. Our affordable and convenient pricing plans help you choose the perfect solution for your need.</p>
           --> <h3>Select Your Plan</h3>

        </div>
    </div>
    <div class="row" id="convenient">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <h4 style="text-align:center">
            <input  style="margin:20px;" name="gateway_type" type="radio" id="gateway_type" class="gateway_type" value="stripe" checked><label > Stripe Gateway</label>
            <input style="margin:20px;" name="gateway_type" type="radio" value="paypal" class="gateway_type"><label > Paypal Gateway</label></br>
            <?php if(!isset($invoice)){?>
                <small>Have a discount coupon? </small><input type="text" name="code" class="alphaNondecNumberOnly uppercase" id="code" placeholder="Enter discount code here">
            <?php
            }
            else{
            ?>
                <input type="text" class="hidden" name="code" value="" id="code" placeholder="Enter discount code here">
            <?php
            }
            ?>
            </h4>
        </div>
    </div>

    <div class="row text-center" id="packages">
        <?php
        $i=1;
               //print_r($priceplandata) ;
                foreach($priceplandata as $pp){
            ?>

                <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 cardsize">
                    <h3><?php echo ucfirst($pp->plan_name) ?></h3>
                    <div class="row card<?php echo $i;?> leftmargin">
        
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 cardpadding">
                            <h2 id="crd<?php echo $i;?>"><?php echo $pp->view_header; ?></h2>
                            <div class="pricing_text">
                            <ul>
                                <?php echo $pp->view_body; ?>
                                
                            </ul>
                            </div><br>
                            <a  href="<?php echo base_url();?>user/updatePlan/<?php echo $pp->plan_name;?>" class="link" id="btn_default<?php echo $i;?>">Get Started</a>
                           <!-- <a class="<?php if($account_type!="free"){
                            echo "disableClick";}?>" href="<?php echo base_url();?>user/updatePlan/1" id="btn_default">Get Started</a>-->
                        </div>
                    </div>
                </div>
        
        <?php
                $i++;
					if($i>4){
						$i=2;
					}
                }
        ?>


        <?php if($this->session->userdata('role')=='admin'&&!isset($invoice)){?>
        
            <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 ">
                <h3>Testing</h3>
                <div class="row leftmargin">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 cardpadding">
                        <h2 id="crd4">$0.1 + <br>$0.1/employee</h2>
                        <div class="btn_edit">
                            <a href="<?php echo base_url();?>user/updatePlan/5" class="link" id="btn_default4">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>   <!--     -->

        <?php 
        } 
        ?>
    </div>
</div>


<script>
    $(document).on('click', '.link', function(e) {
        e.preventDefault();
        var href=$(this).attr('href')+"/"+$('input[name=gateway_type]:checked').val()+"/"+$('#code').val();
        
        //alert(href);
        window.location.href = href;
    
    });

    
</script>