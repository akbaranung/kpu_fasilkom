<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Menuaksescontrol_model extends CI_Model {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    //Menu Awal Akses
    public function getData()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_awal_akses WHERE role_id != 99 ");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->role_id;
            $row[] = $rowa->jurusan;
            $row[] = $rowa->menu_id;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add()
    {
        $role = $this->input->post('txtRoleID');
        $jurusan = $this->input->post('txtJurusan');
        $menu = $this->input->post('txtMenuId');
        $id = $this->input->post('txtIdAkses');

        $sql = "SELECT * FROM menu_awal_akses WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_awal_akses
                    SET role_id = '$role', jurusan = '$jurusan', menu_id = '$menu'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Akses berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$role) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Role.....";
            } else if (!$jurusan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Jurusan.....";
            } else if (!$menu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Menu.....";
            } else if($this->db->simple_query("INSERT INTO menu_awal_akses(role_id, jurusan, menu_id)
                    VALUES ('$role', '$jurusan', '$menu')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Akses berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Akses Menu Awal';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_awal_akses WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Akses berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Akses Menu Awal';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Awal Akses



    //Menu Akses Peserta Akses
    public function getData2()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_akses_peserta_akses WHERE role_id != 99 ");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->role_id;
            $row[] = $rowa->jurusan;
            $row[] = $rowa->menu_id;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add2()
    {
        $role = $this->input->post('txtRoleID');
        $jurusan = $this->input->post('txtJurusan');
        $menu = $this->input->post('txtMenuId');
        $id = $this->input->post('txtIdAkses');

        $sql = "SELECT * FROM menu_akses_peserta_akses WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_akses_peserta_akses
                    SET role_id = '$role', jurusan = '$jurusan', menu_id = '$menu'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Akses berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$role) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Role.....";
            } else if (!$jurusan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Jurusan.....";
            } else if (!$menu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Menu.....";
            } else if($this->db->simple_query("INSERT INTO menu_akses_peserta_akses(role_id, jurusan, menu_id)
                    VALUES ('$role', '$jurusan', '$menu')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Akses berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Akses Menu Peserta';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus2()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_akses_peserta_akses WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Akses berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Akses Menu Peserta';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Akses Peserta Akses



    //Menu Data Kandidat Akses
    public function getData3()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_data_kandidat_akses WHERE role_id != 99 ");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->role_id;
            $row[] = $rowa->jurusan;
            $row[] = $rowa->menu_id;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add3()
    {
        $role = $this->input->post('txtRoleID');
        $jurusan = $this->input->post('txtJurusan');
        $menu = $this->input->post('txtMenuId');
        $id = $this->input->post('txtIdAkses');

        $sql = "SELECT * FROM menu_data_kandidat_akses WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_data_kandidat_akses
                    SET role_id = '$role', jurusan = '$jurusan', menu_id = '$menu'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Akses berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$role) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Role.....";
            } else if (!$jurusan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Jurusan.....";
            } else if (!$menu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Menu.....";
            } else if($this->db->simple_query("INSERT INTO menu_data_kandidat_akses(role_id, jurusan, menu_id)
                    VALUES ('$role', '$jurusan', '$menu')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Akses berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Akses Menu Data Kandidat';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus3()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_data_kandidat_akses WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Akses berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Akses Menu Data Kandidat';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Data Kandidat Akses



    //Menu Data Komentar Akses
    public function getData4()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_data_komentar_akses WHERE role_id != 99");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->role_id;
            $row[] = $rowa->jurusan;
            $row[] = $rowa->menu_id;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add4()
    {
        $role = $this->input->post('txtRoleID');
        $jurusan = $this->input->post('txtJurusan');
        $menu = $this->input->post('txtMenuId');
        $id = $this->input->post('txtIdAkses');

        $sql = "SELECT * FROM menu_data_komentar_akses WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_data_komentar_akses
                    SET role_id = '$role', jurusan = '$jurusan', menu_id = '$menu'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Akses berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$role) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Role.....";
            } else if (!$jurusan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Jurusan.....";
            } else if (!$menu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Menu.....";
            } else if($this->db->simple_query("INSERT INTO menu_data_komentar_akses(role_id, jurusan, menu_id)
                    VALUES ('$role', '$jurusan', '$menu')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Akses berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Akses Menu Data Komentar';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus4()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_data_komentar_akses WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Akses berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Akses Menu Data Komentar';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Data Komentar Akses



    //Menu Data Reply Akses
    public function getData9()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_data_reply_akses WHERE role_id != 99");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->role_id;
            $row[] = $rowa->jurusan;
            $row[] = $rowa->menu_id;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add9()
    {
        $role = $this->input->post('txtRoleID');
        $jurusan = $this->input->post('txtJurusan');
        $menu = $this->input->post('txtMenuId');
        $id = $this->input->post('txtIdAkses');

        $sql = "SELECT * FROM menu_data_reply_akses WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_data_reply_akses
                    SET role_id = '$role', jurusan = '$jurusan', menu_id = '$menu'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Akses berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$role) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Role.....";
            } else if (!$jurusan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Jurusan.....";
            } else if (!$menu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Menu.....";
            } else if($this->db->simple_query("INSERT INTO menu_data_reply_akses(role_id, jurusan, menu_id)
                    VALUES ('$role', '$jurusan', '$menu')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Akses berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Akses Menu Data Reply';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus9()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_data_reply_akses WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Akses berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Akses Menu Data Reply';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Data Reply Akses



    //Menu Info Kandidat Akses
    public function getData5()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_info_kandidat_akses WHERE role_id != 99");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->role_id;
            $row[] = $rowa->jurusan;
            $row[] = $rowa->menu_id;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add5()
    {
        $role = $this->input->post('txtRoleID');
        $jurusan = $this->input->post('txtJurusan');
        $menu = $this->input->post('txtMenuId');
        $id = $this->input->post('txtIdAkses');

        $sql = "SELECT * FROM menu_info_kandidat_akses WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_info_kandidat_akses
                    SET role_id = '$role', jurusan = '$jurusan', menu_id = '$menu'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Akses berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$role) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Role.....";
            } else if (!$jurusan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Jurusan.....";
            } else if (!$menu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Menu.....";
            } else if($this->db->simple_query("INSERT INTO menu_info_kandidat_akses(role_id, jurusan, menu_id)
                    VALUES ('$role', '$jurusan', '$menu')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Akses berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Akses Menu Info Kandidat';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus5()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_info_kandidat_akses WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Akses berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Akses Menu Info Kandidat';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Info Kandidat Akses



    //Menu Pemilihan Kandidat Akses
    public function getData6()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_pemilihan_akses WHERE role_id != 99");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->role_id;
            $row[] = $rowa->jurusan;
            $row[] = $rowa->menu_id;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add6()
    {
        $role = $this->input->post('txtRoleID');
        $jurusan = $this->input->post('txtJurusan');
        $menu = $this->input->post('txtMenuId');
        $id = $this->input->post('txtIdAkses');

        $sql = "SELECT * FROM menu_pemilihan_akses WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_pemilihan_akses
                    SET role_id = '$role', jurusan = '$jurusan', menu_id = '$menu'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Akses berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$role) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Role.....";
            } else if (!$jurusan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Jurusan.....";
            } else if (!$menu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Menu.....";
            } else if($this->db->simple_query("INSERT INTO menu_pemilihan_akses(role_id, jurusan, menu_id)
                    VALUES ('$role', '$jurusan', '$menu')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Akses berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Akses Menu Pemilihan';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus6()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_pemilihan_akses WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Akses berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Akses Menu Pemilihan';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Pemilihan Kandidat Akses



    //Menu Hasil Pemilihan Kandidat Akses
    public function getData7()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_hasil_akses WHERE role_id != 99");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->role_id;
            $row[] = $rowa->jurusan;
            $row[] = $rowa->menu_id;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add7()
    {
        $role = $this->input->post('txtRoleID');
        $jurusan = $this->input->post('txtJurusan');
        $menu = $this->input->post('txtMenuId');
        $id = $this->input->post('txtIdAkses');

        $sql = "SELECT * FROM menu_hasil_akses WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_hasil_akses
                    SET role_id = '$role', jurusan = '$jurusan', menu_id = '$menu'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Akses berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$role) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Role.....";
            } else if (!$jurusan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Jurusan.....";
            } else if (!$menu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Menu.....";
            } else if($this->db->simple_query("INSERT INTO menu_hasil_akses(role_id, jurusan, menu_id)
                    VALUES ('$role', '$jurusan', '$menu')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Akses berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Akses Menu Hasil';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus7()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_hasil_akses WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Akses berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Akses Menu Hasil';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Hasil Pemilihan Kandidat Akses



    //Menu Report Hasil Pemilihan Kandidat Akses
    public function getData8()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_report_akses WHERE role_id != 99");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->role_id;
            $row[] = $rowa->jurusan;
            $row[] = $rowa->menu_id;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add8()
    {
        $role = $this->input->post('txtRoleID');
        $jurusan = $this->input->post('txtJurusan');
        $menu = $this->input->post('txtMenuId');
        $id = $this->input->post('txtIdAkses');

        $sql = "SELECT * FROM menu_report_akses WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_report_akses
                    SET role_id = '$role', jurusan = '$jurusan', menu_id = '$menu'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Akses berhasil diubah.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$role) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Role.....";
            } else if (!$jurusan) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Jurusan.....";
            } else if (!$menu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Menu.....";
            } else if($this->db->simple_query("INSERT INTO menu_report_akses(role_id, jurusan, menu_id)
                    VALUES ('$role', '$jurusan', '$menu')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Akses berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Akses Menu Report';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus8()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_report_akses WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Akses berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Akses Menu Report';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Report Hasil Pemilihan Kandidat Akses

    public function akses()
    {
        $akses = $this->db->get_where('menu_awal', ['url' => 'menuaksescontrol' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_awal_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }
}