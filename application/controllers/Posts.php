<?php
	class Posts extends CI_Controller{
		public function index(){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}


			$data['posts'] = $this->post_model->get_posts();

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function dashboard(){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}


			$data['posts'] = $this->post_model->get_postsdoctor();

			$this->load->view('templates/header');
			$this->load->view('posts/dashboard', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Create Appointment';
			$data['categories'] = $this->post_model->get_categories();
			$data['doctor_expertise'] = $this->post_model->get_expertise();

			$this->form_validation->set_rules('scheddate', 'Schedule', 'required');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			}else{
				$this->post_model->create_post();

				$this->session->set_flashdata('post_created', 'Your post has been created');
				redirect('posts');
			}
		}

		public function get_doctor(){
			$de_id = $this->input->post('de_id');
			$docs = $this->post_model->get_doctor($de_id);
			if (count($docs)>0) {
				$pro_select_box = '';
				$pro_select_box .= '<option value="">Select Doctor</option>';
				foreach ($docs as $doctors) {
					$pro_select_box .= '<option value="'.$doctors->user_id.'">'.$doctors->username.'</option>';
				}
				echo json_encode($pro_select_box);
			}
		}

		public function edit($post_id){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Edit Appointment';
			$data['posts'] = $post_id;
			$data['categories'] = $this->post_model->get_categories();

				$this->load->view('templates/header');
				$this->load->view('posts/edit', $data);
				$this->load->view('templates/footer');
			
		}

		public function update(){
			$this->post_model->edit_post();

				$this->session->set_flashdata('post_created', 'Your post has been updated');
				redirect('posts/dashboard');
		}

		public function delete($post_id){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$this->post_model->delete_post($post_id);
			redirect('posts/dashboard');
		}

		public function done($post_id){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$this->post_model->done_post($post_id);
			redirect('posts/dashboard');
		}
	}
?>