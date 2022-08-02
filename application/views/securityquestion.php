<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      <h4 >Security Questions </h4>
    </div> 
    <!-- Login Form -->
    <form method="post" action="<?php echo base_url()?>user/" id="myForm">
    <label for="" class="pull-left">
    Question 
 </label>
    
 <select class="frmctrl" id="q_one" name="q_one">
					<option value="What was your childhood nickname?">What was your childhood nickname?</option>
					<option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
					<option value="What street did you live on in third grade?">What street did you live on in third grade?</option>
					<option value="What is the middle name of your youngest child?">What is the middle name of your youngest child?</option>
					<option value="What is your oldest sibling's middle name?">What is your oldest sibling's middle name?</option>
					<option value="What school did you attend for sixth grade?">What school did you attend for sixth grade?</option>
				  </select>
      <label for="" class="pull-left">Answer</label>
      <input type="text" id = "a_one" name="a_one" placeholder="Answer" required class="fadeIn third frmctrl">
      <label for="" class="pull-left">
    Question 
 </label>
 <select class="frmctrl" id="q_two" name="q_two">
					<option value="What is your oldest cousin's first and last name?">What is your oldest cousin's first and last name?</option>
					<option value="What was the name of your first stuffed animal?">What was the name of your first stuffed animal?</option>
					<option value="In what city or town did your mother and father meet?">In what city or town did your mother and father meet?</option>
					<option value="What was the last name of your third grade teacher?">What was the last name of your third grade teacher?</option>
					<option value="What is your maternal grandmother's maiden name?">What is your maternal grandmother's maiden name?</option>
					<option value="In what city or town was your first job?">In what city or town was your first job?</option>
				  </select>
                  <label for="" class="pull-left">Answer</label>
      <input type="text" id="a_two" name="a_two" placeholder="Answer" required class="fadeIn third frmctrl">
    <div style="margin-left:50px;" class="formstatus"></div>
      <input type="submit" class="fadeIn login btn_default" value="Check">
    </form>
    
    <!-- Remind Passowrd --><br> 
   
    

    <div id="formFooter">

    </div>
  </div>
</div>
