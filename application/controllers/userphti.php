<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Userphti extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Pemilihan Kandidat HiMTI';
        $data['kandidat'] = $this->db->get('data_himti')->result();

        $this->load->view('userpage/header', $data);
        $this->load->view('userpage/pkhti_view', $data);
        $this->load->view('userpage/footer', $data);
    }

}