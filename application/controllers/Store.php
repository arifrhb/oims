<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Super Class
 *
 * @package     OIMS
 * @subpackage  Store
 * @category    Store Information
 * @author      Arif Uddin
 * @link        http://{uri}/store
 */
class Store extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('store_model');

        //check for login status
        if ((empty($_SESSION['oims_login'])) OR ( $_SESSION['oims_login'] !== 'success'))
            redirect('login');
    }

    public function index() {
        redirect('store/status');

    }

    public function status() {

        $data['title'] = 'Main Store Status';
        $data['sub_title'] = 'Main Store Status';

        $this->load->model('assets_model');
        $data['cat_name'] = $this->assets_model->category_name();

        $data['str_list'] = $this->store_model->store_status();
        $this->theme->view('store/store_status', $data);
    }


    public function pending() {

        $data['title'] = 'Pending Item Status';
        $data['sub_title'] = 'Pending Items List';

        $this->load->model('assets_model');
        $data['cat_name'] = $this->assets_model->category_name();

        $data['str_list'] = $this->store_model->store_pending();
        $this->theme->view('store/store_pending', $data);
    }


    public function distribute() {

        $data['title'] = 'Main Store Status';
        $data['sub_title'] = 'Main Store Status';

        $this->load->model('assets_model');
        $data['cat_name'] = $this->assets_model->category_name();

        $data['str_list'] = $this->store_model->store_status();
        $this->theme->view('store/store_distribute', $data);
    }

    Public function get_srote_status_info() {
        if ($_POST['at_id'] == "") {

            $result = $this->db->select('st.str_ast_id, an.`ast_name`, count(st.str_qnty) as str_total')
            ->where('st.str_ast_id = an.ast_id')
            ->where('st.str_loc','001')
            ->where('st.str_status','1')
            ->group_by('st.str_ast_id')
            ->get('store st, asset_name an')
            ->result();

        } else {

            $result = $this->db->select('st.str_ast_id, an.ast_name, sum(st.str_qnty) as str_total')
            ->where('st.str_loc','001')
            ->where('st.`str_ast_id` = an.`ast_id`')
            ->where('st.`str_pur_id` = pur.`pur_id`')
            ->where('pur.`pur_at_id` = ast.`at_id`')
            ->where('st.str_status','1')
            ->where('ast.`at_id`', $_POST['at_id'])
            ->group_by('st.str_ast_id')
            ->get('store st, asset_name an, purchase pur, asset_type ast')
            ->result();
        }

        if (count($result) >= 1)  {
            foreach ($result as $r) {
            $data['str_ast_id'] = $r->str_ast_id;
            $data['ast_name']   = $r->ast_name;
            $data['str_total']  = $r->str_total;
            $json[] = $data;
        }

        echo json_encode($json);
        }
        
    }

    Public function get_srote_pending_info() {
        if ($_POST['at_id'] == "") {

            $result = $this->db->select('st.str_ast_id, an.`ast_name`, count(st.str_qnty) as str_total')
            ->where('st.str_ast_id = an.ast_id')
            ->where('st.str_loc','001')
            ->where('st.str_status','0')
            ->group_by('st.str_ast_id')
            ->get('store st, asset_name an')
            ->result();

        } else {

            $result = $this->db->select('st.str_ast_id, an.ast_name, sum(st.str_qnty) as str_total')
            ->where('st.str_loc','001')
            ->where('st.`str_ast_id` = an.`ast_id`')
            ->where('st.`str_pur_id` = pur.`pur_id`')
            ->where('pur.`pur_at_id` = ast.`at_id`')
            ->where('st.str_status','0')
            ->where('ast.`at_id`', $_POST['at_id'])
            ->group_by('st.str_ast_id')
            ->get('store st, asset_name an, purchase pur, asset_type ast')
            ->result();
        }

        if (count($result) >= 1)  {
            foreach ($result as $r) {
            $data['str_ast_id'] = $r->str_ast_id;
            $data['ast_name']   = $r->ast_name;
            $data['str_total']  = $r->str_total;
            $json[] = $data;
        }

        echo json_encode($json);
        }
        
    }

    public function itemdetails($id)
    {
        $data['title'] = 'Main Store Status';
        $data['sub_title'] = 'Main Store Status';

        // $this->load->model('assets_model');
        // $data['cat_name'] = $this->assets_model->category_name();

        $this->db->select('st.str_ast_id, an.`ast_name`, st.`str_sl`, st.`str_exp_date`');
        $this->db->from('store st, asset_name an');
        $this->db->where('st.str_loc', '001');
        $this->db->where('st.`str_ast_id` = an.`ast_id`');
        $this->db->where('st.`str_ast_id`', $id);
        
        $data['str_list'] = $this->db->get()->result_array();

        $this->theme->view('store/store_status_details', $data);
    }
   
    public function pendingdetails($id = FALSE)
    {
        if ($id === FALSE)
        {
            redirect('store/pending');
        }
        else 
        {
           $data['title'] = 'Store Pending Details';
            $data['sub_title'] = 'Main Store Status';

            $this->db->select('st.str_ast_id, an.`ast_name`, st.`str_sl`, st.`str_exp_date`');
            $this->db->from('store st, asset_name an');
            $this->db->where('st.str_loc', '001');
            $this->db->where('st.str_status', 0);
            $this->db->where('st.`str_ast_id` = an.`ast_id`');
            $this->db->where('st.`str_ast_id`', $id);
            
            $data['str_list'] = $this->db->get()->result_array();

            // $this->load->view('store/store_item_details', $data);
            $this->theme->view('store/store_pending_details', $data); 
        }
        
    }


   public function get_serial_wise_item() 
   {
        $result = $this->db->select('st.str_id, st.`str_sl`, ast.`ast_name`, bnd.`bnd_name`, md.`mod_name`, br.`br_name`')
            ->where('st.str_sl' , $_POST['str_sl'])
            ->where('st.`str_ast_id` = ast.`ast_id`')
            ->where('st.`str_mod_id` = md.`mod_id`')
            ->where('st.`str_bnd_id` = bnd.`bnd_id`')
            ->where('st.`str_loc` = br.`br_code`')
            ->get('store st,  branch br, asset_name ast, model md, `brand` bnd')
            ->result();


        if (count($result) <= 1)  {
            foreach ($result as $r) {
            $data['str_id']     = $r->str_id;
            $data['str_sl']     = $r->str_sl;
            $data['ast_name']   = $r->ast_name;
            $data['bnd_name']   = $r->bnd_name;
            $data['mod_name']   = $r->mod_name;
            $data['br_name']    = $r->br_name;
            $json[] = $data;
            }

        echo json_encode($json);
        }
    }


    public function get_branch() 
   {
        $result = $this->db->select('br_id, br_code, br_name')
            ->get('branch')
            ->result();


        
            foreach ($result as $r) {
            $data['br_id']     = $r->br_id;
            $data['br_code']   = $r->br_code;
            $data['br_name']   = $r->br_name;
            // $data['bnd_name']   = $r->bnd_name;
            // $data['mod_name']   = $r->mod_name;
            // $data['br_name']    = $r->br_name;
            $json[] = $data;
            }

        echo json_encode($json);
        
    }


    public function update_location() 
   {
        $this->store_model->location_update();
        redirect('store/distribute');
        
    }

        public function get_received() 
   {
        $this->store_model->received_update();
        // redirect('store/distribute');
        
    }
}
//APPPATH/Application/Controller/vendor.php