<?php

class Admin_model extends CI_Model
{

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		ini_set("display_errors", "0");
		error_reporting(0);
	}

	//function to get tour categories
	public function get_services()
	{
		$query = $this->db->select("*")
			->from("wa_services")
			->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return $result;
		} else {
			return '';
		}
	}

	public function get_service_data($sid = "")
	{
		$query = $this->db->select("*")
			->where("id", $sid)
			->from("wa_services")
			->get();
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result;
		} else {
			return '';
		}
	}

	// process services - add/edit/delete
	public function process_services($mode, $servicedata)
	{
		$title    = $servicedata['title'];
		$sid      = $servicedata['id'];
		$sdata = array(
			"title" => $title,
			"descr" => $servicedata['descr'],
			"service_image" => $servicedata['service_image']
		);

		if ($mode == "add") {
			$this->db->select("*");
			$this->db->from("wa_services");
			$this->db->where("title", $title);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {
				$this->db->insert("wa_services", $sdata);
				return "added";
			} else {
				return "exists";
			}
		}
		if ($mode == "edit") {
			$this->db->select("*");
			$this->db->from("wa_services");
			$this->db->where("id", $sid);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				$this->db->where("id", $sid);
				$this->db->update("wa_services", $sdata);
				return "edited";
			}
		}
		if ($mode == "delete") {
			$this->db->where("id", $sid);
			$this->db->delete("wa_services");
			return "deleted";
		}
	}

	public function get_content_data($flag = "")
	{
		$query = $this->db->select("*")
			->where("flag", $flag)
			->from("wa_page_contents")
			->get();
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result;
		} else {
			return '';
		}
	}


	public function process_contents($mode, $contentdata)
	{
		$content    = $contentdata['content'];
		$id      = $contentdata['id'];
		$content_arr = array(
			"contents" => $content
		);

		if ($mode == "edit") {
			$this->db->where("id", $id);
			$this->db->update("wa_page_contents", $content_arr);
			return "edited";
		} else {
			return '';
		}
	}

	public function update_content_data($cdata = array()){
		$flag = $cdata['flag'];
		$value = $cdata['value'];
		$content_arr = array(
			"contents" => $value
		);
		$this->db->where("flag", $flag);
		$this->db->update("wa_page_contents", $content_arr);
	}


	// process clients - add/edit/delete
	public function process_clients($mode, $clientsdata)
	{
		$client_name    = $clientsdata['client_name'];
		$company_name      = $clientsdata['company_name'];
		$logo      = $clientsdata['logo'];
		$flag      = $clientsdata['flag'];
		$cid		= $clientsdata['id'];
		//echo $cid; die();
		$cdata = array(
			"client_name" => $client_name,
			"company_name" => $company_name,
			"logo" => $logo,
			"flag"	=> $flag,
		);
		//p($cdata,true);

		if ($mode == "add") {
			$this->db->select("*");
			$this->db->from("wa_clients");
			$query = $this->db->get();
			$this->db->insert("wa_clients", $cdata);
			return "added";
		}
		if ($mode == "edit") {
			$this->db->select("*");
			$this->db->from("wa_clients");
			$this->db->where("id", $cid);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				$this->db->where("id", $cid);
				$this->db->update("wa_clients", $cdata);
				return "edited";
			}
		}
		if ($mode == "delete") {
			$this->db->where("id", $cid);
			$this->db->delete("wa_clients");
			return "deleted";
		}
	}

	//get clients
	public function get_clients($flag = "")
	{
		$query = $this->db->select("*");
		if (!empty($flag)) {
			$query = $query->where("flag", $flag);
		}
		$query = $query->from("wa_clients")->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return $result;
		} else {
			return '';
		}
	}

	//Get client data by ID
	public function get_client_data($cid = "")
	{
		$query = $this->db->select("*")
			->where("id", $cid)
			->from("wa_clients")
			->get();
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result;
		} else {
			return '';
		}
	}

	// process testimonial - add/edit/delete
	public function process_testimonial($mode, $testidata)
	{
		$title    		= $testidata['title'];
		$testimonial    = $testidata['testimonial'];
		$by_name      	= $testidata['by_name'];
		$by_image      	= $testidata['by_image'];
		$tid			= $testidata['id'];
		
		$tdata = array(
			"title" => $title,
			"testimonial" => $testimonial,
			"by_image" => $by_image,
			"by_name"	=> $by_name,
		);
	

		if ($mode == "add") {
			$this->db->select("*");
			$this->db->from("wa_testimonials");
			$query = $this->db->get();
			$this->db->insert("wa_testimonials", $tdata);
			return "added";
		}
		if ($mode == "edit") {
			$this->db->select("*");
			$this->db->from("wa_testimonials");
			$this->db->where("id", $tid);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				$this->db->where("id", $tid);
				$this->db->update("wa_testimonials", $tdata);
				return "edited";
			}
		}
		if ($mode == "delete") {
			$this->db->where("id", $tid);
			$this->db->delete("wa_testimonials");
			return "deleted";
		}
	}

	//get testimonials
	public function get_testimonials()
	{
		$query = $this->db->select("*");		
		$query = $query->from("wa_testimonials")->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return $result;
		} else {
			return '';
		}
	}
	
	//Get testimonial data by ID
	public function get_testimonial_data($tid = "")
	{
		$query = $this->db->select("*")
			->where("id", $tid)
			->from("wa_testimonials")
			->get();
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result;
		} else {
			return '';
		}
	}

	// process blogs - add/edit/delete
	public function process_blog($mode, $blogdata)
	{
		$title    		= $blogdata['blog_title'];
		$content    	= $blogdata['blog_content'];		
		$blog_image     = $blogdata['blog_image'];
		$bid			= $blogdata['id'];
		
		$bdata = array(
			"blog_title" => $title,
			"blog_content" => $content,
			"blog_image" => $blog_image			
		);
	

		if ($mode == "add") {
			$this->db->select("*");
			$this->db->from("wa_blogs");
			$query = $this->db->get();
			$this->db->insert("wa_blogs", $bdata);
			return "added";
		}
		if ($mode == "edit") {
			$this->db->select("*");
			$this->db->from("wa_blogs");
			$this->db->where("id", $bid);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				$this->db->where("id", $bid);
				$this->db->update("wa_blogs", $bdata);
				return "edited";
			}
		}
		if ($mode == "delete") {
			$this->db->where("id", $bid);
			$this->db->delete("wa_blogs");
			return "deleted";
		}
	}

	//get Blogs
	public function get_blogs()
	{
		$query = $this->db->select("*");		
		$query = $query->from("wa_blogs")->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return $result;
		} else {
			return '';
		}
	}
	
	//Get testimonial data by ID
	public function get_blog_data($bid = "")
	{
		$query = $this->db->select("*")
			->where("id", $bid)
			->from("wa_blogs")
			->get();
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result;
		} else {
			return '';
		}
	}

	//upload events
	public function process_events($mode = "", $evedata = ""){
		if($mode == "add"){
			$edata = array(
				'event_image' => $evedata['event_image']
			);
			$this->db->insert("wa_events", $edata);
			return true;
		}
		if($mode == "delete"){
			$eid = $evedata['eid'];
			$this->db->where("id", $eid);
			$this->db->delete("wa_events");
			return true;
			
		}
		
	}

	//get events
	public function get_events($flag = ""){
		$query = $this->db->select("*");	
		if(!empty($flag)){
			$query = $query->where('flag', $flag);
		}	
		$query = $query->from("wa_events")->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return $result;
		} else {
			return '';
		}
	}

	public function update_event_flag($id = ''){
		$query = $this->db->select("*")
					->where("id", $id)
					->from('wa_events')->get();	
		$result = $query->row_array();	
		if($result['flag'] == 'upcoming'){
			$data = array(
				'flag' => 'past'
			);			
		}
		if($result['flag'] == 'past'){
			$data = array(
				'flag' => 'upcoming'
			);			
		}
		$this->db->where("id", $id);
		$this->db->update("wa_events", $data);
		return $data['flag'];
	}

	
	//upload portfolio
	public function process_portfolio($mode = "", $pfdata = ""){
		if($mode == "add"){
			$pdata = array(
				'image' => $pfdata['image']
			);
			$this->db->insert("wa_portfolio", $pdata);
			return true;
		}
		if($mode == "delete"){
			$pid = $pfdata['pid'];
			$this->db->where("id", $pid);
			$this->db->delete("wa_portfolio");
			return true;
			
		}
		
	}
	//Get web settings - / ON/OFF
	function get_web_settings(){
		$query = $this->db->select("*")
				->where("id", 1)
				->from('wa_web_settings')->get();	
		$result = $query->row_array();
		return $result;
	}

	public function get_countries()
	{
		$query = $this->db->select("*");		
		$query = $query->from("wa_countries")->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return $result;
		} else {
			return '';
		}
	}

	function update_web_settings($field = ""){			
		$result = $this->get_web_settings();
		//echo $result[$field];
		if($result[$field] == 1){
			$data = array(
				$field => 0
			);	
		}
		else{
			$data = array(
				$field => 1
			);
		}
		//p($data);
		$this->db->where("id", 1);
		$this->db->update("wa_web_settings", $data);
		return true;
	}

	//get portfolio
	public function get_portfolio(){
		$query = $this->db->select("*")->from("wa_portfolio")->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return $result;
		} else {
			return '';
		}
	}

	//process contact us form
	public function process_contact_form($data = array()){
		if($this->db->insert("wa_contactus", $data)){
			return true;
		}
		else{
			return false;
		}
	}
	


	
}
