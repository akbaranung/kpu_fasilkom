<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menucontrol_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    //Menu Awal
    public function getData()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_awal");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->id;
            $row[] = $rowa->menu;
            $row[] = $rowa->url;
            $row[] = $rowa->icon;
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
        $idBaru = $this->input->post('txtIdMenuBaru');
        $namaMenu = $this->input->post('txtNamaMenu');
        $url = $this->input->post('txtUrlController');
        $icon = $this->input->post('txtIconMenu');
        $status = $this->input->post('txtStatusMenu');
        $id = $this->input->post('txtIdMenuUpdate');

        $sql = "SELECT * FROM menu_awal WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_awal
                    SET id = '$idBaru', menu = '$namaMenu', url = '$url', icon = '$icon', is_active = '$status'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Menu berhasil diupdate.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$idBaru) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom ID.....";
            } else if (!$namaMenu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Nama Menu.....";
            } else if (!$url) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Url.....";
            } else if (!$icon) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Icon.....";
            } else if (!$status) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Status.....";
            } else if($this->db->simple_query("INSERT INTO menu_awal(id, menu, url, icon, is_active)
                    VALUES ('$idBaru', '$namaMenu', '$url', '$icon', '$status')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Menu berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Menu Awal';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_awal WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Menu berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Menu Awal';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Awal



    //Menu Akses Peserta
    public function getData2()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_akses_peserta");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->id;
            $row[] = $rowa->menu;
            $row[] = $rowa->url;
            $row[] = $rowa->icon;
            $row[] = $rowa->is_active;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add2()
    {
        $idBaru = $this->input->post('txtIdMenuBaru');
        $namaMenu = $this->input->post('txtNamaMenu');
        $url = $this->input->post('txtUrlController');
        $icon = $this->input->post('txtIconMenu');
        $status = $this->input->post('txtStatusMenu');
        $id = $this->input->post('txtIdMenuUpdate');

        $sql = "SELECT * FROM menu_akses_peserta WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_akses_peserta
                    SET id = '$idBaru', menu = '$namaMenu', url = '$url', icon = '$icon', is_active = '$status'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Menu berhasil diupdate.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$idBaru) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom ID.....";
            } else if (!$namaMenu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Nama Menu.....";
            } else if (!$url) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Url.....";
            } else if (!$icon) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Icon.....";
            } else if (!$status) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Status.....";
            } else if($this->db->simple_query("INSERT INTO menu_akses_peserta(id, menu, url, icon, is_active)
                    VALUES ('$idBaru', '$namaMenu', '$url', '$icon', '$status')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Menu berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Menu Peserta';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus2()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_akses_peserta WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Menu berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Menu Peserta';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Akses Peserta



    //Menu Data Kandidat
    public function getData3()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_data_kandidat");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->id;
            $row[] = $rowa->menu;
            $row[] = $rowa->url;
            $row[] = $rowa->icon;
            $row[] = $rowa->is_active;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add3()
    {
        $idBaru = $this->input->post('txtIdMenuBaru');
        $namaMenu = $this->input->post('txtNamaMenu');
        $url = $this->input->post('txtUrlController');
        $icon = $this->input->post('txtIconMenu');
        $status = $this->input->post('txtStatusMenu');
        $id = $this->input->post('txtIdMenuUpdate');

        $sql = "SELECT * FROM menu_data_kandidat WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_data_kandidat
                    SET id = '$idBaru', menu = '$namaMenu', url = '$url', icon = '$icon', is_active = '$status'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Menu berhasil diupdate.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$idBaru) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom ID.....";
            } else if (!$namaMenu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Nama Menu.....";
            } else if (!$url) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Url.....";
            } else if (!$icon) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Icon.....";
            } else if (!$status) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Status.....";
            } else if($this->db->simple_query("INSERT INTO menu_data_kandidat(id, menu, url, icon, is_active)
                    VALUES ('$idBaru', '$namaMenu', '$url', '$icon', '$status')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Menu berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Menu Data Kandidat';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus3()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_data_kandidat WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Menu berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Menu Data Kandidat';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Data Kandidat



    //Menu Data Komentar
    public function getData4()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_data_komentar");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->id;
            $row[] = $rowa->menu;
            $row[] = $rowa->url;
            $row[] = $rowa->icon;
            $row[] = $rowa->is_active;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add4()
    {
        $idBaru = $this->input->post('txtIdMenuBaru');
        $namaMenu = $this->input->post('txtNamaMenu');
        $url = $this->input->post('txtUrlController');
        $icon = $this->input->post('txtIconMenu');
        $status = $this->input->post('txtStatusMenu');
        $id = $this->input->post('txtIdMenuUpdate');

        $sql = "SELECT * FROM menu_data_komentar WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_data_komentar
                    SET id = '$idBaru', menu = '$namaMenu', url = '$url', icon = '$icon', is_active = '$status'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Menu berhasil diupdate.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$idBaru) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom ID.....";
            } else if (!$namaMenu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Nama Menu.....";
            } else if (!$url) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Url.....";
            } else if (!$icon) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Icon.....";
            } else if (!$status) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Status.....";
            } else if($this->db->simple_query("INSERT INTO menu_data_komentar(id, menu, url, icon, is_active)
                    VALUES ('$idBaru', '$namaMenu', '$url', '$icon', '$status')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Menu berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Menu Data Komentar';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus4()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_data_komentar WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Menu berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        $action = 'Delete Menu Data Komentar';
        addLog($action);

        echo json_encode($data);
    }
    //Menu Data Komentar



    //Menu Data Reply
    public function getData9()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_data_reply");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->id;
            $row[] = $rowa->menu;
            $row[] = $rowa->url;
            $row[] = $rowa->icon;
            $row[] = $rowa->is_active;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add9()
    {
        $idBaru = $this->input->post('txtIdMenuBaru');
        $namaMenu = $this->input->post('txtNamaMenu');
        $url = $this->input->post('txtUrlController');
        $icon = $this->input->post('txtIconMenu');
        $status = $this->input->post('txtStatusMenu');
        $id = $this->input->post('txtIdMenuUpdate');

        $sql = "SELECT * FROM menu_data_reply WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_data_reply
                    SET id = '$idBaru', menu = '$namaMenu', url = '$url', icon = '$icon', is_active = '$status'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Menu berhasil diupdate.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$idBaru) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom ID.....";
            } else if (!$namaMenu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Nama Menu.....";
            } else if (!$url) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Url.....";
            } else if (!$icon) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Icon.....";
            } else if (!$status) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Status.....";
            } else if($this->db->simple_query("INSERT INTO menu_data_reply(id, menu, url, icon, is_active)
                    VALUES ('$idBaru', '$namaMenu', '$url', '$icon', '$status')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Menu berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Menu Data Reply';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus9()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_data_reply WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Menu berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Menu Data Reply';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Data Reply



    //Menu Info Kandidat
    public function getData5()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_info_kandidat");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->id;
            $row[] = $rowa->menu;
            $row[] = $rowa->url;
            $row[] = $rowa->icon;
            $row[] = $rowa->is_active;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add5()
    {
        $idBaru = $this->input->post('txtIdMenuBaru');
        $namaMenu = $this->input->post('txtNamaMenu');
        $url = $this->input->post('txtUrlController');
        $icon = $this->input->post('txtIconMenu');
        $status = $this->input->post('txtStatusMenu');
        $id = $this->input->post('txtIdMenuUpdate');

        $sql = "SELECT * FROM menu_info_kandidat WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_info_kandidat
                    SET id = '$idBaru', menu = '$namaMenu', url = '$url', icon = '$icon', is_active = '$status'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Menu berhasil diupdate.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$idBaru) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom ID.....";
            } else if (!$namaMenu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Nama Menu.....";
            } else if (!$url) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Url.....";
            } else if (!$icon) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Icon.....";
            } else if (!$status) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Status.....";
            } else if($this->db->simple_query("INSERT INTO menu_info_kandidat(id, menu, url, icon, is_active)
                    VALUES ('$idBaru', '$namaMenu', '$url', '$icon', '$status')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Menu berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Menu Info Kandidat';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus5()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_info_kandidat WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Menu berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Menu Info Kandidat';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Info Kandidat



    //Menu Pemilihan Kandidat
    public function getData6()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_pemilihan");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->id;
            $row[] = $rowa->menu;
            $row[] = $rowa->url;
            $row[] = $rowa->icon;
            $row[] = $rowa->is_active;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add6()
    {
        $idBaru = $this->input->post('txtIdMenuBaru');
        $namaMenu = $this->input->post('txtNamaMenu');
        $url = $this->input->post('txtUrlController');
        $icon = $this->input->post('txtIconMenu');
        $status = $this->input->post('txtStatusMenu');
        $id = $this->input->post('txtIdMenuUpdate');

        $sql = "SELECT * FROM menu_pemilihan WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_pemilihan
                    SET id = '$idBaru', menu = '$namaMenu', url = '$url', icon = '$icon', is_active = '$status'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Menu berhasil diupdate.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$idBaru) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom ID.....";
            } else if (!$namaMenu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Nama Menu.....";
            } else if (!$url) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Url.....";
            } else if (!$icon) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Icon.....";
            } else if (!$status) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Status.....";
            } else if($this->db->simple_query("INSERT INTO menu_pemilihan(id, menu, url, icon, is_active)
                    VALUES ('$idBaru', '$namaMenu', '$url', '$icon', '$status')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Menu berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Menu Pemilihan Kandidat';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus6()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_pemilihan WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Menu berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Menu Pemilihan Kandidat';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Pemilihan Kandidat



    //Menu Hasil Pemilihan Kandidat
    public function getData7()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_hasil");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->id;
            $row[] = $rowa->menu;
            $row[] = $rowa->url;
            $row[] = $rowa->icon;
            $row[] = $rowa->is_active;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add7()
    {
        $idBaru = $this->input->post('txtIdMenuBaru');
        $namaMenu = $this->input->post('txtNamaMenu');
        $url = $this->input->post('txtUrlController');
        $icon = $this->input->post('txtIconMenu');
        $status = $this->input->post('txtStatusMenu');
        $id = $this->input->post('txtIdMenuUpdate');

        $sql = "SELECT * FROM menu_hasil WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_hasil
                    SET id = '$idBaru', menu = '$namaMenu', url = '$url', icon = '$icon', is_active = '$status'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Menu berhasil diupdate.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$idBaru) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom ID.....";
            } else if (!$namaMenu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Nama Menu.....";
            } else if (!$url) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Url.....";
            } else if (!$icon) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Icon.....";
            } else if (!$status) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Status.....";
            } else if($this->db->simple_query("INSERT INTO menu_hasil(id, menu, url, icon, is_active)
                    VALUES ('$idBaru', '$namaMenu', '$url', '$icon', '$status')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Menu berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Menu Hasil Pemilihan';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus7()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_hasil WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Menu berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }

        $action = 'Delete Menu Hasil Pemilihan';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Hasil Pemilihan Kandidat



    //Menu Report Hasil Pemilihan Kandidat
    public function getData8()
    {
        $i = 1;
        $user = $this->db->query("SELECT * from menu_report");
        
        foreach($user->result() as $rowa) {
            $akses="
            <center>
            <button class='btn btn-success ace-icon fa fa-edit' title='Ubah'> Edit</button>
            <button class='btn btn-danger ace-icon fa fa-trash-alt' title='Hapus'> Hapus</button> 
            </center>";
            
            $row = array();
            $row[] = $i;
            $row[] = $rowa->id;
            $row[] = $rowa->menu;
            $row[] = $rowa->url;
            $row[] = $rowa->icon;
            $row[] = $rowa->is_active;
            $row[] = $akses;
            $row[] = $rowa->id;

            $data['data'][] = $row;
            $i++;
        }
        echo json_encode($data);
    }

    public function add8()
    {
        $idBaru = $this->input->post('txtIdMenuBaru');
        $namaMenu = $this->input->post('txtNamaMenu');
        $url = $this->input->post('txtUrlController');
        $icon = $this->input->post('txtIconMenu');
        $status = $this->input->post('txtStatusMenu');
        $id = $this->input->post('txtIdMenuUpdate');

        $sql = "SELECT * FROM menu_report WHERE id ='$id'";
        $result =$this->db->query($sql);

        if ($result->num_rows() > 0){
            if($this->db->simple_query("UPDATE menu_report
                    SET id = '$idBaru', menu = '$namaMenu', url = '$url', icon = '$icon', is_active = '$status'
                    WHERE id='$id'")) {       
                $data['msg'][0] = "update";
                $data['msg'][1] = "Menu berhasil diupdate.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        } else {
            if (!$idBaru) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom ID.....";
            } else if (!$namaMenu) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Nama Menu.....";
            } else if (!$url) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Url.....";
            } else if (!$icon) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Icon.....";
            } else if (!$status) {
                $data['msg'][0] = "repeat";
                $data['msg'][1] = "Isi Kolom Status.....";
            } else if($this->db->simple_query("INSERT INTO menu_report(id, menu, url, icon, is_active)
                    VALUES ('$idBaru', '$namaMenu', '$url', '$icon', '$status')")){       
                $data['msg'][0] = "ok";
                $data['msg'][1] = "Menu berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        }

        $action = 'Add / Update Menu Report';
        addLog($action);

        echo json_encode($data);
    }

    public function hapus8()
    {
        $id = $this->input->post('id');
        
            if($this->db->simple_query("DELETE FROM menu_report WHERE id = '$id'")){       
                $data['msg'][0] = "hapus";
                $data['msg'][1] = "Menu berhasil dihapus.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $data['msg'][0] = "err";
                $data['msg'][1] = $myJSON;
            }
        
        $action = 'Delete Menu Report';
        addLog($action);
        
        echo json_encode($data);
    }
    //Menu Report Hasil Pemilihan Kandidat



    public function akses()
    {
        $akses = $this->db->get_where('menu_awal', ['url' => 'menucontrol' ])->row_array();
        $am = $akses['id'];
        $role = $this->session->userdata('role_id');
        $jurusan = $this->session->userdata('jurusan');

        $query = $this->db->query("SELECT menu_id FROM menu_awal_akses WHERE menu_id = '$am' AND role_id = '$role' AND jurusan = '$jurusan'");

        return $query->result();
    }

}