<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Homedesc_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getData()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from home1");
        
        foreach ($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->sub_header;
            $row[] = $rowa->header;
            $row[] = $rowa->isi;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add()
    {
        $subHeader = $this->input->post('txtSubHeader');
        $header = $this->input->post('txtHeader');
        $isi = $this->input->post('txtIsi');
        $id = $this->input->post('txtIdHomeDeskripsi');

        $sql = "SELECT * FROM home1 WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0) {
            if ($this->db->simple_query("UPDATE home1
                    SET sub_header = '$subHeader', header = '$header', isi = '$isi'
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
            if (!$subHeader) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Sub Header Deskripsi.....";
            } else if (!$header) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Header Deskripsi.....";
            } else if (!$isi) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Deskripsi.....";
            } else if ($this->db->simple_query("INSERT INTO home1(sub_header, header, isi)
                    VALUES ('$subHeader', '$header', '$isi')")) {
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Data Deskripsi Berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Data Home Desc';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        
        if ($this->db->simple_query("DELETE FROM home1 WHERE id = '$id'")) {
            $data['msg'][0] = "hapus";
            $data['msg'][1] = "Data Deskripsi berhasil dihapus.....";
        } else {
            $error = $this->db->error();
            $myJSON = json_encode($error['code'].": ".$error['message']);
            $data['msg'][0] = "err";
            $data['msg'][1] = $myJSON;
        }

        $action = 'Delete Data Home Desc';
        addLog($action);
        
        echo json_encode($data);
    }
}
