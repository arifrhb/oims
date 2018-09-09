<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Super Class
 *
 * @package     OIMS
 * @subpackage  Student
 * @category    Student Properties
 * @author      Arif Uddin
 * @link        http://{uri}/student
 */
class Settings extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('settings_model');

        //check for login status
        if ((empty($_SESSION['oims_login'])) OR ( $_SESSION['oims_login'] !== 'success'))
            redirect('login');
    }

    public function index() {
        // $this->theme->view('Settings/user_view');
        redirect('settings/users');
    }

    public function users() {

        $data['title'] = 'Users Status';
        $data['sub_title'] = 'List of Users';

        $this->form_validation->set_rules('usr_login', 'User Login Name', 'required');
        $this->form_validation->set_rules('usr_passwd', 'Password', 'required');


        if ($this->form_validation->run() === TRUE) {
            $this->settings_model->user_insert();
        }

        $data['usr_name'] = $this->settings_model->user_name();
        $this->theme->view('settings/users_view', $data);
    }

    public function update_user() {
   
       $this->settings_model->update_user();
        redirect('settings/users');
   
    }

    public function update_org() {
   
       $this->settings_model->update_org();
        redirect('settings/organization');
   
    }
    public function passwd() {
   
       $this->settings_model->update_passwd();
        redirect('settings/users');
   
    }

    Public function get_settings() {
        if ($_POST['id'] == "") {

            $result = $this->db->get('users')
                    ->result();
        } else {

            $result = $this->db->where('usr_at_id', $_POST['id'])
                    // ->group_by('')
                    ->get('users')
                    ->result();
        }

        $data = array();
        foreach ($result as $r) {
            $data['usr_id'] = $r->usr_id;
            $data['usr_login'] = $r->usr_login;
            $data['usr_name'] = $r->usr_name;
            $data['usr_cont'] = $r->usr_cont;
            $data['usr_email'] = $r->usr_email;
            $data['usr_access'] = $r->usr_access;
            $json[] = $data;
        }
        echo json_encode($json);

    }

    public function user_details() {

        $result = $this->db->where('usr_id', $_POST['usr_id'])
                ->get('users')
                ->result();

        $data = array();

        foreach ($result as $r) {
            $data['usr_id'] = $r->usr_id;
            $data['usr_login'] = $r->usr_login;
            $data['usr_name'] = $r->usr_name;
            $data['usr_cont'] = $r->usr_cont;
            $data['usr_email'] = $r->usr_email;
            $data['usr_passwd'] = $r->usr_passwd;
            $data['usr_access'] = $r->usr_access;
            
        }
        echo json_encode($data);
    }

   public function organization() {
       $data['title'] = 'Organization Information';
       
       $data['org_info'] = $this->settings_model->org_info('1');
       
       $this->theme->view('settings/org_view', $data);
   }
   
   public function get_org_info() {
       
//      $result = $this->db->where('usr_id', $_POST['usr_id'])
//                     ->get('organization')
//                     ->result();

     $result = $this->db->get('organization')
                    ->result();
                    
        $data = array();

        foreach ($result as $r) {
            $data['org_id'] = $r->org_id;
            $data['org_name'] = $r->org_name;
            $data['org_name_s'] = $r->org_name_s;
            $data['org_address'] = $r->org_address;
            $data['org_tel'] = $r->org_tel;
            $data['org_mob'] = $r->org_mob;
            $data['org_email'] = $r->org_email;
            $data['org_fax'] = $r->org_fax;
            $data['org_web'] = $r->org_web;
            
        }
        echo json_encode($data);
                     
   } 
                    
}

//APPPATH/Application/Controller/settings.php