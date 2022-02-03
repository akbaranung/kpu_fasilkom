<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Homedesc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('homedesc_model');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        } elseif ($this->session->userdata('role_id') == 1) {
        } elseif ($this->session->userdata('role_id') == 2) {
        } elseif ($this->session->userdata('role_id') == 99) {
        } else {
            redirect('auth/error403');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Deskripsi Halaman Depan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('homedesc_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data()
    {
        echo $this->homedesc_model->getData();
    }

    public function add()
    {
        if (!isset($_POST)) {
            show_404();
        }
        
        $this->homedesc_model->add();
    }

    public function hapus()
    {
        if (!isset($_POST)) {
            show_404();
        }

        $this->homedesc_model->hapus();
    }

}
