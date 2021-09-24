// sticky effect
	$(window).on('scroll', function () {
		var menu_area = $('.navbar');
		if ($(window).scrollTop() > 10) {
			menu_area.addClass('sticky_navigation');
		} else {
			menu_area.removeClass('sticky_navigation');
		}
	});
	// sticky effect end


	// menu-icon change to cross 
$(document).ready(function(){
		$('.fa-bars').click(function(){
			$(this).hide() && $('.fa-times').show();
		});
		$('.fa-times').click(function(){
			$(this).hide() && $('.fa-bars').show();
		});
	});
// menu-icon change to end 

function submitToAPI(e) {
	e.preventDefault();
	var URL = "https://fvieuv7tyf.execute-api.us-east-1.amazonaws.com/contact-us";

		 var Namere = /[A-Za-z]{1}[A-Za-z]/;
		 if (!Namere.test($("#first-name-input").val())) {
					  alert ("First name can not less than 2 char");
			 return;
		 }
		 if (!Namere.test($("#last-name-input").val())) {
			alert ("Last name can not less than 2 char");
			return;
		}
		 if ($("#email-input").val()=="") {
			 alert ("Please enter your email id");
			 return;
		 }

		 var reeamil = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
		 if (!reeamil.test($("#email-input").val())) {
			 alert ("Please enter valid email address");
			 return;
		 }
	
	var name = $("#first-name-input").val() + " " + $("#last-name-input").val();
	var email = $("#email-input").val();
	var desc = $("#description-input").val();
	var data = {
	   name : name,
	   email : email,
	   desc : desc
	 };

	$.ajax({
	  type: "POST",
	  url : URL,
	  dataType: "json",
	  crossDomain: "true",
	  contentType: "application/json; charset=utf-8",
	  data: JSON.stringify(data),

	  
	  success: function () {
		// clear form and show a success message
		alert("Successfull");
		document.getElementById("contact-form").reset();
	location.reload();
	  },
	  error: function () {
		// show an error message
		alert("UnSuccessfull");
	  }});
  }


