<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name Home.php
 * @author Imron Rosdiana
 */
class Logout extends CI_Controller
{

    function __construct() {
        parent::__construct();
		
		//check for login status
        if ((empty($_SESSION['oims_login'])) OR ($_SESSION['oims_login'] !== 'success') )
            redirect('login');
   
    }

    public function index() {
        $data = ['usr_id', 'usr_login','oims_login', 'usr_name'];
        $this->session->unset_userdata($data);

        redirect('login');

        
    }
    


}
