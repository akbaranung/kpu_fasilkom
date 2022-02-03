<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

Class profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_ban();
        $this->load->helper('url');
        $this->load->model('profile_model');
        $am = $this->profile_model->akses();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akses = $this->db->get_where('menu_awal', ['url' => 'profile' ])->row_array();
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
        $role = $this->session->userdata('role_id');
    	$data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role])->row_array();

        $this->load->view('header', $data);
		$this->load->view('profile_view', $data);
		$this->load->view('footer', $data);
    }

    public function add()
    {
        if (!isset($_POST))
        show_404();
        
        $this->profile_model->add();
    }

    public function upload()
    {
        $change = 3;
        $email = $this->session->userdata('email');
        $max = $this->db->query("SELECT COUNT(email) AS max FROM max_img WHERE email = '$email' ")->row_array();
        $count = $max['max'];
        $total = $change - $count;

        $id = $this->input->post('id');
        $delete = $this->input->post('delete');
        $img = $_FILES['img'];
        if($img = ''){} else {
            $config['upload_path'] = './assets/img/profile';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '1024';

            $this->load->library('upload', $config);
            if($total < 1){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Sudah Mencapai Batas Maksimal, Tidak Dapat Mengganti Gambar Profile!
                </div>');
                redirect('profile');
            }else if(!$this->upload->do_upload('img')){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Ganti Gambar Gagal!
                </div>');
                redirect('profile');
            } else {
                $img=$this->upload->data('file_name');

                if($delete != 'default.png'){
                    unlink('./assets/img/profile/'. $delete);
                }

            }
        }

        $data = array(
            'id' => $id,
            'img' => $img
        );

        $email = [
            'email' => $this->session->userdata('email')
        ];

        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $this->db->insert('max_img', $email);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Ganti Gambar Berhasil!
        </div>');

        $action = 'Ganti Gambar Profile';
        addLog($action);

        redirect('profile');

    }

    public function changepassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required|trim',[
            'required' => 'Masukkan Password Terkini!'
        ]);
        $this->form_validation->set_rules('new_password1', 'Password Bari', 'required|trim|min_length[6]|matches[new_password2]',[
            'required' => 'Masukkan Password Baru!',
            'min_length' => 'Password Baru Terlalu Pendek!',
            'matches' => 'Password Tidak Sesuai!'
        ]);
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[new_password1]',[
            'required' => 'Masukkan Konfirmasi Password!',
            'min_length' => 'Password Terlalu Pendek!',
            'matches' => 'Passowrd Tidak Sesuai'
        ]);

        if ($this->form_validation->run() == false){
            $this->load->view('header', $data);
            $this->load->view('changepassword', $data);
            $this->load->view('footer', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Password Terkini Salah! </div>');
                redirect('profile/changepassword');
            } else {
                if($current_password == $new_password){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Password Baru Tidak Boleh Sama Dengan Yang Lama! </div>');
                    redirect('profile/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $action = 'Ganti Password';
                    addLog($action);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Password Berhasil Di Perbarui!  </div>');
                    redirect('profile/changepassword');
                }
            }
        }
        
    }

}