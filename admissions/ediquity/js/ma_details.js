
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

function get_ApplicationId()
{
	$.ajax({
                       type: "GET",
                       url: "authentication/check_appID.php?appID="+document.getElementById("appID").value,
                       success: function(result){
				        $('.error-block').removeClass('hidden');
				         $('.error-block .message').html(result);
                       }
                     });
}
			
jQuery(function($){
	$('#details-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		onkeyup:false,
		rules: {
			email: {
				required: true,
				email:true
			},
			
			appID: {
				required: true,
				minlength: 8
			}
		},

		messages: {
			email: {
				required: "Please provide a valid email.",
				email: "Please provide a valid email."
			},
			appID: {
				required: "Please specify a Application.",
				minlength: "Please enter Application ID more than 8 characters length."
			}
			
		},
		
		showErrors: function(errorMap, errorList) {
			
			if(errorList.length!=0)
			{
				//console.log(errorList);
				$('#details-form .error-block').removeClass('hidden');
				$('#details-form .error-block .message').html(errorList[0].message);
				
			}
			else{
				$('#details-form .error-block').addClass('hidden');
			}
		},
		
		invalidHandler: function (event, validator) { //display error alert on form submit   
			//$('.alert-danger', $('.login-form')).show();
			$('#details-form .error-block').removeClass('hidden');
			
		},

		submitHandler: function (form) {
			
			
			
			//console.log(form.serializeArray());
			var postData=$(form).serializeArray();
			
			$('#details-form .status-block').removeClass('hidden');
			//$('#details-form input,select,button').attr("disabled",true);
			
			//console.log(postData);
			$.ajax(
			{
				url : "authentication/ma_details_process.php",
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR) 
				{
					if(data=="invalid_appID")
					{
						$('#details-form .error-block').removeClass('hidden');
						$('#details-form .error-block .message').html("Invalid appID.<br>appID has been already registered.");
					}
					else if(data=="invalid_email")
					{
						$('#details-form .error-block').removeClass('hidden');
						$('#details-form .error-block .message').html("Email and ApplicationID didnot match.");
					}
					else if(data=="Error in sending Email")
					{
						$('#details-form .error-block').removeClass('hidden');
						$('#details-form .error-block .message').html("Error in sending activation Email.");
					}
					else if(data=="invalid")
					{
						$('#details-form .error-block').removeClass('hidden');
						$('#details-form .error-block .message').html("Invalid Request.");
					}
					else if(data=="success")
					{
						window.location.assign("ma_offline_dashboard.php");
					}
					else
					{
						alert_box(data);
						$('#details-form .error-block').removeClass('hidden');
						$('#details-form .error-block .message').html("details falied. Please call us to help you.");
					}	
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					
				}
			}).done(function(){
				
				$('#deatils-form .status-block').addClass('hidden');
				$('#details-form input,select,button').attr("disabled",false);
			
			});
		}
		
	});
	
	$("#details-form button[type='reset']").click(function(){
		console.log("resetting form..");
		$("#details-form .error-block").addClass('hidden');
	});
	
	

});