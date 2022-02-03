<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Userpbem extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Pemilihan Kandidat BEM';
        $data['kandidat'] = $this->db->get('data_bem')->result();

        $this->load->view('userpage/header', $data);
        $this->load->view('userpage/pkbem_view', $data);
        $this->load->view('userpage/footer', $data);
    }

}