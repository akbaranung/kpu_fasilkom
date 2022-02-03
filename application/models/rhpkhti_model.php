<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rhpkhti_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function getData()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from hp_khti WHERE status = 'Sah'");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-warning ace-icon fa fa-window-close' title='Batalkan'> Batalkan</button>
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

        $sql = "SELECT * FROM hp_khti WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE hp_khti
                    SET status = 'Belum Sah'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Suara Kembali Belum Sah.....";
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
        
            if($this->db->simple_query("DELETE FROM hp_khti WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Report berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Report Pemungutan Suara HiMTI';
        addLog($action);
        
        echo json_encode($data);
    }

    public function akses()
    {
        $akses = $this->db->get_where('menu_report', ['url' => 'rhpkhti' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_report_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }
}