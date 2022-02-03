<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Message extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('message_model');
        $this->load->library('pagination');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        } else if ($this->session->userdata('role_id') == 1){

        } else if ($this->session->userdata('role_id') == 2){

        } else if ($this->session->userdata('role_id') == 99){

        } else {
            redirect('auth/error403');
        }
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost:8080/KPU/message/index';
        $config['total_rows'] = $this->message_model->countAllRecord();
        $config['per_page'] = 5;

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

        $data['start'] = $this->uri->segment(3);
        $data['komen'] = $this->message_model->komenpage($config['per_page'] , $data['start']);

    	$data['title'] = 'Pesan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesan'] = $this->db->get('message')->result();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
		$this->load->view('pesan', $data);
		$this->load->view('footeradmin', $data);
    }

    public function baca()
    {
        $id = $this->input->post('txtIdPesan');

        $this->db->set('status', 'Readed');
        $this->db->where('id', $id);
        $this->db->update('message');

        redirect('message');
    }

    public function gajadibaca()
    {
        $id = $this->input->post('txtIdPesan');

        $this->db->set('status', 'Unreaded');
        $this->db->where('id', $id);
        $this->db->update('message');

        redirect('message');
    }

    public function hapus()
    {
        $id = $this->input->post('txtIdPesan');

        $this->db->delete('message', ['id' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Pesan Berhasil Dihapus.
        </div>');

        redirect('message');
    }

    public function readall()
    {
        $this->db->query("UPDATE message SET status = 'Readed'");

        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Semua Pesan Telah Dibaca.
        </div>');

        redirect('message');
    }

    public function unreadall()
    {
        $this->db->query("UPDATE message SET status = 'Unreaded'");

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Semua Pesan Belum Dibaca.
        </div>');

        redirect('message');
    }

    public function pesan()
    {
        $this->load->library('email');
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'application.system328@gmail.com',
            'smtp_pass' => 'applicationsystem328forapp',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('application.system328@gmail.com', 'KPU System');
        $this->email->to($this->input->post('txtPesanByEmail'));

        $this->email->subject('Attention');
        $this->email->message($this->input->post('txtPesanToEmail'));

        $this->form_validation->set_rules('txtPesanToEmail', 'txtPesanToEmail', 'required|trim');

        if ($this->form_validation->run() == false){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Masukkan Pesan Terlebih Dahulu!.
            </div>');
            redirect('message');
        } else {
            $this->email->send();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pesan Berhasil Dikirim.
            </div>');

            redirect('message');
        }

    }

}