

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
		
		var year=1980;
		
		var innerhtml="";
		//console.log("hello");
		//console.log($(".pass-year").html());
		
		for(var year=1980;year<2015;year++)
		{
			innerhtml=innerhtml+"<option value='"+year+"' >" + year + "</option>";
		}
		
		$(".pass-year").html(innerhtml);
		
		update_names();
		
		validateForm();
		
});



jQuery.validator.addMethod("percentage", function (value, element) {
			var val=parseInt(value);
			if(val<0||val>100)
				return false;
			return true;
}, "Enter a valid overall percentage");

jQuery.validator.addMethod("pin", function (value, element) {
	
	var patt=/\d+/;
	if(patt.test(value))
		return true;
	return false;
}, "Enter a valid pin code.");

jQuery.validator.addMethod("phone", function (value, element) {
	
	var patt=/\d{10}/;
	if(patt.test(value)&&value.length==10)
		return true;
	return false;
}, "Enter a valid phone number.");


function validateForm(){

		$('#personal-details-form').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				onClick:true,
				rules: {
					username:{
						required:true,
						minlength:5
					},
					password: {
						required: true,
						minlength:8
					},
					email: {
						required: true,
						email:true
					},
					usertype: {
						required: true
					}
				},
		
				messages: {
					email: {
						required: "Please provide a valid email.",
						email: "Please provide a valid email."
					},
					username: {
						required: "Please enter the user name.",
						minlength:"User name must be atleast 5 characters length."
					},
					password: {
						required: "Please enter the password.",
						minlength: "password must be at least 8 characters length."
					},
					
					usertype: {
						required: "Please select the user type."
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
					
					form.p.value = hex_sha512(form.password.value);
					form.password.value = "";

					//console.log("form successfully submitted");
					var postData=$(form).serializeArray();
				
								
					$('form .status-block').removeClass('hidden');
					//$('form input,select,button').attr("disabled",true);
				
					$.ajax(
					{
						url : "restricted/createuser.php",
						type: "POST",
						data : postData,
						success:function(data, textStatus, jqXHR) 
						{
							if(data=="failed")
							{
								$('#personal-details-form .error-block').removeClass('hidden');
								$('#personal-details-form .error-block .message').html("Failed Creating User.");
							}
							else if(data=="success")
							{
								$('#personal-details-form .success-block').removeClass('hidden');
								$('#personal-details-form .success-block .message').html("Successfully Created User.");
							}
							else
							{		
								$('#personal-details-form .error-block').removeClass('hidden');
								$('#personal-details-form .error-block .message').html(data);
							}
							//data: return data from server
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							//if fails
							alert_box("Unable to login due to network failure");
						}
					}).done(function(){
						$('#personal-details-form').reset();
						//$('#personal-details-form .error-block').addClass('hidden');
						//$('#personal-details-form .success-block').addClass('hidden');
						$('#personal-details-form input,select,button').attr("disabled",false);
					
					});
				
				},
				
				
				invalidHandler: function (form) {
					
				}
			});
			
			$("#personal-details-form button[type='reset']").click(function(){
				//console.log("resetting form");
				$("#personal-details-form .help-block").addClass('hidden');
				$("#personal-details-form .has-error, .has-info").removeClass('has-error').removeClass('has-info');
				
			});
		
	
}

function update_names(){
	
	$( "#personal-details-form input, select" ).each(function( index ) {
		$(this).attr('name',$(this).attr('id'));
		//console.log($(this).attr('name'));
	});

}