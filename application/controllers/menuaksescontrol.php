<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Menuaksescontrol extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('menuaksescontrol_model');
        $am = $this->menuaksescontrol_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_awal', ['url' => 'menuaksescontrol' ])->row_array();
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
    	$data['title'] = 'Menu Akses Control';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
		$this->load->view('menuaksescontrol_view', $data);
		$this->load->view('footeradmin', $data);
    }

    //Menu Awal Akses
    public function menuawalakses()
    {
        $data['title'] = 'Menu Awal Akses';
        $data['menu'] = $this->db->get('menu_awal')->result();
        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menuawalakses_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data()
    {
        echo $this->menuaksescontrol_model->getData();
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menuaksescontrol_model->add();
    }

    public function hapus()
    {
        if (!isset($_POST))
        show_404();

        $this->menuaksescontrol_model->hapus();  
    }
    //Menu Awal Akses



    //Menu Akses Peserta Akses
    public function menupesertaakses()
    {
        $data['title'] = 'Menu Akses Peserta Akses';
        $data['menu'] = $this->db->get('menu_akses_peserta')->result();
        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menupesertaakses_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data2()
    {
        echo $this->menuaksescontrol_model->getData2();
    }

    public function add2()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menuaksescontrol_model->add2();
    }

    public function hapus2()
    {
        if (!isset($_POST))
        show_404();

        $this->menuaksescontrol_model->hapus2();  
    }
    //Menu Akses Peserta Akses



    //Menu Data Kandidat Akses
    public function menukandidatakses()
    {
        $data['title'] = 'Menu Data Kandidat Akses';
        $data['menu'] = $this->db->get('menu_data_kandidat')->result();
        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menukandidatakses_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data3()
    {
        echo $this->menuaksescontrol_model->getData3();
    }

    public function add3()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menuaksescontrol_model->add3();
    }

    public function hapus3()
    {
        if (!isset($_POST))
        show_404();

        $this->menuaksescontrol_model->hapus3();  
    }
    //Menu Data Kandidat Akses



    //Menu Data Komentar Akses
    public function menukomentarakses()
    {
        $data['title'] = 'Menu Data Komentar Akses';
        $data['menu'] = $this->db->get('menu_data_komentar')->result();
        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menukomentarakses_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data4()
    {
        echo $this->menuaksescontrol_model->getData4();
    }

    public function add4()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menuaksescontrol_model->add4();
    }

    public function hapus4()
    {
        if (!isset($_POST))
        show_404();

        $this->menuaksescontrol_model->hapus4();  
    }
    //Menu Data Komentar Akses



    //Menu Data Reply Akses
    public function menureplyakses()
    {
        $data['title'] = 'Menu Data Reply Akses';
        $data['menu'] = $this->db->get('menu_data_reply')->result();
        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menureplyakses_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data9()
    {
        echo $this->menuaksescontrol_model->getData9();
    }

    public function add9()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menuaksescontrol_model->add9();
    }

    public function hapus9()
    {
        if (!isset($_POST))
        show_404();

        $this->menuaksescontrol_model->hapus9();  
    }
    //Menu Data Reply Akses



    //Menu Info Kandidat Akses
    public function menuinfoakses()
    {
        $data['title'] = 'Menu Info Kandidat Akses';
        $data['menu'] = $this->db->get('menu_info_kandidat')->result();
        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menuinfoakses_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data5()
    {
        echo $this->menuaksescontrol_model->getData5();
    }

    public function add5()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menuaksescontrol_model->add5();
    }

    public function hapus5()
    {
        if (!isset($_POST))
        show_404();

        $this->menuaksescontrol_model->hapus5();  
    }
    //Menu Info Kandidat Akses



    //Menu Pemilihan Kandidat Akses
    public function menupemilihanakses()
    {
        $data['title'] = 'Menu Pemilihan Kandidat Akses';
        $data['menu'] = $this->db->get('menu_pemilihan')->result();
        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menupemilihanakses_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data6()
    {
        echo $this->menuaksescontrol_model->getData6();
    }

    public function add6()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menuaksescontrol_model->add6();
    }

    public function hapus6()
    {
        if (!isset($_POST))
        show_404();

        $this->menuaksescontrol_model->hapus6();  
    }
    //Menu Pemilihan Kandidat Akses



    //Menu Hasil Pemilihan Kandidat Akses
    public function menuhasilakses()
    {
        $data['title'] = 'Menu Hasil Pemilihan Kandidat Akses';
        $data['menu'] = $this->db->get('menu_hasil')->result();
        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menuhasilakses_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data7()
    {
        echo $this->menuaksescontrol_model->getData7();
    }

    public function add7()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menuaksescontrol_model->add7();
    }

    public function hapus7()
    {
        if (!isset($_POST))
        show_404();

        $this->menuaksescontrol_model->hapus7();  
    }
    //Menu Hasil Pemilihan Kandidat Akses



    //Menu Report Hasil Pemilihan Kandidat Akses
    public function menureportakses()
    {
        $data['title'] = 'Menu Report Hasil Pemilihan Kandidat Akses';
        $data['menu'] = $this->db->get('menu_report')->result();
        $data['role'] = $this->db->query("SELECT * FROM user_role WHERE id != 99")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
        $this->load->view('menureportakses_view', $data);
        $this->load->view('footeradmin', $data);
    }

    public function daftar_data8()
    {
        echo $this->menuaksescontrol_model->getData8();
    }

    public function add8()
    {
        if (!isset($_POST))
        show_404();
        
        $this->menuaksescontrol_model->add8();
    }

    public function hapus8()
    {
        if (!isset($_POST))
        show_404();

        $this->menuaksescontrol_model->hapus8();  
    }
    //Menu Report Hasil Pemilihan Kandidat Akses

}