<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function add()
    {
        $nama = $this->input->post('txtNamaPeserta');
        $id = $this->input->post('txtIdPeserta');

        $sql = "SELECT * FROM user WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE user
                    SET nama = '$nama'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Nama berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        }

        $action = 'Update Nama Profile';
        addLog($action);

        echo json_encode($data);
    }

    public function akses()
    {
        $akses = $this->db->get_where('menu_awal', ['url' => 'profile' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_awal_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }

}