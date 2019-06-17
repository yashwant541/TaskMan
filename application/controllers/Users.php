<?php
	class Users extends CI_Controller{
		public function hola(){
			$data['title'] = 'Hola Senor';

			$this->load->view('templates/header');
  			$this->load->view('users/hola');
			$this->load->view('templates/footer'); 
		}
	
		//User Register
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}else{
				//Encrypt your passwords bitches!
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				//Set Flash Message using sessions
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in!');

				return redirect(base_url('posts'));
			}
		}

		//User Login
		public function login(){ 
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{

				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$usertype = $this->input->post('usertype');
				$user_id = $this->user_model->login($username, $password, $usertype);

				if($user_id){
					//Create session
					$userdata = array(
						'user_id' => $user_id,
						'username' => $username,
						'usertype' => $usertype,
						'admin' => false,
						'logged_in' => true
					);

					$this->session->set_userdata($userdata);
					//Set Flash Message using sessions
					$this->session->set_flashdata('login_success', 'You are now logged in!');

					$this->load->view('templates/header');
					$this->load->view('users/hola');
					$this->load->view('templates/footer');
				}else{
					//Set Flash Message using sessions
					$this->session->set_flashdata('login_failed', 'Incorrect Login/Password Combination!');

					return redirect(base_url('users/login'));
				}
			}
		}

		//SHOW USER PROFILE
		public function profile(){
			$data['title'] = 'Your Profile';

			$user_id = $this->session->userdata('user_id');
			
			$data['kio'] = $this->user_model->get_user_data($user_id);

			$this->load->view('templates/header');
			$this->load->view('users/profile', $data);
			$this->load->view('templates/footer');
		}

		//UPDATE PROFILE DETAILS ADMIN/USER
		public function update(){
			if(!$this->session->userdata('logged_in')){
				return redirect(base_url('users/login'));
			}
			$user_id = $this->session->userdata('user_id');

			$this->user_model->update_profile($user_id);
			
			$this->session->set_flashdata('profile_updated', 'Your profile has been updated');

			return redirect(base_url('users/hola'));
		}

		//Logout User
		public function logout(){
			//Unset all  sessions
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			//Set Flash Message using sessions
			$this->session->set_flashdata('logout', 'You are logged out!');

			return redirect(base_url('users/hola'));
		}

		//
		//VIEW INSIDE OF TASK
		//
		public function inside(){
			$data['title'] = "YOUR INBOX";

			$data['sender'] = $this->user_model->get_sends();
			$inbox_id = $data['sender']['id'];

			$receiver_id = $this->session->userdata('user_id');
			
			
			
			$data['receiver_id'] = $receiver_id;
		}

		//Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'This username is taken. Please choose a different one');
			if($this->user_model->check_username_exists($username)){
				return true;
			}else{
				return false;
			}
		}

		//Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			}else{
				return false;
			}
		}

		//CHECK IF A TASK IS ASSIGNED TO YOU
		public function your_tasks(){
			$data['title'] = "YOUR TASKS";
			$receiver_id = $this->session->userdata('user_id');
			
			$data['sender'] = $this->user_model->get_sends();
			
			$data['receiver_id'] = $receiver_id;

			$this->load->view('templates/header');
			$this->load->view('task/your_tasks', $data);
			$this->load->view('templates/footer');
		}
	}