
var success=false;

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

jQuery(function($) {
		//console.log("hello");
		validateForm();
		
});

function validateForm(){

		$('#upload-photo-form').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				onClick:true,
				rules: {
					photo:{
						required:true
					}	
				},
		
				messages: {
					photo: {
						required: "Please upload your file."
					}
				},
		
				invalidHandler: function (event, validator) { //display error alert on form submit   
					//$('.alert-danger', $('.login-form')).show();
				},
		
				highlight: function (e) {
					$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
				},
		
				success: function (e) {
					
					//console.log($('#nationality').val());
					$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
					$(e).remove();
				},
		
				errorPlacement: function (error, element) {
					if(element.is(':checkbox') || element.is(':radio')) {
						var controls = element.closest('div[class*="col-"]');
						if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
						else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
					}
					else if(element.is('.select2')) {
						error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
					}
					else if(element.is('.chosen-select')) {
						error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
					}
					else error.insertAfter(element.parent());
				},
		
				submitHandler: function (form) {
					
					var postData=$(form).serializeArray();
				
					//disable the default form submission
					event.preventDefault();
					
					//grab all form data  
					var formData = new FormData(form);
									
					$('form .status-block').removeClass('hidden');
					$('form input,select,button').attr("disabled",true);
				
					//console.log(postData);
					$.ajax(
					{
						url : "ma_importmarks.php",
						type: "POST",
						data : formData,
						async: false,
						cache: false,
						contentType: false,
						processData: false,
						success:function(data, textStatus, jqXHR) 
						{
							alert_box(data);
							window.location.reload(true);
							//alert_box(data);
							//data: return data from server
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							//if fails
							alert_box("Unable to save data due to network failure");
						}
					}).always(function(){
						$('form input,select,button').attr("disabled",false);
						
					}).done(function(){
						$('form .status-block').addClass('hidden');
						$('form .success-block').removeClass('hidden');
						
					});
				},
				
				
				invalidHandler: function (form) {
					
				}
			});
			
}
