<?php
    function addLog($action) {
        
        $ci = get_instance();
        $nimLog = $ci->session->userdata('nim');
        $emailLog = $ci->session->userdata('email');
        $aksi = $action;
        $ip = $ci->input->ip_address();
        $validIp = '';
        if(!$ip) {
            $validIp = 'Can not get the ip';
        } else {
            $validIp = $ip;
        }

        $ci = get_instance();
        $validData = $ci->db->query("SELECT * FROM log ORDER BY id DESC LIMIT 10")->result_array();
        $banData = $ci->db->query("SELECT * FROM log ORDER BY id DESC LIMIT 20")->result_array();

        $same = 0;
        $ban = 0;

        foreach ($validData as $key => $val) {
            if ($val['nim'] == $nimLog and $val['aksi'] == $aksi and $val['email'] == $emailLog) {
                $same += 1;
            }
        }

        foreach ($banData as $key => $val) {
            if ($val['nim'] == $nimLog and $val['aksi'] == $aksi and $val['email'] == $emailLog) {
                $ban += 1;
            }
        }

        $logData = [
            'nim' => $nimLog,
            'email' => $emailLog,
            'aksi' => $aksi,
            'ip_address' => $validIp
        ];

        $ci->db->insert('log', $logData);

        if ($same == 10 && $ban == 10) {
            $ci = get_instance();

            $ci->load->library('email');
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

            $ci->email->initialize($config);

            $ci->email->from('application.system328@gmail.com', 'KPU System');
            $ci->email->to('shalahuddinahmad.aziz@gmail.com');

            $ci->email->subject('Suspicious');
            $ci->email->message('Akun dengan nim : '. $nimLog .' dan email : ' . $emailLog . ' Mencurigakan');

            $ci->email->send();
        } else if ($ban == 20) {
            $ci = get_instance();

            $ci->load->library('email');
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

            $ci->email->initialize($config);

            $ci->email->from('application.system328@gmail.com', 'KPU System');
            $ci->email->to('shalahuddinahmad.aziz@gmail.com');

            $ci->email->subject('Banned Suspicious');
            $ci->email->message('Akun dengan nim : '. $nimLog .' dan email : ' . $emailLog . ' Di nonaktifkan');

            $ci->email->send();

            $ci->db->where('email', $emailLog);
            $ci->db->update('user', ['is_active' => 2]);

            $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Anda Terdeteksi Melakukan Spam atau Semacamnya.
				</div>');
            return redirect('auth');
        }
    }

?>