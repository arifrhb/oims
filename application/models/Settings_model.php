<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: 
 * @author: 
 */
class Settings_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function user_insert() {

        $data = array(
            'usr_login' => $this->input->post('usr_login'),
            'usr_name' => $this->input->post('usr_name'),
            'usr_cont' => $this->input->post('usr_cont'),
            'usr_email' => $this->input->post('usr_email'),
            'usr_access' => $this->input->post('usr_access'),
            'usr_passwd' => md5($this->input->post('usr_passwd'))

        );

        return $this->db->insert('users', $data);
    }

    public function update_user() {

        $usr_id = $this->input->post('usr_id');
    
        $data = array(
            'usr_login' => $this->input->post('usr_login'),
            'usr_name' => $this->input->post('usr_name'),
            'usr_cont' => $this->input->post('usr_cont'),
            'usr_email' => $this->input->post('usr_email'),
            'usr_access' => $this->input->post('usr_access'),
            'usr_email' => $this->input->post('usr_email')
        );
    
        $this->db->where('usr_id', $usr_id);

        return $this->db->update('users', $data);
        
    }

    public function update_org() {

        $org_id = $this->input->post('org_id');
    
        $data = array(

            'org_id' => $this->input->post('org_id'),
            'org_name' => $this->input->post('org_name'),
            'org_name_s' => $this->input->post('org_name_s'),
            'org_address' => $this->input->post('org_address'),
            // 'org_dis_id' => $this->input->post('org_dis_id'),
            'org_tel' => $this->input->post('org_tel'),
            'org_mob' => $this->input->post('org_mob'),
            'org_email' => $this->input->post('org_email'),
            'org_fax' => $this->input->post('org_fax'),
            'org_web' => $this->input->post('org_web')
        );
    
        $this->db->where('org_id', $org_id);

        return $this->db->update('organization', $data);
        
    }

    public function update_passwd() {

        $usr_id = $this->input->post('id');
    
        $data = array(
            'usr_passwd' => md5($this->input->post('passwd')),
            'pass_status' => 0
        );
    
        $this->db->where('usr_id', $usr_id);


        return $this->db->update('users', $data);
        
    }

    public function user_name($slug = FALSE) {
        if ($slug === FALSE) {
            $this->db->select('*');
            $this->db->from('users');
            return $this->db->get()->result_array();
        }

        $query = $this->db->get_where('users', array('usr_login' => $slug));
        return $query->row_array();
    }

    

    public function org_info($slug = FALSE) {
        if ($slug === FALSE) {
            $this->db->select('*');
            $this->db->from('organization');
            return $this->db->get()->result_array();
        }

        $query = $this->db->get_where('organization', array('org_id' => $slug));
        return $query->row_array();
    }
    
    
    function __destruct() {
        $this->db->close();
    }
}
