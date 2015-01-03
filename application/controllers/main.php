<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function Main() {
		parent :: __construct();
	}
	
	public function index() {
		$this->load->view("header", array("is_home_selected" => FALSE,
										"is_aboutus_selected" => FALSE,
										"is_contact_selected" => FALSE,
										"is_controlpanel_selected" => FALSE,
										"session" => $this->session));
		$this->load->view("footer");
	}
	
	public function home() {
		$this->load->view("header", array("is_home_selected" => TRUE, 
										"is_aboutus_selected" => FALSE, 
										"is_contact_selected" => FALSE,
										"is_controlpanel_selected" => FALSE,
										"session" => $this->session));
		$this->load->view("content-home");
		$this->load->view("footer");
	}
	
	public function about_us() {
		$this->load->view("header", array("is_home_selected" => FALSE,
										"is_aboutus_selected" => TRUE,
										"is_contact_selected" => FALSE,
										"is_controlpanel_selected" => FALSE,
										"session" => $this->session));
		$this->load->view("content-about-us");
		$this->load->view("footer");
	}
	
	public function contact() {
		$this->load->view("header", array("is_home_selected" => FALSE,
										"is_aboutus_selected" => FALSE,
										"is_contact_selected" => TRUE,
										"is_controlpanel_selected" => FALSE,
										"session" => $this->session));
		$this->load->view("content-contact");
		$this->load->view("footer");
	}
	
	public function user_management() {
		if($this->session->userdata("is_active")) {
			$this->load->view("header", array("is_home_selected" => FALSE,
											"is_aboutus_selected" => FALSE,
											"is_contact_selected" => FALSE,
											"is_controlpanel_selected" => TRUE,
											"session" => $this->session));
			
			$this->load->view("content-controlpanel", array("is_patients_selected" => FALSE,
											"is_nurses_selected" => FALSE,
											"is_doctors_selected" => FALSE,
											"is_admins_selected" => FALSE,
											"nurses" => $this->disp_users("nurse"),
											"doctors" => $this->disp_users("doctor"),
											"admins" => $this->disp_users("admin")));
			$this->load->view("footer");
		}
		else {
			redirect();
		}
	}
	
	public function login_verification() {
		$login_type = $this->input->post("login-type");

		switch ($login_type) {
			case "Patient Login": $login_type = "patient";
				break;
				
			case "Nuse Login": $login_type = "nurse";
				break;
				
			case "Doctor Login": $login_type = "doctor";
				break;
				
			case "Admin Login": $login_type = "admin";
				break;
				
			default: break;
		}
		
		$username = $this->input->post("login-username");
		$password = $this->input->post("login-password");
		
		$user_id = $this->_user->verify_login($login_type, $username, $password);
		
		switch ($user_id) {
			case "WRONG LOGIN TYPE":
				echo "Oops! You don't have a $login_type type account.
					<a href='".base_url()."'>Back</a>";
				break;
			case "UNREGISTERED ACCOUNT":
				echo "You've typed in an unregistered account.
					<a href='".base_url()."'>Back</a>";
				break;
			default:
				// get user information
				$user = $this->_user->get_user($login_type, $user_id)->result()[0];
				// login the user to the database and to the session
				$this->login($user); 
				redirect("main/home");
		}
	}
	
	public function login($user) {
		$this->_user->login($user->user_id);
		$this->session->sess_create();	// creating the session
		$this->session->set_userdata($this->create_session_data($user)); // setting the user data needed
	}
	
	public function logout() {
		$this->_user->logout($this->session->userdata("user_id"));
		$this->session->sess_destroy();
		redirect();
	}
	
	private function create_session_data($user_info, $usertype) {
		$sess_data = array(
			"user_id" => $user_info->user_id,
			"username" => $user_info->username,
			"usertype" => $usertype,
			"firstname" => $user_info->firstname,
			"lastname" => $user_info->lastname,
			"is_active" => TRUE
		);
		return $sess_data;
	}
	
	public function get_patients() {
		$patients = $this->_user->get_users("patient");
		
		if($patients->num_rows() == 0) {
			return $patients;
		}
		
		return FALSE;
	}
	
	public function get_nurses() {
		$nurses = $this->_user->get_users("nurse");
		
		if($nurses->num_rows() > 0) {
			return $nurses;
		}
		
		return FALSE;
	}
	
	public function get_doctors() {
		$doctors = $this->_user->get_users("nurse");
		
		if($doctors->num_rows() > 0) {
			return $doctors;
		}
		
		return FALSE;
	}
	
	public function get_admins() {
		$admins = $this->_user->get_users("nurse");
		
		if($admins->num_rows() > 0) {
			return $admins;
		}
		
		return FALSE;
	}
	
	public function reg_patient() {
		/* 
		 * Upon adding a new patient to the record:
		 * > Patient's personal and guardian's information about the patient will be stored in User table 
		 * > Admission information will be stored in Patient table
		 * > The relationship information between patient and the guardian will stored in Patient_guardian table
		 */
		
		// Patient's personal information
		$user_id = uniqid();
		$reg_pat_firstname = $this->input->post("reg-pat-firstname");
		$reg_pat_middlename = $this->input->post("reg-pat-middlename");
		$reg_pat_lastname = $this->input->post("reg-pat-lastname");
		$reg_pat_birthdate = $this->input->post("reg-pat-birthdate");
		$reg_pat_gender = $this->input->post("reg-pat-gender");
		$reg_pat_address = $this->input->post("reg-pat-address");
		
		// Relative/Guardian's Information
		$reg_pat_rel_firstname = $this->input->post("reg-pat-rel-firstname");
		$reg_pat_rel_lastname = $this->input->post("reg-pat-rel-lastname");
		$reg_pat_rel_birthdate = $this->input->post("reg-pat-rel-birthdate");
		$reg_pat_rel_gender = $this->input->post("reg-pat-rel-gender"); 
		$reg_pat_rel_address = $this->input->post("reg-pat-rel-address"); 
		$reg_pat_rel_email = $this->input->post("reg-pat-rel-email"); 
		$reg_pat_rel_phone = $this->input->post("reg-pat-rel-phone");
		$reg_pat_rel_fax = $this->input->post("reg-pat-rel-fax");
		
		// Admission Information
		$reg_pat_id = $this->input->post("reg-pat-id");
		$hidden_reg_pat_assigned_nurse = $this->input->post("hidden-reg-pat-assigned-nurse");
		$hidden_reg_pat_assigned_doctor = $this->input->post("hidden-reg-pat-assigned-doctor");
		$reg_pat_assigned_room = $this->input->post("reg-pat-assigned-room");
		$reg_pat_prescription = $this->input->post("reg-pat-prescription");
		redirect("main/user_management");
	}

	public function reg_nurse() {
		$company_id = $this->input->post("reg-nur-compid");
		$new_nurse = array(
				'user_id' => uniqid(),
				'username' => $this->input->post("reg-nur-username"),
				'password' => $this->input->post("reg-nur-password"),
				'firstname' => $this->input->post("reg-nur-firstname"),
				'middlename' => $this->input->post("reg-nur-middlename"),
				'lastname' => $this->input->post("reg-nur-lastname"),
				'birthdate' => $this->input->post("reg-nur-birthdate"),
				'gender' => $this->input->post("reg_nur_gender"),
				'address' => $this->input->post("reg-nur-address"),
				'email' => $this->input->post("reg-nur-email"),
				'phone' => $this->input->post("reg-nur-phone"),
				'fax' => $this->input->post("reg-nur-fax"),
				'active' => FALSE
			);
		$this->_nurse->add_nurse($company_id, $new_nurse);
		redirect("main/user_management");
	}

	public function reg_doctor() {
		$company_id = $this->input->post("reg-doc-compid");
		$new_doctor = array(
				'user_id' => uniqid(),
				'username' => $this->input->post("reg-doc-username"),
				'password' => $this->input->post("reg-doc-password"),
				'firstname' => $this->input->post("reg-doc-firstname"),
				'middlename' => $this->input->post("reg-doc-middlename"),
				'lastname' => $this->input->post("reg-doc-lastname"),
				'birthdate' => $this->input->post("reg-doc-birthdate"),
				'gender' => $this->input->post("reg_doc_gender"),
				'address' => $this->input->post("reg-doc-address"),
				'email' => $this->input->post("reg-doc-email"),
				'phone' => $this->input->post("reg-doc-phone"),
				'fax' => $this->input->post("reg-doc-fax"),
				'active' => FALSE
			);
		$this->_doctor->add_doctor($company_id, $new_doctor);
		redirect("main/user_management");
	}

	public function reg_admin() {
		$company_id = $this->input->post("reg-adm-compid");
		$new_admin = array(
				'user_id' => uniqid(),
				'username' => $this->input->post("reg-adm-username"),
				'password' => $this->input->post("reg-adm-password"),
				'firstname' => $this->input->post("reg-adm-firstname"),
				'middlename' => $this->input->post("reg-adm-middlename"),
				'lastname' => $this->input->post("reg-adm-lastname"),
				'birthdate' => $this->input->post("reg-adm-birthdate"),
				'gender' => $this->input->post("reg_adm_gender"),
				'address' => $this->input->post("reg-adm-address"),
				'email' => $this->input->post("reg-adm-email"),
				'phone' => $this->input->post("reg-adm-phone"),
				'fax' => $this->input->post("reg-adm-fax"),
				'active' => false
			);
		$this->_admin->add_admin($company_id, $new_admin);
		redirect("main/user_management");
	}

	public function disp_users($usertype) {
		return $this->_user->get_users($usertype);
	}
	
	public function get_nurse_names() {
		$key = mysql_real_escape_string(trim($this->input->post('key')));
		if(!empty($key)) {
			$names = $this->_nurse->get_name($key);

			if($names->num_rows() > 0) {
				echo json_encode($names->result_array());
			}
		}
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */