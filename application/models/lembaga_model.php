<?php if (! defined('BASEPATH')) {exit('No direct script access allowed');}

class Lembaga_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getData()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from home2");
        
        foreach ($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            <button class='btn btn-primary ace-icon fa fa-image' title='Ganti Foto'> Ganti Foto</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->lembaga;
            $row[] = $rowa->deskripsi;
            $row[] = '<img width="200" height="150" src="'. base_url() .'/lembagapic/'. $rowa->image .'" >';
            $row[] = $akses;
            $row[] = $rowa->id;
            $row[] = $rowa->image;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add()
    {
        $nama = $this->input->post('txtNamaLembaga');
        $deskripsi = $this->input->post('txtDeskripsiLembaga');
        $id = $this->input->post('txtIdLembaga');

        $sql = "SELECT * FROM home2 WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0) {
            if ($this->db->simple_query("UPDATE home2
                    SET lembaga = '$nama', deskripsi = '$deskripsi'
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
                $data['msg'][1] = "Isi Nama Lembaga.....";
            } else if (!$deskripsi) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Deskripsi Lembaga.....";
            } else if ($this->db->simple_query("INSERT INTO home2(lembaga, deskripsi)
                    VALUES ('$nama', '$deskripsi')")) {
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Data Lembaga berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Data Lembaga';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        
        if ($this->db->simple_query("DELETE FROM home2 WHERE id = '$id'")) {
            $data['msg'][0] = "hapus";
            $data['msg'][1] = "Data Lembaga berhasil dihapus.....";
        } else {
            $error = $this->db->error();
            $myJSON = json_encode($error['code'].": ".$error['message']);
            $data['msg'][0] = "err";
            $data['msg'][1] = $myJSON;
        }

        $action = 'Delete Data Lembaga';
        addLog($action);
        
        echo json_encode($data);
    }

}