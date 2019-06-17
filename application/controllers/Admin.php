<?php
	class Admin extends CI_Controller{
		public function hola(){
			$data['title'] = 'Hola Admin';

			$this->load->view('templates/header');
  			$this->load->view('admin/hola');
			$this->load->view('templates/footer'); 
		}

		//Admin Login
		public function login(){ 
			$data['title'] = 'Admin Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('admin/login', $data);
				$this->load->view('templates/footer');
			}else{

				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$usertype = $this->input->post('usertype');
				$user_id = $this->user_model->login($username, $password, $usertype);

				if($user_id){
					//Create session
					$admindata = array(
						'user_id' => $user_id,
						'username' => $username,
						'usertype' => $usertype,
						'admin' => true,
						'logged_in' => true
					);

					$this->session->set_userdata($admindata);
					//Set Flash Message using sessions
					$this->session->set_flashdata('login_success', 'You are now logged in!');

					$this->load->view('templates/header');
					$this->load->view('admin/hola');
					$this->load->view('templates/footer');
				}else{
					//Set Flash Message using sessions
					$this->session->set_flashdata('login_failed', 'Incorrect Login/Password Combination!');

					return redirect(base_url('admin/login'));
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
				if($this->session->userdata('admin')){
					return redirect(base_url('admin/login'));
				}else{
					return redirect(base_url('users/login'));
				}
			}
			$user_id = $this->session->userdata('user_id');

			$this->user_model->update_profile($user_id);
			
			$this->session->set_flashdata('profile_updated', 'Your profile has been updated');

			return redirect(base_url('admin/hola'));
		}

		//Logout Admin
		public function logout(){
			//Unset all  sessions
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('usertype');
			$this->session->unset_userdata('admin');

			//Set Flash Message using sessions
			$this->session->set_flashdata('logout', 'You are logged out!');

			return redirect(base_url('admin/hola'));
		}

		//CHECK IF A TASK IS ASSIGNED TO YOU
		public function alltask(){
			$data['title'] = "ALL TASKS";
			
			$data['sender'] = $this->user_model->get_sends();

			$this->load->view('templates/header');
			$this->load->view('task/alltask', $data);
			$this->load->view('templates/footer');
		}
	}