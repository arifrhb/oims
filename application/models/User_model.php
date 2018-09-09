<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: Login model
 * @author: Imron Rosdiana
 */
class User_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function get_old_password($data)
    {

        // $this->db->
        $this->db->where('usr_login', $data['usr_login']);
        // $this->db->where('usr_passwd', md5($data['login_password']));
        return $this->db->get('users')->row();
    }



	//update_password

	public function customer_addnew() {
        //$this->load->helper('url');

		//$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'cust_name' => $this->input->post('cust_name'),
			'cust_email' => $this->input->post('cust_email'),
			'cust_mob' => $this->input->post('cust_mob'),
			'cust_phone' => $this->input->post('cust_phone'),
			'cust_address' => $this->input->post('cust_address')
		);

		return $this->db->insert('customer', $data);
    }


    public function customer_list($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('customer');
            return $query->result_array();
        }

        $query = $this->db->get_where('customer', array('cust_id' => $slug));
        return $query->row_array();

    }

    public function update_password() {
       $data = array(
            'usr_passwd'       => md5($this->input->post('new_password')),
            'pass_status'       => 1            
            );

        $usr_id = $this->input->post('usr_id');
        $usr_login = $this->input->post('usr_login');

        $this->db->where('usr_id', $usr_id);
        $this->db->where('usr_login', $usr_login);

        return $this->db->update('users', $data);

    }

    public function customer_update() {
        //$this->load->helper('url');
        //$slug = url_title($this->input->post('title'), 'dash', TRUE);
        //$cust_id = $this->input->post

        $data = array(
            'cust_name' => $this->input->post('cust_name'),
            'cust_email' => $this->input->post('cust_email'),
            'cust_mob' => $this->input->post('cust_mob'),
            'cust_phone' => $this->input->post('cust_phone'),
            'cust_address' => $this->input->post('cust_address')
        );
        $cust_id = $this->input->post('cust_id');

        $this->db->where('cust_id', $cust_id);

        return $this->db->update('customer', $data);
    }

    function __destruct() {
        $this->db->close();
    }
}
