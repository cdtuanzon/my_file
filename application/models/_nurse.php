<?php
	class _nurse extends CI_Model {

		public function add_nurse($company_id, $new_nurse) {
			$this->db->insert('user', $new_nurse);
			$this->db->insert('nurse', array('nurse_id' => uniqid(), 'company_id' => $company_id, 'nurse_info' => $new_nurse['user_id']));
		}

		public function get_name($key) {
			return $this->db->query("SELECT * 
									FROM nurse JOIN user ON nurse.nurse_info = user.user_id 
									WHERE user.firstname LIKE '%$key%' OR user.middlename LIKE '%$key%' OR user.lastname LIKE '%$key%'");
		}
		
	}