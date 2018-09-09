<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Super Class
 *
 * @package     MSc Project
 * @category    User personal profiles
 * @author      Arif Uddin
 * @link        http://{uri}/user
 * 
 */


class User extends CI_Controller
{

    function __construct() {
        parent::__construct();

        
         $this->load->model('user_model');
        
        //check for login status
        if ((empty($_SESSION['oims_login'])) OR ($_SESSION['oims_login'] !== 'success') )
            redirect('login');
        
    }


    public function index() {
        $this->theme->set('page_title', 'User Profiles'); 
        $this->theme->view('user/usr_view');
        
    }

  

    public function change_password () {

        $this->form_validation->set_rules('usr_id', 'User ID', 'required');
        $this->form_validation->set_rules('usr_login', 'User Login', 'required');
        
        if ($this->form_validation->run() === TRUE)
        {
             $this->user_model->update_password();
             redirect('logout');

        }
            $data['title'] = 'Chnage User Password';

            $this->theme->view('user/usr_pass', $data);

    }
}

// APPPATH/Application/Controller/user.php