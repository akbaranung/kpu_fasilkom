<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Message_model extends CI_Model {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->database();        
    }

    public function komenpage($limit, $start)
    {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('message', $limit, $start)->result();
    }

    public function countAllRecord()
    {
        return $this->db->get('message')->num_rows();
    }

}