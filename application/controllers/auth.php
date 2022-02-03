<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 

{
	public function __construct()

	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()

	{
		$this->form_validation->set_rules('nim', 'Nim', 'trim|required',[
			'required' => 'Masukkan NIM !'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Masukkan Password !'
		]);

		if ($this->form_validation->run() == false) {
			
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header2',$data);
			$this->load->view('loginregis/login',$data);
			$this->load->view('templates/auth_footer',$data);

		} else {

			$this->_login();

		}
	}

	private function _login()

	{
		$nim = $this->input->post('nim');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['nim' => $nim])->row_array();

		if($user){

			if ($user['is_active'] == 1){

				if(password_verify($password, $user['password'])) {

					$data = [
						'nim' => $user['nim'],
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'jurusan' => $user['jurusan']
					];

					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('user');
					} else {
						redirect('user');
					}
					

				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					Password Salah!
					</div>');
					redirect('auth');
				}

			} else if($user['is_active'] == 2) {
			    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Email Telah Dinonaktifkan!, Mungkin Anda Melakukan Suatu Tindakan Illegal!
				</div>');
				redirect('auth');

			} else if($user['is_active'] == 3) {
			    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Admin Sedang Memverifikasi KTM Anda, Tunggu Beberapa Saat Lagi!
				</div>');
				redirect('auth');

			} else if($user['is_active'] == 4) {
			    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Maaf Anda Bukan Mahasiswa/i Fasilkom!
				</div>');
				redirect('auth');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Email Belum Teraktivasi!, Cek Email Anda Untuk Melakukan Aktivasi Awal! (Jika di Email Tidak Ada, Coba Cek Inbox Spam!)
				</div>');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			NIM Belum Terdaftar!
			</div>');
			redirect('auth');
		}
	}

	public function registration()
	{	
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
			'required' => 'Masukkan Nama !'
		]);
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[user.nim]',[
			'required' => 'Masukkan NIM!',
			'is_unique' => 'NIM Sudah Terdaftar !'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'required' => 'Masukkan Email !',
			'valid_email' => 'Email Tidak Valid !',
			'is_unique' => 'Email Sudah Terdaftar !'
		]);
		
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required|trim|min_length[4]',[
			'required' => 'Masukkan Detail Angkatan !',
			'min_length' => 'Minimal 4 Karakter (Contoh : 2018)!'
		]);
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim',[
			'required' => 'Pilih Jurusan !'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
			'required' => 'Masukkan Password !',
			'matches' => 'Password Tidak Sesuai !',
			'min_length' => 'Password Terlalu Pendek !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',[
			'required' => 'Masukkan Password !',
			'matches' => 'Password Tidak Sesuai !'
		]);

		$this->form_validation->set_rules('cxbx', 'cxbx', 'required|trim',[
			'required' => 'ceklis dulu boy !',
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Pendaftaran';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('loginregis/register',$data);
			$this->load->view('templates/auth_footer',$data);
		} else {
			$email = $this->input->post('email', true);
			$ktm = $_FILES['ktm'];
		    if($ktm = ''){
		    	
		    } else {
		        $config['upload_path'] = './ktm/';
		        $config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1024';

		        $this->load->library('upload', $config);
		        if(!$this->upload->do_upload('ktm')){
		            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					Upload KTM Gagal!
					</div>');
					redirect('auth/registration');
		        } else {
		            $ktm=$this->upload->data('file_name');
		        }
		    }

			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'nim' => $this->input->post('nim', true),
				'email' => htmlspecialchars($email),
				'img' => 'default.png',
				'ktm' => $ktm,
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'angkatan' => htmlspecialchars($this->input->post('angkatan', true)),
				'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
				'role_id' => 3,
				'is_active' => 0,
				'date_created' => time()
			];

			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Akun Berhasil Didaftarkan!, Silakan Cek Email Untuk Aktivasi Awal! (Jika di Email Tidak Ada, Coba Cek Inbox Spam!).
			</div>');
			redirect('auth');
		}		
	}

	public function pesan()
	{
		$this->load->library('email');
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'application.system328@gmail.com',
			'smtp_pass' => 'applicationsystem328forverification',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->email->initialize($config);

		$this->email->from('application.system328@gmail.com', 'KPU System');
		$this->email->to($this->input->post('txtPesanByEmail'));

		$this->email->subject('Attention');
		$this->email->message($this->input->post('txtPesanToEmail'));

		$this->form_validation->set_rules('txtPesanToEmail', 'txtPesanToEmail', 'required|trim');

		if ($this->form_validation->run() == false){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Masukkan Pesan Terlebih Dahulu!.
			</div>');
			redirect('control2');
		} else {
			$this->email->send();

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Pesan Berhasil Dikirim.
			</div>');

			redirect('control2');
		}

	}

	public function notif()
	{
		$this->load->library('email');
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'application.system328@gmail.com',
			'smtp_pass' => 'applicationsystem328forverification',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->email->initialize($config);

		$this->email->from('application.system328@gmail.com', 'KPU System');
		$this->email->to($this->input->post('txtEmailNotif'));

		$this->email->subject('Account Activated');
		$this->email->message('Admin telah memverivikasi KTM anda, anda sudah dapat login sekarang, silakan cek <a href="'.base_url().'">Ke Website</a>');

		$this->email->send();

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Notifikasi Berhasil Dikirim.
		</div>');

		redirect('control3');
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'application.system328@gmail.com',
			'smtp_pass' => 'applicationsystem328forverification',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->email->initialize($config);

		$this->email->from('application.system328@gmail.com', 'KPU System');
		$this->email->to($this->input->post('email'));

		if($type == 'verify'){
			$this->email->subject('Account Verification');
			$this->email->message('Klik link ini untuk mengaktivasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
		} else if ($type == 'forgot'){
			$this->email->subject('Reset Password');
			$this->email->message('Klik link ini untuk reset password anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		} else if ($type == 'reupload'){
			$this->email->subject('Reupload KTM');
			$this->email->message('Admin telah memeriksa KTM anda dan dinyatakan bahwa KTM anda kurang sesuai dengan persyaratan. Tolong reupload KTM anda. Klik link ini untuk melakukan reupload KTM anda : <a href="' . base_url() . 'auth/ktmvalidation?email=' . $this->input->post('email') .
			'&token=' . urlencode($token) . '">Reupload KTM</a>');
		}
		
		if($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die();
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user_token = $this->db->query("SELECT * FROM user_token WHERE email = '$email' AND token = '$token'")->row_array();

		if($user_token) {

			if(time() - $user_token['date_created'] < (60*60*24)) {
				$this->db->set('is_active', 3);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->db->delete('user_token', ['email' => $email]);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				'. $email .' Telah Teraktivasi, Tunggu Verifikasi KTM Oleh Admin!.
				</div>');
				redirect('auth');
			} else {

				$this->db->delete('user', ['email' => $email]);
				$this->db->delete('user_token', ['email' => $email]);

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Aktivasi Akun Gagal! Token Expired!. Silakan Daftar Ulang!.
				</div>');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Aktivasi Akun Gagal! Token dan Email Invalid!.
			</div>');
			redirect('auth');
		}

		
	}

	public function forgotpassword()
	{
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email',[
			'required' => 'Masukkan Email !',
			'valid_email' => 'Email Tidak Valid !'
		]);

		if($this->form_validation->run() == false){
			$data['title'] = 'Lupa Password';
			$this->load->view('templates/auth_header2',$data);
			$this->load->view('loginregis/forgotpassword',$data);
			$this->load->view('templates/auth_footer',$data);
		} else {
			$email = $this->input->post('email');

			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if($user){
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Cek Email Anda Untuk Reset Password! (Jika di Email Tidak Ada, Coba Cek Inbox Spam!).
				</div>');
				redirect('auth/forgotpassword');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Email Belum Terdaftar atau Belum Teraktivasi!.
				</div>');
				redirect('auth/forgotpassword');
			}
		}
		
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user_token', ['email' => $email])->row_array();

		if($user){
			$user_token = $this->db->query("SELECT * FROM user_token WHERE email = '$email' AND token = '$token' ")->row_array();
			if($user_token){
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Reset Password Gagal! Token Invalid!.
				</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Reset Password Gagal! Email Invalid!.
			</div>');
			redirect('auth');
		}
	}

	public function changePassword()
	{
		if(!$this->session->userdata('reset_email')){
			redirect('auth');
		}
		$this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[6]|matches[password2]',[
			'required' => 'Masukkan Password!',
			'matches' => 'Password Tidak Sesuai!',
			'min_length' => 'Password Terlalu Pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[password1]',[
			'required' => 'Masukkan Password!',
			'matches' => 'Password Tidak Sesuai!',
			'min_length' => 'Password Terlalu Pendek!'
		]);

		if($this->form_validation->run() == false){
			$data['title'] = 'Reset Password';
			$this->load->view('templates/auth_header2',$data);
			$this->load->view('loginregis/resetpassword',$data);
			$this->load->view('templates/auth_footer',$data);
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Reset Password Berhasil!, Coba Login Dengan Password Baru Anda!.
			</div>');
			redirect('auth');	
		}
		
	}

	public function reuploadktm()
	{
		$email = $this->input->post('email');
		$token = base64_encode(random_bytes(32));

		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time()
		];

		$this->db->insert('user_token', $user_token);
		$this->_sendEmail($token, 'reupload');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Perintah Reupload KTM berhasil Dikirim!
		</div>');
		redirect('control2');

	}

	public function ktmvalidation()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user_token', ['email' => $email])->row_array();

		if($user){
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if($user_token){
				$this->session->set_userdata('reupload_ktm', $email);
				$this->reupload();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Reupload KTM Gagal! Token Invalid!.
				</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Reupload KTM Gagal! Email Invalid!.
			</div>');
			redirect('auth');
		}
	}

	public function reupload()
	{
		if(!$this->session->userdata('reupload_ktm')){
			redirect('auth');
		}

		$data['title'] = 'Reupload KTM';
		$this->load->view('templates/auth_header2',$data);
		$this->load->view('loginregis/uploadktm',$data);
		$this->load->view('templates/auth_footer',$data);
	}

	public function uploadktm()
	{
		$email = $this->session->userdata('reupload_ktm');
		$rKtm = $this->db->get_where('user', ['email' => $email])->row_array();
		$cleanKtm = $rKtm['ktm'];
        $ktm = $_FILES['ktm'];
        if($ktm = ''){} else {
            $config['upload_path'] = './ktm/';
            $config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '1024';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('ktm')){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Reupload KTM Gagal!. Silakan Coba Lagi!.
                </div>');
                redirect('auth/reupload');
            } else {
                $ktm=$this->upload->data('file_name');
				unlink('./ktm/'. $cleanKtm);
            }
        }

        $data = array(
            'email' => $email,
            'ktm' => $ktm
        );

        $this->db->where('email', $email);
        $this->db->update('user', $data);
        $this->db->delete('user_token', ['email' => $email]);
        $this->session->unset_userdata('reupload_ktm');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Reupload KTM Berhasil!
        </div>');
        redirect('auth');
	}

	public function logout()
	{
		$this->session->unset_userdata('nim');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('jurusan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Anda Telah Logout!
		</div>');
		redirect('auth');
	}

	public function error404()
	{
		$this->load->view('404');
	}

	public function error403()
	{
		$this->load->view('403');
	}
}