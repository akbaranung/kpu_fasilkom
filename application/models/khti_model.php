<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Khti_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function getData()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from data_himti");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            <button class='btn btn-primary ace-icon fa fa-image' title='Ganti Foto'> Ganti Foto</button> 
            <a href='khti/detail/$rowa->id' class='tooltip-error' data-rel='tooltip' title='Detail' ><button class='btn btn-info ace-icon fa fa-user-circle'> Detail</button></a> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = '<img width="200" height="150" src="'. base_url() .'/kandidat/HiMTI/'. $rowa->img .'" >';
            $row[] = $rowa->nama;
            $row[] = $rowa->no_urut;
            $row[] = $rowa->slogan;
            $row[] = $rowa->visi;
            $row[] = $rowa->misi;
            $row[] = $akses;
            $row[] = $rowa->id;
            $row[] = $rowa->img;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add()
    {
        $nama = $this->input->post('txtNamaKandidat');
        $nourut = $this->input->post('txtNoUrutKandidat');
        $slogan = $this->input->post('txtSloganKandidat');
        $visi = $this->input->post('txtVisiKandidat');
        $misi = $this->input->post('txtMisiKandidat');
        $id = $this->input->post('txtIdKandidat');

        $sql = "SELECT * FROM data_himti WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE data_himti
                    SET nama = '$nama', no_urut = '$nourut', slogan = '$slogan', visi = '$visi', misi = '$misi'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Data berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$nama) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Nama.....";
            } else if (!$nourut) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom No Urut.....";
            } else if (!$slogan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Slogan.....";
            } else if (!$visi) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Visi.....";
            } else if (!$misi) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Misi.....";
            } else if($this->db->simple_query("INSERT INTO data_himti(nama, no_urut, slogan, visi, misi)
                    VALUES ('$nama', '$nourut', '$slogan', '$visi', '$misi')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Kandidat berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Data HiMTI';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM data_himti WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Kandidat berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Data HiMTI';
        addLog($action);
        
        echo json_encode($data);
    }

    public function akses()
    {
        $akses = $this->db->get_where('menu_data_kandidat', ['url' => 'khti' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_data_kandidat_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }
}