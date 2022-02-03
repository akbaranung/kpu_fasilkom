<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Rkkhti extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('rkkhti_model');
        $am = $this->rkkhti_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_data_reply', ['url' => 'rkkhti' ])->row_array();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        } else if (!$am){
            redirect('auth/error403');
        } else if ($akses['is_active'] == 2){
            redirect('auth/error404');
        } else if ($user['is_active'] == 1){

        } else {
            redirect('auth/error403');
        }
    }

    public function index()
    {
    	$data['title'] = 'Data Reply Komentar Kandidat HiMTI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
		$this->load->view('rkkhti_view', $data);
		$this->load->view('footeradmin', $data);
    }

    public function daftar_data()
    {
        echo $this->rkkhti_model->getData();
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->rkkhti_model->add();
    }

    public function hapus()
    {
        if (!isset($_POST))
        show_404();

        $this->rkkhti_model->hapus();  
    }

}