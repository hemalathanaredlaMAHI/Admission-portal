
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
		
function validateOfflineData()
{
	$('#registration-form .error-block').addClass('hidden');
	$('#registration-form .error-block .message').html("");
	var form = document.forms['registration-form'];
	if(form.email.value=="" || form.name.value=="" || form.board.value=="")
	{
		$('#registration-form .error-block').removeClass('hidden');
		$('#registration-form .error-block .message').html("Please provide all the details.");
		return false;
	}
	form.p.value = hex_sha512(form.password.value);
	form.password.value = "";
	//	$('#registration-form .status-block').removeClass('hidden');
	//$('#registration-form .error-block').addClass('hidden');
	//$('#registration-form .error-block').removeClass('hidden');
	
		//	$('#registration-form input,select,button').attr("disabled",true);
	return true;
}		
jQuery(function($){

	jQuery.validator.addMethod("phone", function (value, element) {
		
		var patt=/\d{10}/;
		if(value==""||(patt.test(value)&&value.length==10))
			return true;
	}, "Enter a valid phone number.");


		
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
			form.p.value = hex_sha512(form.password.value);
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
					//alert(data);
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
						window.location.assign("dashboard.php");
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
					consoloe.log(textStatus);
					consoloe.log(errorThrown);
					consoloe.log(jqXHR);
					alert_box("Unable to login due to network failure");
				}
			});
		}
		
	});
	
	
	
});