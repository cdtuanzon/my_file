<?php
	class _doctor extends CI_Model {

		public function add_doctor($company_id, $new_doctor) {
			$this->db->insert('user', $new_doctor);
			$this->db->insert('doctor', array('doctor_id' => uniqid(), 'company_id' => $company_id, 'doctor_info' => $new_doctor['user_id']));
		}
		
	}