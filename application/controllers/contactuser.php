<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Contactuser extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Contact Us';

        $this->load->view('userpage/header', $data);
		$this->load->view('userpage/contact_view', $data);
		$this->load->view('userpage/footer', $data);
    }

    public function pesan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required' => 'Masukkan Nama!'
        ]);

        $this->form_validation->set_rules('nim', 'NIM', 'required|trim',[
            'required' => 'Masukkan NIM!',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
            'required' => 'Masukkan Email!',
            'valid_email' => 'Email Tidak Valid!',
        ]);

        $this->form_validation->set_rules('notelpon', 'No. Telpon', 'required|trim',[
            'required' => 'Masukkan Nomor Telepon!',
        ]);
        
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim',[
            'required' => 'Masukkan Jurusan!'
        ]);

        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required|trim|min_length[4]',[
            'required' => 'Masukkan Detail Angkatan!',
            'min_length' => 'Minimal 4 Karakter (Contoh : 2018)!'
        ]);

        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim',[
            'required' => 'Masukkan Pesan!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Contact Us';
            $this->load->view('userpage/header', $data);
            $this->load->view('userpage/contact_view', $data);
            $this->load->view('userpage/footer', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pesan Gagal Dikirim!.
            </div>');

        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'email' => $this->input->post('email'),
                'no_telpon' => $this->input->post('notelpon'),
                'jurusan' => $this->input->post('jurusan'),
                'angkatan' => $this->input->post('angkatan'),
                'tanggal' => $this->input->post('tanggal'),
                'pesan' => $this->input->post('pesan'),
                'status' => $this->input->post('status'),
                'status_akun' => 'Nonaktif',
                'gambar' => 'default.png'
            ];

            $this->db->insert('message', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pesan Berhasil Dikirim!.
            </div>');
            redirect('contactuser');
        }
    }

}