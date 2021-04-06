
/*
this script is not used*/

var checked=false;

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



function  grevalidation(){

	

	//console.log("hello");

	

	if($("#gat-exam-form input[name='exam']:checked").val()=="GAT" )

	{

		$("#gat-exam-form .gre-input").attr('disabled',true);

		checked=false;

	}

	

	else

	{

		$("#gat-exam-form .gre-input").attr('disabled',false);

		checked=true;

	}

}



jQuery(function($) {



	update_names();



	grevalidation();

	$("#gat-exam-form input[name='exam']").change(function(){

		grevalidation();		

	});





	jQuery.validator.addMethod("grescore", function (value, element) {

		if(checked&&value=="")	

			return false;

		else if(checked&&value<301) 

			return false;	

		else return true;

	}, "<strong>You should have atleast 301</strong>");



	jQuery.validator.addMethod("greAnalytical", function (value, element) {

		if(checked&&value=="")	

			return false;

		else if(checked&&value<3.5) 

			return false;	

		else return true;

	}, "<strong>You should have atleast 3.5</strong>");



	$("#gat-exam-form .gre-input").attr('disabled',true);

	





	$('#gat-exam-form').validate({

		errorElement: 'div',

		errorClass: 'help-block',

		focusInvalid: false,

		onkeyup:false,

		rules: {

			centre1:{

				required:true

			},

			greAnalytical:{

				gre:'required'

			},

			greScore:{

				grescore:'required'

			}

		},



		messages: {

			centre1: {

				required: "Please select your first preference."

			}

		},





		highlight: function (e) {

			if($(e).hasClass('centres'))

			{

				console.log("Error");

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

				else if(element.is('.chosen-select')) {

					error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));

				}

				else error.insertAfter(element.parent());

			},



			invalidHandler: function (event, validator) { //display error alert on form submit   

				//$('.alert-danger', $('.login-form')).show();

			},



			submitHandler: function (form) {



				var postData=$(form).serializeArray();

				



				$('form .status-block').removeClass('hidden');

				$('form input,select,button').attr("disabled",true);





				//console.log(postData);

				$.ajax(

				{

					url : "authentication/exam_details_update_process.php",

					type: "POST",

					data : postData,

					success:function(data, textStatus, jqXHR) 

					{

						

						alert_box(data);

						//location.reload(true);

						//data: return data from server

					},

					error: function(jqXHR, textStatus, errorThrown) 

					{

						//if fails

						alert_box("Unable to save data due to network failure");

					}

				}).always(function(){

					grevalidation();

					$('form input,select,button').attr("disabled",false);



				}).done(function(){

					$('form .status-block').addClass('hidden');

					$('form .success-block').removeClass('hidden');



				});

			}

			

		});



	$("#gat-exam-form button[type='reset']").click(function(){

		console.log("resetting form");

		$("#gat-exam-form .help-block").addClass('hidden');

		$("#gat-exam-form .has-error, .has-info").removeClass('has-error').removeClass('has-info');

		$("#gat-exam-form input#GAT").click();



		grevalidation();



	});





	//	validateForm();

});















function update_names(){

	

	$( "#gat-exam-form input, select" ).each(function( index ) {

		if($(this).attr('name')==undefined)

		{

			$(this).attr('name',$(this).attr('id'));

		}

		//console.log($(this).attr('name'));

	});



}