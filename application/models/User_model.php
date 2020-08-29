<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'number' => $this->input->post('number'),
				'password' => $enc_password,
				'city' => $this->input->post('city'),
				'user_role' => $this->input->post('user_role')
			);
			return $this->db->insert('users', $data);
		}

		public function registerdoctor($enc_password, $resume){
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'number' => $this->input->post('number'),
				'password' => $enc_password,
				'city' => $this->input->post('city'),
				'user_role' => $this->input->post('user_role'),
				'de_id' => $this->input->post('de_id'),
				'resume' => $resume
			);

			return $this->db->insert('users', $data);
		}

		public function login($username, $password){
			$this->db->where('username', $username);
			$this->db->where('password', $password);


			$result = $this->db->get('users');

			return $result;
		}


		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));
			if (empty($query->row_array())) {
				return true;
			}else{
				return false;
			}
		}

		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if (empty($query->row_array())) {
				return true;
			}else{
				return false;
			}
		}

		public function get_expertise(){
			$this->db->order_by('name');
			$query = $this->db->get('doctor_expertise');
			return $query->result_array();
		}

		public function all_doctors(){
			$query = $this->db->get_where('users', array('user_role' => "Doctor"));
			return $query;
		}
	}