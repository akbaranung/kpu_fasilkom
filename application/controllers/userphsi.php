<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Userphsi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Pemilihan Kandidat Himsisfo';
        $data['kandidat'] = $this->db->get('data_himsisfo')->result();

        $this->load->view('userpage/header', $data);
        $this->load->view('userpage/pkhsi_view', $data);
        $this->load->view('userpage/footer', $data);
    }

}