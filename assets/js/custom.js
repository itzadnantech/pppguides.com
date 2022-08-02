$('#myForm,#myForm2,#mform,#loadform,#loadform2').submit(function(e) {
    e.preventDefault();
    var formid = '#myForm';
    var inputcontrols = $(formid + ' .quantitys');
    inputcontrols.each(function() {
  
    $(this).val($(this).val().split(",").join(''));
    });
    var url = $(this).attr('action');
    var formid = '#' + this.id;

    var inputcontrols = $(formid + ' :input');//$("form1 .numberformat");
    var data = {};
    inputcontrols.each(function() {
        var c_name = this.name;//remove this
        data[c_name] = $(this).val().trim();//$(this).val()=$(this).val().split(',').concat();
    });
    var posting = $.post(url, data);
    posting.done(function(data) {
        var datavalues = data.split('-');
        var status = formid + " .formstatus";
        $(status).empty();
        $(status).append('<p>' + datavalues[0] + '</p>');
        $(status).children().css("color", datavalues[1]);
        $(status).show().delay(10000).fadeOut();
        if (datavalues[2] != "")
            window.location.href = datavalues[2];
    });
});

$('#ajaxForm,#ajaxForm1').submit(function(e) {
    e.preventDefault();
    var formid = '#' + this.id;
    var inputcontrols = $(formid + ' .quantitys');
    inputcontrols.each(function() {
  
    $(this).val($(this).val().split(",").join(''));
    });
    var url = $(this).attr('action');
    var formid = '#' + this.id;

    var inputcontrols = $(formid + ' :input');//$("form1 .numberformat");
    var data = {};
    inputcontrols.each(function() {
        var c_name = this.name;//remove this
        data[c_name] = $(this).val().trim();//$(this).val()=$(this).val().split(',').concat();
    });
    var posting = $.post(url, data);
    posting.done(function(data) {
        var datavalues = data.split('~');
        var status = formid + " .formstatus";
        $(status).empty();
        $(status).append('<label>' + datavalues[0] + '</label>');
        $(status).children().css("color", datavalues[1]);
        if (datavalues[2] != "")
            window.location.href = datavalues[2];
    });
});

$('#invoiceForm,#invoiceForm1').submit(function(e) {
    e.preventDefault();
    var formid = '#' + this.id;
    var inputcontrols = $(formid + ' .quantitys');
    inputcontrols.each(function() {
  
    $(this).val($(this).val().split(",").join(''));
    });
    var url = $(this).attr('action');
    var formid = '#' + this.id;

    var inputcontrols = $(formid + ' :input');//$("form1 .numberformat");
    var data = {};
    inputcontrols.each(function() {
        var c_name = this.name;//remove this
        data[c_name] = $(this).val().trim();//$(this).val()=$(this).val().split(',').concat();
    });
    var posting = $.post(url, data);
    posting.done(function(data) {
        var datavalues = data.split('~');
        var status = formid + " .formstatus";
        $(status).empty();
        if(datavalues[0]!=""){
            $(formid+" #showcust_id").text(datavalues[0]);
            $(formid+" #url").removeClass("hidden");
        }
        $(status).append('<p>' + datavalues[1] + '</p>');
        $(status).children().css("color", datavalues[2]);
        $(status).show().delay(10000).fadeOut();
        $('#invoiceModal').modal('toggle');
        swal("Success", "Invoice Created and Emailed to Customer", "success");
        if (datavalues[3] != "")
            window.location.href = datavalues[3];
    });
});


$(document).on('blur', '.quantitys', function() {
     // alert($(this).val());
        if($(this).val()==""){
            $(this).val("0");
        }
        
        $(this).val($(this).val().split("_").join(''));
        this.value = parseFloat(this.value.replace(/,/g, ""))
                    .toFixed(2)
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

  });
  
  $(document).on('blur', '.filter_field', function() {
      //alert($(this).val());
        $(this).val($(this).val().split("_").join(''));

  });
  
    $(document).on('change', '#basedon', function() {
      //alert($(this).val());
        if($(this).val()=="dollars"){
            $("#p_discount").removeClass("percentpromo");
            $("#p_discount").addClass("dollarpromo");
        }else{
            $("#p_discount").removeClass("dollarpromo");
            $("#p_discount").addClass("percentpromo");
            
        }
            $("#p_discount").val(0);

  });
  
  $(document).on('keypress', '.dollarpromo', function(e) {
      
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 ) &&  e.which != 46 && e.which != 44 ) {
        //display error message
        return false;
    }
   // alert(e.which);
     cleanedVal=parseFloat(($(this).val().split(",").join(''))+String.fromCharCode(e.which));
    
        if(cleanedVal>2000){
         //alert(cleanedVal);
            return false;
        }
        else if(cleanedVal<0){
            return false;
        }
});

  $(document).on('keypress', '.percentpromo', function(e) {
      
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 ) &&  e.which != 46 && e.which != 44 ) {
        //display error message
        return false;
    }
   // alert(e.which);
     cleanedVal=parseFloat(($(this).val().split(",").join(''))+String.fromCharCode(e.which));
    
    if(cleanedVal>100){
         //alert(cleanedVal);
            return false;
        }
        else if(cleanedVal<0){
            return false;
        }
});
  
  
 $(document).ready(function () {
     var inputcontrols = $('.quantitys');
     inputcontrols.each(function() {
        if($(this).val()!=""){
         $(this).val(parseFloat($(this).val().replace(/,/g, "")).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        }
     });
  });
  
      //called when key is pressed in textbox
$(document).on('keypress', '.quantitys', function(e) {
      
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 ) &&  e.which != 46 && e.which != 44 ) {
        //display error message
        return false;
    }
   // alert(e.which);
     cleanedVal=parseFloat(($(this).val().split(",").join(''))+String.fromCharCode(e.which));
    
    if(cleanedVal>=10000000){
         //alert(cleanedVal);
            return false;
        }
        else if(cleanedVal<0){
            return false;
        }
});
    
	
	
	$(document).on('keypress', '.alphaNondecNumberOnly', function(e) {
        if (e.which == 8 || e.which == 0 || (e.which >= 48 && e.which <= 57 )|| (e.which >= 48 && e.which <= 57 ) || 
                        (e.which >= 65 && e.which <= 90 ) || (e.which >= 97 && e.which <= 122 )  ) {
                            
            return true;
        }
        else{
            return false
        }
	});
	
	$(document).on('keyup', '.uppercase', function() {
            $(this).val($(this).val().toUpperCase());  
        }); 
  
  
//remove comma

$(document).on('click', '.savebtn', function() {
   // alert("clicked");
    var inputcontrols = $('.quantitys');
    inputcontrols.each(function() {
    //alert($(this).val());
    $(this).val($(this).val().split(",").join(''));
    $(this).val($(this).val().split("_").join(''));
    });
    
    var inputcontrols = $('.quantity');
    inputcontrols.each(function() {
      if($(this).val()==""){
         // alert("A");
        $(this).val(0.00);
      }
    });
    
});//forgivenesssFrm

$(document).on('click', '#savebtn', function() {//generic function to remove , when submitting form
   // alert("clicked");
    var inputcontrols = $('.quantitys');
    inputcontrols.each(function() {
    //alert($(this).val());
    $(this).val($(this).val().split(",").join(''));
    });
    
    var inputcontrols = $('.quantity');
    inputcontrols.each(function() {
      if($(this).val()==""){
         // alert("A");
        $(this).val(0.00);
      }
    });
    
});

$(document).on('click', '#saveBtn1', function() {
 var formid = '#myForm';
    var inputcontrols = $(formid + ' .quantitys');
    inputcontrols.each(function() {
  
    $(this).val($(this).val().split(",").join(''));
    });
    
    var inputcontrols = $(formid + ' .quantity');
    inputcontrols.each(function() {
      if($(this).val()==""){
         // alert("A");
        $(this).val(0.00);
      }
    });

});





$('#alertForm').submit(function(e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var formid = '#' + this.id;

    var inputcontrols = $(formid + ' :input');
    var data = {};
    inputcontrols.each(function() {
        var c_name = this.name;
        //alert($(this).val());
        data[c_name] = $(this).val().trim();
    });
    var posting = $.post(url, data);
    posting.done(function(data) {
        var status = data.split('~');
        //alert(data);
        swal(status[1], status[0], status[2]);
    });
});

//readonly fields code below
/*function readformOnly() {
    var formid = '#form';
    var inputcontrols = $(formid + ' :input');
    inputcontrols.each(function() {
        $(this).attr('readonly', true);
    });
    $("#savebtn").hide();
}
*/
function editformFields() {
    var formid = '#form';
    var inputcontrols = $(formid + ' :input');
    inputcontrols.each(function() {
        if (this.name != "loan8_start" && this.name != "payroll8_start" && this.name != "loan24_start" && this.name != "payroll24_start" && this.name != "loan8_end" && this.name != "email" && this.name != "payroll8_end" && this.name != "loan24_end" && this.name != "payroll24_end") {
            $(this).attr('readonly', false);
        }
    });
    $("#savebtn").show();
}

$(document).on('click', '#FormFillbtn', function() {
    var formid = '.sampleForm';
    var inputcontrols = $(formid + ' :input');
    inputcontrols.each(function(e) {
        $(this).val("1111");
    });
    
    $("select").prop("selectedIndex", 1);
});



$(document).on('change', '#payroll_begin_date', function() {

    $('#payroll8_start').val($('#payroll_begin_date').val());
    $('#payroll24_start').val($('#payroll_begin_date').val());
    $('#payroll8_end').val(parseDate($('#payroll8_start').val(), (8 * 7)-1));
    $('#payroll24_end').val(parseDate($('#payroll24_start').val(), (24 * 7)-1));
    $('#loan8_end').val(parseDate($('#loan8_start').val(), (8 * 7)-1));
    $('#loan24_end').val(parseDate($('#loan24_start').val(), (24 * 7)-1));
});

$(document).on('click', '#btnjump', function() {
    if ($("#copyPrimary").is(':checked')) {
        $("#autoForm").submit();
    }
});




if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

function parseDate(value, days) {
    var date = new Date(Date.parse(value));
    date.setDate(date.getDate() + days);
    //alert(date);
    var month = "";
    var day = "";
    //alert(date.getMonth());
    if (date.getMonth() < 9) {
        month = "0" + (date.getMonth() + 1);
    } else {
        month = date.getMonth() + 1;
    }
    if (date.getUTCDate() < 10) {
        day = "0" + date.getUTCDate();
    } else {
        day = date.getUTCDate();
    }
    // alert(date.getFullYear()+"-"+month+"-"+day);
    //alert(date.getFullYear());
    if (date.getFullYear() > 2020) {
        return "2020-12-31";
    } else {
        return date.getFullYear() + "-" + month + "-" + day;
    }
}

function downloadTable(url){
    $('#searchForm').attr('action', url+"downloadFile");
    $('#searchForm').submit();
}







$(document).ready(function() {
    //  9 : numeric
    //  a : alphabetical
    //  * : alphanumeric
    $("#ein").inputmask("99-9999999");
    
    $("#ssn").inputmask("999-99-9999");
    
    $("#zip").inputmask("*****");
    
    $('.middlename').inputmask("a");

    $(".phone").inputmask("999-999-9999");

    $(".landline_extension").inputmask("99999");

    $("#loanapplication").inputmask("99999");
    
    $("#forgivenessapplication").inputmask("99999");

    $("#ownerpartners").inputmask("9999");

    $("#vcode").inputmask("999-999");
    
    $(".loan").inputmask("9999999999");
   
    $(".single_float").inputmask("9{1,4}.9{0,1}");
    
    $(".double_float").inputmask("9{1,4}.9{0,2}");
   
    $(".four_digit").inputmask("9999");
    
    $(".million_float").inputmask("7{1,9}.9{0,2}");
});

$(document).on('change', '#copyPrimary', function() {
    if ($("#copyPrimary").is(':checked')) {
        $("#autoForm").submit();
    }
});


$(document).on('change', '#forgiveness_period', function() {
    if ($("#forgiveness_period").val().includes("(")) {
        $(".dynamic_date").text($("#forgiveness_period").val().split('(')[1].trim(')'));
    }
});



$(document).on('click', '#saveBtn2', function() {
  
 var formid = '#myForm';
    var inputcontrols = $(formid + ' .quantitys');
    inputcontrols.each(function() {
  
    $(this).val($(this).val().replace(",", ""));
      //  alert($(this).val());
    });
    
    $("#myForm").submit();
});





$('#autoForm').submit(function(e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var formid = '#' + this.id;

    var inputcontrols = $(formid + ' :input');
    var data = {};
    inputcontrols.each(function() {
        var c_name = this.name;
        data[c_name] = $(this).val().trim();
    });
    var posting = $.post(url, data);
    posting.done(function(data) {
        var obj = JSON.parse(data);
        $("#first_name").val(obj.first_name);
        $("#middle_initial").val(obj.middle_initial);
        $("#last_name").val(obj.last_name);
        $("#title").val(obj.title);
        $("#email").val(obj.email);
        $("#landline_phone").val(obj.landline_phone);
        $("#landline_extension").val(obj.landline_extension);
        $("#mobile_phone").val(obj.mobile_phone);
        $("#mobile_carrier").val(obj.mobile_carrier);

    });
});

$(document).on('change', '#entity_type', function() {
    if ($(this).val() == "Self-Employed/Sole Proprietor") {
        $("#ssn").prop('required', true);
        $("#ein").prop('required', false);
        $("#ssn_label").html('SSN <small class="red">*</small>');
        $("#ein_label").html('EIN/TIN');
    } else {
        $("#ssn").prop('required', false);
        $("#ein").prop('required', true);
        $("#ein_label").html('EIN/TIN <small class="red">*</small>');
        $("#ssn_label").html('SSN');
    }
});

$(document).on('click', '.removebtn', function() {
    $(this).closest(".row").remove();
});

$(document).on('click', '.removerow', function() {
    $(this).closest(".tablerow").remove();
});


$(document).on('click', '#viewFiltersbtn', function() {
    if ($('#viewFiltersbtn').html().includes("plus")) {

        $('.Create').show();
        $('#viewFiltersbtn').html('<i class="fa fa-minus"></i>');
    } else {
        $('.Create').hide();
        $('#viewFiltersbtn').html('<i class="fa fa-plus"></i>');

    }
});

$(document).on('keypress', '.quantity', function(e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 ) &&  e.which != 46 &&  e.which != 44) {
            //display error message
          
            return false;
        }
    });




    //called when key is pressed in textbox
$(document).on('keypress', '.quantity', function(e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (this.which < 48 || this.which > 57 ) &&  this.which != 46 && this.which != 44 ) {
            //display error message
          
            return false;
        }
        //alert("adfad");
       // if (e.which != 8 && e.which != 0 && (this.which < 48 || this.which > 57 ) 
    });
    
    
    
    
    
    
    
$(document).on('keypress', '.txtOnly', function(e) {
         
            if (e.which != 8 && e.which != 0 && (e.which <= 64 || e.which >= 123 )  &&  e.which != 32 ) {
   
          
            return false;
        }
});

$('.checkform').submit(function(e) {
    var sum = 0;
    var owner_perc = document.getElementsByClassName("ownership_percentage");
    for (var i = 0; i < owner_perc.length; i++) {
        sum = sum + parseInt(owner_perc[i].value);
    }
    //alert(sum);
    if (sum > 100) {
        e.preventDefault();
        swal("Error", "Ownership total can not be more than 100", "error");
    }
});

$(document).on('click', '.addrentdata', function() {
    var $ctrl = '<div class="row rentrow"><div class="col-lg-1 col-sm-12 col-md-1 col-xs-12"></div><div class="col-lg-3 col-sm-12 col-md-3 col-xs-12"><input type="text" name="rent_payee[]" placeholder="Company name " required class="form-control"></div><div class="col-lg-2 col-sm-12 col-md-3 col-xs-12"><div style="position:relative"><i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i> <input type="text" name="rent_amount[]" placeholder="Rent/lease amount" required class="form-control quantity quantitys"></div></div><div class="col-lg-3 col-sm-12 col-md-3 col-xs-12"><input type="month" min="2019-01" max="2020-12" name="rent_month[]" required class="form-control"></div><div class="col-lg-2 col-sm-12 col-md-2 col-xs-12"><input type="date" min="2020-01-01"  max="2020-12-31" name="rent_date[]" required class="form-control"></div><div class="col-lg-1 col-sm-12 col-md-1 col-xs-12"><button type="button" class="removebtn"><i style="color:red" class="fa fa-times"></i></button></div></div>';
    $("#rentwindow").append($ctrl);
});


$(document).on('click', '.maincontent', function() {
    var $ctrl = '<div class="row "><div class="row modelextraform"><div class="col-lg-10 col-sm-10 col-md-10 col-xs-10"><div class="row"><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="file" name="file[]"class="form-control" ></div><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><select name="type[]" class="form-control" id=""><option value="Incorporation Certificate">Incorporation Certificate</option><option value="EIN/TIN proof">EIN/TIN proof</option><option value="IRS Formation Document">IRS Formation Document</option><option value="State Formation Document">State Formation Document</option><option value="Other">Other</option></select> </div><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="text" name="description[]" placeholder="Description" class="form-control txtOnly"></div></div></div><div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 "><small><button type="button"  class="removebtn pull-left trashbtn" ><i style="color:red; " class="fa fa-times"></i></button></small></div></div>';
    $("#maincontent").append($ctrl);
});




$(document).on('click', '.loanuploadbtn', function() {
    var $ctrl = '<div class="row "><div class="row modelextraform"><div class="col-lg-10 col-sm-10 col-md-10 col-xs-10"><div class="row"><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="file" name="file[]"class="form-control" ></div><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><select name="type[]" class="form-control" id=""><option value="PPP Loan – Application">PPP Loan – Application</option><option value="PPP Loan  - Bank Note ">PPP Loan  - Bank Note </option><option value="PPP Loan - Bank Deposit Proof">PPP Loan - Bank Deposit Proof</option><option value="EIDL Loan - Application">EIDL Loan - Application</option><option value="EIDL Loan – Bank Note">EIDL Loan – Bank Note</option><option value="EIDL Loan - Bank Deposit Proof">EIDL Loan - Bank Deposit Proof</option><option value="EIDL Grant - Application">EIDL Grant - Application</option><option value="EIDL Grant – Bank Note">EIDL Grant – Bank Note</option><option value="EIDL Grant - Bank Deposit Proof">EIDL Grant - Bank Deposit Proof</option><option value="Bank Statement">Bank Statement</option><option value="Other">Other</option></select> </div>  <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="text" name="description[]" placeholder="Description" class="form-control txtOnly"></div></div></div><div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 "><small><button type="button"  class="removebtn pull-left trashbtn" ><i style="color:red; " class="fa fa-times"></i></button></small></div></div>';
    $("#maincontent").append($ctrl);
});



$(document).on('click', '.owneruploadbtn', function() {
    var $ctrl = '<div class="row "><div class="row modelextraform"><div class="col-lg-10 col-sm-10 col-md-10 col-xs-10"><div class="row"><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="file" name="file[]"class="form-control" ></div><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><select name="type[]" class="form-control" id=""><option value="Ownership Details">Ownership Details</option><option value="Owner Government Issue Photo ID">Owner Government Issue Photo ID</option><option value="Other">Other</option></select> </div>  <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="text" name="description[]" placeholder="Description" class="form-control txtOnly"></div></div></div><div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 "><small><button type="button"  class="removebtn pull-left trashbtn" ><i style="color:red; " class="fa fa-times"></i></button></small></div></div>';
    $("#maincontent").append($ctrl);
});





$(document).on('click', '.nonpayrolluploadbtn', function() {
    var $ctrl = '<div class="row "><div class="row modelextraform"><div class="col-lg-10 col-sm-10 col-md-10 col-xs-10"><div class="row"><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="file" name="file[]"class="form-control" ></div><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><select name="type[]" class="form-control" id=""><option value="Rent Bill/Invoice/Statement">Rent Bill/Invoice/Statement</option><option value="Mortgage Interest Bill/Invoice/Statement">Mortgage Interest Bill/Invoice/Statement </option><option value="Utilities Bill/Invoice/Statement">Utilities Bill/Invoice/Statement</option><option value="Proof of Payment / Cancelled Check – Rent">Proof of Payment / Cancelled Check – Rent</option><option value="Proof of Payment / Cancelled Check – Mortgage Interest">Proof of Payment / Cancelled Check – Mortgage Interest</option><option value="Proof of Payment / Cancelled Check – Utilities">Proof of Payment / Cancelled Check – Utilities</option><option value="Bank Statement">Bank Statement</option><option value="Other">Other</option></select> </div>   <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="text" name="description[]" placeholder="Description" class="form-control txtOnly"></div> </div></div><div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 "><small><button type="button"  class="removebtn pull-left trashbtn" ><i style="color:red; " class="fa fa-times"></i></button></small></div></div>';
    $("#maincontent").append($ctrl);
});









$(document).on('click', '.benefituploadbtn', function() {
    var $ctrl = '<div class="row "><div class="row modelextraform"><div class="col-lg-10 col-sm-10 col-md-10 col-xs-10"><div class="row"><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="file" name="file[]"class="form-control" ></div><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><select name="type[]" class="form-control" id=""><option value="Benefit – Health Insurance - Bill/Invoice/Statement">Benefit – Health Insurance - Bill/Invoice/Statement</option><option value="Benefit – Health Insurance – Proof of Payment/Cancelled Check">Benefit – Health Insurance – Proof of Payment/Cancelled Check</option><option value="Benefit – Retirement - Bill/Invoice/Statement">Benefit – Retirement - Bill/Invoice/Statement</option><option value="Benefit – Retirement – Proof of Payment/Cancelled Check">Benefit – Retirement – Proof of Payment/Cancelled Check</option><option value="Benefit – Other Benefit - Bill/Invoice/Statement">Benefit – Other Benefit - Bill/Invoice/Statement</option><option value="Benefit – Other Benefit  – Proof of Payment/Cancelled Check">Benefit – Other Benefit  – Proof of Payment/Cancelled Check</option><option value="Bank Statement">Bank Statement</option><option value="Other">Other</option></select> </div>  <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="text" name="description[]" placeholder="Description" class="form-control txtOnly"></div></div></div><div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 "><small><button type="button"  class="removebtn pull-left trashbtn" ><i style="color:red; " class="fa fa-times"></i></button></small></div></div>';
    $("#maincontent").append($ctrl);
});







$(document).on('click', '.taxtesuploadbtn', function() {
    var $ctrl = '<div class="row "><div class="row modelextraform"><div class="col-lg-10 col-sm-10 col-md-10 col-xs-10"><div class="row"><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="file" name="file[]"class="form-control" ></div><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><select name="type[]" class="form-control" id=""><option value="State or Local Tax - Bill/Invoice/Statement/Government Form">State or Local Tax - Bill/Invoice/Statement/Government Form</option><option value="State or Local Tax – Proof of Payment/Cancelled Check">State or Local Tax – Proof of Payment/Cancelled Check</option><option value="Bank Statement">Bank Statement</option><option value="Other">Other</option></select> </div>  <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="text" name="description[]" placeholder="Description" class="form-control txtOnly"></div></div></div><div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 "><small><button type="button"  class="removebtn pull-left trashbtn" ><i style="color:red; " class="fa fa-times"></i></button></small></div></div>';
    $("#maincontent").append($ctrl);
});




$(document).on('click', '.costuploadbtn', function() {
    var $ctrl = '<div class="row "><div class="row modelextraform"><div class="col-lg-10 col-sm-10 col-md-10 col-xs-10"><div class="row"><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="file" name="file[]"class="form-control" ></div><div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><select name="type[]" class="form-control" id=""><option value="SPayroll Report - 2020 Year-to-Date">Payroll Report - 2020 Year-to-Date </option><option value="Payroll Report - 2019 Year-to-Date">Payroll Report - 2019 Year-to-Date </option><option value="Full-Time Employee Explanation">Full-Time Employee Explanation</option><option value="Safe Harbor Proof Document">Safe Harbor Proof Document  </option><option value="Bank Statement">Bank Statement</option><option value="Other">Other</option></select> </div>  <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 "><input type="text" name="description[]" placeholder="Description" class="form-control txtOnly"></div></div></div><div class="col-lg-1 col-sm-1 col-md-1 col-xs-1 "><small><button type="button"  class="removebtn pull-left trashbtn" ><i style="color:red; " class="fa fa-times"></i></button></small></div></div>';
    $("#maincontent").append($ctrl);
});








$(document).on('click', '.ownerdata', function() {
    var $ctrl = '<div class="row "><div  class="col-lg-11 col-sm-11 col-md-11 col-xs-11"> <div class="row" ><div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"><h4 style="border-top:2px dashed #228bd2;margin-top:30px;padding-top:30px;" class="subheading"> New Owner</h4></div></div> <div class="row "><div class="col-lg-4 col-sm-4 col-md-4 col-xs-4"><small>First Name <small class="red">*</small></small><input type="text" id="first_name" name="first_name[]" placeholder="only characters allowed" required class="form-control"></div><div class="col-lg-4 col-sm-4 col-md-4 col-xs-4"><small>Middle Initial </small><input type="text" id="middle_initial" maxlength="1" name="middle_initial[]" pattern="[a-zA-Z]+" placeholder="only characters allowed" class="form-control middlename"></div><div class="col-lg-4 col-sm-4 col-md-4 col-xs-4"><small>Last Name <small class="red">*</small></small><input type="text" id="last_name" name="last_name[]" required  placeholder="only characters allowed" class="form-control"></div></div><div class="row "><div class="col-lg-6 col-sm-12 col-md-6 col-xs-12"><small> Title<small class="red">*</small></small><input type="text" id="title" name="title[]"  placeholder="Title " required class="form-control"></div><div class="col-lg-6 col-sm-12 col-md-6 col-xs-12"><small> Email <small class="red">*</small></small><input type="email" id="email" name="email[]"  placeholder="Owner Email " required class="form-control"></div></div><div class="row"><div class="col-lg-6 col-sm-12 col-md-6 col-xs-12"><small> % Ownership</small><input type="number" id="ownership_percentage" step="0.01" name="ownership_percentage[]"  placeholder=" Ownership Percentage" class="form-control ownership_percentage" required></div><div class="col-lg-6 col-sm-12 col-md-6 col-xs-12"><small> Owner 2019 Wages/Payroll <small class="red">*</small></small><div style="position:relative"><i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i><input type="text" id="owner2019_pay" name="owner2019_pay[]" step="0.01"  placeholder="Owner 2019 Wages/Payroll" class="form-control quantitys quantity" required></div></div></div><div class="row "><div class="col-lg-6 col-sm-12 col-md-6 col-xs-12"><small>Landline Business Phone <small class="red">*</small></small><input type="text" maxlength="12"  name="landline_phone[]"  placeholder=" Landline Business Phone  " required class="form-control phone"></div><div class="col-lg-6 col-sm-12 col-md-6 col-xs-12"><small>Landline Business Phone Extension </small><input type="text" id="landline_extension" maxlength="5" name="landline_extension[]"  placeholder=" Landline Business Phone Extension " class="form-control landline_extension"></div></div><div class="row "><div class="col-lg-6 col-sm-12 col-md-6 col-xs-12"><small>Cellular Phone (for txt messages) <small class="red">*</small></small><input type="text"  name="mobile_phone[]" maxlength="12"  placeholder=" Cellular Phone (for txt messages) " required class="form-control phone"></div><div class="col-lg-6 col-sm-12 col-md-6 col-xs-12"> <small>Cellular Phone Carrier  </small><select id="mobile_carrier" name="mobile_carrier[]"  placeholder="Cellular Phone  "  class="form-control"><option value="">Select</option><option value="AT&T">AT&T</option><option value="Verizon">Verizon</option><option value="Sprint">Sprint</option><option value="T-Mobile">T-Mobile</option><option value="Cricket">Cricket</option><option value="Other">Other</option></select></div></div></div><div style="padding:0px 1important;" class="col-lg-1 col-sm-1 col-md-1 col-xs-1"><small style="color:black"><button style="margin-top:60px;" type="button" class="removebtn"><i style="color:red" class="fa fa-times"></i></button></small></div></div>';


    var sum = 0;
    var owner_perc = document.getElementsByClassName("ownership_percentage");
    for (var i = 0; i < owner_perc.length; i++) {
        sum = sum + parseInt(owner_perc[i].value);
    }
    //alert(sum);
    if (sum >= 100) {
        swal("Error", "Ownership total can not be more than 100", "error");
    } else {
        $("#ownerwindow").append($ctrl);
    }

    $(".phone").inputmask("999-999-9999");

});







$(document).on('click', '.addmortgagedata', function() {
    var $ctrl = '<div class="row mortgagerow"> <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12"> </div><div class="col-lg-3 col-sm-12 col-md-3 col-xs-12"> <input type="text" name="mortgage_payee[]" placeholder="Company name " required class="form-control"> </div><div class="col-lg-2 col-sm-12 col-md-3 col-xs-12"><div style="position:relative"><i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i><input type="text" name="mortgage_amount[]"  step="0.01" placeholder="Mortgage interest amount" required class="form-control quantitys quantity"></div> </div><div class="col-lg-3 col-sm-12 col-md-3 col-xs-12"> <input type="month" min="2019-01" max="2020-12" name="mortgage_month[]" required class="form-control"> </div><div class="col-lg-2 col-sm-12 col-md-2 col-xs-12"> <input type="date" min="2020-01-01" max="2020-12-31" name="mortgage_date[]" required class="form-control"> </div><div style="padding:0px 1important;" class="col-lg-1 col-sm-12 col-md-1 col-xs-12"><button type="button" class="removebtn"><i style="color:red" class="fa fa-times"></i></button> </div></div>';
    $("#mortgagewindow").append($ctrl);
});


$(document).on('click', '.addutilitydata', function() {
    var $ctrl = '<div class="row utilityrow"> <div class="col-lg-1 col-sm-12 col-md-1 col-xs-12"> </div><div class="col-lg-2 col-sm-12 col-md-2 col-xs-12"> <input type="text" name="utility_payee[]" placeholder="Company name " required class="form-control"> </div><div class="col-lg-2 col-sm-12 col-md-3 col-xs-12"><div style="position:relative"><i style="position:absolute;left:4px;top:9px;" class="fa fa-dollar"></i>  <input type="text" name="utility_amount[]"  step="0.01" placeholder="Expenditure amount" required class="form-control quantitys quantity"></div> </div><div class="col-lg-2 col-sm-12 col-md-3 col-xs-12"> <select class="form-control"  name="utility_type[]" > <option value="" class="translatable">Type</option> <option value="Gas" class="translatable">Gas</option> <option value="Electric" class="translatable">Electric </option><option value="Water" class="translatable">Water </option><option value="Cable" class="translatable">Cable </option><option value="Other" class="translatable">Other</option> </select> </div><div class="col-lg-2 col-sm-12 col-md-3 col-xs-12"> <input style="min-width:160px;" type="month" min="2019-01" max="2020-12" name="utility_month[]" required class="form-control"> </div><div class="col-lg-2 col-sm-12 col-md-2 col-xs-12"> <input type="date" min="2020-01-01" max="2020-12-31" name="utility_date[]" required class="form-control"> </div><div style="padding:0px 1important;" class="col-lg-1 col-sm-12 col-md-1 col-xs-12"> <button type="button" class="removebtn"><i style="color:red" class="fa fa-times"></i></button></div></div>';
    $("#utilitywindow").append($ctrl);
});




$(document).on('click', '.addForgivnessRow', function() {
    var row = $('body').find(".copy_paste_row").html();
    var $ctrl = '<tr>'+row+'<td><button type="button" title="Remove row" style="border:none;background:none;" class="removerow"><i style="color:red; padding-top:8px" class="fa fa-times"></i></button></td></tr>';
    $("#apply_forgiveness").append($ctrl);
    
    $(".single_float").inputmask("9{1,4}.99");
    $(".four_digit").inputmask("9999");
    $(".million_float").inputmask("9{1,9}.99");
    
});


$(document).on('click', '#employee_type', function(e) {
     $(".employee_type_a").val($(this).val());
});



$(document).ready(function() {
    setTimeout(function() {
        $('.showtime').fadeOut('fast');
    }, 10000);
});

//side bar functions
function openNav() {

    document.getElementById("ho_sidebar").style.width = "50%";
    document.getElementById("main").style.marginLeft = "250px";


}

function closeNav() {

    document.getElementById("ho_sidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}






function checkUser(url, signal) {
    if (signal == "true") {
        window.location = url;
    } else {
        alert("You need to login/signup as customer to access this feature");
    }
}



$(document).ready(function() {
    $('#saveBtn2').click(function() {
        var radioValue1 = $("input[name='healthinsurancecosts1']:checked").val();
        $('#healthinsurancecosts').val(radioValue1);
        var radioValue2 = $("input[name='maximumcompensation1']:checked").val();
        $('#maximumcompensation').val(radioValue2)
        var radioValue3 = $("input[name='retirementplanscosts1']:checked").val();
        $('#retirementplanscosts').val(radioValue3)

    });
});