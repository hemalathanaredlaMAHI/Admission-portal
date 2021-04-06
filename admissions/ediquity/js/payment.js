
jQuery(function($) {
	update_names();
	ddPaymentFormValidate();
	$('#tabs > ul > li').click(function(event){
		$("form .help-block").remove();
		$("form .has-error, .has-info").removeClass('has-error').removeClass('has-info');
		$('form').reset();
	});
	
});

jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}





function ddPaymentFormValidate(){

	$('#dd-payment-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		onClick:true,
		rules: {
			ddno:{
				required:true,
			},
			bankname:{
				required:true
			},
			bankbranch:{
				required:true
			},
			issuedate:{
				required:true
			},
			ddphoto:{
				required:true
			}			
		},

		messages: {
			ddno: {
				required: "Please enter your DD no"
			},
			bankname: {
				required: "Please enter bank name from where DD was issued."
			},
			bankbranch: {
				required: "Please enter branch name of the bank."
			},
			issuedate: {
				required: "Please enter date when DD was issued."
			},
			ddphoto: {
				required: "Please upload scanned copy of dd."
			}
		},

			
		highlight: function (e) {
			if($(e).hasClass('centres'))
			{
				console.log("wronf");
				$(e).closest('.col-sm-3').removeClass('has-info').addClass('has-error');
			}
			else $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},
	
		success: function (l,e) {
			
			if($(e).hasClass('centres'))
			{
				$(e).closest('.col-sm-3').removeClass('has-error').addClass('has-info');
			}
			else $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
			
			//alert("dd");
			$(l).remove();
			
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
			/*else if(element.is('.chosen-select')) {
				error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
			}*/
			else error.insertAfter(element.parent());
		},

		invalidHandler: function (event, validator) { //display error alert on form submit   
			//$('.alert-danger', $('.login-form')).show();
		},

		submitHandler: function (form) {
		
			var postData=$(form).serializeArray();
			//$('form input,select,button').attr("disabled",true);
			$.ajax(
			{
				url : "authentication/dd_payment_process.php",
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR) 
				{
					//alert(data);
					window.location.assign("ma_payment.php");
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					alert("Unable to save data due to network failure");
				}
			}).always(function(){
				$('form input,select,button').attr("disabled",false);
			}).done(function(){
				$('form .success-block').removeClass('hidden');
			});	
		},
				
				
				invalidHandler: function (form) {
					
				}
	});

	$("#dd-payment-form button[type='reset']").click(function(){
		console.log("resetting form");
		$("#dd-payment-form .help-block").remove();
		$("#dd-payment-form .has-error, .has-info").removeClass('has-error').removeClass('has-info');
		
	});

}



function update_names(){
	
	$( "#dd-payment-form .form-group input, select" ).each(function( index ) {
		if($(this).attr('name')==undefined)
		{
			$(this).attr('name',$(this).attr('id'));
			//console.log($(this).attr('name'));
		}
	
		
	});
	

}

