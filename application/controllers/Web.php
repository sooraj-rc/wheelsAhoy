<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index()
	{
        $this->gen_contents = array();
        $this->gen_contents['data'] = "Sample Data";
        $this->template->write_view('content', 'index', $this->gen_contents);
        $this->template->render();
    
	}

	public function job_post_appln(){
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required',
				array('required' => 'You must provide a %s.')
		);		

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('index');
		}
		else
		{	
			$this->load->model('web_model');		
			$data = $this->input->post();

			$config['upload_path'] = "assets/uploads";
			$config['allowed_types'] = "pdf|doc|docx";
			$config['encrypt_name'] = true;

			$this->upload->initialize($config);
			if($this->upload->do_upload('resume')){
				$upload_detail = $this->upload->data();
				$data['resume'] = $upload_detail['file_name'];
			}
			else{
				echo $this->upload->display_errors();
				exit;
			}


			if($this->web_model->jobpost_appln($data)){
				echo 'Success';
				print_r($this->session->userdata());
			}
			else{
				echo "Failed";
			}
			exit;
			$this->load->view('success');
		}
	}

	public function jobs(){
		$this->load->view('jobs');
	}
}
