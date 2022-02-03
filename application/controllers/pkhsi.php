<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Pkhsi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('pkhsi_model');
        $am = $this->pkhsi_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_pemilihan', ['url' => 'pkhsi' ])->row_array();
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
        $data['title'] = 'Pemilihan Kandidat Himsisfo';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kandidat'] = $this->db->get('data_himsisfo')->result();

        $this->load->view('header', $data);
        $this->load->view('pkhsi_view', $data);
        $this->load->view('footer', $data);
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->pkhsi_model->add();
    }

}