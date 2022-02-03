<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Useribem extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('ikbem_model');
    }

    public function index()
    {
        $data['title'] = 'Info Kandidat BEM';
        $data['kandidat'] = $this->db->get('data_bem')->result();

        $this->load->view('userpage/header', $data);
        $this->load->view('userpage/ikbem_view', $data);
        $this->load->view('userpage/footer', $data);
    }

    public function detail($id)
    {
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/KPU/useribem/detail/'. $id .'/index';
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
        $data['userk'] = $this->db->get_where('data_bem', ['id' => $id ])->row_array();

        $this->load->view('userpage/header', $data);
        $this->load->view('userpage/detail_kandidat', $data);
        $this->load->view('userpage/footer', $data);
    }

}