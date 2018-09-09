<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: 
 * @author: 
 */
class Store_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function store_status($cat = FALSE)
    {
        if ($cat === FALSE) 
        {
            $this->db->select('st.str_ast_id, an.`ast_name`, count(st.str_qnty) as str_total');
            $this->db->from('store st, asset_name an');
            $this->db->where('st.str_ast_id = an.ast_id');
            $this->db->where('st.str_loc','001');
            $this->db->where('st.str_status','1');
            $this->db->group_by('st.str_ast_id');
            return $this->db->get()->result_array();
        }

    }


    public function store_pending($cat = FALSE)
    {
        if ($cat === FALSE) 
        {
            $this->db->select('st.str_ast_id, an.`ast_name`, sum(st.str_qnty) as str_total');
            $this->db->from('store st, asset_name an');
            $this->db->where('st.str_ast_id = an.ast_id');
            $this->db->where('st.str_loc','001');
            $this->db->where('st.str_status','0');
            $this->db->group_by('st.str_ast_id');
            return $this->db->get()->result_array();
        }

    }

    public function location_update() {

        $str_sl = $this->input->post('str_sl');
    
        $data = array(
            'str_loc' => $this->input->post('new_loc')
        );
    
        $this->db->where('str_sl', $str_sl);

        return $this->db->update('store', $data);
        
    }
    
    public function received_update() {

        $str_sl = $this->input->post('str_sl');
    
        $data = array(
            'str_status' => 1
        );
    
        $this->db->where('str_sl', $str_sl);

        return $this->db->update('store', $data);
        
    }

    public function vendor_name($slug = FALSE) {
        if ($slug === FALSE) {
            $this->db->select('*');
            $this->db->from('vendors');
            return $this->db->get()->result_array();
        }

        $query = $this->db->get_where('vendors', array('at_id' => $slug));
        return $query->row_array();
    }

    function __destruct() {
        $this->db->close();
    }

}
