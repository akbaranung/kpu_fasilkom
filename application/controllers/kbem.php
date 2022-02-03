<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Kbem extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('kbem_model');
        $am = $this->kbem_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_data_kandidat', ['url' => 'kbem' ])->row_array();
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
    	$data['title'] = 'Data Kandidat BEM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
		$this->load->view('kbem_view', $data);
		$this->load->view('footeradmin', $data);
    }

    public function ganti()
    {
        $id = $this->input->post('IdGambarKandidat');
        $delete = $this->input->post('txtGambarGanti');
        $img = $_FILES['img'];
        if($img = ''){} else {
            $config['upload_path'] = './kandidat/BEM/';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('img')){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Ganti Gambar Gagal!
                </div>');
                redirect('kbem');
            } else {
                $img=$this->upload->data('file_name');

                if(!$delete){

                } else {
                    unlink('./kandidat/BEM/'. $delete);
                }
            }
        }

        $data = array(
            'id' => $id,
            'img' => $img
        );

        $this->db->where('id', $id);
        $this->db->update('data_bem', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Ganti Gambar Berhasil!
        </div>');
        redirect('kbem');
    }

    public function detail($id)
    {
        $data['kandidat'] = 'BEM/';
        $data['title'] = 'Detail Kandidat';
        $data['calon'] = 'BEM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userk'] = $this->db->get_where('data_bem', ['id' => $id])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('detail_ik', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data()
    {
        echo $this->kbem_model->getData();
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->kbem_model->add();
    }

    public function hapus()
    {
        if (!isset($_POST))
        show_404();

        $this->kbem_model->hapus();  
    }

}