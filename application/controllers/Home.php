<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Super Class
 *
 * @package     MSc Project
 * @subpackage  Project Home
 * @category    homepage
 * @author      Arif Uddin
 * @link        http://{uri}/home
 */

class Home extends CI_Controller
{

    function __construct() {
        parent::__construct();

        if ((empty($_SESSION['oims_login'])) OR ($_SESSION['oims_login'] !== 'success') )
            redirect('login');
		
		// $this->load->view('menu');
    }

    public function index() {

        if ($_SESSION['pass_status'] == 0) {
            redirect('user/change_password');
        }
        
		$this->theme->view('home_view');
        
    }

}
