<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class Rhpkdpm extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('rhpkdpm_model');
        $am = $this->rhpkdpm_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_report', ['url' => 'rhpkdpm' ])->row_array();
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
    	$data['title'] = 'Report Hasil Pemilihan Kandidat DPM';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suara'] = $this->db->query('SELECT nama_kandidat, COUNT(nama_kandidat) AS jumlah FROM hp_kdpm WHERE nama_kandidat is not null AND status = "Sah" GROUP BY nama_kandidat ')->result();
        $data['golput'] = $this->db->query("SELECT  COUNT(nim) AS jumlah FROM user WHERE is_active = 1 AND role_id != 1 AND role_id != 99 AND NOT EXISTS (SELECT * FROM hp_kdpm WHERE nim_pemilih = nim)")->row_array();

        $this->load->view('headeradmin', $data);
        $this->load->view('sidebaradmin', $data);
		$this->load->view('rhpkdpm_view', $data);
		$this->load->view('footeradmin', $data);
    }

    public function daftar_data()
    {
        echo $this->rhpkdpm_model->getData();
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->rhpkdpm_model->add();
    }

    public function hapus()
    {
        if (!isset($_POST))
        show_404();

        $this->rhpkdpm_model->hapus();  
    }

}