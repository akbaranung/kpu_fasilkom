<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Control2 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('control2_model');
        $am = $this->control2_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_akses_peserta', ['url' => 'control2' ])->row_array();
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
    	$data['title'] = 'Data Peserta Aktivasi Awal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
		$this->load->view('control2_view', $data);
		$this->load->view('footeradmin', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userp'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('user_detail', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data()
    {
        echo $this->control2_model->getData();
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->control2_model->add();
    }

    public function hapus()
    {
        if (!isset($_POST))
        show_404();

        $this->control2_model->hapus();  
    }

}