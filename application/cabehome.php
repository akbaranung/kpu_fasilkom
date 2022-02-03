<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabehome extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('admin/header',$data);
      	$this->load->view('admin/menu');
      	$this->load->view('admin/home',$data);
     	$this->load->view('admin/footer');
	}

}