



<?php $this->load->view('User/sidebar');
?>

<div class="container-fluid  formcon">
<div class="row sk_headings"> 
                <h2>Forgiveness calculation</h2> 

        
        </div> 
        <form method="post" action="<?php echo base_url()?>user/" id="alertForm">
            

        <div class="row stepsall" >

<div class="col-lg-6 col-sm-10 col-md-6 col-xs-10"  > <span><a class="step set step1 active" id="eightbtn">  8 weeks  </a></span> </div> 

<div class="col-lg-6 col-sm-10 col-md-6 col-xs-10"  >   <span><a class="step set step5 " id="twentyfourbtn" >24 Weeks   </i></a></span> </div>
  

        </div>

<div id="eightweekdiv">


<h4 class="subheading">8 Weeks Forgiveness Calculation  </h4>

              <div class="row ">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <label for="">Enter total of all Payroll costs for 8 week </label>
                
				<input type="number" name="week8" placeholder="Enter TOTAL of ALL Payroll COSTS FOR 8 WEEK" required class="form-control">
                    
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <label for="">Enter total of ALL Payroll related State and Local Taxes For 8 weeks </label>
               
				<input type="number" name="payroll8" placeholder="Enter TOTAL of ALL Payroll related State and Local Taxes For 8 weeks" required class="form-control">
                   
                </div>
            </div>
			
			
			


           
            
			
			 <div class="row ">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <label for="">Enter TOTAL cost of all Benefits incurred or paid by employer for 8 week </label>
              
				<input type="number" name="cost9week" placeholder="Enter TOTAL cost of all Benefits incurred or paid by employer for 8 week" required class="form-control">
                    
                </div>
            </div>

			
			
			 <div class="row ">
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
                    <label for="">Do above Payroll Costs include any “non-owner” employee who received more than $15,385 in the 8 week period  </label>
            
                </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
                <label for=""  class="rediomove"> <input type="radio" name="radio1" value = "yes"> Yes</label>
                </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
					 <label for=""  class="rediomove"> <input type="radio"  name="radio1" value = "no"> No</label>
                    
                </div>
            </div>


           
			   
			   
			  <div class="row ">
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
                    <label for="">Do above Payroll Costs include any “owners” who received more than $15,385 in the 8 week period  </label>
                </div>
                <div class="col-lg-2 col-sm-12 col-md-2 col-xs-12">
                    <label for="" class="rediomove"> <input type="radio" name="radio3" value = "yes"> Yes</label>
                </div>
                    <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
					 <label for="" class="rediomove"> <input type="radio"  name="radio3" value = "no"> No</label>
                   
                </div>
            </div>
            
			
           
			   
			   <div class="row ">
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
                    <label for="">Do above Payroll Costs include any “owners” who received average wages in in the 8 week period that are higher than similar average in 2019 for the same owner,   </label>
                </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
                <label for="" class="rediomove"> <input type="radio" name="radio5" value = "yes"> Yes</label>
                </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
					 <label for="" class="rediomove"> <input type="radio"  name="radio5" value = "no"> No</label>
                    
                </div>
            </div>
			
			
			  
			
			<div class="row ">
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
                    <label for="">Do above Benefit Costs include contributions for any “owners” paid or incurred in the 8 week period    </label>
                </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
                <label for="" class="rediomove"> <input type="radio" name="radio7" value = "yes"> Yes</label>
                </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
					 <label for="" class="rediomove"> <input type="radio"  name="radio7" value = "no"> No</label>
                    
                </div>
            </div>
			

			 
			 
			<div class="row ">
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
                    <label for="">Do above Benefit Costs include any employee contributions towards benefits paid or incurred in the 8 week period   </label>
                </div>
                <div class="col-lg-2 col-sm-12 col-md-2 col-xs-12">
                 <label for="" class="rediomove"><input type="radio" name="radio9" value = "yes"> Yes</label>
                </div>
                 <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
					 <label for="" class="rediomove"> <input type="radio"  name="radio9" value = "no"> No</label>
                    
                </div>
            </div>
			<div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <button type="button" style="width: 100%; margin-left: 0;" id="next" class="btn_default" >Next </button>
                </div>
            </div>
			</div>
			

			 
            
            <div id="twentyfourweekdiv">
			
			<div class="row ">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h4 class="subheading">24 Weeks Forgiveness  Calculation </h4>
                </div>
            </div>
		
		
             <div class="row ">
               
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
				<label for="">Enter total of all payroll costs for 24 week </label>
               
                    <input type="number" name="week8" placeholder="Enter TOTAL of ALL Payroll COSTS FOR 24 WEEK" required class="form-control">
                </div>
           
               
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
				 <label for="">Enter total of all Payroll related State and Local Taxes For 24 weeks </label>
                
            
                    <input type="number" name="payroll24" placeholder="Enter TOTAL of ALL Payroll related State and Local Taxes For 24 weeks" required class="form-control">
                </div>
            </div>
			
			<div class="row ">
               
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<label for="">Enter TOTAL cost of all Benefits incurred or paid by employer for 24 week</label>
              
                    <input type="number" name="cost24week" placeholder="Enter TOTAL cost of all Benefits incurred or paid by employer for 24 week" required class="form-control">
                </div>
            </div>
            
			
            <div class="row ">
               
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
                     <label for="">Do above Payroll Costs include any “non-owner” employee who received more than $15,385 in the 24 week period </label>
                </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
                  <label for="" class="rediomove"><input type="radio" name="radio2" value = "yes"> Yes</label>
                  </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
					 <label for="" class="rediomove"> <input type="radio"  name="radio2" value = "no"> No</label>
                </div>
               </div>
			
            <div class="row ">
               
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
				 <label for="">Do above Payroll Costs include any “owners” who received more than $15,385 in the 24 week period </label>
                 
                </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
                  <label for="" class="rediomove"><input type="radio" name="radio4"  value = "yes"> Yes</label>
                  </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
					 <label for="" class="rediomove"> <input type="radio"  name="radio4" value = "no"> No</label>
                </div>
               </div>
			   
			<div class="row ">
               
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
				<label for="">Do above Payroll Costs include any “owners” who received average wages in in the 24 week period that are higher than similar average in 2019 for the same owner,</label>
                     
                </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
                  <label for="" class="rediomove"><input type="radio" name="radio6" value = "yes"> Yes</label> </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
					 <label for="" class="rediomove"><input type="radio"  name="radio6" value = "no"> No</label>
                </div>
              </div>
			  
			  
			  <div class="row ">
               
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
                    <label for="">Do above Benefit Costs include any employee contributions towards benefits paid or incurred in the 24 week period   </label>
                    </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
                  <label for="" class="rediomove"><input type="radio" name="radio10" value = "yes"> Yes</label>
                  </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
					 <label for="" class="rediomove"><input type="radio"  name="radio10" value = "no"> No</label>
                </div>
             </div>
			 
			 
			 
			 <div class="row ">
               
                <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
				<label for="">Do above Benefit Costs include contributions for any “owners” paid or incurred in the 24 week period  </label>
                     
                </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
                  <label for="" class="rediomove"><input type="radio" name="radio8" value = "yes"> Yes</label>
                  </div>
                <div class="col-lg-2 col-sm-6 col-md-2 col-xs-6">
					 <label for="" class="rediomove"> <input type="radio"  name="radio8" value = "no"> No</label>
                </div>
             </div>
                  

             <div style="margin-left:50px;" class="formstatus"></div>
             <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <button type="submit" style="width: 100%; margin-left: 0;" id="saveBtn2" class="btn_default" >Calculate </button>
                </div>
            </div>
            </div>
</form>
</div>







<script>


$( "#eightbtn" ).click(function() {
    $('.step').removeClass('active');
    $('#twentyfourweekdiv').hide();
    $('#eightweekdiv').show();
    $( "#eightbtn" ).addClass('active');
    
});

$( "#twentyfourbtn" ).click(function() {
    $('.step').removeClass('active');
 $('#eightweekdiv').hide();
 $('#twentyfourweekdiv').show();
 $( "#twentyfourbtn" ).addClass('active');
});



$( "#next" ).click(function() {
    $('.step').removeClass('active');
 $('#eightweekdiv').hide();
 $('#twentyfourweekdiv').show();
 $( "#twentyfourbtn" ).addClass('active');

});

</script>
