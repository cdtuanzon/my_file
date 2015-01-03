var nav = ".header-container nav ul.navigation li a";
var dropdown_login = "#dropdown-login button";
var dropdown_login_opt = "#dropdown-login ul";
var login_form = "#login-form";
var login_close = "#login-close";

$(function() {
	// Navigation Indicator
	$(nav).click(function () {
		$(nav).removeClass("active");
		$(this).addClass("active");
	});

	$(dropdown_login).focus(function () {
		$(this).addClass("clicked");
		$(dropdown_login_opt).slideDown(100);
	});

	$("#dropdown-login button").focusout(function () {
		$(this).removeClass("clicked");
		$(dropdown_login_opt).slideUp(100);
	});
	
	$(login_close).click(function () {
		$(login_form).hide(300);
		$("#login-username").val("");
		$("#login-password").val("");
		$("#error-msg-username").remove();
		$("#error-msg-password").remove();
		$(dropdown_login).removeClass("selected");
	});
	
	$("#login-type-patient").mousedown(function() {
		$(login_form).slideDown(300);
		$("#login-form #login-type").text("Patient Login");
		$(dropdown_login).addClass("selected");
	});
	
	$("#login-type-nurse").mousedown(function() {
		$(login_form).slideDown(300);
		$("#login-form #login-type").text("Nurse Login");
		$(dropdown_login).addClass("selected");
	});
	
	$("#login-type-doctor").mousedown(function() {
		$(login_form).slideDown(300);
		$("#login-form #login-type").text("Doctor Login");
		$(dropdown_login).addClass("selected");
	});
	
	$("#login-type-admin").mousedown(function() {
		$(login_form).slideDown(300);
		$("#login-form #login-type").text("Admin Login");
		$(dropdown_login).addClass("selected");
	});
	
	$("#logout-user").mousedown(function() {
		localStorage.removeItem('usertype');
		window.location = "logout";
	});
	
	/* Control Panel */
	$(".ctrl").click(function() {
		$(".ctrl").parent().removeClass("selected");
		$(this).parent().addClass("selected");
		
		var usertype_selected = $(this).text();
		localStorage['usertype'] = usertype_selected;
		
		if(localStorage['usertype'] == "Patients") {
			$("#patient-panel").show();
			$("#patient-reg-form input:first").focus();
			$("#nurse-panel").hide();
			$("#doctor-panel").hide();
			$("#admin-panel").hide();
		}
		else if(localStorage['usertype'] == "Nurses") {
			$("#patient-panel").hide();
			$("#nurse-panel").show();
			$("#nurse-reg-form input:first").focus();
			$("#doctor-panel").hide();
			$("#admin-panel").hide();
		}
		else if(localStorage['usertype'] == "Doctors") {
			$("#patient-panel").hide();
			$("#nurse-panel").hide();
			$("#doctor-panel").show();
			$("#doctor-reg-form input:first").focus();
			$("#admin-panel").hide();
		}
		else if(localStorage['usertype'] == "Admins") {
			$("#patient-panel").hide();
			$("#nurse-panel").hide();
			$("#doctor-panel").hide();
			$("#admin-panel").show();
			$("#admin-reg-form input:first").focus();
		}
	});
	
	if(localStorage['usertype'] == "Patients") {
		$("#patient-panel").show();
		$("#type-pat").addClass("selected");
		$("#nurse-panel").hide();
		$("#type-nur").removeClass("selected");
		$("#doctor-panel").hide();
		$("#type-doc").removeClass("selected");
		$("#admin-panel").hide();
		$("#type-amd").removeClass("selected");
	}
	else if(localStorage['usertype'] == "Nurses") {
		$("#patient-panel").hide();
		$("#type-pat").removeClass("selected");
		$("#nurse-panel").show();
		$("#type-nur").addClass("selected");
		$("#doctor-panel").hide();
		$("#type-doc").removeClass("selected");
		$("#admin-panel").hide();
		$("#type-amd").removeClass("selected");
	}
	else if(localStorage['usertype'] == "Doctors") {
		$("#patient-panel").hide();
		$("#type-pat").removeClass("selected");
		$("#nurse-panel").hide();
		$("#type-nur").removeClass("selected");
		$("#doctor-panel").show();
		$("#type-doc").addClass("selected");
		$("#admin-panel").hide();
		$("#type-amd").removeClass("selected");
	}
	else if(localStorage['usertype'] == "Admins") {
		$("#patient-panel").hide();
		$("#type-pat").removeClass("selected");
		$("#nurse-panel").hide();
		$("#type-nur").removeClass("selected");
		$("#doctor-panel").hide();
		$("#type-doc").removeClass("selected");
		$("#admin-panel").show();
		$("#type-amd").addClass("selected");
	}

	$("#reg-pat-assigned-nurse").keyup(function() {
		$("#nurse-names").html("");
		var nurse_name = $.trim($(this).val());
		if(nurse_name != "") {
			$.post("http://localhost/ncare_v2/main/get_nurse_names", {key: nurse_name}, function(data) {
				// var nurse = jQuery.parseJSON("'" + data + "'");
				var nurse = jQuery.parseJSON(data);
				var option = "";
				$(nurse).each(function(i) {
					option += "<option value='" + nurse[i].firstname + " " + nurse[i].lastname + "'>";
				});
				$("#nurse-names").html(option);
			});
		}
	});
});