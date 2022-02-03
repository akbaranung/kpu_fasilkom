<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pkhti_model extends CI_Model {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function add()
    {
        $this->form_validation->set_rules('txtNimPemilih', 'NIM', 'required|trim|is_unique[hp_khti.nim_pemilih]');

        $kode = $this->input->post('txtKodePemilih');
        $nama = $this->input->post('txtNamaPemilih');
        $nim = $this->input->post('txtNimPemilih');
        $email = $this->input->post('txtEmailPemilih');
        $id = $this->input->post('txtIdKandidat');
        $kandidat = $this->input->post('txtNamaKandidat');
        $nourut = $this->input->post('txtNoUrutKandidat');

            if ($this->form_validation->run() == false) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Anda Sudah Memilih Kandidat HiMTI.....";
            } else if($this->db->simple_query("INSERT INTO hp_khti(kode_pemilih, nama_pemilih, nim_pemilih, email_pemilih, id_kandidat, nama_kandidat, no_urut, status)
                    VALUES ('$kode' ,'$nama', '$nim', '$email', '$id', '$kandidat', '$nourut', 'Belum Sah' )")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Pemilihan Kandidat HiMTI Telah DiTetapkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        echo json_encode($data);
    }

    public function akses()
    {
        $akses = $this->db->get_where('menu_pemilihan', ['url' => 'pkhti' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_pemilihan_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }

}