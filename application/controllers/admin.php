<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('admin_model');
        $am = $this->admin_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_awal', ['url' => 'admin' ])->row_array();
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
    	$data['title'] = 'Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['log'] = $this->db->query("SELECT aksi, COUNT(aksi) AS jumlah FROM log  GROUP BY aksi")->result();

        $this->load->view('headeradminfirst', $data);
        $this->load->view('sidebaradmin', $data);
		$this->load->view('graph', $data);
		$this->load->view('footeradmin', $data);
    }

    public function deact() {
        if(!$this->session->userdata('email')){
			redirect('auth');
		} else if ($this->session->userdata('role_id') != 99) {
            redirect('auth');
        } else {
            $this->db->query("UPDATE user SET is_active = 2 WHERE role_id != 99 ");

            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            All Users Are Deactivated
            </div>');

            redirect('admin');

        }
    }

    public function act() {
        if(!$this->session->userdata('email')){
			redirect('auth');
		} else if ($this->session->userdata('role_id') != 99) {
            redirect('auth');
        } else {
            $this->db->query("UPDATE user SET is_active = 1");

            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            All Users Are Activated Back
            </div>');

            redirect('admin');
        }
    }

    public function ban() {
        $ip = $this->input->post('ip');
        $data = [
            'ip_address' => $ip
        ];

        if(!$this->session->userdata('email')){
			redirect('auth');
		} else if ($this->session->userdata('role_id') != 99) {
            redirect('auth');
        } else {
            $this->db->insert('ban', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            The Ip Has Banned
            </div>');

            redirect('admin');
        }
    }

}