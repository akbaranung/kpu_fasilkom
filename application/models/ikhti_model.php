<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Ikhti_model extends CI_Model {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function add()
    {
        $namaAsli = $this->input->post('txtNamaAsli');
        $nim = $this->input->post('txtNim');
        $email = $this->input->post('txtEmail');
        $gambar = $this->input->post('txtGambar');
        $date = $this->input->post('txtDate');
        $komentar = $this->input->post('txtKomentar');
        $idKandidat = $this->input->post('txtIdKandidat');
        $namaKandidat = $this->input->post('txtNamaKandidat');

            if (!$komentar) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Masukkan Komentar.....";
            } else if($this->db->simple_query("INSERT INTO komentar_himti(nama_pengomentar, nim_pengomentar, email_pengomentar, gambar, tanggal, komentar, id_kandidat, nama_kandidat)
                    VALUES ('$namaAsli' ,'$nim', '$email', '$gambar', '$date', '$komentar', '$idKandidat', '$namaKandidat')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Komentar Berhasil Dikirim.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        echo json_encode($data);
    }

    public function add2()
    {
        $namaAsli = $this->input->post('txtNamaPembalas');
        $nim = $this->input->post('txtNimPembalas');
        $email = $this->input->post('txtEmailPembalas');
        $gambar = $this->input->post('txtGambarPembalas');
        $date = $this->input->post('txtDateBalasan');
        $balasan = $this->input->post('txtBalasan');
        $nimp = $this->input->post('txtNimPengomentar');
        $idKomentar = $this->input->post('txtIdKomentar');
        $idKandidat = $this->input->post('txtIdKandidat');
        $namaKandidat = $this->input->post('txtNamaKandidat');

            if (!$balasan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Masukkan Balasan.....";
            } else if($this->db->simple_query("INSERT INTO reply_himti(nama_pembalas, nim_pembalas, email_pembalas, gambar, tanggal, balasan, nim_pengomentar, id_komentar, id_kandidat, nama_kandidat)
                    VALUES ('$namaAsli' ,'$nim', '$email', '$gambar', '$date', '$balasan','$nimp','$idKomentar', '$idKandidat', '$namaKandidat')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Balasan Berhasil Dikirim.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        echo json_encode($data);
    }

    public function hapuskomentar()
    {
        $id = $this->input->post('txtIdHapusKomentar');
        
            if($this->db->simple_query("DELETE FROM komentar_himti WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Komentar berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        echo json_encode($data);
    }

    public function hapusreply()
    {
        $id = $this->input->post('txtIdHapusReply');
        
            if($this->db->simple_query("DELETE FROM reply_himti WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Balasan berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        echo json_encode($data);
    }

    public function komenpage($limit, $start)
    {
        $id = $this->uri->segment(3);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('komentar_himti',['id_kandidat' => $id ], $limit, $start)->result();
    }

    public function countAllRecord()
    {
        $id = $this->uri->segment(3);
        return $this->db->get_where('komentar_himti',['id_kandidat' => $id ])->num_rows();
    }

    public function akses()
    {
        $akses = $this->db->get_where('menu_info_kandidat', ['url' => 'ikhti' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_info_kandidat_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }

}