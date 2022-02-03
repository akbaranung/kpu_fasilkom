<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Ikbem extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('ikbem_model');
        $am = $this->ikbem_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_info_kandidat', ['url' => 'ikbem' ])->row_array();
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
        $data['title'] = 'Info Kandidat BEM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kandidat'] = $this->db->get('data_bem')->result();

        $this->load->view('header', $data);
        $this->load->view('ikbem_view', $data);
        $this->load->view('footer', $data);
    }

    public function detail($id)
    {
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost:8080/KPU/ikbem/detail/'. $id .'/index';
        $config['total_rows'] = $this->ikbem_model->countAllRecord();
        $config['per_page'] = 2;

        $config['full_tag_open'] = '<div class="container"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><br>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link ">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(5);
        $data['komen'] = $this->ikbem_model->komenpage($config['per_page'] , $data['start']);

        $data['title'] = 'Info Detail Kandidat';
        $data['kandidat'] = 'BEM/';
        $data['calon'] = 'BEM';
        $data['reply'] = 'reply_bem';
        $data['cekkomen'] = 'komentar_bem';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userk'] = $this->db->get_where('data_bem', ['id' => $id ])->row_array();

        $this->load->view('header', $data);
        $this->load->view('detail_kandidat', $data);
        $this->load->view('footer', $data);
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->ikbem_model->add();
    }

    public function add2()
    {
        if (!isset($_POST))
        show_404();
        
        $this->ikbem_model->add2();
    }

    public function hapuskomentar()
    {
        if (!isset($_POST))
        show_404();

        $this->ikbem_model->hapuskomentar();  
    }

    public function hapusreply()
    {
        if (!isset($_POST))
        show_404();

        $this->ikbem_model->hapusreply();  
    }

}