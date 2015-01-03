<?php
	class _admin extends CI_Model {

		public function add_admin($company_id, $new_admin) {
			$this->db->insert('user', $new_admin);
			$this->db->insert('admin', array('admin_id' => uniqid(), 'company_id' => $company_id, 'admin_info' => $new_admin['user_id']));
		}
		
	}