<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Userpdpm extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Pemilihan Kandidat DPM';
        $data['kandidat'] = $this->db->get('data_dpm')->result();

        $this->load->view('userpage/header', $data);
        $this->load->view('userpage/pkdpm_view', $data);
        $this->load->view('userpage/footer', $data);
    }

}