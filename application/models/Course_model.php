<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: Login model
 * @author: Imron Rosdiana
 */
class Course_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function course_addnew() {
        //$this->load->helper('url');

		//$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'cou_name'   => $this->input->post('cou_name'),
            'cou_title'  => $this->input->post('cou_title'),
			'cou_year'   => $this->input->post('cou_year'),
			'cou_sem'    => $this->input->post('cou_sem'),
            // 'cou_shift'  => $this->input->post('cou_shift'),
			'cou_cost'   => $this->input->post('cou_cost'),
            'update_by'  => $this->session->userdata('usr_id')  
			
		);

		return $this->db->insert('courses', $data);
    }


    public function course_list($slug = FALSE)
    {
        if ($slug === FALSE)
        {

            $this->db->select('*');
            $this->db->from('courses, users');
            $this->db->where('courses.update_by = users.usr_id');

            return $this->db->get()->result_array();

        }

        $query = $this->db->get_where('courses', array('cou_id' => $slug));
        return $query->row_array();

    }

    public function course_update() {
        //$this->load->helper('url');
        //$slug = url_title($this->input->post('title'), 'dash', TRUE);


        $data = array(
            'cou_name'   => $this->input->post('cou_name'),
            'cou_title'  => $this->input->post('cou_title'),
            'cou_year'   => $this->input->post('cou_year'),
            'cou_sem'    => $this->input->post('cou_sem'),
            // 'cou_shift'  => $this->input->post('cou_shift'),
            'cou_cost'   => $this->input->post('cou_cost'),
            'update_by'  => $this->session->userdata('usr_id')  
            
        );

        $cou_id = $this->input->post('cou_id');

        $this->db->where('cou_id', $cou_id);

        return $this->db->update('courses', $data);
    }

    function __destruct() {
        $this->db->close();
    }
}
