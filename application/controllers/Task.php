<?php
	class Task extends CI_Controller{
		public function taskpanel(){
			$data['title'] = "Task Panel Info";

			$this->load->view('templates/header');
			$this->load->view('task/taskpanel', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			$data['title'] = "Create Task";
			$sender_id = $this->session->userdata('user_id');

			$data['alluser'] = $this->user_model->get_all_user();
			$data['sender_id'] = $sender_id;

			$this->form_validation->set_rules('receiver_id','Receiver_id','required');
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('priority','Priority','required');
			
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('task/create', $data);
				$this->load->view('templates/footer');
			}else{
				$this->task_model->create($sender_id);
				echo("PASS HO GYAA BHAILOG!!!");die;
			}			
		}
	}