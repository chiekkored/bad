<?php
	class Users extends CI_Controller{
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('username', 'Userame', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}else{
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				$this->session->set_flashdata('user_registered', 'You are now registered');
				
				redirect('posts');
			}
		}

		public function registerdoctor(){
			$data['title'] = 'Doctor Sign Up';

			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('username', 'Userame', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
			$data['doctor_expertise'] = $this->user_model->get_expertise();

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/registerdoctor', $data);
				$this->load->view('templates/footer');
			}else{
				$enc_password = md5($this->input->post('password'));

				$config['upload_path'] = './assets/resume/';
				$config['allowed_types'] = 'pdf';
				$this->load->library('upload', $config);
				$data = array('upload_data' => $this->upload->data());
				$resume = $_FILES['userfile']['name'];

				$this->user_model->registerdoctor($enc_password, $resume);

				$this->session->set_flashdata('user_registered', 'You are now registered');
				
				redirect('posts');
			}
		}

		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{

				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));

				$user_id = $this->user_model->login($username, $password);
				if ($user_id->num_rows() > 0) {
					$data = $user_id->row_array();
					$user_role = $data['user_role'];
					$id = $data['user_id'];


					if ($user_id) {
						$user_data = array(
							'user_id' => $user_id,
							'id' => $id,
							'username' => $username,
							'logged_in' => true
						);

					$this->session->set_userdata($user_data);
					if ($user_role == 'Patient') {
						$this->session->set_flashdata('user_loggedin', 'You are now logged in');
					
						redirect('posts');
					}else if($user_role == 'Doctor'){
						$this->session->set_flashdata('user_loggedin', 'You are now logged in');
					
						redirect('posts/dashboard');
					}

					
					}else{
						$this->session->set_flashdata('login_failed', 'Login invalid');
					
					redirect('users/login');
					}
				}
			}
		}


		public function logout(){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('users/login');
		}


		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken');
			if ($this->user_model->check_username_exists($username)) {
				return true;
			}else{
				return false;
			}
		}

		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken');
			if ($this->user_model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}

		public function doctors(){
			
			$data['categories'] = $this->post_model->get_categories();
			$this->load->view('templates/header');
			$this->load->view('users/doctors', $data);
			$this->load->view('templates/footer');
		}
	}