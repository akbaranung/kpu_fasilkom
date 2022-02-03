<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Menucontrol extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('menucontrol_model');
        $am = $this->menucontrol_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_awal', ['url' => 'menucontrol' ])->row_array();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        } else if (!$am){
            redirect('auth/error403');
        } else if ($akses['is_active'] == 2){
            redirect('auth/error404');
        } else if ($user['is_active'] == 1){

        } else {
            redirect('auth/error403');
        }
    }

    public function index()
    {
    	$data['title'] = 'Menu Control';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
		$this->load->view('menucontrol_view', $data);
		$this->load->view('footeradmin', $data);
    }

    //Menu Awal
    public function menuawal()
    {
        $data['title'] = 'Menu Awal Control';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menuawal_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data()
    {
        echo $this->menucontrol_model->getData();
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menucontrol_model->add();
    }

    public function hapus()
    {
        if (!isset($_POST))
        show_404();

        $this->menucontrol_model->hapus();  
    }
    //Menu Awal



    //Menu Akses Peserta
    public function menupeserta()
    {
        $data['title'] = 'Menu Peserta Control';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menupeserta_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data2()
    {
        echo $this->menucontrol_model->getData2();
    }

    public function add2()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menucontrol_model->add2();
    }

    public function hapus2()
    {
        if (!isset($_POST))
        show_404();

        $this->menucontrol_model->hapus2();  
    }
    //Menu Akses Peserta



    //Menu Data Kandidat
    public function menukandidat()
    {
        $data['title'] = 'Menu Data Kandidat Control';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menukandidat_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data3()
    {
        echo $this->menucontrol_model->getData3();
    }

    public function add3()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menucontrol_model->add3();
    }

    public function hapus3()
    {
        if (!isset($_POST))
        show_404();

        $this->menucontrol_model->hapus3();  
    }
    //Menu Data Kandidat



    //Menu Data Komentar
    public function menukomentar()
    {
        $data['title'] = 'Menu Data Komentar Control';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menukomentar_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data4()
    {
        echo $this->menucontrol_model->getData4();
    }

    public function add4()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menucontrol_model->add4();
    }

    public function hapus4()
    {
        if (!isset($_POST))
        show_404();

        $this->menucontrol_model->hapus4();  
    }
    //Menu Data Komentar



    //Menu Data Reply
    public function menureply()
    {
        $data['title'] = 'Menu Data Reply Control';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menureply_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data9()
    {
        echo $this->menucontrol_model->getData9();
    }

    public function add9()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menucontrol_model->add9();
    }

    public function hapus9()
    {
        if (!isset($_POST))
        show_404();

        $this->menucontrol_model->hapus9();  
    }
    //Menu Data reply



    //Menu Info Kandidat
    public function menuinfo()
    {
        $data['title'] = 'Menu Info Kandidat Control';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menuinfo_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data5()
    {
        echo $this->menucontrol_model->getData5();
    }

    public function add5()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menucontrol_model->add5();
    }

    public function hapus5()
    {
        if (!isset($_POST))
        show_404();

        $this->menucontrol_model->hapus5();  
    }
    //Menu Info Kandidat



    //Menu Pemilihan Kandidat
    public function menupemilihan()
    {
        $data['title'] = 'Menu Pemilihan Kandidat Control';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menupemilihan_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data6()
    {
        echo $this->menucontrol_model->getData6();
    }

    public function add6()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menucontrol_model->add6();
    }

    public function hapus6()
    {
        if (!isset($_POST))
        show_404();

        $this->menucontrol_model->hapus6();  
    }
    //Menu Pemilihan Kandidat



    //Menu Hasil Pemilihan Kandidat
    public function menuhasil()
    {
        $data['title'] = 'Menu Hasil Pemilihan Kandidat Control';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menuhasil_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data7()
    {
        echo $this->menucontrol_model->getData7();
    }

    public function add7()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menucontrol_model->add7();
    }

    public function hapus7()
    {
        if (!isset($_POST))
        show_404();

        $this->menucontrol_model->hapus7();  
    }
    //Menu Hasil Pemilihan Kandidat



    //Menu Report Hasil Pemilihan Kandidat
    public function menureport()
    {
        $data['title'] = 'Menu Report Hasil Pemilihan Kandidat Control';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menureport_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data8()
    {
        echo $this->menucontrol_model->getData8();
    }

    public function add8()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menucontrol_model->add8();
    }

    public function hapus8()
    {
        if (!isset($_POST))
        show_404();

        $this->menucontrol_model->hapus8();  
    }
    //Menu Report Hasil Pemilihan Kandidat

}