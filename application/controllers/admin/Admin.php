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
		$this->gen_contents['web_settings'] = $this->admin_model->get_web_settings();;
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
					'btn_status'  => $this->input->post("btn_status", true),
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
					'btn_status'  => $this->input->post("btn_status", true),
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

	//Manage Stocks
	public function manage_stocks($mode = "", $sid = "")
	{
		(!$this->authentication->check_logged_in("admin", false)) ? redirect('admin') : '';
		//$mode = $this->input->post('mode',true);         
		$page = 'admin/stocks';
		$this->load->model('admin/admin_model');

		// Category add area
		if ($mode == "add") {
			$page = 'admin/stocks-add';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Stock Title', 'required');
			if ($this->form_validation->run() == TRUE) {
				$title = $this->input->post("title", true);
				// --------- if image not null the upload file -------------
				$image_name = "";
				if (!empty($_FILES['stock_image']['name'])) {
					//p($_FILES['service_image'],true);                   
					$config['upload_path']          = './assets/uploads/stocks/';
					$config['allowed_types']        = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('stock_image')) {
						$upload_detail = $this->upload->data();
						//p($upload_detail,true);
						$image_name = $upload_detail["file_name"];
					}
				}
				//----------------------------------------------------------
				$stockdata = array(
					"title" => $title,
					//'slug'  => url_title($title, 'dash', true),
					'descr'  => $this->input->post("descr", true),
					'stock_image' => $image_name
				);
				$response = $this->admin_model->process_stocks("add", $stockdata);
				if ($response == "added") {
					sf('success_message', 'New stock has been added successfully');
					redirect("admin/stocks");
				} else if ($response == "exists") {
					sf('error_message', 'Sorry! This stock name already exists');
				}
			}
		}
		// Category edit area
		if ($mode == "edit") {
			$page = 'admin/stocks-add';
			$stockdata = $this->admin_model->get_stock_data($sid);
			//p($servicedata,true);
			$this->gen_contents['stockdata'] = $stockdata;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Stock title', 'required');
			if ($this->form_validation->run() == TRUE) {
				$title = $this->input->post("title", true);
				// --------- if image not null the upload file -------------
				$image_name = "";
				if (!empty($_FILES['stock_image']['name'])) {
					$config['upload_path']          = './assets/uploads/stocks/';
					$config['allowed_types']        = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('stock_image')) {
						$upload_detail = $this->upload->data();
						$image_name = $upload_detail["file_name"];
					}
				} else {
					$image_name = $this->input->post("stock_image", true);
				}
				//----------------------------------------------------------
				$stockdata = array(
					"title"     => $title,
					"id"     => $this->input->post("id", true),
					//"slug"      => url_title($title, 'dash', true),
					'descr'  => $this->input->post("descr", true),
					"stock_image"  => $image_name
				);
				$response = $this->admin_model->process_stocks("edit", $stockdata);
				//echo $response; exit;
				if ($response == "edited") {
					sf('success_message', 'Stock has been updated successfully');
					redirect("admin/stocks");
				} else if ($response == "exists") {
					sf('error_message', 'Sorry! This service name already exists');
				}
			}
		}
		// Category delete area
		if ($mode == "delete" && !empty($sid)) {
			$stockdata = array(
				'id' => $sid
			);
			$response = $this->admin_model->process_stocks("delete", $stockdata);
			sf('success_message', 'Stock has been deleted successfully');
			redirect("admin/stocks");
		}
		//echo "hhhhh"; exit;
		//rendering page
		$this->gen_contents['page_heading'] = 'Stocks';
		$this->gen_contents['stocks'] = $this->admin_model->get_stocks();
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
	public function manage_clients($mode = "", $cid = "")
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
		// client edit area
		if ($mode == "edit") {
			$page = 'admin/clients-manage';
			$clientdata = $this->admin_model->get_client_data($cid);
			//p($servicedata,true);
			$this->gen_contents['clientdata'] = $clientdata;

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
				} else {
					$image_name = $this->input->post("logo", true);
				}
				//----------------------------------------------------------
				$clientsdata = array(
					"client_name" => $client_name,
					'company_name'  => $company_name,
					'logo' => $image_name,
					'flag'  => $flag,
					'id'    => $this->input->post("id", true)
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
		if ($mode == "delete" && !empty($cid)) {
			$clientsdata = array(
				'id' => $cid
			);
			$response = $this->admin_model->process_clients("delete", $clientsdata);
			sf('success_message', 'Clients has been deleted successfully');
			redirect("admin/clients");
		}

		//rendering page
		$this->gen_contents['page_heading'] = 'Clients';
		$this->gen_contents['head_1'] 	= $this->admin_model->get_content_data('client_head_1');
		$this->gen_contents['head_2'] 	= $this->admin_model->get_content_data('client_head_2');
		$this->gen_contents['clients1'] = $this->admin_model->get_clients('builder');
		$this->gen_contents['clients2'] = $this->admin_model->get_clients('truck');
		//p($this->gen_contents['services'], true);
		$this->template->set_template('admin');
		$this->template->write_view('content', $page, $this->gen_contents);
		$this->template->render();
	}


	//Manage Testimonials
	public function manage_testimonials($mode = "", $tid = "")
	{
		(!$this->authentication->check_logged_in("admin", false)) ? redirect('admin') : '';
		$page = 'admin/testimonials';
		$this->load->model('admin/admin_model');

		// testimonial add area
		if ($mode == "add") {
			$page = 'admin/testimonial-manage';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Heading', 'required');
			if ($this->form_validation->run() == TRUE) {
				$title = $this->input->post("title", true);
				$testimonial = $this->input->post("testimonial", true);
				$by_name = $this->input->post("by_name", true);
				// --------- if image not null the upload file -------------
				$image_name = "";
				if (!empty($_FILES['by_image']['name'])) {
					$config['upload_path']          = './assets/uploads/testimonial/';
					$config['allowed_types']        = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('by_image')) {
						$upload_detail = $this->upload->data();
						$image_name = $upload_detail["file_name"];
					}
				}
				//----------------------------------------------------------
				$testidata = array(
					"title" => $title,
					'testimonial'  => $testimonial,
					'by_name' => $by_name,
					'by_image'  => $image_name
				);
				$response = $this->admin_model->process_testimonial("add", $testidata);
				if ($response == "added") {
					sf('success_message', 'New testimonial has been added successfully');
					redirect("admin/testimonials");
				} else if ($response == "exists") {
					sf('error_message', 'Sorry! This testimonial already exists');
				}
			}
		}
		// testimonial edit area
		if ($mode == "edit") {
			$page = 'admin/testimonial-manage';
			$testidata = $this->admin_model->get_testimonial_data($tid);
			//p($servicedata,true);
			$this->gen_contents['testidata'] = $testidata;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Heading', 'required');
			if ($this->form_validation->run() == TRUE) {
				$title = $this->input->post("title", true);
				$testimonial = $this->input->post("testimonial", true);
				$by_name = $this->input->post("by_name", true);
				$tid = $this->input->post("id", true);
				// --------- if image not null the upload file -------------
				$image_name = "";
				if (!empty($_FILES['by_image']['name'])) {
					$config['upload_path']          = './assets/uploads/testimonial/';
					$config['allowed_types']        = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('by_image')) {
						$upload_detail = $this->upload->data();
						$image_name = $upload_detail["file_name"];
					}
				} else {
					$image_name = $this->input->post("by_image", true);
				}
				//----------------------------------------------------------
				$testidata = array(
					"title" => $title,
					'testimonial'  => $testimonial,
					'by_name' => $by_name,
					'by_image'  => $image_name,
					'id'  => $tid
				);
				$response = $this->admin_model->process_testimonial("edit", $testidata);
				//echo $response; exit;
				if ($response == "edited") {
					sf('success_message', 'Testimonial has been updated successfully');
					redirect("admin/testimonials");
				} else if ($response == "exists") {
					sf('error_message', 'Sorry! This testimonial name already exists');
				}
			}
		}
		// testimonial delete area
		if ($mode == "delete" && !empty($tid)) {
			$testidata = array(
				'id' => $tid
			);
			$response = $this->admin_model->process_testimonial("delete", $testidata);
			sf('success_message', 'Testimonial has been deleted successfully');
			redirect("admin/testimonials");
		}

		//rendering page
		$this->gen_contents['page_heading'] = 'Testimonials';
		$this->gen_contents['testimonials'] = $this->admin_model->get_testimonials();
		$this->template->set_template('admin');
		$this->template->write_view('content', $page, $this->gen_contents);
		$this->template->render();
	}

	//Manage Testimonials
	public function manage_blogs($mode = "", $bid = "")
	{
		(!$this->authentication->check_logged_in("admin", false)) ? redirect('admin') : '';
		$page = 'admin/blogs';
		$this->load->model('admin/admin_model');

		// blog add area
		if ($mode == "add") {
			$page = 'admin/blog-manage';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('blog_title', 'Blog Title', 'required');
			if ($this->form_validation->run() == TRUE) {
				$title = $this->input->post("blog_title", true);
				$content = $this->input->post("blog_content", true);
				// --------- if image not null the upload file -------------
				$image_name = "";
				if (!empty($_FILES['blog_image']['name'])) {
					$config['upload_path']          = './assets/uploads/blogs/';
					$config['allowed_types']        = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('blog_image')) {
						$upload_detail = $this->upload->data();
						$image_name = $upload_detail["file_name"];
					}
				}
				//----------------------------------------------------------
				$blogdata = array(
					"blog_title" => $title,
					'blog_content'  => $content,
					'blog_image'  => $image_name
				);
				$response = $this->admin_model->process_blog("add", $blogdata);
				if ($response == "added") {
					sf('success_message', 'New blog has been added successfully');
					redirect("admin/blogs");
				} else if ($response == "exists") {
					sf('error_message', 'Sorry! This blog already exists');
				}
			}
		}
		// blog edit area
		if ($mode == "edit") {
			$page = 'admin/blog-manage';
			$blogdata = $this->admin_model->get_blog_data($bid);
			//p($servicedata,true);
			$this->gen_contents['blogdata'] = $blogdata;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('blog_title', 'Heading', 'required');
			if ($this->form_validation->run() == TRUE) {
				$title = $this->input->post("blog_title", true);
				$content = $this->input->post("blog_content", true);
				$bid = $this->input->post("id", true);
				// --------- if image not null the upload file -------------
				$image_name = "";
				if (!empty($_FILES['blog_image']['name'])) {
					$config['upload_path']          = './assets/uploads/blogs/';
					$config['allowed_types']        = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('blog_image')) {
						$upload_detail = $this->upload->data();
						$image_name = $upload_detail["file_name"];
					}
				} else {
					$image_name = $this->input->post("blog_image", true);
				}
				//----------------------------------------------------------
				$blogdata = array(
					"blog_title" => $title,
					'blog_content'  => $content,
					'blog_image'  => $image_name,
					'id'  => $bid
				);
				$response = $this->admin_model->process_blog("edit", $blogdata);
				//echo $response; exit;
				if ($response == "edited") {
					sf('success_message', 'Blog has been updated successfully');
					redirect("admin/blogs");
				} else if ($response == "exists") {
					sf('error_message', 'Sorry! This blog name already exists');
				}
			}
		}
		// blog delete area
		if ($mode == "delete" && !empty($bid)) {
			$blogdata = array(
				'id' => $bid
			);
			$response = $this->admin_model->process_blog("delete", $blogdata);
			sf('success_message', 'Blog has been deleted successfully');
			redirect("admin/blogs");
		}

		//rendering page
		$this->gen_contents['page_heading'] = 'Blogs';
		$this->gen_contents['blogs'] = $this->admin_model->get_blogs();
		$this->template->set_template('admin');
		$this->template->write_view('content', $page, $this->gen_contents);
		$this->template->render();
	}

	public function manage_events($mode = "", $eid = "")
	{
		$page = 'admin/event-manage';
		//delete event
		if ($mode == "delete" && !empty($eid)) {
			$eventdata = array(
				'eid' => $eid
			);
			//p($eventdata,true);
			$this->admin_model->process_events("delete", $eventdata);
			sf('success_message', 'Event has been deleted successfully');
			redirect("admin/events");
		}

		//rendering page
		$this->gen_contents['page_heading'] = 'Manage Events';
		$this->gen_contents['events'] = $this->admin_model->get_events();		
		$this->template->set_template('admin');
		$this->template->write_view('content', $page, $this->gen_contents);
		$this->template->render();
	}

	//events upload
	public function events_upload()
	{

		if (!empty($_FILES['file']['name'])) {

			// Set preference
			$config['upload_path'] = './assets/uploads/events/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '5000'; // max_size in kb
			$config['file_name'] = $_FILES['file']['name'];

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('file')) {
				// Get data about the file
				$uploadData = $this->upload->data();
				$image_name = $uploadData["file_name"];
			}
			$eventdata = array(
				'event_image' => $image_name
			);
			$this->admin_model->process_events('add', $eventdata);
		}
	}

	public function update_event_flag(){
		$id = $this->input->get('id');
		//echo $id;
		$response = $this->admin_model->update_event_flag($id);
		echo $response;
	}

	public function updateWebsettings(){
		$field = $this->input->post('__field');
		//echo $field;
		$response = $this->admin_model->update_web_settings($field);
		//echo $response;
	}

	public function updateContentsbyFlag(){
		$flag = $this->input->post('__flag');
		$value = $this->input->post('__value');
		//echo $flag; exit;
		$cdata = array(
			'flag' => $flag,
			'value' => $value
		);
		//p($cdata);
		$this->admin_model->update_content_data($cdata);
	}


	public function manage_portfolio($mode = "", $pid = "")
	{
		$page = 'admin/portfolio-manage';
		//delete portfolio
		if ($mode == "delete" && !empty($pid)) {
			$pfdata = array(
				'pid' => $pid
			);
			//p($eventdata,true);
			$this->admin_model->process_portfolio("delete", $pfdata);
			sf('success_message', 'Portfolio has been deleted successfully');
			redirect("admin/portfolio");
		}

		//rendering page
		$this->gen_contents['page_heading'] = 'Manage Portfolio';
		$this->gen_contents['portfolio'] = $this->admin_model->get_portfolio();		
		$this->template->set_template('admin');
		$this->template->write_view('content', $page, $this->gen_contents);
		$this->template->render();
	}

	//portfolio upload
	public function portfolio_upload()
	{

		if (!empty($_FILES['file']['name'])) {

			// Set preference
			$config['upload_path'] = './assets/uploads/portfolio/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '5000'; // max_size in kb
			$config['file_name'] = $_FILES['file']['name'];

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('file')) {
				// Get data about the file
				$uploadData = $this->upload->data();
				$image_name = $uploadData["file_name"];
			}
			$pfdata = array(
				'image' => $image_name
			);
			$this->admin_model->process_portfolio('add', $pfdata);
		}
	}

	public function list_enquiries(){
		$this->gen_contents['page_heading'] = 'List Enquiries';
		$this->gen_contents['enquiries'] = $this->admin_model->get_enquiries();		
		$this->template->set_template('admin');
		$this->template->write_view('content', 'admin/enquiries', $this->gen_contents);
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
