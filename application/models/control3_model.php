<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control3_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function getData()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from user WHERE is_active = 1 AND role_id != 1 AND role_id != 99");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button>
            <a href='control3/detail/$rowa->id' class='tooltip-error' data-rel='tooltip' title='Detail' ><button class='btn btn-info ace-icon fa fa-user-circle'> Detail</button></a> 
            <button class='btn btn-primary ace-icon fa fa-share-square' title='Notif'> Notif</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->nama;
            $row[] = $rowa->nim;
            $row[] = $rowa->email;
            $row[] = '<img width="200" height="150" src="'. base_url() .'/assets/img/profile/'. $rowa->img .'" >';
            $row[] = '<img width="200" height="150" src="'. base_url() .'/ktm/'. $rowa->ktm .'" >';
            $row[] = $rowa->angkatan;
            $row[] = $rowa->jurusan;
            $row[] = $rowa->role_id;
            $row[] = $rowa->is_active;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add()
    {
        $nama = $this->input->post('txtNamaPeserta');
        $nim = $this->input->post('txtNIM');
        $email = $this->input->post('txtEmailPeserta');
        $angkatan = $this->input->post('txtAngkatanPeserta');
        $jurusan = $this->input->post('txtJurusanPeserta');
        $role = $this->input->post('txtRolePeserta');
        $status = $this->input->post('txtStatusPeserta');
        $id = $this->input->post('txtIdPeserta');

        $sql = "SELECT * FROM user WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE user
                    SET nama = '$nama', nim = '$nim' , email = '$email', angkatan = '$angkatan', jurusan = '$jurusan', role_id = '$role', is_active = '$status'
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

        $action = 'Update Data Peserta Aktif';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM user WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Data berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Data Peserta Aktif';
        addLog($action);
        
        echo json_encode($data);
    }

    public function akses()
    {
        $akses = $this->db->get_where('menu_akses_peserta', ['url' => 'control3' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_akses_peserta_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }
}