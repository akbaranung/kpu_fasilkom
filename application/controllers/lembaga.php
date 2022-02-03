<?php if (! defined('BASEPATH')) { exit('No direct script access allowed'); }

Class Lembaga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('lembaga_model');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        } else if ($this->session->userdata('role_id') == 1) {
        } else if ($this->session->userdata('role_id') == 2) {
        } else if ($this->session->userdata('role_id') == 99) {
        } else {
            redirect('auth/error403');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Deskripsi Lembaga';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('lembaga_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data()
    {
        echo $this->lembaga_model->getData();
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->lembaga_model->add();
    }

    public function hapus()
    {
        if (!isset($_POST))
        show_404();

        $this->lembaga_model->hapus();  
    }

    public function ganti()
    {
        $id = $this->input->post('IdGambarLembaga');
        $delete = $this->input->post('txtGambarGanti');
        $img = $_FILES['img'];
        if($img = ''){} else {
            $config['upload_path'] = './lembagapic/';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('img')){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Ganti Gambar Gagal!
                </div>');
                redirect('lembaga');
            } else {
                $img=$this->upload->data('file_name');

                if(!$delete){

                } else {
                    unlink('./lembagapic/'. $delete);
                }
            }
        }

        $data = array(
            'id' => $id,
            'image' => $img
        );

        $this->db->where('id', $id);
        $this->db->update('home2', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Ganti Gambar Berhasil!
        </div>');
        redirect('lembaga');
    }

}