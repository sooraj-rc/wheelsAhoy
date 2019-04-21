<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
		$this->load->model('admin/admin_model');
        }

        public function index()
        {
                $this->gen_contents = array();
                $this->gen_contents['__story'] = $this->admin_model->get_content_data('story'); // get story
                $this->gen_contents['__services'] = $this->admin_model->get_services(); // get services
                $this->gen_contents['__clients_builder'] = $this->admin_model->get_clients('builder'); // get builder clients
                $this->gen_contents['__clients_truck'] = $this->admin_model->get_clients('truck'); // get truck clients
                $this->gen_contents['__testimonials'] = $this->admin_model->get_testimonials('truck'); // get testimonials
                $this->gen_contents['__blogs'] = $this->admin_model->get_blogs(); // get blogs
                $this->gen_contents['__events_up'] = $this->admin_model->get_events('upcoming'); // get events - upcoming
                $this->gen_contents['__events_past'] = $this->admin_model->get_events('past'); // get events - past
                //p($this->gen_contents['__story'], true);
                $this->template->write_view('content', 'index', $this->gen_contents);
                $this->template->render();
        }
}
