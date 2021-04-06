
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


	
	$('#login-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		onkeyup:false,
		rules: {
			username: {
				required: true,
				minlength:5
			},
			password: {
				required: true,
				minlength: 8
			}
		},

		messages: {
			username: {
				required: "Please provide a valid username.",
				minlength: "Please provide a valid username."
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
					if(data=="invalid" || data=="failed")
					{
						//alert_box("Authentication Failed.Please check your detaiils.");
						$('#login-form .error-block').removeClass('hidden');
						$('#login-form .error-block .message').html("Authentication Failed.Please check your details.");
					}
					else if(data=="success")
					{
						window.location.assign("ma_dashboard.php");
					}
					else
					{		
						$('#login-form .error-block').removeClass('hidden');
						$('#login-form .error-block .message').html("Failed to authenticate. Please call us to help you.");
					}
					//data: return data from server
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					//if fails
					alert_box("Unable to login due to network failure");
				}
			});
		}
		
	});
	
	
	

});