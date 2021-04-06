function alert_box(message)					
{
	bootbox.dialog({
		message: message, 
		buttons: {
			"success" : {
				"label" : "OK",
				"className" : "btn-sm btn-primary"
			}
		}
	});
}


function show_box(id) {
	jQuery('.widget-box.visible').removeClass('visible');
	jQuery('#'+id).addClass('visible');
	$('#'+id +' .error-block').addClass('hidden');
}
			
jQuery(function($){

	jQuery.validator.addMethod("phone", function (value, element) {
		
		var patt=/\d{10}/;
		if(value==""||(patt.test(value)&&value.length==10))
			return true;
	}, "Enter a valid phone number.");

	$('#registration-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		onkeyup:false,
		rules: {
			name:{
				required:true,
				minlength:4
			},
			email: {
				required: true,
				email:true
			},
			password: {
				required: true,
				minlength: 8
			},
			password2: {
				required: true,
				equalTo: "#registration-form #password"
			},			
			serialno:{
				required:true,
				minlength:1
			}
		},

		messages: {
			email: {
				required: "Please provide a valid email.",
				email: "Please provide a valid email."
			},
			password: {
				required: "Please specify a password.",
				minlength: "Please enter password more than 8 characters length."
			},
			
			password2:{
				required:"Please enter the password to confirm",
				equalTo:"Please re enter the same password"
			},
			
			name: {
				required: "Please enter your full name.",
				minlength: "Name should be more than 4 characters length."
			},
			
			serialno: {
				required: "Please enter your board serial no.",
				minlength:"please enter your board serial no."
			}
			
		},
		
		showErrors: function(errorMap, errorList) {
			
			if(errorList.length!=0)
			{
				//console.log(errorList);
				$('#registration-form .error-block').removeClass('hidden');
				$('#registration-form .error-block .message').html(errorList[0].message);
				
			}
			else{
				$('#registration-form .error-block').addClass('hidden');
			}
		},
		
		invalidHandler: function (event, validator) { //display error alert on form submit   
			//$('.alert-danger', $('.login-form')).show();
			$('#register-form .error-block').removeClass('hidden');
			
		},

		submitHandler: function (form) {
			
			//chahnge by RB Nov 21,2017
			/*form.p.value = hex_sha512(form.password.value);
			form.password.value = "";*/
			
			form.p.value = form.password.value;
			form.password.value = "";

			//console.log(form.serializeArray());
			var postData=$(form).serializeArray();
			
			$('#registration-form .status-block').removeClass('hidden');
			$('#registration-form input,select,button').attr("disabled",true);
			
			//console.log(postData);
			$.ajax(
			{
				url : "authentication/registration_process.php",
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR) 
				{
					//alert(data);
					if(data=="invalid_captcha")
					{
						bootbox.hideAll();
						alert_box("Invalid CAPTCHA. Please Try Again");
						$('#registration-form .error-block').removeClass('hidden');
						$('#registration-form .error-block .message').html("Invalid CAPTCHA. Please Try Again");
					}
					else if(data=="invalid_email_board")
					{
						bootbox.hideAll();
						alert_box("Invalid Registration.<br>Email has been already registered.<br>Registration is already done for the board serial number.");
						$('#registration-form .error-block').removeClass('hidden');
						$('#registration-form .error-block .message').html("Invalid Registration.<br>Email has been already registered.<br>Registration is already done for the board serial number.");
					}
					else if(data=="invalid_email")
					{
						bootbox.hideAll();
						$('#registration-form .error-block').removeClass('hidden');
						$('#registration-form .error-block .message').html("Invalid Registration.<br>Email has been already registered.");
					}
					else if(data=="invalid_board")
					{
						bootbox.hideAll();
						$('#registration-form .error-block').removeClass('hidden');
						$('#registration-form .error-block .message').html("Invalid Registration.<br>Registration is already done for the board serial number.");
					}
					else if(data=="Error in sending Email")
					{
						bootbox.hideAll();
						$('#registration-form .error-block').removeClass('hidden');
						$('#registration-form .error-block .message').html("Error in sending activation Email.");
					}
					else if(data=="invalid")
					{
						bootbox.hideAll();
						$('#registration-form .error-block').removeClass('hidden');
						$('#registration-form .error-block .message').html("Invalid Request.");
					}
					else if(data=="login_failed")
					{
						bootbox.hideAll();
						$('#registration-form .error-block').removeClass('hidden');
						$('#registration-form .error-block .message').html("Login Failed.");
					}
					else if(data=="login_success")
					{
						bootbox.hideAll();
						var box = bootbox.dialog({
							closeButton: false,
							message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									'Congratulations! Registration Successfull. Please Wait... ' +
									'</div></div>'
						});
						window.location.assign("dashboardhome.php");
					}
					else
					{
						bootbox.hideAll();
						alert_box(data);
						$('#registration-form .error-block').removeClass('hidden');
						$('#registration-form .error-block .message').html("Registration falied. Please call us to help you.");
					}	
					//data: return data from server
					//window.location.assign("ma_login.html");
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					//if fails
					bootbox.hideAll();
					alert_box("Unable to register due to network failure");
				},
				beforeSend:function()
				{
					bootbox.hideAll();
					var box = bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									'Registration in Progress. Please Wait... ' +
									'</div></div>'
					});
				}
			}).done(function(){
				
				$('#registration-form .status-block').addClass('hidden');
				$('#registration-form input,select,button').attr("disabled",false);
			
			});
		}
		
	});
	
	$("#registration-form button[type='reset']").click(function(){
		console.log("resetting form..");
		$("#registration-form .error-block").addClass('hidden');
	});
	
	$('#login-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		onkeyup:false,
		rules: {
			email: {
				required: true,
				email:true
			},
			password: {
				required: true,
				minlength: 8
			}
		},

		messages: {
			email: {
				required: "Please provide a valid email.",
				email: "Please provide a valid email."
			},
			password: {
				required: "Please specify a password.",
				minlength: "Password must be more than 8 characters length."
			}
			
		},
		
		showErrors: function(errorMap, errorList) {
			
			if(errorList.length!=0)
			{
				$('#login-form .error-block').removeClass('hidden');
				$('#login-form .error-block .message').html(errorList[0].message);
				
			}
			else{
				$('#login-form .error-block').addClass('hidden');
			}
		},
		
		invalidHandler: function (event, validator) { //display error alert on form submit   
			//$('.alert-danger', $('.login-form')).show();
			$('#login-form .error-block').removeClass('hidden');
			
		},

		submitHandler: function (form) {
			$('#login-loading').show();
			$('#msloginbtn').hide();
			//alert(form.password.value);
			
			//chahnge by RB Nov 21,2017
			/*form.p.value = hex_sha512(form.password.value);
			form.password.value = "";*/
			
			form.p.value = form.password.value;
			form.password.value = "";

			var postData=$(form).serializeArray();
			
			//console.log(postData);
			$.ajax(
			{
				url : "authentication/login-process.php",
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR) 
				{
					if(data=="invalid" || data=="failed")
					{
						bootbox.hideAll();
						$('#login-form .error-block').removeClass('hidden');
						$('#login-form .error-block .message').html("Authentication Failed.<br/>Please check your details.");
					}
					else if(data=="success")
					{
						bootbox.hideAll();
						var box = bootbox.dialog({
							closeButton: false,
							message: '<div class="row">  ' +
										'<div class="col-md-12 center"> ' +
										'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
										'Authentication Successfull. Please Wait... ' +
										'</div></div>'
						});
						window.location.assign("dashboardhome.php");
					}
					else
					{		
						bootbox.hideAll();
						$('#login-form .error-block').removeClass('hidden');
						$('#login-form .error-block .message').html("Failed to authenticate. Please call us to help you.");
					}
					$('#login-loading').hide();
					$('#msloginbtn').show();
					//data: return data from server
				},
				beforeSend:function()
				{
					bootbox.hideAll();
					var box = bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									'Authentication in Progress. Please Wait... ' +
									'</div></div>'
					});
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					//if fails
					alert_box("Unable to login due to network failure");
				}
			});
		}
		
	});
	
	$('#retype-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		onkeyup:false,
		rules: {
			password: {
				required: true,
				minlength: 8
			},
			confirmPassword: {
				required: true,
				equalTo: "#retype-form #password"
			}			
		},
		messages: {
			password: {
				required: "Please specify a password.",
				minlength: "Please enter password more than 8 characters length."
			},
			confirmPassword:{
				required:"Please enter the password to confirm",
				equalTo:"Please re enter the same password"
			}						
		},
		
		showErrors: function(errorMap, errorList) {
			
			if(errorList.length!=0)
			{
				$('#retype-form .error-block').removeClass('hidden');
				$('#retype-form .error-block .message').html(errorList[0].message);
				
			}
			else{
				$('#retype-form .error-block').addClass('hidden');
			}
		},
		
		invalidHandler: function (event, validator) { //display error alert on form submit   
			//$('.alert-danger', $('.login-form')).show();
			$('#retype-form .error-block').removeClass('hidden');
			
		},

		submitHandler: function (form) {
			$('#retype-loading').show();
			$('#msloginbtn').hide();

			//chahnge by RB Nov 21,2017
			/*form.p.value = hex_sha512(form.password.value);
			form.password.value = "";*/
			
			form.p.value = form.password.value;
			form.password.value = "";

			var postData=$(form).serializeArray();
			$.ajax(
			{
				url : "retype_process.php",
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR) 
				{
					if(data=="invalid")
					{
						bootbox.hideAll();
						$('#retype-form .error-block').removeClass('hidden');
						$('#retype-form .error-block .message').html("Unable to Reset your password.<br/>Please contact us.");
					}
					else if(data=="success")
					{
						bootbox.hideAll();
						var box = bootbox.dialog({
							closeButton: false,
							message: '<div class="row">  ' +
										'<div class="col-md-12 center"> ' +
										'Your Password Has Been Successfully Reset.' +
										'</div></div>',
							buttons: {
										success: {
												label: "OK",
												className: "btn-success",
												callback: function() {
													bootbox.hideAll();
													bootbox.dialog({
														closeButton: false,
														message: '<div class="row">  ' +
																	'<div class="col-md-12 center"> ' +
																	'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
																	'Please wait... Redirecting to Login Page...' +
																	'</div></div>'
													});
													window.location.assign("index.php");
												}
											},
									}
						});
					}
					else
					{		
						bootbox.hideAll();
						$('#retype-form .error-block').removeClass('hidden');
						$('#retype-form .error-block .message').html(data);
					}
					$('#retype-loading').hide();
					$('#msloginbtn').show();
					//data: return data from server
				},
				beforeSend:function()
				{
					bootbox.hideAll();
					var box = bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									'In Progress... Please Wait... ' +
									'</div></div>'
					});
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					//if fails
					alert_box("Unable to login due to network failure");
				}
			});
		}
		
	});
	
	$('#forgot-box-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		onkeyup:false,
		rules: {
			email: {
				required: true,
				email:true
			}
		},
		messages: {
			email: {
				required: "Please provide email.",
				email: "Please provide a valid email."
			}
		},
		
		showErrors: function(errorMap, errorList) {
			
			if(errorList.length!=0)
			{
				console.log(errorList);
				$('#forgot-box-form .error-block').removeClass('hidden');
				$('#forgot-box-form .error-block .message').html(errorList[0].message);
				
			}
			else{
				$('#forgot-box-form .error-block').addClass('hidden');
			}
		},
		
		invalidHandler: function (event, validator) { //display error alert on form submit   
			//$('.alert-danger', $('.login-form')).show();
			$('#forgot-box-form .error-block').removeClass('hidden');
			
		},

		submitHandler: function (form) {
			var postData=$(form).serializeArray();
			$.ajax(
			{
				url : "forgot_process.php",
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR) 
				{
					if(data=="success")
					{
						bootbox.hideAll();
						var box = bootbox.dialog({
							closeButton: false,
							message: '<div class="row">  ' +
										'<div class="col-md-12 center"> ' +
										'We have sent an email with pssword reset instructions.' +
										'</div></div>',
							buttons: {
										success: {
												label: "OK",
												className: "btn-success",
												callback: function() {
													
												}
											},
									}			
						});
					}
					else
					{		
						bootbox.hideAll();
						$('#forgot-box-form .error-block').removeClass('hidden');
						$('#forgot-box-form .error-block .message').html(data);
					}
				},
				beforeSend:function()
				{
					bootbox.hideAll();
					var box = bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									'Sending Password Reset Instructions. Please Wait... ' +
									'</div></div>'
					});
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					alert_box("Unable to login due to network failure");
				}
		});
			
		}
		
	});



});