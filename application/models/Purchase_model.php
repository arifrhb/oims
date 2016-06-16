<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: Login model
 * @author: Imron Rosdiana
 */
class Purchase_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function purchase_insert() {

        $data = array(
            'pur_wo_no'       => $this->input->post('pur_wo_no'),
            'pur_wo_date'     => $this->input->post('pur_wo_date'),
            'pur_bill_no'     => $this->input->post('pur_bill_no'),
            'pur_bill_date'   => $this->input->post('pur_bill_date'),
            'pur_at_id'       => $this->input->post('pur_at_id'),
            'pur_ven_id'      => $this->input->post('pur_ven_id'),
            'pur_usr_id'      => $this->session->userdata('usr_id')
        );

        return $this->db->insert('purchase', $data);
    }

    public function purchase_id($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->select('*');
            $this->db->from('purchase');
            return $this->db->get()->result_array();
        }

        $query = $this->db->get_where('purchase', array('pur_id' => $slug));
        return $query->row_array();

    }


    public function branch_list($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->select('*');
            $this->db->from('branch');
            $this->db->order_by('br_code ASC');
            return $this->db->get()->result_array();
        }

        $query = $this->db->get_where('purchase', array('pur_id' => $slug));
        return $query->row_array();

    }


    public function item_insert() {

        $data = array(
            'ast_name'      => $this->input->post('ast_name'),
            'ast_at_id'     => $this->input->post('ast_at_id'),
            'ast_usr_id'    => $this->session->userdata('usr_id')
        );

        return $this->db->insert('asset_name', $data);
    }

    public function item_name($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->select('ast.*, at_name');
            $this->db->from('asset_name ast, asset_type at');
            $this->db->where('ast.ast_at_id = at.at_id');
            return $this->db->get()->result_array();
        }

        $query = $this->db->get_where('asset_type', array('ast_name' => $slug));
        return $query->row_array();

    }

    public function brand_insert() {

        $data = array(
            'bnd_name'       => $this->input->post('bnd_name'),
            'bnd_ast_id'     => $this->input->post('bnd_ast_id'),
            'bnd_usr_id'     => $this->session->userdata('usr_id')
        );

        return $this->db->insert('brand', $data);
    }

    public function model_insert() {

        $data = array(
            'mod_name'      => $this->input->post('mod_name'),
            'mod_bnd_id'     => $this->input->post('mod_bnd_id'),
            'mod_usr_id'     => $this->session->userdata('usr_id')
        );

        return $this->db->insert('model', $data);
    }


    public function asset_list($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->select('s.*, c.cou_name');
            $this->db->from('asset_type s, courses c');
            $this->db->where('s.`at_cou`= c.`cou_id`');

            return $this->db->get()->result_array();
        }

            $this->db->select('s.*, c.cou_name');
            $this->db->from('asset_type s, courses c');
            $this->db->where('s.`at_cou`= c.`cou_id`');
            $this->db->where('s.at_id', $slug);
            
            return $this->db->get()->row_array();

         //$query = $this->db->get_where('asset_type', array('at_id' => $slug));
        // return $query->row_array();

    }

    public function asset_update() {
        //$this->load->helper('url');

        //$slug = url_title($this->input->post('title'), 'dash', TRUE);
        //$cust_id = $this->input->post

        $data = array(
            'at_cou'       => $this->input->post('at_cou'),
            'at_batch'     => $this->input->post('at_batch'),
            'at_roll'      => $this->input->post('at_roll'),
            'at_reg'       => $this->input->post('at_reg'),
            'at_name'      => $this->input->post('at_name'),
            'at_fa'        => $this->input->post('at_fa'),
            'at_cont'      => $this->input->post('at_cont'),
            'at_email'     => $this->input->post('at_email'),
            'at_pass'      => $this->input->post('at_pass'),
            'at_adm_date'  => $this->input->post('at_adm_date') 
        );

        $at_id = $this->input->post('at_id');

        $this->db->where('at_id', $at_id);

        return $this->db->update('asset_type', $data);
    }
    
    function receive_purchase(){

        $data = array(
            
            'str_pur_id'        => $this->input->post('str_pur_id'), 
            'str_ast_id'        => $this->input->post('str_ast_id'),
            'str_bnd_id'        => $this->input->post('str_bnd_id'),
            'str_mod_id'        => $this->input->post('str_mod_id'),
            'str_sl'            => $this->input->post('str_sl'),
            'str_unt_price'     => $this->input->post('str_unt_price'),
            'str_qnty'          => $this->input->post('str_qnty'),
            'str_exp_date'      => $this->input->post('str_exp_date'),
            'str_w_pre'         => $this->input->post('str_w_pre'),
            'str_loc'           => '001' 
            //$this->input->post('str_loc') 
        );
        
        return $this->db->insert('store', $data);

    }
    
    function pur_wise_store($str_pur_id){
            if ($str_pur_id != FALSE)
        {
            $this->db->select('*');
            $this->db->from('store');
            $this->db->where('str_pur_id',$str_pur_id);
            return $this->db->get()->result_array();
        }

    }

    function __destruct() {
        $this->db->close();
    }
}
