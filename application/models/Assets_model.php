<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: Login model
 * @author: Imron Rosdiana
 */
class Assets_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function category_insert() {

        $data = array(
            'at_name'       => $this->input->post('at_name'),
            'at_remarks'    => $this->input->post('at_remarks'),
            'at_usr_id'     => $this->session->userdata('usr_id')
        );

        return $this->db->insert('asset_type', $data);
    }

    public function category_name($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->select('*');
            $this->db->from('asset_type');
            return $this->db->get()->result_array();
        }

        $query = $this->db->get_where('asset_type', array('at_id' => $slug));
        return $query->row_array();

    }

    public function item_insert() {

        $data = array(
            'ast_name'      => $this->input->post('ast_name'),
            'ast_at_id'     => $this->input->post('ast_at_id'),
            'ast_usr_id'     => $this->session->userdata('usr_id')
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
            'bnd_name'      => $this->input->post('bnd_name'),
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
            // $this->db->where('s.at_id', '2');
            

            // $query = $this->db->get('asset_type');
            return $this->db->get()->result_array();
        }

            $this->db->select('s.*, c.cou_name');
            $this->db->from('asset_type s, courses c');
            $this->db->where('s.`at_cou`= c.`cou_id`');
            $this->db->where('s.at_id', $slug);
            

            // $query = $this->db->get('asset_type');
            return $this->db->get()->row_array();

         //$query = $this->db->get_where('asset_type', array('at_id' => $slug));
        // return $query->row_array();

    }

    public function category_update() {

        $data = array(
            'at_name'       => $this->input->post('at_name'),
            'at_remarks'    => $this->input->post('at_remarks'),
            'at_usr_id'     => $this->session->userdata('usr_id')
        );

        $at_id = $this->input->post('at_id');

        $this->db->where('at_id', $at_id);

        return $this->db->update('asset_type', $data);
    }

    function __destruct() {
        $this->db->close();
    }
}
