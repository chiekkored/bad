<?php
	class Post_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_posts(){
			$this->db->order_by('scheddate', 'ASC');
			$this->db->join('categories', 'categories.category_id = posts.category_id');
			$this->db->join('users', 'posts.user_id = users.user_id');
			$query = $this->db->get('posts');
			return $query->result_array();
		} 

		public function get_postsdoctor(){
			$query = $this->db->query('SELECT * FROM (posts p, users u) LEFT JOIN categories c ON p.category_id = c.category_id WHERE p.user_id = u.user_id ORDER BY scheddate ASC');
			return $query->result_array();
		} 	

		public function get_all(){
			$this->db->join('categories', 'categories.category_id = users.de_id');
			$query = $this->db->get('users');
		}

		public function create_post(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'scheddate' => $this->input->post('scheddate'),
				'user_id' => $this->session->userdata('id'),
				'de_id' => $this->input->post('expertise'),
				'doctor_id' => $this->input->post('doctor_id'),	
				'note' => $this->input->post('note'), 
				'reason' => $this->input->post('reason'), 
				'category_id' => $this->input->post('category_id')
			);

			return $this->db->insert('posts', $data);
		}

		public function get_categories(){
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function get_expertise(){
			$this->db->order_by('name');
			$query = $this->db->get('doctor_expertise');
			return $query->result_array();
		}

		public function get_doctor($de_id){
			$query = $this->db->get_where('users', array('de_id' => $de_id));
			return $query->result();
		}

		public function edit_post(){
			$data = array(
				'post_id' => $this->input->post('post_id'),
				'scheddate' => $this->input->post('scheddate'),
				'category_id' => $this->input->post('category_id')
			);

			$this->db->where('post_id', $this->input->post('post_id'));
			return $this->db->update('posts', $data);
		}

		public function view_edit($post_id){
			$query = $this->db->query("SELECT * FROM posts WHERE post_id = $post_id");
			return $query;
		}

		public function delete_post($post_id){
			$query = $this->db->query("UPDATE posts SET deleted = 1, updated_at = now() WHERE post_id = $post_id");
			return $query;
		}

		public function done_post($post_id){
			$query = $this->db->query("UPDATE posts SET done = 1, updated_at = now() WHERE post_id = $post_id");
			return $query;
		}
	}