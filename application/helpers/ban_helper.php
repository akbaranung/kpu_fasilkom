<?php

function is_ban(){
    $ci = get_instance();
    $ip = $ci->input->ip_address();
    $check = $ci->db->query("SELECT * FROM ban WHERE ip_address = '$ip' ")->row_array();
    if($check) {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        You Are Not Allowed
        </div>');
        redirect('auth');
    } else {
        
    }
}

?>