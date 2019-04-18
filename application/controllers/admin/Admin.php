<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 * 	- or -
	 * 		http://example.com/index.php/welcome/index
	 * 	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	var $gen_contents = array();

	// index function - check login and navigate to dashboard
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->gen_contents['dashboard_js'] = '';
	}

	public function index()
	{
		//$this->load->model('admin/admin_model');
		(!$this->authentication->check_logged_in("admin", false)) ? redirect('admin') : '';
		$this->gen_contents['page_heading'] = 'Dashboard';
		$this->template->set_template('admin');
		$this->gen_contents['page_heading'] = 'Dashboard';
		$this->gen_contents['dashboard_js'] = 'yes';
		$this->template->write_view('content', 'admin/dashboard', $this->gen_contents);
		$this->template->render();
	}

	// public function add_edit_service_page($sid = ""){
	//     //echo "ivide"; exit;
	//     $this->gen_contents = array();
	//     $this->gen_contents['servicedata'] = array();
	//     $this->template->set_template('admin');
	//     $this->template->write_view('content', 'admin/services-add', $this->gen_contents);
	//     $this->template->render();
	// }

	public function manage_services($mode = "", $sid = "")
	{
		(!$this->authentication->check_logged_in("admin", false)) ? redirect('admin') : '';
		//$mode = $this->input->post('mode',true);         
		$page = 'admin/services';
		$this->load->model('admin/admin_model');

		// Category add area
		if ($mode == "add") {
			$page = 'admin/services-add';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Service Title', 'required');
			if ($this->form_validation->run() == TRUE) {
				$title = $this->input->post("title", true);
				// --------- if image not null the upload file -------------
				$image_name = "";
				if (!empty($_FILES['service_image']['name'])) {
					//p($_FILES['service_image'],true);                   
					$config['upload_path']          = './assets/uploads/services/';
					$config['allowed_types']        = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('service_image')) {
						$upload_detail = $this->upload->data();
						//p($upload_detail,true);
						$image_name = $upload_detail["file_name"];
					}
				}
				//----------------------------------------------------------
				$servicedata = array(
					"title" => $title,
					//'slug'  => url_title($title, 'dash', true),
					'descr'  => $this->input->post("descr", true),
					'service_image' => $image_name
				);
				$response = $this->admin_model->process_services("add", $servicedata);
				if ($response == "added") {
					sf('success_message', 'New service has been added successfully');
					redirect("admin/services");
				} else if ($response == "exists") {
					sf('error_message', 'Sorry! This service name already exists');
				}
			}
		}
		// Category edit area
		if ($mode == "edit") {
			$page = 'admin/services-add';
			$servicedata = $this->admin_model->get_service_data($sid);
			//p($servicedata,true);
			$this->gen_contents['servicedata'] = $servicedata;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Service title', 'required');
			if ($this->form_validation->run() == TRUE) {
				$title = $this->input->post("title", true);
				// --------- if image not null the upload file -------------
				$image_name = "";
				if (!empty($_FILES['service_image']['name'])) {
					$config['upload_path']          = './assets/uploads/services/';
					$config['allowed_types']        = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('service_image')) {
						$upload_detail = $this->upload->data();
						$image_name = $upload_detail["file_name"];
					}
				} else {
					$image_name = $this->input->post("service_image", true);
				}
				//----------------------------------------------------------
				$servicedata = array(
					"title"     => $title,
					"id"     => $this->input->post("id", true),
					//"slug"      => url_title($title, 'dash', true),
					'descr'  => $this->input->post("descr", true),
					"service_image"  => $image_name
				);
				$response = $this->admin_model->process_services("edit", $servicedata);
				//echo $response; exit;
				if ($response == "edited") {
					sf('success_message', 'Service has been updated successfully');
					redirect("admin/services");
				} else if ($response == "exists") {
					sf('error_message', 'Sorry! This service name already exists');
				}
			}
		}
		// Category delete area
		if ($mode == "delete" && !empty($sid)) {
			$servicedata = array(
				'id' => $sid
			);
			$response = $this->admin_model->process_services("delete", $servicedata);
			sf('success_message', 'Service has been deleted successfully');
			redirect("admin/services");
		}
		//echo "hhhhh"; exit;
		//rendering page
		$this->gen_contents['page_heading'] = 'Services';
		$this->gen_contents['services'] = $this->admin_model->get_services();
		//p($this->gen_contents['services'], true);
		$this->template->set_template('admin');
		$this->template->write_view('content', $page, $this->gen_contents);
		$this->template->render();
	}


	public function manage_contents($flag = "")
	{
		$page = 'admin/content-manage';
		$contentdata = $this->admin_model->get_content_data($flag);
		//p($contentdata,true);
		$this->gen_contents['content_data'] = $contentdata;
		$this->gen_contents['flag'] = $flag;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('content', 'Content', 'required');
		if ($this->form_validation->run() == TRUE) {
			$content = $this->input->post("content", true);

			$contentdata = array(
				"content"   => $content,
				"id"        => $this->input->post("id", true),
			);
			$response = $this->admin_model->process_contents("edit", $contentdata);
			//echo $response; exit;
			if ($response == "edited") {
				sf('success_message', 'Content has been updated successfully');
				redirect("admin/c/" . $flag);
			}
		}

		$this->gen_contents['page_heading'] = 'Manage Contents';

		$this->template->set_template('admin');
		$this->template->write_view('content', $page, $this->gen_contents);
		$this->template->render();
	}

	//Manage clients
	public function manage_clients($mode = "", $sid = "")
	{
		(!$this->authentication->check_logged_in("admin", false)) ? redirect('admin') : '';
		//$mode = $this->input->post('mode',true);         
		$page = 'admin/clients';
		$this->load->model('admin/admin_model');

		// clients add area
		if ($mode == "add") {
			$page = 'admin/clients-manage';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('client_name', 'Client Name', 'required');
			if ($this->form_validation->run() == TRUE) {
				$client_name = $this->input->post("client_name", true);
				$company_name = $this->input->post("company_name", true);
				$flag = $this->input->post("flag", true);
				// --------- if image not null the upload file -------------
				$image_name = "";
				if (!empty($_FILES['logo']['name'])) {
					$config['upload_path']          = './assets/uploads/clients/';
					$config['allowed_types']        = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('logo')) {
						$upload_detail = $this->upload->data();
						$image_name = $upload_detail["file_name"];
					}
				}
				//----------------------------------------------------------
				$clientsdata = array(
					"client_name" => $client_name,
					'company_name'  => $company_name,
					'logo' => $image_name,
					'flag'  => $flag
				);
				$response = $this->admin_model->process_clients("add", $clientsdata);
				if ($response == "added") {
					sf('success_message', 'New client has been added successfully');
					redirect("admin/clients");
				} else if ($response == "exists") {
					sf('error_message', 'Sorry! This client name already exists');
				}
			}
		}
		// Category edit area
		if ($mode == "edit") {
			$page = 'admin/clients-manage';
			$clientdata = $this->admin_model->get_client_data($sid);
			//p($servicedata,true);
			$this->gen_contents['clientdata'] = $clientdata;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Client Name', 'required');
			if ($this->form_validation->run() == TRUE) {
				$client_name = $this->input->post("client_name", true);
				$company_name = $this->input->post("company_name", true);
				$flag = $this->input->post("flag", true);
				// --------- if image not null the upload file -------------
				$image_name = "";
				if (!empty($_FILES['logo']['name'])) {
					$config['upload_path']          = './assets/uploads/clients/';
					$config['allowed_types']        = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('logo')) {
						$upload_detail = $this->upload->data();
						$image_name = $upload_detail["file_name"];
					}
				} else {
					$image_name = $this->input->post("logo", true);
				}
				//----------------------------------------------------------
				$clientsdata = array(
					"client_name" => $client_name,
					'company_name'  => $company_name,
					'logo' => $image_name,
					'flag'  => $flag
				);
				$response = $this->admin_model->process_clients("edit", $clientsdata);
				//echo $response; exit;
				if ($response == "edited") {
					sf('success_message', 'Clients has been updated successfully');
					redirect("admin/clients");
				} else if ($response == "exists") {
					sf('error_message', 'Sorry! This service name already exists');
				}
			}
		}
		// Category delete area
		if ($mode == "delete" && !empty($sid)) {
			$clientsdata = array(
				'id' => $sid
			);
			$response = $this->admin_model->process_clients("delete", $clientsdata);
			sf('success_message', 'Clients has been deleted successfully');
			redirect("admin/services");
		}

		//rendering page
		$this->gen_contents['page_heading'] = 'Clients';
		$this->gen_contents['clients1'] = $this->admin_model->get_clients('builder');
		$this->gen_contents['clients2'] = $this->admin_model->get_clients('truck');
		//p($this->gen_contents['services'], true);
		$this->template->set_template('admin');
		$this->template->write_view('content', $page, $this->gen_contents);
		$this->template->render();
	}




	//***********************************************************************************
	//contents and edit
	public function reset_password()
	{

		$this->template->set_template('admin');
		$this->template->write_view('content', 'admin/reset-pwd', $this->gen_contents);
		$this->template->render();
	}

	public function reset_password_appln()
	{
		$this->load->model('admin/admin_model');
		$post_data['old_pwd'] = $this->input->post('old_pwd', true);
		$post_data['password'] = $this->input->post('password', true);
		$post_data['confirm_pwd'] = $this->input->post('confirm_pwd', true);
		$post_data['id'] = s('ADMIN_USERID');
		if ($post_data['password'] != $post_data['confirm_pwd']) {
			sf('error_message', 'Password and confirm password are not same!');
			redirect("admin/reset-pwd");
		}

		if (!$this->admin_model->check_old_pwd($post_data['old_pwd'])) {
			sf('error_message', 'Incorrect old password!');
			redirect("admin/reset-pwd");
		} else {
			$data = $this->admin_model->reset_password($post_data);
			if ($data == "updated") {
				sf('success_message', 'Your admin password updated successfully!');
				redirect("admin/reset-pwd");
			}
		}
	}
}
