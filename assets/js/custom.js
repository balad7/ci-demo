jQuery(document).ready(function() {
	jQuery(".del_icn").click(function(event) {
		event.preventDefault();
		if( confirm('Are you sure delete this data?')){
			var del_id = jQuery(this).find('p').html();
			//alert(del_id);
		jQuery.ajax({
			type: "POST",
			url: 'Login/emp_delete',
			dataType: 'html',
			data: {id: del_id},
			success: function(data)
            {
				//alert(data);
               console.log(data);
			   window.location.replace("http://192.168.1.243:1000/Payroll/ver1/index.php/employee");
               //location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
				
                //alert('Error deleting data');
				
				 //console.log(jqXHR);
				  //alert(textStatus);
				   //alert(errorThrown);
				   console.log(errorThrown);
            }
		});
		}
	});
});
//jQuery("#profile-img-tag").css({"display": "none"});

jQuery("#have_exp").change(function(){

	 var radioValue = jQuery("input[name='experience']:checked").val();
	//alert(radioValue);
	if(radioValue == "Yes"){
		jQuery(".years").css({"display": "block"});
		}
	if(radioValue == "No"){
		jQuery(".years").css({"display": "none"});
		}
});

jQuery("#wk_sts").change(function(){

	 //var checkValue = jQuery("input[name='wk_status']:checked").val();
	 var wk_status = $(".wk_status option:selected").val();
	//alert(wk_status);
	if(wk_status == "Disqualified"){
		jQuery(".cert_dis").css({"display": "block"});
		jQuery(".cert_reliev").css({"display": "none"});
		}
	if(wk_status == "Relieved"){
		jQuery(".cert_reliev").css({"display": "block"});
		jQuery(".cert_dis").css({"display": "none"});
		}
	if(wk_status == "Active"){
		jQuery(".cert_reliev").css({"display": "none"});
		jQuery(".cert_dis").css({"display": "none"});
		}
});		
		
jQuery(document).ready(function(){
			jQuery(function() {
			  
			  jQuery("form[name='insert_form']").validate({
				// Specify validation rules
				rules: {
				  emp_name: {
					  required: true
					  },
				  emp_number: {
					  required: true
					  },
			      certificate_date: {
					  required: true
					  },
			      celeb_date: {
					  required: true
					  },
				  joining_date: {
					  required: true
					  },
				  address: {
					  required: true
					  },
				  mobile_number: {
					  required: true,
					  number: true
				  },
				  alt_number: {
					  required: true,
					  number: true
				  },
				  p_email: {
					required: true,
					email: true
				  },
				  o_email: {
					required: true,
					email: true
				  },
				  employee_gender: {
					  required: true
					  },
				  experience: {
					  required: true
					  },
				  cert_obt: {
					  required: true
					  },
				  wk_status: {
					  required: true,
				  },
				  
				},
				// Specify validation error messages
				messages: {
				  
				  emp_name:"This field is required.",
				  emp_number:"This field is required.",
				  certificate_date:"This field is required.",
				  celeb_date:"This field is required.",
				  joining_date:"This field is required.",
				  address:"This field is required.",
				  mobile_number: {
					required: "This field is required.",
					number: "Enter valid phone number"
				  },
				  alt_number: {
					required: "This field is required.",
					number: "Enter valid phone number"
				  },
				  p_email: "Please enter a valid email address",
				  o_email: "Please enter a valid email address",
				  employee_gender:"This field is required.",
				  experience:"This field is required.",
				  cert_obt:"This field is required.",
				  wk_status:"This field is required."
				},
				// Make sure the form is submitted to the destination defined
				// in the "action" attribute of the form when valid
				submitHandler: function(form) {
				  form.submit();
				}
			  });
			});
		})
		
		jQuery(document).ready(function(){
			jQuery(function() {
			  
			  jQuery("form[name='update_form']").validate({
				// Specify validation rules
				rules: {
				  emp_name: {
					  required: true
					  },
				  emp_number: {
					  required: true
					  },
			      certificate_date: {
					  required: true
					  },
			      celeb_date: {
					  required: true
					  },
				  joining_date: {
					  required: true
					  },
				  address: {
					  required: true
					  },
				  mobile_number: {
					  required: true,
					  number: true
				  },
				  alt_number: {
					  required: true,
					  number: true
				  },
				  p_email: {
					required: true,
					email: true
				  },
				  o_email: {
					required: true,
					email: true
				  },
				  employee_gender: {
					  required: true
					  },
				  experience: {
					  required: true
					  },
				  cert_obt: {
					  required: true
					  },
				  wk_status: {
					  required: true,
				  },
				  
				},
				// Specify validation error messages
				messages: {
				  
				  emp_name:"This field is required.",
				  emp_number:"This field is required.",
				  certificate_date:"This field is required.",
				  celeb_date:"This field is required.",
				  joining_date:"This field is required.",
				  address:"This field is required.",
				  mobile_number: {
					required: "This field is required.",
					number: "Enter valid phone number"
				  },
				  alt_number: {
					required: "This field is required.",
					number: "Enter valid phone number"
				  },
				  p_email: "Please enter a valid email address",
				  o_email: "Please enter a valid email address",
				  employee_gender:"This field is required.",
				  experience:"This field is required.",
				  cert_obt:"This field is required.",
				  wk_status:"This field is required."
				},
				// Make sure the form is submitted to the destination defined
				// in the "action" attribute of the form when valid
				submitHandler: function(form) {
				  form.submit();
				}
			  });
			});
		})

//Profile page:
//jQuery("#profile-img-tag").css({"display": "none"});
function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();	
			reader.onload = function (e) {
				jQuery('#profile-img-tag').attr('src', e.target.result);
				jQuery("#profile-img-tag").css({"display": "block"});
			}
			reader.readAsDataURL(input.files[0]);
		}
		if (typeof (input.files) != "undefined") {
			var name =input.files[0].name;
            var size = parseFloat(input.files[0].size / 1024).toFixed(2);
            //alert(size + " KB.");
			 //jQuery("#size").html(name+"("+ size + " KB)");
			 jQuery("#remove_btn").show();
		}
	}
jQuery("#profile-img").change(function(){

	readURL(this);

});
//jQuery("#size").html("No file selected");
jQuery("#remove_btn").click(function(){

	jQuery('#profile-img').attr('value', '');
	jQuery('#profile-img-tag').attr('src', '');
	jQuery('#size').html("");
	//jQuery("#size").html("No file selected");
	//if
	var valu = jQuery('#profile-img-tag').attr('src');
	if (valu.length == 0){
		jQuery("#remove_btn").hide();
		jQuery("#profile-img-tag").css({"display": "none"});
		} 

});
		
jQuery("#search_form").hide();
jQuery(".search_form.error_toggle").show();
		
jQuery(".srch_form").click(function(){

    jQuery("#search_form").toggle();

});
