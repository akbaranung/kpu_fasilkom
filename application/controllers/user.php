<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('user_model');
        $am = $this->user_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_awal', ['url' => 'user' ])->row_array();
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
    	$data['title'] = 'Home';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['home'] = $this->db->get('home1')->row_array();
        $data['lembaga'] = $this->db->get('home2')->result();

        $this->load->view('header', $data);
		$this->load->view('home', $data);
		$this->load->view('footer', $data);
    }

}