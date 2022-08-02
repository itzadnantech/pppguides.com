<?php 
    if(strlen($this->session->userdata("admin_id"))>0){ 
        $this->load->view('admin/navbar');
    }
    else{
        $this->load->view('User/sidebar');
    }
?>

    <div   class="border passchangedivs"  >
      <h2 class="sk_headings accountheading" >Security Questions </h2>
    
    <!-- Login Form -->
    <form method="post" action="<?php echo base_url()?>user/securityQuestionsAction" id="myForm">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
<small> Question<small class="red">*</small> </small>
<select class="form-control" id="q_one" name="q_one">
					<option value="What was your childhood nickname?">What was your childhood nickname?</option>
					<option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
					<option value="What street did you live on in third grade?">What street did you live on in third grade?</option>
					<option value="What is the middle name of your youngest child?">What is the middle name of your youngest child?</option>
					<option value="What is your oldest sibling's middle name?">What is your oldest sibling's middle name?</option>
					<option value="What school did you attend for sixth grade?">What school did you attend for sixth grade?</option>
				  </select>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
<small>Answer</small>
<input type="text" id = "a_one" name="a_one" placeholder="Answer" required class="form-control">
        </div>
    </div>

   <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
       <small>Question <small class="red">*</small> </small>
       <select class="form-control" id="q_two" name="q_two">
					<option value="What is your oldest cousin's first and last name?">What is your oldest cousin's first and last name?</option>
					<option value="What was the name of your first stuffed animal?">What was the name of your first stuffed animal?</option>
					<option value="In what city or town did your mother and father meet?">In what city or town did your mother and father meet?</option>
					<option value="What was the last name of your third grade teacher?">What was the last name of your third grade teacher?</option>
					<option value="What is your maternal grandmother's maiden name?">What is your maternal grandmother's maiden name?</option>
					<option value="In what city or town was your first job?">In what city or town was your first job?</option>
				  </select>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
       <small>Answer</small>
       <input type="text" id="a_two" name="a_two" placeholder="Answer" required class="form-control">
   </div>
   </div>


   <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
<small> Question<small class="red">*</small> </small>
<select class="form-control" id="q_three" name="q_three">
<option value="What is your favorite color?">What is your favorite color?</option>
					<option value="When is your anniversary?">When is your anniversary?</option>
					<option value="In what city were you born?">In what city were you born?</option>
					<option value="What was the make of your first car?">What was the make of your first car?</option>
					<option value="Who is your favorite actor, musician, or artist?">Who is your favorite actor, musician, or artist?</option>
                    <option value="What was your favorite place to visit as a child?">What was your favorite place to visit as a child?</option>
				
				
				  </select>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
<small>Answer</small>
<input type="text" id = "a_three" name="a_three" placeholder="Answer" required class="form-control">
        </div>
    </div>



   


   <div class="row">
   <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 center">
  <div style="margin-left:50px;" class="formstatus"></div>
      <input type="submit" class="btn_default" value="submit">
   </div>
   </div>
    </form>
    </div>
    
 