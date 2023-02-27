/*COMMON FUNCTION*/
function validateEmail(mail)   {  
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  {  
    	return true;
	} 
    return false;
}  
function validatePhone(mobile) {
  intRegex = /[0-9 -()+]+$/;
  var mobileLength = $("#mobile_number").attr('maxlength');
  if((mobile.length == parseInt(mobileLength)) && (intRegex.test(mobile))) {
  	return true;
  }
  return false;
}

function fieldvalidation() {
	$('input').bind("keyup change", function()  { 
		var text = $(this).val();
		if(text != "") { 
			if($(this).attr('type') =="email") {
				if(validateEmail(text) == true) {
					$(this).siblings( ".label-danger" ).remove();
				} else {
					$(this).siblings( ".label-danger" ).remove();
				}
			} else if($(this).attr('data-type') =="phone") {
				if(validatePhone(text) == true) {
					$(this).siblings( ".label-danger" ).remove();
				} else {
					$(this).siblings( ".label-danger" ).remove();
				}
			} else {
				$(this).siblings( ".label-danger" ).remove();				
			}
		} else {
			$(this).siblings( ".label-danger" ).remove();
		}
	});
	$('.selectpicker[data-valid=required]').change(function() {		
		$(this).siblings( ".label-danger" ).remove();
	});
	$('textarea').bind("keyup change", function()  {		
		$(this).siblings( ".label-danger" ).remove();
	});
}
/* vendors query */
var VendorQuery = {
	Self:{},
	SendEnquiry:{},
	sendRequest:{},
	EnquiryPopUp:{},
}
VendorQuery.Self.init = function() {
VendorQuery.Self.eventHandlers()
}.bind(VendorQuery.Self);
VendorQuery.Self.eventHandlers = function() {	
}.bind(VendorQuery.Self); 
VendorQuery.Self.submit = function(event) {   
	
	fieldvalidation();	
	event.preventDefault();
	var validateSuccess = true        
	var full_name = $('#full_name').val().trim();
	var email_id = $('#email_id').val().trim();	
	var mobile_number = $('#mobile_number').val().trim();
	var locations = $('#locations').val().trim();	
	var service_type = $('#service_type').val().trim();	
	var comment = $('#comment').val().trim();	
	var page_source = $('#page_source').val().trim();	
	
	$('#queryform input[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}
	}); 	
    $('#queryform .selectpicker[data-valid=required]').each(function() {		
        var el = $(this)
		if(el.val() == "") {
			validateSuccess = false;			
			$(this).siblings( ".label-danger" ).remove();
			 $(this).siblings( ".nice-select" ).after('<p class="label label-danger">Please select '+$(this).attr('selectname')+'</p>');
			
		}
	});	
	$('#queryform textarea[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter '+$(this).attr('placeholder')+'</p>'); 
		}
	});	
	if(full_name =="" ) { 
	    validateSuccess = false;
		$('#full_name').siblings( ".label-danger" ).remove();
		$('#full_name').after('<p class="label label-danger">Please enter your full name</p>');		
	} else if(full_name !="" && full_name.length < 3) {	    
		validateSuccess = false;
		$('#full_name').siblings( ".label-danger" ).remove();
		$('#full_name').after('<p class="label label-danger">Full Name should be minimum 3 digit</p>');			
	}else{}	
	if(email_id != "") {
		if(validateEmail(email_id) == false) {
			validateSuccess = false;
			$('#email_id').siblings( ".label-danger" ).remove();
		    $('#email_id').after('<p class="label label-danger">Email ID is not in proper format</p>');			
		} 
	}
	if(mobile_number !="") {
		if(validatePhone(mobile_number) == false) {
			validateSuccess = false;
			$('#mobile_number').siblings( ".label-danger" ).remove();
		    $('#mobile_number').after('<p class="label label-danger">Enter Valid Mobile No.</p>');
		}
	}	
	if(validateSuccess == true) {	
		 $("#submit_query").text("");	 
		 $("#submit_query").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
		 $.ajax({
            type: "POST",
            url: "/vendors/venders_query",
            data: {full_name:full_name,email_id:email_id,mobile_number:mobile_number,locations:locations,service_type:service_type,comment:comment,lead_type:'home-page',page_source:page_source},
            dataType: "JSON",
            success: function(data) {			
			if(data.status!=null && data.status!='' && data.status=='success'){
			 $("#submit_query").text("Send");
			 $("#submit_query").attr("disabled", true);
			 $("#queryform").hide();
			 $("#quote_form-otp").show();
			 if(data.otp_id!=null && data.otp_id!=''){
			 $('#otp_id').val(data.otp_id);	
			 }else{
			 $('#submit_query').after('<p class="alert alert-success">Your Query successfully sent...</p>');	
			 }
			}else{			
				if(data.full_name!=null && data.full_name!=''){
				  $('#full_name').siblings( ".label-danger" ).remove();
				  $('#full_name').after(data.full_name);				 
				}else{
				 $('#full_name').siblings( ".label-danger" ).remove();
				}
				if(data.mobile_number!=null && data.mobile_number!=''){
				  $('#mobile_number').siblings( ".label-danger" ).remove();
				  $('#mobile_number').after(data.mobile_number);	
				}else{
				 $('#mobile_number').siblings( ".label-danger" ).remove();
				}
				if(data.email_id!=null && data.email_id!=''){
				  $('#email_id').siblings( ".label-danger" ).remove();
				  $('#email_id').after(data.email_id);	
				}else{
				 $('#email_id').siblings( ".label-danger" ).remove();
				}
				if(data.locations!=null && data.locations!=''){
				  $('#locations').siblings( ".label-danger" ).remove();
				  $('#locations').siblings( ".nice-select" ).after(data.locations);	
				}else{
				 $('#locations').siblings( ".label-danger" ).remove();
				}
				if(data.service_type!=null && data.service_type!=''){
				  $('#service_type').siblings( ".label-danger" ).remove();
				  $('#service_type').siblings( ".nice-select" ).after(data.service_type);
				}else{
				 $('#service_type').siblings( ".label-danger" ).remove();
				}
				if(data.comment!=null && data.comment!=''){
				  $('#comment').siblings( ".label-danger" ).remove();
				  $('#comment').after(data.comment);
				}else{
				 $('#comment').siblings( ".label-danger" ).remove();
				}
				}
            },
            error: function(err) {
			$("#submit_query").text("Send");		 
            console.log(err);
            }
        });
 
}	 
	
}.bind(VendorQuery.Self);
VendorQuery.SendEnquiry = function(event) {
	fieldvalidation();	
	event.preventDefault();
	var validateSuccess = true        
	var full_name = $('#full_name').val().trim();
	var email_id = $('#email_id').val().trim();	
	var mobile_number = $('#mobile_number').val().trim();
	var vendor_id = $('#vendor_id').val().trim();	
	var page_source = $('#page_source').val().trim();	
	$('#send-enquiry :input[data-valid=required]').each(function() {
		var el = $(this);		
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}
	});    	 
	if(full_name =="" ) { 
	    validateSuccess = false;
		$('#full_name').siblings( ".label-danger" ).remove();
		$('#full_name').after('<p class="label label-danger">Please enter your full name</p>');		
	} else if(full_name !="" && full_name.length < 3) {	    
		validateSuccess = false;
		$('#full_name').siblings( ".label-danger" ).remove();
		$('#full_name').after('<p class="label label-danger">Full Name should be minimum 3 digit</p>');			
	}else{}	
	
	if(email_id != "") {
		if(validateEmail(email_id) == false) {
			validateSuccess = false;
			$('#email_id').siblings( ".label-danger" ).remove();
		    $('#email_id').after('<p class="label label-danger">Email ID is not in proper format</p>');			
		} 
	}
	if(mobile_number !="") {
		if(validatePhone(mobile_number) == false) {
			validateSuccess = false;
			$('#mobile_number').siblings( ".label-danger" ).remove();
		    $('#mobile_number').after('<p class="label label-danger">Enter Valid Mobile No.</p>');
		}
	} 	
	if(validateSuccess == true) {     
		 $("#SendEnquiry").text("");	 
		 $("#SendEnquiry").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
		 $.ajax({
            type: "POST",
            url: "/vendors/send-enquiry",
            data: {full_name:full_name,email_id:email_id,mobile_number:mobile_number,vendor_id:vendor_id,lead_type:'enquiry',page_source:page_source},
            dataType: "JSON",
            success: function(data) {	
			if(data.status!=null && data.status!='' && data.status=='success'){
			 $("#SendEnquiry").text("Send");			 
			 $('#send-enquiry').hide();
             $('#quote_form-otp').show();
             $('#otp_id').val(data.otp_id);
			 
			}else{
			    $("#SendEnquiry").text("Send");
				if(data.full_name!=null && data.full_name!=''){
				  $('#full_name').siblings( ".label-danger" ).remove();
				  $('#full_name').after(data.full_name);				 
				}else{
				 $('#full_name').siblings( ".label-danger" ).remove();
				}
				if(data.mobile_number!=null && data.mobile_number!=''){
				  $('#mobile_number').siblings( ".label-danger" ).remove();
				  $('#mobile_number').after(data.mobile_number);	
				}else{
				 $('#mobile_number').siblings( ".label-danger" ).remove();
				}
				if(data.email_id!=null && data.email_id!=''){
				  $('#email_id').siblings( ".label-danger" ).remove();
				  $('#email_id').after(data.email_id);	
				}else{
				 $('#email_id').siblings( ".label-danger" ).remove();
				}				
			}
            },
            error: function(err) {
			$("#SendEnquiry").text("Send");		 
            console.log(err);
            }
        });
 
}	 
	
}.bind(VendorQuery.SendEnquiry);
VendorQuery.sendRequest = function(event) {   
	
	fieldvalidation();	
	event.preventDefault();
	var validateSuccess = true        
	var full_name = $('#en_name').val().trim();
	var email_id = $('#en_email').val().trim();	
	var mobile_number = $('#en_mobile').val().trim();
	var vendor_id = $('#vendorid').val().trim();	
	var page_source = $('#pagesource').val().trim();	
	var comment = $('#comment').val();
	if(comment!=''){
	  user_comment = comment;	 	  
	}else{
	 user_comment = null;
	}	
	$('#sendRequest :input[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}
	});    	 
	if(full_name =="" ) { 
	    validateSuccess = false;
		$('#en_name').siblings( ".label-danger" ).remove();
		$('#en_name').after('<p class="label label-danger">Please enter your full name</p>');		
	} else if(full_name !="" && full_name.length < 3) {	    
		validateSuccess = false;
		$('#en_name').siblings( ".label-danger" ).remove();
		$('#en_name').after('<p class="label label-danger">Full Name should be minimum 3 digit</p>');			
	}else{}	
	
	if(email_id != "") {
		if(validateEmail(email_id) == false) {
			validateSuccess = false;
			$('#en_email').siblings( ".label-danger" ).remove();
		    $('#en_email').after('<p class="label label-danger">Email ID is not in proper format</p>');			
		} 
	}
	if(mobile_number !="") {
		if(validatePhone(mobile_number) == false) {
			validateSuccess = false;
			$('#en_mobile').siblings( ".label-danger" ).remove();
		    $('#en_mobile').after('<p class="label label-danger">Enter Valid Mobile No.</p>');
		}
	}	 
	if(validateSuccess == true) {     
		 $("#SendRequest").text("");	 
		 $("#SendRequest").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
		 $.ajax({
            type: "POST",
            url: "/vendors/send-enquiry",
            data: {full_name:full_name,email_id:email_id,mobile_number:mobile_number,vendor_id:vendor_id,comment:user_comment,lead_type:'enquiry',page_source:page_source},
            dataType: "JSON",
            success: function(data) {			
			if(data.status!=null && data.status!='' && data.status=='success'){
			 $("#SendRequest").text("Submit");
			 $("#SendRequest").attr("disabled", true);
			 $("#sendRequest").hide();
			 $(".quote_form-otp").remove();
			 $("#quote_form-otp").show();
			 if(data.otp_id!=null && data.otp_id!=''){
			 $('#otp_id').val(data.otp_id);	
			 }else{
			 $('#SendRequest').after('<p class="alert alert-success">Your Query successfully sent...</p>');	
			 }			
			}else{
			    $("#SendRequest").text("Submit");
				if(data.full_name!=null && data.full_name!=''){
				  $('#en_name').siblings( ".label-danger" ).remove();
				  $('#en_name').after(data.full_name);				 
				}else{
				 $('#en_name').siblings( ".label-danger" ).remove();
				}
				if(data.mobile_number!=null && data.mobile_number!=''){
				  $('#en_mobile').siblings( ".label-danger" ).remove();
				  $('#en_mobile').after(data.mobile_number);	
				}else{
				 $('#en_mobile').siblings( ".label-danger" ).remove();
				}
				if(data.email_id!=null && data.email_id!=''){
				  $('#en_email').siblings( ".label-danger" ).remove();
				  $('#en_email').after(data.email_id);	
				}else{
				 $('#en_email').siblings( ".label-danger" ).remove();
				}				
			}
            },
            error: function(err) {
			$("#SendRequest").text("Submit");		 
            console.log(err);
            }
        });
 
}	 
	
}.bind(VendorQuery.sendRequest);
VendorQuery.EnquiryPopUp = function(id,source,vname) { 	
	var vendor_id = id;
	var page_source = source;	
	$('#page_source').val(page_source);
	$('#vendor_id').val(vendor_id);		
	var vname = vname;
	$('#quote-text').html('Share Your Details With <p>'+vname+'</p>');
	$('#quote_form_otp').hide();	
	$('#quote_form-sent').hide();	
	$('#send-enquiry').show();
	var mot = $.cookie("mot");
	var full_name = $.cookie("fname");
	var mobile_number = $.cookie("mnumber");
	var email_id = $.cookie("email");	
	if(mot=='1'){
	 $('#send-enquiry').hide();
	 $(".main-form").append('<div class="lds-ellipsis query-from-loader"><div></div><div></div><div></div><div></div></div>');
	  $.ajax({
            type: "POST",
            url: "/vendors/send-enquiry",
            data: {full_name:full_name,email_id:email_id,mobile_number:mobile_number,vendor_id:vendor_id,lead_type:'enquiry',page_source:page_source,mot:mot},
            dataType: "JSON",
            success: function(data) {	
			if(data.status!=null && data.status!='' && data.status=='success'){
			if(page_source=='vendor-details'){
			  viewVendorDetails(vendor_id);
			}else{
			$(".lds-ellipsis").remove();
			$('#quote_form-otp').after("<div id=\"quote_form-sent\"><div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 \"><img src=\"/assets/images/sent.gif\"><h3>Your Query has been sent successfully.</h3></div></div>"); 
			}
			}else{
			$('#send-enquiry').text("");
			$('#send-enquiry').show();
			}
            },
            error: function(err) {
			$('#send-enquiry').text("");
			$('#send-enquiry').show();
            console.log(err);
            }
        });
	}	
}.bind(VendorQuery.EnquiryPopUp);
/* Vendor signup*/
var VendorSignUP = {
	Self:{},	
	
}
VendorSignUP.Self.init = function() {
VendorSignUP.Self.eventHandlers()
}.bind(VendorSignUP.Self);
VendorSignUP.Self.eventHandlers = function() {	
}.bind(VendorSignUP.Self); 
VendorSignUP.Self.submit = function(event) {    
    fieldvalidation();	
	event.preventDefault();
	var validateSuccess = true        
	var brand_name = $('#brand_name').val().trim();
	var email_id = $('#email_id').val().trim();	
	var mobile_number = $('#mobile_number').val().trim();
	var locations = $('#locations').val().trim();	
	var service_type = $('#service_type').val().trim();	
	var vendor_password = $('#vendor_password').val().trim();	
	
	$('input[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}
	}); 
    $('.selectpicker[data-valid=required]').each(function() {		
        var el = $(this)
		if(el.val() == "") {
			validateSuccess = false;			
			$(this).siblings( ".label-danger" ).remove();
			 $(this).siblings( ".nice-select" ).after('<p class="label label-danger">Please select '+$(this).attr('selectname')+'</p>');
			
		}
	});
	$('textarea[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter '+$(this).attr('placeholder')+'</p>'); 
		}
	});	
	if(brand_name =="" ) { 
	    validateSuccess = false;
		$('#brand_name').siblings( ".label-danger" ).remove();
		$('#brand_name').after('<p class="label label-danger">Please enter your brand name</p>');		
	} else if(brand_name !="" && brand_name.length < 3) {	    
		validateSuccess = false;
		$('#brand_name').siblings( ".label-danger" ).remove();
		$('#brand_name').after('<p class="label label-danger">Brand Name should be minimum 3 digit</p>');			
	}else{}	
	if(email_id != "") {
		if(validateEmail(email_id) == false) {
			validateSuccess = false;
			$('#email_id').siblings( ".label-danger" ).remove();
		    $('#email_id').after('<p class="label label-danger">Email ID is not in proper format</p>');			
		} 
	}
	if(mobile_number !="") {
		if(validatePhone(mobile_number) == false) {
			validateSuccess = false;
			$('#mobile_number').siblings( ".label-danger" ).remove();
		    $('#mobile_number').after('<p class="label label-danger">Enter Valid Mobile No.</p>');
		}
	}
	if(vendor_password.length < 8) {
			validateSuccess = false;
			$('#vendor_password').siblings( ".label-danger" ).remove();
		    $('#vendor_password').after('<p class="label label-danger">Password should be minimum 8 digit</p>');			
	}
	if(validateSuccess == true) {         
		 $("#singupnext").text("");	 
		 $("#singupnext").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
		 $.ajax({
            type: "POST",
            url: "/vendors/process_registration",
            data: {brand_name:brand_name,email_id:email_id,mobile_number:mobile_number,locations:locations,service_type:service_type,vendor_password:vendor_password,page_source:'vendor-registration'},
            dataType: "JSON",
            success: function(data) {			
			if(data.status!=null && data.status!='' && data.status=='success'){
			 	window.location = "/vendors/personal-details";
			}else{
			   $("#singupnext").text("");
			   $("#singupnext").text("Next");
				if(data.brand_name!=null && data.brand_name!=''){
				  $('#brand_name').siblings( ".label-danger" ).remove();
				  $('#brand_name').after(data.full_name);				 
				}else{
				 $('#brand_name').siblings( ".label-danger" ).remove();
				}
				if(data.mobile_number!=null && data.mobile_number!=''){
				  $('#mobile_number').siblings( ".label-danger" ).remove();
				  $('#mobile_number').after(data.mobile_number);	
				}else{
				 $('#mobile_number').siblings( ".label-danger" ).remove();
				}
				if(data.email_id!=null && data.email_id!=''){
				  $('#email_id').siblings( ".label-danger" ).remove();
				  $('#email_id').after(data.email_id);	
				}else{
				 $('#email_id').siblings( ".label-danger" ).remove();
				}
				if(data.locations!=null && data.locations!=''){
				  $('#locations').siblings( ".label-danger" ).remove();
				  $('#locations').siblings( ".nice-select" ).after(data.locations);	
				}else{
				 $('#locations').siblings( ".label-danger" ).remove();
				}
				if(data.service_type!=null && data.service_type!=''){
				  $('#service_type').siblings( ".label-danger" ).remove();
				  $('#service_type').siblings( ".nice-select" ).after(data.service_type);
				}else{
				 $('#service_type').siblings( ".label-danger" ).remove();
				}
				if(data.vendor_password!=null && data.vendor_password!=''){
				  $('#vendor_password').siblings( ".label-danger" ).remove();
				  $('#vendor_password').after(data.vendor_password);
				}else{
				 $('#vendor_password').siblings( ".label-danger" ).remove();
				}
				}
            },
            error: function(err) {
			$("#singupnext").text(" Next");		 
            console.log(err);
            }
        });
 
}	 
	
}.bind(VendorQuery.Self);
function next_fieldset(){
	var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
 if(animating) return false;
  animating = true;
  
  current_fs = $("#next").parent();
  next_fs = $("#next").parent().next(); 
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
}
/* vender details */
function viewVendorDetails(id){
	console.log(id);
	if(id !=''){
	$.ajax({
            type: "POST",
            url: "/Vendor-details/vdetails",
            data: {id:id},
            dataType: "JSON",
            success: function(data) {			
			if(data.status!=null && data.status!='' && data.status=='success'){
			 	console.log(data);
				$(".lds-ellipsis").remove();
			    $('#quote_form-otp').after('<div id=\"quote_form-sent\"><h3>Call Directly to this vendor</h3><h3><b><i class="fa fa-phone-volume"></i> +91-'+data.mobile_number+'</b></h3></div>');
			}else{
			   if(data.status=='fail' && data.message != ""){
					if(data.message!=null && data.message!=''){
					  $(".lds-ellipsis").remove();
					  $('#quote_form-otp').after('<div id=\"quote_form-sent\"><h3>'+data.message+'</h3></div>');
					}
				}
			  }
            },
             error: function(err) {				 
             console.log(err);
            }
        });
	}
}

VendorSignUP.Self.Details= function() {
	fieldvalidation();	
	event.preventDefault();
	var validateSuccess = true        
	var vfirstname = $('#vfirstname').val().trim();
	var vlastname = $('#vlastname').val().trim();	
	var vdescribe = $('#vdescribe').val().trim();
	var vaddress = $('#vaddress').val().trim();	
	var vpincode = $('#vpincode').val().trim();	
	var industry_exp = $('#industry_exp').val().trim();	
	var website_link = $('#website_link').val().trim();	
	var facebook_page = $('#facebook_page').val().trim();	
	var instagram_page = $('#instagram_page').val().trim();	
	var youtube_link = $('#youtube_link').val().trim();	
	var vendor_area = $('#vendor_area').val();
	$('input[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}
	}); 
    $('.selectpicker[data-valid=required]').each(function() {		
        var el = $(this)
		if(el.val() == "") {
			validateSuccess = false;			
			$(this).siblings( ".label-danger" ).remove();
			 $(this).siblings( ".nice-select" ).after('<p class="label label-danger">Please select '+$(this).attr('selectname')+'</p>');
			
		}
	});
	$('textarea[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter '+$(this).attr('placeholder')+'</p>'); 
		}
	});	
	if(vfirstname =="" ) { 
	    validateSuccess = false;
		$('#vfirstname').siblings( ".label-danger" ).remove();
		$('#vfirstname').after('<p class="label label-danger">Please enter your First name</p>');		
	} else if(vfirstname !="" && vfirstname.length < 3) {	    
		validateSuccess = false;
		$('#vfirstname').siblings( ".label-danger" ).remove();
		$('#vfirstname').after('<p class="label label-danger">First Name should be minimum 3 digit</p>');			
	}else{}	
	if(vpincode.length < 6) {
			validateSuccess = false;
			$('#vpincode').siblings( ".label-danger" ).remove();
		    $('#vpincode').after('<p class="label label-danger">Pin Code should be minimum 6 digit</p>');			
	} 	
	if(validateSuccess == true) {
	     $("#submit_details").text("");	 
		 $("#submit_details").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
		 $.ajax({  
            type: "POST",
            url: "/vendors/process-vdetails",
            data: {vfirstname:vfirstname,vlastname:vlastname,vdescribe:vdescribe,vaddress:vaddress,vpincode:vpincode,vendor_area:vendor_area,industry_exp:industry_exp,website_link:website_link,facebook_page:facebook_page,instagram_page:instagram_page,youtube_link:youtube_link},
            dataType: "JSON",
            success: function(data) {			
			if(data.status!=null && data.status!='' && data.status=='success'){
			 	window.location = "/image/vendor-image";
			}else{
				$("#submit_details").text("");
				$("#submit_details").text("Next");			
				if(data.vfirstname!=null && data.vfirstname!=''){
				  $('#vfirstname').siblings( ".label-danger" ).remove();
				  $('#vfirstname').after(data.vfirstname);				 
				}else{
				 $('#vfirstname').siblings( ".label-danger" ).remove();
				}
				if(data.vlastname!=null && data.vlastname!=''){
				  $('#vlastname').siblings( ".label-danger" ).remove();
				  $('#vlastname').after(data.vlastname);	
				}else{
				 $('#vlastname').siblings( ".label-danger" ).remove();
				}
				if(data.vdescribe!=null && data.vdescribe!=''){
				  $('#vdescribe').siblings( ".label-danger" ).remove();
				  $('#vdescribe').after(data.vdescribe);	
				}else{
				 $('#vdescribe').siblings( ".label-danger" ).remove();
				}
				if(data.vaddress!=null && data.vaddress!=''){
				  $('#vaddress').siblings( ".label-danger" ).remove();
				  $('#vaddress').after(data.vaddress);		
				}else{
				 $('#vaddress').siblings( ".label-danger" ).remove();
				}
				if(data.vpincode!=null && data.vpincode!=''){
				  $('#vpincode').siblings( ".label-danger" ).remove();
				  $('#vpincode').siblings( ".nice-select" ).after(data.vpincode);
				}else{
				 $('#vpincode').siblings( ".label-danger" ).remove();
				}
				if(data.industry_exp!=null && data.industry_exp!=''){
				  $('#industry_exp').siblings( ".label-danger" ).remove();
				   $('#industry_exp').siblings( ".nice-select" ).after(data.industry_exp);	
				}else{
				 $('#industry_exp').siblings( ".label-danger" ).remove();
				}
				}
            },
            error: function(err) {
			$("#submit_details").text("Next");		 
            console.log(err);
            }
        });
 
}
}.bind(VendorSignUP.Details);
/*HOME*/
var Home = {
	login:{},
	ForgotPassword:{},	
	ResetPassword:{},	
	UpdateForgotPassword:{},	
}
Home.init = function() {
}.bind(Home)
// Home.Search = function(event) {    
// 	var validateSuccess = true;
// 	var vlocation = $('#location').val().trim();
// 	var vcategory = $('#category').val().trim();
// 	if(vlocation=='' && vcategory==''){
// 	  window.location = '/vendor-listing/all';
// 	}else if(vlocation!='' && vcategory==''){
// 	  window.location = '/vendor-listing/all/vendors-in-'+vlocation+'';
// 	}else if(vlocation=='' && vcategory!=''){
// 	  window.location = '/vendor-listing/all/'+vcategory+'';
// 	}else if(vlocation!='' && vcategory!=''){
// 	  window.location = '/vendor-listing/all/'+vcategory+'-in-'+vlocation+'';
// 	}else{
//     	window.location = '/vendor-listing/all';
// 	}	
// }.bind(Home)
// $(document).ready(function(){	
// 	 $("input:radio[name='category']").add("input:checkbox[name='location']").click(function () {    
// 		var vcategory = $("input[name='category']:checked").val();
// 		var vlocation = [];
// 		$("input[name='location']:checked").each(function () {        
// 		  vlocation.push($(this).val());
// 		});		
// 		if(vlocation.length==0 && (vcategory=='' || vcategory==undefined)){
// 		  window.location = '/vendor-listing/all';
// 		}else if(vlocation.length !=0 && (vcategory=='' || vcategory==undefined)){
// 		  window.location = '/vendor-listing/all/vendors-in-'+vlocation.join('-')+'';
// 		}else if(vlocation.length==0 && vcategory!=''){
// 		  window.location = '/vendor-listing/all/'+vcategory+'';
// 		}else if(vlocation.length !=0 && vcategory!=''){
// 		  window.location = '/vendor-listing/all/'+vcategory+'-in-'+vlocation.join('-')+'';
// 		}else{
// 			window.location = '/vendor-listing/all';
// 		}	   
//      });	 
//     });
// /* Vendor Login*/
// var VendorLogin = {
// 	Self:{},	
	
// }
VendorLogin.Self = function (event) {
	var validateSuccess = true;
    fieldvalidation();	
	event.preventDefault();
	var username = $('#username').val().trim();
	var passwordlogin = $('#passwordlogin').val().trim();
	$('#login :input[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") {
			validateSuccess = false;
			$(this).siblings( ".label-danger" ).remove();
			$(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}
	});
	if(passwordlogin.length!="" && passwordlogin.length < 8) {
			validateSuccess = false;
			$('#passwordlogin').siblings( ".label-danger" ).remove();
		    $('#passwordlogin').after('<p class="label label-danger">Password should be minimum 8 digit</p>');			
	} 
	if(validateSuccess == true) {         
		 $("#loginbutton").text("");	 
		 $("#loginbutton").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
		 $.ajax({
            type: "POST",
            url: "/login/validate_vendor_login",
            data: {username:username,password:passwordlogin},
            dataType: "JSON",
            success: function(data) {	 		
			if(data.status!=null && data.status!='' && data.status=='success'){
			 	window.location = "/vendors/dashboard/";
			}else{
			     $("#loginbutton").text("LOGIN");
				if(data.username!=null && data.username!=''){
				  $('#username').siblings( ".label-danger" ).remove();
				  $('#username').after(data.username);				 
				}else{
				 $('#username').siblings( ".label-danger" ).remove();
				}
				if(data.passwordlogin!=null && data.passwordlogin!=''){
				  $('#passwordlogin').siblings( ".label-danger" ).remove();
				  $('#passwordlogin').after(data.passwordlogin);	
				}else{
				 $('#passwordlogin').siblings( ".label-danger" ).remove();
				}
				if(data.status=='fail' && data.message != ""){
					if(data.message!=null && data.message!=''){
					  $('#passwordlogin').siblings( ".label-danger" ).remove();
					  $('#passwordlogin').after('<p class="label label-danger">'+data.message+'</p>');	
					}else{
					 $('#passwordlogin').siblings( ".label-danger" ).remove();
					}
				}
			  }
            },
            error: function(err) {
			 $("#loginbutton").text("LOGIN");		 
             console.log(err);
            }
        });
 
}
}.bind(VendorLogin);
/* Forgot Password*/
Home.ResetPassword = function(event) {
	var email_id = $('#forgot_password').val().trim();
	event.preventDefault()
	var validateSuccess = true;
	 fieldvalidation();	
	$('#forgot-password :input[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") {			
			validateSuccess = false;
			$(this).siblings( ".label-danger" ).remove();
			$(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}else{
			$(this).siblings( ".label-danger" ).remove();			
		}
	});
	if(email_id != "") {
		if(validateEmail(email_id) == false) {
			validateSuccess = false;
			$('#forgot_password').siblings( ".label-danger" ).remove();
		    $('#forgot_password').after('<p class="label label-danger">Email ID is not in proper format</p>');			
		} 
	} 
		if(validateSuccess == true) {         
		 $("#forgotpassword").text("");	 
		 $("#forgotpassword").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
		 $.ajax({
            type: "POST",
            url: "/login/forgot-password",
            data: {forgot_email:email_id},
            dataType: "JSON",
            success: function(data) {	 		
			if(data.status!=null && data.status!='' && data.status=='success'){
				 $("#forgotpassword").text("SUBMIT");
				 $("#forgotpassword").attr("disabled", true);
				 $('#forgotpassword').after('<p class="alert alert-success">'+data.password_message+'</p>');				
			}else{
			     $("#forgotpassword").text("SUBMIT");
				if(data.forgot_email!=null && data.forgot_email!=''){
				  $('#forgot_password').siblings( ".label-danger" ).remove();
				  $('#forgot_password').after(data.forgot_email);				 
				}else{
				 $('#forgot_password').siblings( ".label-danger" ).remove();
				}
				if(data.status=='fail' && data.message != ""){
					if(data.message!=null && data.message!=''){
					  $('#forgot_password').siblings( ".label-danger" ).remove();
					  $('#forgot_password').after('<p class="label label-danger">'+data.message+'</p>');	
					}else{
					 $('#forgot_password').siblings( ".label-danger" ).remove();
					}
				}
			  }
            },
            error: function(err) {
			 $("#loginbutton").text("LOGIN");		 
             console.log(err);
            }
        });
 
}
}.bind(Home);
Home.UpdateForgotPassword = function(event) {	
	var newpassword = $('#newpassword').val().trim();
	var retypepassword = $('#retypepassword').val().trim();
	var vendor_master_id = $('#vendor_master_id').val().trim();
	event.preventDefault()
	var validateSuccess = true;
	  fieldvalidation();	
	$('#ForgotPassword :input[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") {			
			validateSuccess = false;
			$(this).siblings( ".label-danger" ).remove();
			$(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}else{
			$(this).siblings( ".label-danger" ).remove();			
		}
	});
	if(newpassword != "" && newpassword.length<8) {		
		validateSuccess = false;
		$('#newpassword').siblings( ".label-danger" ).remove();
		$('#newpassword').after('<p class="label label-danger">Password should be minimum 8 digit</p>');		
	}
	if(retypepassword != "" && retypepassword.length<8) {		
		validateSuccess = false;
		$('#retypepassword').siblings( ".label-danger" ).remove();
		$('#retypepassword').after('<p class="label label-danger">Password should be minimum 8 digit</p>');		
	}
	if((retypepassword !="" && newpassword!="") && retypepassword!=newpassword) {	 validateSuccess = false;
		$('#retypepassword').siblings( ".label-danger" ).remove();
		$('#retypepassword').after('<p class="label label-danger">Retype Password is not Match with Current Password</p>');		
	} 
	if(validateSuccess == true) {         
		 $("#ForgotPasswords").text("");	 
		 $("#ForgotPasswords").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
		 $.ajax({
            type: "POST",
            url: "/login/process-forgot-password",
            data: {newpassword:newpassword,retypepassword:retypepassword,vendor_master_id:vendor_master_id},
            dataType: "JSON",
            success: function(data) {	 		
			if(data.status!=null && data.status!='' && data.status=='success'){
				 $("#ForgotPasswords").text("SUBMIT");
				 $("#ForgotPasswords").attr("disabled", true);
				 $('#ForgotPasswords').after('<p class="alert alert-success">'+data.message+'</p>');				
			}else{
			     $("#ForgotPasswords").text("SUBMIT");
				if(data.newpassword!=null && data.newpassword!=''){
				  $('#newpassword').siblings( ".label-danger" ).remove();
				  $('#newpassword').after(data.newpassword);				 
				}else{
				 $('#newpassword').siblings( ".label-danger" ).remove();
				}
				if(data.retypepassword!=null && data.retypepassword!=''){
				  $('#retypepassword').siblings( ".label-danger" ).remove();
				  $('#retypepassword').after(data.retypepassword);				 
				}else{
				 $('#retypepassword').siblings( ".label-danger" ).remove();
				}
				if(data.status=='fail' && data.message != ""){
					if(data.message!=null && data.message!=''){
					  $('#retypepassword').siblings( ".label-danger" ).remove();
					  $('#retypepassword').after('<p class="label label-danger">'+data.message+'</p>');	
					}else{
					 $('#retypepassword').siblings( ".label-danger" ).remove();
					}
				}
			  }
            },
            error: function(err) {
			 $("#loginbutton").text("LOGIN");		 
             console.log(err);
            }
        });
 
}
}.bind(Home);
Home.BackToLogin = function(event) {	
	$("#vendor-reset-password").hide();
	$("#vendor-login").show();
}.bind(Home);
Home.ForgotPassword = function(event) {	
	$("#vendor-reset-password").show();
	$("#vendor-login").hide();
}.bind(Home);
/* Contact US*/
var ContactUS = {
	QueryForm:{},	
}
ContactUS.QueryForm = function(event) {
	fieldvalidation();	
	event.preventDefault();
	var validateSuccess = true        
	var name = $('#name').val().trim();
	var email = $('#email').val().trim();	
	var mobile_number = $('#mobile_number').val().trim();
	var desc = $('#desc').val().trim();			
	$('input[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}
	});     
	$('textarea[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter '+$(this).attr('placeholder')+'</p>'); 
		}
	});		
	if(email != "") {
		if(validateEmail(email) == false) {
			validateSuccess = false;
			$('#email').siblings( ".label-danger" ).remove();
		    $('#email').after('<p class="label label-danger">Email ID is not in proper format</p>');			
		} 
	}
	if(mobile_number !="") {
		if(validatePhone(mobile_number) == false) {
			validateSuccess = false;
			$('#mobile_number').siblings( ".label-danger" ).remove();
		    $('#mobile_number').after('<p class="label label-danger">Enter Valid Mobile No.</p>');
		}
	}
	if(validateSuccess == true) { 
	 $('form').unbind('submit').submit();
    }	
}.bind(ContactUS);
/* Change Password*/
var ChangePassword = {
	init:{},	
}
ChangePassword.init = function(event) {
	fieldvalidation();	
	event.preventDefault();
	var validateSuccess = true        
	var current_password = $('#current_password').val().trim();
	var new_password = $('#new_password').val().trim();	
	var retype_password = $('#retype_password').val().trim();	
	$('input[data-valid=required]').each(function() { 
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}
	}); 		
	if(current_password != "" && current_password.length<8) {		
		validateSuccess = false;
		$('#current_password').siblings( ".label-danger" ).remove();
		$('#current_password').after('<p class="label label-danger">Password should be minimum 8 digit</p>');		
	}
	if(new_password !="" && new_password.length<8) {		
		validateSuccess = false;
		$('#new_password').siblings( ".label-danger" ).remove();
		$('#new_password').after('<p class="label label-danger">Password should be minimum 8 digit</p>');		
	}
	if(retype_password !="" && retype_password.length<8) {		
		validateSuccess = false;
		$('#retype_password').siblings( ".label-danger" ).remove();
		$('#retype_password').after('<p class="label label-danger">Password should be minimum 8 digit</p>');		
	}
	if((retype_password !="" && new_password!="") && retype_password!=new_password) {	 validateSuccess = false;
		$('#retype_password').siblings( ".label-danger" ).remove();
		$('#retype_password').after('<p class="label label-danger">Retype Password is not Match with Current Password</p>');		
	}
	if(validateSuccess == true) { 
	 $('form').unbind('submit').submit();
    }	
}.bind(ChangePassword);

var VendorDetails = {
	UpdateDetails:{},	
}
VendorDetails.UpdateDetails= function() {
	fieldvalidation();	
	event.preventDefault();
	var validateSuccess = true        
	var vfirstname = $('#vfirstname').val().trim();
	var vlastname = $('#vlastname').val().trim();	
	var vdescribe = $('#vdescribe').val().trim();
	var vaddress = $('#vaddress').val().trim();	
	var vpincode = $('#vpincode').val().trim();	
	var industry_exp = $('#industry_exp').val().trim();	
	var website_link = $('#website_link').val().trim();	
	var facebook_page = $('#facebook_page').val().trim();	
	var instagram_page = $('#instagram_page').val().trim();	
	var youtube_link = $('#youtube_link').val().trim();	
	$('input[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter your '+$(this).attr('placeholder')+'</p>'); 
		}
	}); 
    $('.selectpicker[data-valid=required]').each(function() {		
        var el = $(this)
		if(el.val() == "") {
			validateSuccess = false;			
			$(this).siblings( ".label-danger" ).remove();
			 $(this).siblings( ".nice-select" ).after('<p class="label label-danger">Please select '+$(this).attr('selectname')+'</p>');
			
		}
	});
	$('textarea[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") { 
			 validateSuccess = false;			 
			 $(this).siblings( ".label-danger" ).remove();
			 $(this).after('<p class="label label-danger">Please enter '+$(this).attr('placeholder')+'</p>'); 
		}
	});	
	if(vfirstname =="" ) { 
	    validateSuccess = false;
		$('#vfirstname').siblings( ".label-danger" ).remove();
		$('#vfirstname').after('<p class="label label-danger">Please enter your First name</p>');		
	} else if(vfirstname !="" && vfirstname.length < 3) {	    
		validateSuccess = false;
		$('#vfirstname').siblings( ".label-danger" ).remove();
		$('#vfirstname').after('<p class="label label-danger">First Name should be minimum 3 digit</p>');			
	}else{}	
	if(vpincode.length < 6) {
			validateSuccess = false;
			$('#vpincode').siblings( ".label-danger" ).remove();
		    $('#vpincode').after('<p class="label label-danger">Pin Code should be minimum 6 digit</p>');			
	} 	
	if(validateSuccess == true) {  
	  $('form').unbind('submit').submit();
	}
}.bind(VendorDetails.UpdateDetails);

var VendorImage = {
	DeleteImage:{},
	UploadImage:{},
}
VendorImage.DeleteImage= function(mid,id,img) {	
	var vendor_master_id = mid;
	var vendorImage = img;	
	var imageId = id;	
	if(vendorImage != '' && vendor_master_id!='') {		  
	  $(".pinside20").append('<div id=\"preloader\" style="background: rgba(0, 0, 0, 0.27);"><div data-loader=\"circle-side"></div></div>');
		 $.ajax({
            type: "POST",
            url: "/image/delete-vendor-image",
            data: {vendor_image:vendorImage,vendor_master_id:vendor_master_id},
            dataType: "JSON",
            success: function(data) {	 		
			if(data.status!=null && data.status!='' && data.status=='success'){
				 $('#preloader').remove();				 
				 $('#vender-'+imageId+'').remove();
				 $('.alert').remove();
				 $('.pinside20').after('<p class="alert alert-success">'+data.message+'</p>');				
			}else{			    
				if(data.status=='fail' && data.message != ""){
					if(data.message!=null && data.message!=''){
					 $('#preloader').remove();
					 $('.alert').remove();
					  $('.pinside20').after('<p class="label label-danger">'+data.message+'</p>');	
					}else{
					   $('#preloader').remove();	
					}
				}
			  }
            },
            error: function(err) {			 	 
             console.log(err);
			  $('#preloader').remove();	
            }
        });
	}
}.bind(VendorImage.DeleteImage);
VendorImage.UploadImage= function(event) {
	  var validateSuccess = true;   
	  var files = $('#file')[0].files;
	  var len = $('#file').get(0).files.length;
	  var fileInput = document.getElementById('file');
      var formData = new FormData();
	   formData.append('upload_image', fileInput.files[0]);	  
	  if(len=='' ||  len=='0'){
	  $('.pinside20').siblings( ".label-danger" ).remove();
	  $('.pinside20').after('<p class="label label-danger">Please select the image (jpg, jpeg, png) </p>');
	  validateSuccess = false;
	  }else{
	    var f;
		for (var i = 0; i < len; i++) {
         f = files[i];        
         var ext = f.name.split('.').pop().toLowerCase();		
         if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
          $('.pinside20').siblings( ".label-danger" ).remove();
		  $('.pinside20').after('<p class="label label-danger">Please select the correct file format (jpg, jpeg, png) </p>');
		  validateSuccess = false;
        }else{
		 $('.pinside20').siblings( ".label-danger" ).remove();
		 validateSuccess = true;
		}	   
	  }
	 }  		
	if(validateSuccess == true){		  
	  $(".pinside20").append('<div id=\"preloader\" style="background: rgba(0, 0, 0, 0.27);"><div data-loader=\"circle-side"></div></div>');
		 $.ajax({		  
            type: "POST",
            url: "/image/upload-vendor-projects",
            data: formData,
			enctype: 'multipart/form-data',
            processData: false,  
            contentType: false,
			dataType: "JSON",
            success: function(data) {	 		
			if(data.status!=null && data.status!='' && data.status=='success'){
				 $('#preloader').remove();	 
				 $('.alert').remove();
				 $('.pinside20').after('<p class="alert alert-success">'+data.message+'</p>');				
			}else{ 
			    if(data.upload_image!=null && data.upload_image!=''){
					 $('#preloader').remove();					 
					 $( ".label-danger" ).remove();
					 $('.pinside20').after('<p class="label label-danger">'+data.upload_image+'</p>');
				}
				if(data.status=='fail' && data.message != ""){
					if(data.message!=null && data.message!=''){
					 $('#preloader').remove();
					$( ".label-danger" ).remove();
					$('.pinside20').after('<p class="label label-danger">'+data.message+'</p>');	
					}else{
					   $('#preloader').remove();	
					}
				}
			  }
            },
            error: function(err) {			 	 
             console.log(err);
			  $('#preloader').remove();	
            }
        });
	}
}.bind(VendorImage.UploadImage);
var Mobile = {
	Otp:{},	
	OtpResend:{},	
}
Mobile.Otp = function(event) {	
	var input_otp = $('#input_otp').val().trim();
	var otp_id = $('#otp_id').val().trim();
	event.preventDefault()
	var validateSuccess = true;
	  fieldvalidation();	
	$('#quote_form-otp :input[data-valid=required]').each(function() {
		var el = $(this)
		if(el.val() == "") {			
			validateSuccess = false;
			$(this).siblings( ".label-danger" ).remove();
			$(this).after('<p class="label label-danger">Please '+$(this).attr('placeholder')+'</p>'); 
		}else{
			$(this).siblings( ".label-danger" ).remove();			
		}
	});
	if(input_otp != "" && input_otp.length<6) {		
		validateSuccess = false;
		$('#input_otp').siblings( ".label-danger" ).remove();
		$('#input_otp').after('<p class="label label-danger">Please Enter 6 digit OTP</p>');		
	}	
	if(validateSuccess == true) {         
		 $("#verify_otp").text("");	 
		 $("#verify_otp").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
		 $.ajax({
            type: "POST",
            url: "/login/verify-otp",
            data: {input_otp:input_otp,otp_id:otp_id},
            dataType: "JSON",
            success: function(data) {	 		
			if(data.status!=null && data.status!='' && data.status=='success'){
				 $("#verify_otp").text("Submit");
				 $("#quote-form-otp").hide();
				 $('#quote_form-otp').after("<div id=\"quote_form-sent\"><div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 \"><img src=\"/assets/images/sent.gif\"><h3>Your Query has been sent successfully.</h3></div></div>");				
			}else{
			     $("#verify_otp").text("Submit");
				 if(data.status=='fail' && data.message != ""){
					if(data.message!=null && data.message!=''){
					  $('#input_otp').siblings( ".label-danger" ).remove();
					  $('#input_otp').after('<p class="label label-danger">'+data.message+'</p>');	
					}else{
					 $('#input_otp').siblings( ".label-danger" ).remove();
					}
				}
			  }
            },
            error: function(err) {
			 $("#verify_otp").text("Submit");	 
             console.log(err);
            }
        });
 
}
}.bind(Mobile.Otp);
Mobile.OtpResend = function(event) {	
	
	var otp_id = $('#otp_id').val().trim();
	if(otp_id != '') {         
		 $("#resendotp").text("");	 
		 $("#resendotp").append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
		 $.ajax({
            type: "POST",
            url: "/login/resend-otp",
            data: {otp_id:otp_id},
            dataType: "JSON",
            success: function(data) {	 		
			if(data.status!=null && data.status!='' && data.status=='success'){
				 $("#resendotp").text("");
				  $("#resendotp a").removeAttr("href");
				 $("#otp_id").val(data.otp_id);
				 $('#resendotp').siblings( ".success-msg" ).remove();
				 $('#resendotp').after('<p class="success-msg">'+data.message+'</p>');	
			}else{
			     $("#resendotp").text("Resend OPT");
				 if(data.status=='fail' && data.message != ""){
					if(data.message!=null && data.message!=''){
					  $('#resendotp').siblings( ".error-msg" ).remove();
					  $('#resendotp').after('<p class="error-msg" style="margin-top: 10px;">'+data.message+'</p>');	
					}else{
					 $('#resendotp').siblings( ".error-msg" ).remove();
					}
				}
			  }
            },
            error: function(err) {
			 $("#resendotp").text("Resend OPT");	 
             console.log(err);
            }
        });
 
}
}.bind(Mobile.OtpResend);



