<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Masteradmin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('masteradmin_model');
        $am = $this->masteradmin_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_awal', ['url' => 'masteradmin' ])->row_array();
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
    	$data['title'] = 'Data Master Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
		$this->load->view('masteradmin_view', $data);
		$this->load->view('footeradmin', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Master Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userp'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('user_detail', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data()
    {
        echo $this->masteradmin_model->getData();
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->masteradmin_model->add();
    }

    public function hapus()
    {
        if (!isset($_POST))
        show_404();

        $this->masteradmin_model->hapus();  
    }

}