<?php
	class _user extends CI_Model {
		public function get_user($logintype, $user_id) {
			return $this->db->query("SELECT * FROM $logintype JOIN user ON $logintype.{$logintype}_info = user.user_id WHERE $logintype.{$logintype}_info='$user_id'");
			/* return $this->db->get_where('user', array('user_id' => $userid))->result(); */
		}
		
		public function get_users($usertype) {
			return $this->db->query("SELECT * FROM $usertype JOIN user ON $usertype.{$usertype}_info = user.user_id");
		}

		public function is_username_taken($username) {
			return $this->db->get_where('user', array('username' => $username))->num_rows() == 1;
		}
		
		public function verify_login($logintype, $username, $password) {
			$acct_result = $this->db->get_where('user', array('username' => $username, 'password' => $password));
			
			if($acct_result->num_rows() == 1) {
				$user = $this->db->query("SELECT * FROM $logintype WHERE {$logintype}_info='{$acct_result->result()[0]->user_id}'");
				if($user->num_rows() == 1) {
					return $acct_result->result()[0]->user_id;
				}
				else {
					// login account is not registered with the given login type
					return "WRONG LOGIN TYPE";
				}
			}
			else {
				// login account is not registered
				return "UNREGISTERED ACCOUNT";
			}
			
		}

		public function login($user_id) {
			$this->db->update('user', array('active' => TRUE), array('user_id' => $user_id));
		}

		public function logout($user_id) {
			$this->db->update('user', array('active' => FALSE), array('user_id' => $user_id));
		}
		
		public function isempty() {
			return $this->db->get('user')->num_rows() == 0;			
		}
	}