
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
		
		update_names();
		
		validateForm();
		
		$( "#nationality" ).select(function() {
		  alert( "Handler for .select() called." );
		});
		

});



jQuery.validator.addMethod("percentage", function (value, element) {
			var val=parseInt(value);
			if(val<0||val>100)
				return false;
			return true;
}, "Enter a valid overall percentage");


jQuery.validator.addMethod("phone", function (value, element) {
	
	var patt=/\d{10}/;
	if(patt.test(value)&&value.length==10)
		return true;
	return false;
}, "Enter a valid phone number.");


function validateForm(){

		$('#education-details-form').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				onClick:true,
				rules: {
					photo:{
						required:true
					},
					parent: {
						required: true,
						minlength:4
					},
					nationality: {
						required: true
					},
					dob: {
						required: true
					},
					sscExamName: {
						required: true
					},
					sscYear:{
						required:true
					},
					sscBoard:{
						required:true
					},
					sscInstitute:{
						required:true
					},
					
					sscPercentage:{
						required:true,
						percentage:'required'
					},
					sscClass:{
						required:true
					},
					interExamName: {
						required: true
					},
					interYear:{
						required:true
					},
					interBoard:{
						required:true
					},
					interInstitute:{
						required:true
					},
					
					interPercentage:{
						required:true,
						percentage:'required'
					},
					interClass:{
						required:true
					},
					
					gradExamName: {
						required: true
					},
					gradYear:{
						required:true
					},
					gradBoard:{
						required:true
					},
					gradInstitute:{
						required:true
					},
					
					gradPercentage:{
						required:true,
						percentage:'required'
					},
					gradClass:{
						required:true
					},
					address1:{
						required:true
					},
					
					village:{
						required:true
					},
					city:{
						required:true
					},
					pincode:{
						required:true
					},
					mobile:{
						required:true,
						phone:"required"
					}		
				},
		
				messages: {
					photo: {
						required: "Please upload your photo."
					},
					parent: {
						required: "Please enter your parent/guardian name.",
						minlength: "Parent/Guardian name must be greater than 4 characters length."
					},
					
					nationality: {
						required: "Please select your nationality."
					},
					
					dob: {
						required: "Please enter your date of birth"
					},
					sscExamName: {
						required: "Please enter your ssc or equivalent exam name"
					},
					sscInstitute: {
						required: "Please enter your ssc or equivalent institute name"
					},
					
					sscBoard: {
						required: "Please enter your ssc or equivalent board name"
					},
					sscPercentage: {
						required: "Please enter your ssc or equivalent percentage",
						percentage:"Please enter valid percentage"
					},
					sscClass:{
						required:"Please enter your ssc or equivalent division/class"
					},
					
					interExamName: {
						required: "Please enter your intermediade or equivalent exam name"
					},
					interInstitute: {
						required: "Please enter your intermediade or equivalent institute name"
					},
					
					interBoard: {
						required: "Please enter your intermediade or equivalent board name"
					},
					interPercentage: {
						required: "Please enter your intermediade or equivalent percentage",
						percentage:"Please enter valid percentage"
					},
					interClass:{
						required:"Please enter your intermediade or equivalent division/class"
					},
							
					gradExam: {
						required: "Please enter your graduation exam name"
					},
					gradInstitute: {
						required: "Please enter your graduation institute name"
					},
					
					gradBoard: {
						required: "Please enter your graduation board name"
					},
					gradPercentage: {
						required: "Please enter your graduation percentage"
						
					},
					gradClass:{
						required:"Please enter your graduation division/class"
					},
					
					address1:{
						required:"Please enter your home address"
					},
					village:{
						required:"Please enter your village/mandal/place name"
					},
					city:{
						required:"Please enter your city/town name"
					},
					pincode:{
						required:"Please enter your pincode of your home address"
					},
					
					mobile:{
						required:"Please enter your mobile no"
					}
	
				},
		
				invalidHandler: function (event, validator) { //display error alert on form submit   
					//$('.alert-danger', $('.login-form')).show();
				},
		
				highlight: function (e) {
					$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
				},
		
				success: function (e) {
					
					console.log($('#nationality').val());
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
					//console.log("form successfully submitted");
					var postData=$(form).serializeArray();
					
								
					$('form .status-block').removeClass('hidden');
					$('form input,select,button').attr("disabled",true);
				
				
					//console.log(postData);
					$.ajax(
					{
						url : "authentication/education_details_update_process.php",
						type: "POST",
						data : postData,
						success:function(data, textStatus, jqXHR) 
						{
							alert_box(data);
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
			
			$("#education-details-form button[type='reset']").click(function(){
				//console.log("resetting form");
				$("#education-details-form .help-block").addClass('hidden');
				$("#education-details-form .has-error, .has-info").removeClass('has-error').removeClass('has-info');
				
			});
		
	
}

function update_names(){
	
	$( "#education-details-form input, select" ).each(function( index ) {
		$(this).attr('name',$(this).attr('id'));
		//console.log($(this).attr('name'));
	});

}