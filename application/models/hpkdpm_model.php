<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hpkdpm_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function getData()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from hp_kdpm WHERE status = 'Belum Sah'");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-primary ace-icon fa fa-check-square' title='Konfirmasi'> Konfirmasi</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button>
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->nama_kandidat;
            $row[] = $rowa->status;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }


    public function add()
    {
        $id = $this->input->post('txtIdHasilPilihan');

        $sql = "SELECT * FROM hp_kdpm WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE hp_kdpm
                    SET status = 'Sah'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Suara Sah.....";
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
        
            if($this->db->simple_query("DELETE FROM hp_kdpm WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Suara berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        $action = 'Delete Hasil Pemungutan Suara DPM';
        addLog($action);

        echo json_encode($data);
    }

    public function akses()
    {
        $akses = $this->db->get_where('menu_hasil', ['url' => 'hpkdpm' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_hasil_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }
}