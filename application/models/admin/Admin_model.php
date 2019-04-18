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


	// process clients - add/edit/delete
	public function process_clients($mode, $clientsdata)
	{
		$client_name    = $clientsdata['client_name'];
		$company_name      = $clientsdata['company_name'];
		$logo      = $clientsdata['logo'];
		$flag      = $clientsdata['flag'];
		$cid		= $clientsdata['id'];
		$cdata = array(
			"client_name" => $client_name,
			"company_name" => $company_name,
			"logo" => $logo,
			"flag"	=> $flag,
		);

		if ($mode == "add") {
			$this->db->select("*");
			$this->db->from("wa_clients");
			$query = $this->db->get();
			$this->db->insert("wa_clients", $cdata);
			return "added";
		}
		if ($mode == "edit") {
			$this->db->select("*");
			$this->db->from("wa_contents");
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
		$query = $query->from("wa_services")->get();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return $result;
		} else {
			return '';
		}
	}

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
}
