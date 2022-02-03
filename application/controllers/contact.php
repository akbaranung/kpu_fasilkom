<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Contact Us';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('header', $data);
        $this->load->view('contact_view', $data);
        $this->load->view('footer', $data);
    }

    public function pesan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim',[
            'required' => 'Masukkan Pesan!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Contact Us';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('header', $data);
            $this->load->view('contact_view', $data);
            $this->load->view('footer', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pesan Gagal Dikirim!.
            </div>');

        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'email' => $this->input->post('email'),
                'no_telpon' => 'Akun Aktif',
                'jurusan' => $this->input->post('jurusan'),
                'angkatan' => $this->input->post('angkatan'),
                'tanggal' => $this->input->post('tanggal'),
                'pesan' => $this->input->post('pesan'),
                'status' => $this->input->post('status'),
                'status_akun' => 'Aktif',
                'gambar' => $this->input->post('img')
            ];

            $this->db->insert('message', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pesan Berhasil Dikirim!.
            </div>');
            redirect('contact');
        }
    }

}