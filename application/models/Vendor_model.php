<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: 
 * @author: 
 */
class Vendor_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function vendor_insert() {

        $data = array(
            'ven_name' => $this->input->post('ven_name'),
            'ven_addr' => $this->input->post('ven_addr'),
            'ven_dis_id' => $this->input->post('ven_dis_id'),
            'ven_tel' => $this->input->post('ven_tel'),
            'ven_mob' => $this->input->post('ven_mob'),
            'ven_email' => $this->input->post('ven_email'),
            'ven_fax' => $this->input->post('ven_fax'),
            'ven_web' => $this->input->post('ven_web'),
            'ven_kcp_name' => $this->input->post('ven_kcp_name'),
            'ven_kcp_mob' => $this->input->post('ven_kcp_mob'),
            'ven_kcp_email' => $this->input->post('ven_kcp_email'),
            'ven_at_id' => $this->input->post('ven_at_id'),
            'ven_usr_id' => $this->session->userdata('usr_id')
        );

        return $this->db->insert('vendors', $data);
    }

    public function vendor_update() {

        $ven_id = $this->input->post('ven_id');
    
        $data = array(
            'ven_name' => $this->input->post('ven_name'),
            'ven_addr' => $this->input->post('ven_addr'),
            'ven_dis_id' => $this->input->post('ven_dis_id'),
            'ven_tel' => $this->input->post('ven_tel'),
            'ven_mob' => $this->input->post('ven_mob'),
            'ven_email' => $this->input->post('ven_email'),
            'ven_fax' => $this->input->post('ven_fax'),
            'ven_web' => $this->input->post('ven_web'),
            'ven_kcp_name' => $this->input->post('ven_kcp_name'),
            'ven_kcp_mob' => $this->input->post('ven_kcp_mob'),
            'ven_kcp_email' => $this->input->post('ven_kcp_email'),
            'ven_at_id' => $this->input->post('ven_at_id'),
            'ven_usr_id' => $this->session->userdata('usr_id')
        );
    
        $this->db->where('ven_id', $ven_id);

        return $this->db->update('vendors', $data);
        
    }

    public function vendor_name($slug = FALSE) {
        if ($slug === FALSE) {
            $this->db->select('*');
            $this->db->from('vendors');
            return $this->db->get()->result_array();
        }

        $query = $this->db->get_where('vendors', array('at_id' => $slug));
        return $query->row_array();
    }

    function __destruct() {
        $this->db->close();
    }

}
