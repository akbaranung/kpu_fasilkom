<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Userpage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
    	$data['title'] = 'Home';
        $data['home'] = $this->db->get('home1')->row_array();
        $data['lembaga'] = $this->db->get('home2')->result();

        $this->load->view('userpage/header', $data);
		$this->load->view('userpage/home', $data);
		$this->load->view('userpage/footer', $data);
    }

}