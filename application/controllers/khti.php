<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Khti extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('khti_model');
        $am = $this->khti_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_data_kandidat', ['url' => 'khti' ])->row_array();
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
    	$data['title'] = 'Data Kandidat HiMTI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
		$this->load->view('khti_view', $data);
		$this->load->view('footeradmin', $data);
    }

    public function ganti()
    {
        $id = $this->input->post('IdGambarKandidat');
        $delete = $this->input->post('txtGambarGanti');
        $img = $_FILES['img'];
        if($img = ''){} else {
            $config['upload_path'] = './kandidat/HiMTI/';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('img')){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Ganti Gambar Gagal!
                </div>');
                redirect('khti');
            } else {
                $img=$this->upload->data('file_name');

                if(!$delete){

                } else {
                    unlink('./kandidat/HiMTI/'. $delete);
                }
            }
        }

        $data = array(
            'id' => $id,
            'img' => $img
        );

        $this->db->where('id', $id);
        $this->db->update('data_himti', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Ganti Gambar Berhasil!
        </div>');
        redirect('khti');
    }

    public function detail($id)
    {
        $data['kandidat'] = 'HiMTI/';
        $data['title'] = 'Detail Kandidat';
        $data['calon'] = 'HiMTI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userk'] = $this->db->get_where('data_himti', ['id' => $id])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('detail_ik', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data()
    {
        echo $this->khti_model->getData();
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->khti_model->add();
    }

    public function hapus()
    {
        if (!isset($_POST))
        show_404();

        $this->khti_model->hapus();  
    }

}