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
class Vendor extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('vendor_model');

        //check for login status
        if ((empty($_SESSION['oims_login'])) OR ( $_SESSION['oims_login'] !== 'success'))
            redirect('login');
    }

    public function index() {
        redirect('vendor/addnew');
    }

    public function addnew() {

        $data['title'] = 'Vendor Information';
        $data['sub_title'] = 'List of Vendors';

        $this->form_validation->set_rules('ven_name', 'Vendor Name', 'required');
        $this->form_validation->set_rules('ven_mob', 'Vendor Mobile', 'required');
        $this->form_validation->set_rules('ven_kcp_name', 'Vendor KCP Name', 'required');
        $this->form_validation->set_rules('ven_kcp_mob', 'Vendor KCP Mobile', 'required');

        if ($this->form_validation->run() === TRUE) {
            $this->vendor_model->vendor_insert();
        }
        $data['ven_name'] = $this->vendor_model->vendor_name();
        $this->theme->view('vendor/vendor_add', $data);
    }

    public function update_vandor() {
   
       $this->vendor_model->vendor_update();
        redirect('vendor/addnew');
   
    }

    Public function get_category() {
        $query = $this->db->get('asset_type');


        $result = $query->result();
        $data = array();
        foreach ($result as $r) {
            $data['value'] = $r->at_id;
            $data['label'] = $r->at_name;
            $json[] = $data;
        }
        echo json_encode($json);
    }

    Public function get_vendor() {
        if ($_POST['id'] == "") {

            $result = $this->db->get('vendors')
                    ->result();
        } else {

            $result = $this->db->where('ven_at_id', $_POST['id'])
                    // ->group_by('')
                    ->get('vendors')
                    ->result();
        }

        $data = array();
        foreach ($result as $r) {
            $data['ven_id'] = $r->ven_id;
            $data['ven_name'] = $r->ven_name;
            $data['ven_addr'] = $r->ven_addr;
            $data['ven_dis_id'] = $r->ven_dis_id;
            $data['ven_tel'] = $r->ven_tel;
            $data['ven_mob'] = $r->ven_mob;
            $data['ven_email'] = $r->ven_email;
            $data['ven_fax'] = $r->ven_fax;
            $data['ven_web'] = $r->ven_name;
            $data['ven_kcp_name'] = $r->ven_name;
            $data['ven_kcp_mob'] = $r->ven_kcp_mob;
            $data['ven_kcp_email'] = $r->ven_kcp_email;
            $data['ven_at_id'] = $r->ven_at_id;
            $data['ven_usr_id'] = $r->ven_usr_id;
            $json[] = $data;
        }
        echo json_encode($json);

        // $data['ven_name'] = $this->vendor_model->vendor_name();
    }

    /**
      Method: vendor_details
      By: Abid Hasan
      Date: 31 03 2016
      param: ven_id int
     */
    public function vendor_details() {


        $result = $this->db->where('ven_id', $_POST['id'])
                ->get('vendors')
                ->result();

        $data = array();

        foreach ($result as $r) {
            $data['ven_id'] = $r->ven_id;
            $data['ven_name'] = $r->ven_name;
            $data['ven_addr'] = $r->ven_addr;
            $data['ven_dis_id'] = $r->ven_dis_id;
            $data['ven_tel'] = $r->ven_tel;
            $data['ven_mob'] = $r->ven_mob;
            $data['ven_email'] = $r->ven_email;
            $data['ven_fax'] = $r->ven_fax;
            $data['ven_web'] = $r->ven_web;
            $data['ven_kcp_name'] = $r->ven_kcp_name;
            $data['ven_kcp_mob'] = $r->ven_kcp_mob;
            $data['ven_kcp_email'] = $r->ven_kcp_email;
            $data['ven_at_id'] = $r->ven_at_id;
            $data['ven_usr_id'] = $r->ven_usr_id;
        }
        echo json_encode($data);
    }

   
}

//APPPATH/Application/Controller/vendor.php