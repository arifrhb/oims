<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: 
 * @author: 
 */
class Branch_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function branch_insert() {

        $data = array(

            'br_code' => $this->input->post('br_code'),
            'br_name' => $this->input->post('br_name'),
            'br_addr1' => $this->input->post('br_addr1'),
            'br_addr2' => $this->input->post('br_addr2'),
            'br_dis_id' => $this->input->post('br_dis_id'),
            'br_tel' => $this->input->post('br_tel'),
            'br_mob' => $this->input->post('br_mob'),
            'br_email' => $this->input->post('br_email'),
            'br_fax' => $this->input->post('br_fax'),
            // 'br_web' => $this->input->post('br_web'),
            'br_kcp_name' => $this->input->post('br_kcp_name'),
            'br_kcp_mob' => $this->input->post('br_kcp_mob'),
            'br_kcp_email' => $this->input->post('br_kcp_email'),
            // 'br_at_id' => $this->input->post('br_at_id'),
            'br_usr_id' => $this->session->userdata('usr_id')
        );

        return $this->db->insert('branch', $data);
    }

    public function branch_update() {

        $br_id = $this->input->post('br_id');
    
        $data = array(
            'br_code' => $this->input->post('br_code'),
            'br_name' => $this->input->post('br_name'),
            'br_addr1' => $this->input->post('br_addr1'),
            'br_addr2' => $this->input->post('br_addr2'),
            'br_dis_id' => $this->input->post('br_dis_id'),
            'br_zip' => $this->input->post('br_zip'),
            'br_tel' => $this->input->post('br_tel'),
            'br_mob' => $this->input->post('br_mob'),
            'br_email' => $this->input->post('br_email'),
            'br_fax' => $this->input->post('br_fax'),
            'br_kcp_name' => $this->input->post('br_kcp_name'),
            'br_kcp_mob' => $this->input->post('br_kcp_mob'),
            'br_kcp_email' => $this->input->post('br_kcp_email'),
            'br_usr_id' => $this->session->userdata('usr_id')
        );
    
        $this->db->where('br_id', $br_id);

        return $this->db->update('branch', $data);
        
    }

    public function branch_name($slug = FALSE) {
        if ($slug === FALSE) {
            $this->db->select('*');
            $this->db->from('branch');
            $this->db->order_by('br_code','ASC');
            return $this->db->get()->result_array();
        }

        $query = $this->db->get_where('branch', array('br_code' => $slug));
        return $query->row_array();
    }

    function __destruct() {
        $this->db->close();
    }

}
