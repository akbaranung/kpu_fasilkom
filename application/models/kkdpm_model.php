<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Kkdpm_model extends CI_Model {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function getData()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from komentar_dpm");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button>
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->nama_pengomentar;
            $row[] = $rowa->nim_pengomentar;
            $row[] = $rowa->email_pengomentar;
            $row[] = '<img width="200" height="150" src="'. base_url() .'/assets/img/profile/'. $rowa->gambar .'" >';
            $row[] = $rowa->tanggal;
            $row[] = $rowa->komentar;
            $row[] = $rowa->id_kandidat;
            $row[] = $rowa->nama_kandidat;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add()
    {
        $namaAsli = $this->input->post('txtNamaAsli');
        $nim = $this->input->post('txtNim');
        $email = $this->input->post('txtEmail');
        $date = $this->input->post('txtDate');
        $komentar = $this->input->post('txtIsiKomentar');
        $idKandidat = $this->input->post('txtIdKandidat');
        $namaKandidat = $this->input->post('txtNamaKandidat');
        $id = $this->input->post('txtIdKomentar');

        $sql = "SELECT * FROM komentar_dpm WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE komentar_dpm
                    SET nama_pengomentar = '$namaAsli', nim_pengomentar = '$nim', email_pengomentar = '$email', tanggal = '$date', komentar = '$komentar', id_kandidat = '$idKandidat', nama_kandidat = '$namaKandidat'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Data berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        }

        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM komentar_dpm WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Data berhasil dihapus.....";
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
        $akses = $this->db->get_where('menu_data_komentar', ['url' => 'kkdpm' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_data_komentar_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }
}