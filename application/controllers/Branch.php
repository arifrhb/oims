<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Super Class
 *
 * @package     OIMS
 * @subpackage  Branch
 * @category    Branch Properties
 * @author      Arif Uddin
 * @link        http://{uri}/branch
 */
class Branch extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('branch_model');

        //check for login status
        if ((empty($_SESSION['oims_login'])) OR ( $_SESSION['oims_login'] !== 'success'))
            redirect('login');
    }

    public function index() {
        redirect('branch/addnew');

        
    }

    public function addnew() {

        $data['title'] = 'Branch Information';
        $data['sub_title'] = 'List of Branches';

        $this->form_validation->set_rules('br_name', 'Branch Name', 'required');
        $this->form_validation->set_rules('br_mob', 'Branch Mobile', 'required');

        if ($this->form_validation->run() === TRUE) {
            $this->branch_model->branch_insert();
        }

        $data['br_name'] = $this->branch_model->branch_name();
        $this->theme->view('branch/branch_add', $data);
    }

    public function update_branch() {
   
       $this->branch_model->branch_update();
        redirect('branch/addnew');
   
    }

    public function branch_details() {

        $result = $this->db->where('br_code', $_POST['br_code'])
                ->get('branch')
                ->result();

        $data = array();

        foreach ($result as $r) {
            $data['br_id'] = $r->br_id;
            $data['br_div_id'] = $r->br_id;
            $data['br_code'] = $r->br_code;
            $data['br_name'] = $r->br_name;
            $data['br_addr1'] = $r->br_addr1;
            $data['br_addr2'] = $r->br_addr2;
            $data['br_dis_id'] = $r->br_dis_id;
            $data['br_zip'] = $r->br_zip;
            $data['br_tel'] = $r->br_tel;
            $data['br_mob'] = $r->br_mob;
            $data['br_email'] = $r->br_email;
            $data['br_fax'] = $r->br_fax;
            $data['br_kcp_name'] = $r->br_kcp_name;
            $data['br_kcp_mob'] = $r->br_kcp_mob;
            $data['br_kcp_email'] = $r->br_kcp_email;
            $data['br_usr_id'] = $r->br_usr_id;
        }
        echo json_encode($data);
    }

}

//APPPATH/Application/Controller/branch.php