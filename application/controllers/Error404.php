<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Super Class
 *
 * @package     SFTMS
 * @subpackage  Student
 * @category    Student Properties
 * @author      Arif Uddin
 * @link        http://{uri}/student
 */


class Error404 extends CI_Controller
{

    function __construct() {
        parent::__construct();

		// $this->load->model('assets_model');

		//check for login status
        if ((empty($_SESSION['oims_login'])) OR ($_SESSION['oims_login'] !== 'success') )
            redirect('login');
        
    }

    public function index() {

		
        $this->output->set_status_header('404'); 
        // $data['content'] = 'error_404'; // View name 
        // $this->load->view('index',$data);//loading in my template 
        $this->theme->view('error_404');
    }
}