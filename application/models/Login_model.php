<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: Login model
 * @author: Arif Uddin
 */
class Login_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function check_user($data) {
        $this->db->where('usr_login', $data['login_username']);
        $this->db->where('usr_passwd', md5($data['login_password']));
        return $this->db->get('users')->row();
    }

    function __destruct() {
        $this->db->close();
    }
}
