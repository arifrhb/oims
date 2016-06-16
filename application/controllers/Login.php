<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Super Class
 *
 * @package     MSc Project
 * @subpackage  Login
 * @category    Stuff Login
 * @author      Arif Uddin
 * @link        http://arif.uddin.xyz
 *
 * {URL}/application/controller/Login.php
 */
class Login extends CI_Controller
{

    function __construct() {
        parent::__construct();
		
        //load theme
		$this->theme->set_theme('default');
        //page_title
        $this->theme->set('page_title', config_item('code_org_s') .' - '. 'Login');		
		
		if ((!empty($_SESSION['oims_login'])) AND ($_SESSION['oims_login'] == 'success') )
            redirect('home');
        
		$this->load->model("login_model", "login");
        


    }

    public function index() {
        if($_POST) 
        {

            $result = $this->login->check_user($_POST);
            if(!empty($result)) 
            {
                $data = [
                    'usr_id'    => $result->usr_id,
                    'usr_login' => $result->usr_login,
                    'usr_name'  => $result->usr_name,
                    'usr_email' => $result->usr_email,
                    'usr_mob'   => $result->usr_mob,
                    'usr_access'=> $result->usr_access,
                    'usr_photo' => $result->usr_photo,
                    'pass_status' => $result->pass_status,
                    'oims_login' => 'success'
                ];

                $this->session->set_userdata($data);
                $this->session->set_flashdata('login_msg', 'You login success.');
                redirect('home');
                // $this->load->view('home');
            }
            else
            {
                $this->session->set_flashdata('login_msg', 'Username or password is wrong!');
                redirect('login');
            }
        }

		$this->theme->view('login_view');
         
    }

}
