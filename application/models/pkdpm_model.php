<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pkdpm_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function add()
    {
        $this->form_validation->set_rules('txtNimPemilih', 'NIM', 'required|trim|is_unique[hp_kdpm.nim_pemilih]');
        $nimPemilih = $this->session->userdata('nim');

        $kode = $this->input->post('txtKodePemilih');
        $nama = $this->input->post('txtNamaPemilih');
        $nim = $this->input->post('txtNimPemilih');

        $validateNimExist = $this->db->query("SELECT * FROM user WHERE nim = '$nim' ")->row_array();
        $jawaban = "";
        if($nimPemilih == $validateNimExist['nim']){
            $jawaban = "Allowed";
        } else {
            $jawaban = "Not-Allowed";
        }

        $ada = "";
        if(!$validateNimExist){
            $ada = "Gaada";
        } else {
            $ada = "Ada";
        }

        $email = $this->input->post('txtEmailPemilih');
        $id = $this->input->post('txtIdKandidat');
        $kandidat = $this->input->post('txtNamaKandidat');
        $nourut = $this->input->post('txtNoUrutKandidat');

            if(!$validateNimExist['nim']){
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "NIM Gaada Gausah Ngadi Ngadi!.....";
            } else if ($this->form_validation->run() == false) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Anda Sudah Memilih Kandidat DPM.....";
            } else if($jawaban == "Not-Allowed"){
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "NIM Lu bukan ini!, Gausah Ngadi - Ngadi!.....";
            } else if($jawaban == "Allowed"){
                $this->db->simple_query("INSERT INTO hp_kdpm(kode_pemilih, nama_pemilih, nim_pemilih, email_pemilih, id_kandidat, nama_kandidat,no_urut, status)
                    VALUES ('$kode' ,'$nama', '$nim', '$email', '$id', '$kandidat', '$nourut', 'Belum Sah' )");
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Pemilihan Kandidat DPM Telah DiTetapkan.....";
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
        $akses = $this->db->get_where('menu_pemilihan', ['url' => 'pkdpm' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_pemilihan_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }

}