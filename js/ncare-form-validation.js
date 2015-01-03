var p_reg_form = "#patient-reg-form";
var p_reg_fname = "#reg-pat-firstname";
var p_reg_mname = "#reg-pat-middlename";
var p_reg_lname = "#reg-pat-lastname";
var p_reg_bdate = "#reg-pat-birthdate";
var p_reg_gend = "#reg_pat_gender:checked";
var p_reg_addr = "#reg-pat-address";
var p_rel_reg_fname = "#reg-pat-rel-firstname";
var p_rel_reg_lname = "#reg-pat-rel-lastname";
var p_rel_reg_bdate = "#reg-pat-rel-birthdate";
var p_rel_reg_gend = "#reg_pat_rel_gender:checked";
var p_rel_reg_addr = "#reg-pat-rel-address";
var p_rel_reg_email = "#reg-pat-rel-email";
var p_rel_reg_phone = "#reg-pat-rel-phone";
var p_reg_id = "#reg-pat-id";
var p_reg_nurse = "#reg-pat-assigned-nurse";
var p_reg_doctor = "#reg-pat-assigned-doctor";
var p_reg_room = "#reg-pat-assigned-room";
var p_reg_prescription = "#reg-pat-prescription";

var n_reg_form = "#nurse-reg-form";
var n_reg_compid = "#reg-nur-compid";
var n_reg_uname = "#reg-nur-username";
var n_reg_pword = "#reg-nur-password";
var n_reg_fname = "#reg-nur-firstname";
var n_reg_mname = "#reg-nur-middlename";
var n_reg_lname = "#reg-nur-lastname";
var n_reg_bdate = "#reg-nur-birthdate";
var n_reg_gend = "#reg_nur_gender:checked";
var n_reg_addr = "#reg-nur-address";
var n_reg_email = "#reg-nur-email";
var n_reg_phone = "#reg-nur-phone";

var d_reg_form = "#doctor-reg-form";
var d_reg_compid = "#reg-doc-compid";
var d_reg_uname = "#reg-doc-username";
var d_reg_pword = "#reg-doc-password";
var d_reg_fname = "#reg-doc-firstname";
var d_reg_mname = "#reg-doc-middlename";
var d_reg_lname = "#reg-doc-lastname";
var d_reg_bdate = "#reg-doc-birthdate";
var d_reg_gend = "#reg_doc_gender:checked";
var d_reg_addr = "#reg-doc-address";
var d_reg_email = "#reg-doc-email";
var d_reg_phone = "#reg-doc-phone";

var a_reg_form = "#admin-reg-form";
var a_reg_compid = "#reg-adm-compid";
var a_reg_uname = "#reg-adm-username";
var a_reg_pword = "#reg-adm-password";
var a_reg_fname = "#reg-adm-firstname";
var a_reg_mname = "#reg-adm-middlename";
var a_reg_lname = "#reg-adm-lastname";
var a_reg_bdate = "#reg-adm-birthdate";
var a_reg_gend = "#reg_adm_gender:checked";
var a_reg_addr = "#reg-adm-address";
var a_reg_email = "#reg-adm-email";
var a_reg_phone = "#reg-adm-phone";

$(function() {
	$("#login").click(function() {
		// Prepare the form - remove previous errors
		$("#error-msg-username").remove();
		$("#error-msg-password").remove();
		
		var login_type = $("#login-type").text();
		var username = is_empty($("#login-username"));
		var password = is_empty($("#login-password"));
		var err_username = "<span id='error-msg-username' class='tooltip tooltip-left tooltip-danger hide'>" +
								"<span class='icon ic-error ic-small' style='margin-right: 5px'></span>Username is required.</span>";
		var err_password = "<span id='error-msg-password' class='tooltip tooltip-left tooltip-danger hide'>" +
								"<span class='icon ic-error ic-small' style='margin-right: 5px'></span>Password is required.</span>";
		
		if(login_type == "Admin Login") {
			if(password) {
				$("#login-password").after(err_password);
				$("#error-msg-password").fadeIn(300);
				$("#login-form div #login-password").focus();
			}
			
			if(username) {
				$("#login-username").after(err_username);
				$("#error-msg-username").fadeIn(300);
				$("#login-username").focus();
			}
			
			if(!username && !password) {
				$("#login-type").val(login_type);
				return true;
			}
		}
		
		return false;
	});
	
	$("#login-username").keypress(function() {
		$("#error-msg-username").fadeOut(100);
		$("#login-form div").remove("#error-msg-username");
	});
	
	$("#login-password").keypress(function() {
		$("#error-msg-password").fadeOut(100);
		$("#login-form div").remove("#error-msg-password");
	});
	
	/* ------- Patient Registration Form Start -------- */
	$(p_reg_form).submit(function() {
		
		// doctor's prescription
		if(is_empty($(p_reg_prescription)))
			txt_error_state($(p_reg_prescription));
		else
			txt_default_state($(p_reg_prescription));
		
		// assigned room
		if(is_empty($(p_reg_room)))
			txt_error_state($(p_reg_room));
		else
			txt_default_state($(p_reg_room));
		
		// assigned doctor
		if(is_empty($(p_reg_doctor)))
			txt_error_state($(p_reg_doctor));
		else
			txt_default_state($(p_reg_doctor));
		
		// assigned nurse
		if(is_empty($(p_reg_nurse)))
			txt_error_state($(p_reg_nurse));
		else
			txt_default_state($(p_reg_nurse));
		
		// patient id
		if(is_empty($(p_reg_id)))
			txt_error_state($(p_reg_id));
		else
			txt_default_state($(p_reg_id));
		
		// relative's contact number
		if(is_empty($(p_rel_reg_phone)))
			txt_error_state($(p_rel_reg_phone));
		else
			txt_default_state($((p_rel_reg_phone)));
		
		// relative's email
		if(is_empty($(p_rel_reg_email)))
			txt_error_state($(p_rel_reg_email));
		else
			txt_default_state($((p_rel_reg_email)));

		// relative's address
		if(is_empty($(p_rel_reg_addr)))
			txt_error_state($(p_rel_reg_addr));
		else
			txt_default_state($((p_rel_reg_addr)));

		// relative's gender
		if(is_empty($(p_rel_reg_gend)))
			txt_error_state($("#radio-rel-gender"));
		else
			txt_default_state($("#radio-rel-gender"));

		// relative's birthdate
		if(is_empty($(p_rel_reg_bdate)))
			txt_error_state($(p_rel_reg_bdate));
		else
			txt_default_state($(p_rel_reg_bdate));
		
		// relative's lastname
		if(is_empty($(p_rel_reg_lname)))
			txt_error_state($(p_rel_reg_lname));
		else
			txt_default_state($((p_rel_reg_lname)));
		
		// relative's firstname 
		if(is_empty($(p_rel_reg_fname)))
			txt_error_state($(p_rel_reg_fname));
		else
			txt_default_state($((p_rel_reg_fname)));

		// address
		if(is_empty($(p_reg_addr)))
			txt_error_state($(p_reg_addr));
		else
			txt_default_state($(p_reg_addr));
		
		// gender
		if(is_empty($(p_reg_gend)))
			txt_error_state($("#radio-gender"));
		else
			txt_default_state($("#radio-gender"));
		
		// birthdate
		if(is_empty($(p_reg_bdate)))
			txt_error_state($(p_reg_bdate));
		else
			txt_default_state($(p_reg_bdate));
		
		// lastname
		if(is_empty($(p_reg_lname)))
			txt_error_state($(p_reg_lname));
		else
			txt_default_state($(p_reg_lname));
		
		// middlename
		if(is_empty($(p_reg_mname)))
			txt_error_state($(p_reg_mname));
		else
			txt_default_state($(p_reg_mname));
		
		// firstname
		if(is_empty($(p_reg_fname))) {
			txt_error_state($(p_reg_fname));
		}
		else
			txt_default_state($(p_reg_fname));
		
		if(!is_empty($(p_reg_fname)) && !is_empty($(p_reg_mname)) && !is_empty($(p_reg_lname)) && !is_empty($(p_reg_bdate))
				&& !is_empty($(p_reg_gend))	&& !is_empty($(p_reg_addr))	&& !is_empty($(p_rel_reg_fname)) && !is_empty($(p_rel_reg_lname))
				&& !is_empty($(p_rel_reg_bdate)) && !is_empty($(p_rel_reg_gend)) && !is_empty($(p_rel_reg_addr)) && !is_empty($(p_rel_reg_email))
				&& !is_empty($(p_rel_reg_phone)) && !is_empty($(p_reg_id)) && !is_empty($(p_reg_nurse)) && !is_empty($(p_reg_doctor))
				&& !is_empty($(p_reg_room)) && !is_empty($(p_reg_prescription))) {
			return true;
		}
		
		
		return false;
	});
	
	$(p_reg_fname).keypress(function() {
		txt_default_state($(p_reg_fname));
	});
	$(p_reg_mname).keypress(function() {
		txt_default_state($(p_reg_mname));
	});
	$(p_reg_lname).keypress(function() {
		txt_default_state($(p_reg_lname));
	});
	$(p_reg_bdate).change(function() {
		txt_default_state($(p_reg_bdate));
	});
	$("input[name='reg_pat_gender']").change(function() {
		txt_default_state($("#radio-gender"));
	});
	$(p_reg_addr).keypress(function() {
		txt_default_state($(p_reg_addr));
	});
	$(p_rel_reg_fname).keypress(function() {
		txt_default_state($(p_rel_reg_fname));
	});
	$(p_rel_reg_lname).keypress(function() {
		txt_default_state($(p_rel_reg_lname));
	});
	$(p_rel_reg_bdate).change(function() {
		txt_default_state($(p_rel_reg_bdate));
	});
	$("input[name='reg_pat_rel_gender']").change(function() {
		txt_default_state($("#radio-rel-gender"));
	});
	$(p_rel_reg_addr).keypress(function() {
		txt_default_state($(p_rel_reg_addr));
	});
	$(p_rel_reg_email).keypress(function() {
		txt_default_state($(p_rel_reg_email));
	});
	$(p_rel_reg_phone).keypress(function() {
		txt_default_state($(p_rel_reg_phone));
	});
	$(p_reg_id).keypress(function() {
		txt_default_state($(p_reg_id));
	});
	$(p_reg_nurse).keypress(function() {
		txt_default_state($(p_reg_nurse));
	});
	$(p_reg_doctor).keypress(function() {
		txt_default_state($(p_reg_doctor));
	});
	$(p_reg_room).keypress(function() {
		txt_default_state($(p_reg_room));
	});
	$(p_reg_prescription).keypress(function() {
		txt_default_state($(p_reg_prescription));
	});
	/* ------- Patient Registration Form End -------- */
	
	/* ------- Nurse Registration Form Start -------- */	
	$(n_reg_form).submit(function() {
		if(is_empty($(n_reg_phone)))
			txt_error_state($(n_reg_phone));
		else
			txt_default_state($(n_reg_phone));
		
		if(is_empty($(n_reg_email)))
			txt_error_state($(n_reg_email));
		else
			txt_default_state($(n_reg_email));
			
		if(is_empty($(n_reg_addr)))
			txt_error_state($(n_reg_addr));
		else
			txt_default_state($(n_reg_addr));
		
		if(is_empty($(n_reg_gend)))
			txt_error_state($("#nur-radio-gender"));
		else
			txt_default_state($("#nur-radio-gender"));
		
		if(is_empty($(n_reg_bdate)))
			txt_error_state($(n_reg_bdate));
		else
			txt_default_state($(n_reg_bdate));
		
		if(is_empty($(n_reg_lname)))
			txt_error_state($(n_reg_lname));
		else
			txt_default_state($(n_reg_lname));
		
		if(is_empty($(n_reg_mname)))
			txt_error_state($(n_reg_mname));
		else
			txt_default_state($(n_reg_mname));
		
		if(is_empty($(n_reg_fname)))
			txt_error_state($(n_reg_fname));
		else
			txt_default_state($(n_reg_fname));

		/*if(is_empty($(n_reg_pword)))
			txt_error_state($(n_reg_pword));
		else
			txt_default_state($(n_reg_pword));

		if(is_empty($(n_reg_uname)))
			txt_error_state($(n_reg_uname));
		else
			txt_default_state($(n_reg_uname));*/
		
		if(is_empty($(n_reg_compid)))
			txt_error_state($(n_reg_compid));
		else
			txt_default_state($(n_reg_compid));

		if(!is_empty($(n_reg_compid)) && !is_empty($(n_reg_uname)) && !is_empty($(n_reg_pword)) && !is_empty($(n_reg_fname))
			&& !is_empty($(n_reg_mname)) && !is_empty($(n_reg_lname)) && !is_empty($(n_reg_bdate)) && !is_empty($(n_reg_gend))
			&& !is_empty($(n_reg_addr)) && !is_empty($(n_reg_email)) && !is_empty($(n_reg_phone))) {
			return true;
		}
		
		
		return false;
	});

	$(n_reg_compid).keypress(function() {
		txt_default_state($(n_reg_compid));
	});
	$(n_reg_compid).keyup(function() {
		$(n_reg_uname).val($(n_reg_compid).val());
		$(n_reg_pword).val($(n_reg_compid).val());
	});
	$(n_reg_compid).change(function() {
		$(n_reg_uname).val($(n_reg_compid).val());
		$(n_reg_pword).val($(n_reg_compid).val());
	});
	/*$(n_reg_uname).keypress(function() {
		txt_default_state($(n_reg_uname));
	});
	$(n_reg_pword).keypress(function() {
		txt_default_state($(n_reg_pword));
	});*/
	$(n_reg_fname).keypress(function() {
		txt_default_state($(n_reg_fname));
	});
	$(n_reg_mname).keypress(function() {
		txt_default_state($(n_reg_mname));
	});
	$(n_reg_lname).keypress(function() {
		txt_default_state($(n_reg_lname));
	});
	$(n_reg_bdate).change(function() {
		txt_default_state($(n_reg_bdate));
	});
	$("input[name='reg_nur_gender']").change(function() {
		txt_default_state($("#nur-radio-gender"));
	});
	$(n_reg_addr).keypress(function() {
		txt_default_state($(n_reg_addr));
	});
	$(n_reg_email).keypress(function() {
		txt_default_state($(n_reg_email));
	});
	$(n_reg_phone).keypress(function() {
		txt_default_state($(n_reg_phone));
	});
	
	/* ------- Nurse Registration Form End -------- */

	/* ------- Doctor Registration Form Start -------- */
	$(d_reg_form).submit(function() {
		if(is_empty($(d_reg_phone)))
			txt_error_state($(d_reg_phone));
		else
			txt_default_state($(d_reg_phone));

		if(is_empty($(d_reg_email)))
			txt_error_state($(d_reg_email));
		else
			txt_default_state($(d_reg_email));

		if(is_empty($(d_reg_addr)))
			txt_error_state($(d_reg_addr));
		else
			txt_default_state($(d_reg_addr));

		if(is_empty($(d_reg_gend)))
			txt_error_state($("#doc-radio-gender"));
		else
			txt_default_state($("#doc-radio-gender"));

		if(is_empty($(d_reg_bdate)))
			txt_error_state($(d_reg_bdate));
		else
			txt_default_state($(d_reg_bdate));

		if(is_empty($(d_reg_lname)))
			txt_error_state($(d_reg_lname));
		else
			txt_default_state($(d_reg_lname));

		if(is_empty($(d_reg_mname)))
			txt_error_state($(d_reg_mname));
		else
			txt_default_state($(d_reg_mname));

		if(is_empty($(d_reg_fname)))
			txt_error_state($(d_reg_fname));
		else
			txt_default_state($(d_reg_fname));

		if(is_empty($(d_reg_compid))) {
			txt_error_state($(d_reg_compid));
		}
		else
			txt_default_state($(d_reg_compid));

		if(!is_empty($(d_reg_compid)) && !is_empty($(d_reg_fname)) && !is_empty($(d_reg_mname))
			&& !is_empty($(d_reg_lname)) && !is_empty($(d_reg_bdate)) && !is_empty($(d_reg_gend)) && !is_empty($(d_reg_addr))
			&& !is_empty($(d_reg_email)) && !is_empty($(d_reg_phone))) {
			return true;
		}

		return false;
	});

	$(d_reg_compid).keypress(function() {
		txt_default_state($(d_reg_compid));
	});
	$(d_reg_compid).keyup(function() {
		$(d_reg_uname).val($(d_reg_compid).val());
		$(d_reg_pword).val($(d_reg_compid).val());
	});
	$(d_reg_compid).change(function() {
		$(d_reg_uname).val($(d_reg_compid).val());
		$(d_reg_pword).val($(d_reg_compid).val());
	});
	$(d_reg_fname).keypress(function() {
		txt_default_state($(d_reg_fname));
	});
	$(d_reg_mname).keypress(function() {
		txt_default_state($(d_reg_mname));
	});
	$(d_reg_lname).keypress(function() {
		txt_default_state($(d_reg_lname));
	});
	$(d_reg_bdate).change(function() {
		txt_default_state($(d_reg_bdate));
	});
	$("input[name='reg_doc_gender']").change(function() {
		txt_default_state($("#doc-radio-gender"));
	});
	$(d_reg_addr).keypress(function() {
		txt_default_state($(d_reg_addr));
	});
	$(d_reg_email).keypress(function() {
		txt_default_state($(d_reg_email));
	});
	$(d_reg_phone).keypress(function() {
		txt_default_state($(d_reg_phone));
	});
	/* ------- Doctor Registration Form End -------- */

	/* ------- Admin Registration Form Start -------- */
	$(a_reg_form).submit(function() {
		if(is_empty($(a_reg_phone)))
			txt_error_state($(a_reg_phone));
		else
			txt_default_state($(a_reg_phone));

		if(is_empty($(a_reg_email)))
			txt_error_state($(a_reg_email));
		else
			txt_default_state($(a_reg_email));

		if(is_empty($(a_reg_addr)))
			txt_error_state($(a_reg_addr));
		else
			txt_default_state($(a_reg_addr));

		if(is_empty($(a_reg_gend)))
			txt_error_state($("#adm-radio-gender"));
		else
			txt_default_state($("#adm-radio-gender"));

		if(is_empty($(a_reg_bdate)))
			txt_error_state($(a_reg_bdate));
		else
			txt_default_state($(a_reg_bdate));

		if(is_empty($(a_reg_lname)))
			txt_error_state($(a_reg_lname));
		else
			txt_default_state($(a_reg_lname));

		if(is_empty($(a_reg_mname)))
			txt_error_state($(a_reg_mname));
		else
			txt_default_state($(a_reg_mname));

		if(is_empty($(a_reg_fname)))
			txt_error_state($(a_reg_fname));
		else
			txt_default_state($(a_reg_fname));

		if(is_empty($(a_reg_compid)))
			txt_error_state($(a_reg_compid));
		else
			txt_default_state($(a_reg_compid));

		if(!is_empty($(a_reg_compid)) && !is_empty($(a_reg_fname)) && !is_empty($(a_reg_mname)) && !is_empty($(a_reg_lname)) && !is_empty($(a_reg_bdate))
			&& !is_empty($(a_reg_gend)) && !is_empty($(a_reg_addr)) && !is_empty($(a_reg_email)) && !is_empty($(a_reg_phone))) {
			return true;
		}

		return false;
	});

	$(a_reg_compid).keypress(function() {
		txt_default_state($(a_reg_compid));
	});
	$(a_reg_compid).keyup(function() {
		$(a_reg_uname).val($(a_reg_compid).val());
		$(a_reg_pword).val($(a_reg_compid).val());
	});
	$(a_reg_compid).change(function() {
		$(a_reg_uname).val($(a_reg_compid).val());
		$(a_reg_pword).val($(a_reg_compid).val());
	});
	$(a_reg_fname).keypress(function() {
		txt_default_state($(a_reg_fname));
	});
	$(a_reg_mname).keypress(function() {
		txt_default_state($(a_reg_mname));
	});
	$(a_reg_lname).keypress(function() {
		txt_default_state($(a_reg_lname));
	});
	$(a_reg_bdate).change(function() {
		txt_default_state($(a_reg_bdate));
	});
	$("input[name='reg_adm_gender']").change(function() {
		txt_default_state($("#adm-radio-gender"));
	});
	$(a_reg_addr).keypress(function() {
		txt_default_state($(a_reg_addr));
	});
	$(a_reg_email).keypress(function() {
		txt_default_state($(a_reg_email));
	});
	$(a_reg_phone).keypress(function() {
		txt_default_state($(a_reg_phone));
	});
	/* ------- Admin Registration Form End -------- */
});

function is_empty(element) {
	var val = $.trim(element.val());
	if(val == null || val == "" || val == undefined) {
		return true;
	}
	
	return false;
}

function txt_error_state(element) {
	element.removeClass("txt-white");
	element.addClass("txt-red").fadeOut(300).fadeIn(300);
	element.focus();
}

function txt_default_state(element) {
	element.addClass("txt-white");
	element.removeClass("txt-red");
}