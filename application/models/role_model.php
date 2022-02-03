<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function getData()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from user_role WHERE id != 99");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt bigger-120' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->id;
            $row[] = $rowa->role;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add()
    {
        $role = $this->input->post('txtRole');
        $role_id = $this->input->post('txtRoleID');
        $id = $this->input->post('txtID');

        $sql = "SELECT * FROM user_role WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE user_role
                    SET id = '$role_id', role = '$role'
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
            if (!$role_id) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom ID.....";
            } else if (!$role) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Role.....";
            } else if($this->db->simple_query("INSERT INTO user_role(id, role)
                    VALUES ('$role_id', '$role')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Role berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Role';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM user_role WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Role berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        $action = 'Delete Role';
        addLog($action);
        
        echo json_encode($data);
    }

    public function akses()
    {
        $akses = $this->db->get_where('menu_awal', ['url' => 'role' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_awal_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }
}