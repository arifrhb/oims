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


class Assets extends CI_Controller
{

    function __construct() {
        parent::__construct();

		$this->load->model('assets_model');

		//check for login status
        if ((empty($_SESSION['oims_login'])) OR ($_SESSION['oims_login'] !== 'success') )
            redirect('login');
        
    }

    public function index() {

        redirect('assets/category');
		// $this->theme->view('login_view');
    }

    public function category() {
        
        $data['title'] = 'Items / Goods master category';
        $data['sub_title'] = 'List of Asset Category';
        
        $this->form_validation->set_rules('at_name', 'Item Category Name', 'required');

        if ($this->form_validation->run() === TRUE)
        {       
            $this->assets_model->category_insert();   
        }

        $data['cat_name'] = $this->assets_model->category_name();   
        $this->theme->view('asset/category_add', $data);

    }


    public function category_edit($slug = NULL)
        {
            if($slug == NULL) {
             
                $data['std_list'] = $this->student_model->student_list();
                $data['title'] = 'Student List';

                $this->theme->view('category/student_view', $data);

            } 
            else 
            {

                $data['cou_name'] = $this->student_model->course_name();

                $data['std_list'] = $this->student_model->student_list($slug);

                if (empty($data['std_list']))
                {
            		show_404();	
                }

                $data['title'] = 'Update Student\'s Information';
                       
                $this->theme->view('student/student_edit', $data);
    			
            }
    }

    public function item() {
        
        $data['title'] = 'Category wise product information';
        $data['sub_title'] = 'List of Category wise product';
        
        $this->form_validation->set_rules('ast_name', 'Asset Name', 'required');
        $this->form_validation->set_rules('ast_at_id', 'Item Category', 'required');

        if ($this->form_validation->run() === TRUE)
        {       
            $this->assets_model->item_insert();   
        }
        
        $data['cat_name'] = $this->assets_model->category_name(); 
        $data['item_name'] = $this->assets_model->item_name(); 
        $this->theme->view('asset/item_add', $data);      
        
    }

    public function brand() {
        
        $data['title'] = 'Item wise Brnad information';
        $data['sub_title'] = 'List of Item wise Brand';
        
        $this->form_validation->set_rules('bnd_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('bnd_ast_id', 'Item Name ', 'required');

        if ($this->form_validation->run() === TRUE)
        {       
            $this->assets_model->brand_insert();   
        }
        
        $data['cat_name'] = $this->assets_model->category_name(); 
        $this->theme->view('asset/brand_add', $data);      
        
    }


    public function model() {
        
        $data['title'] = 'Brand wise Model information';
        $data['sub_title'] = 'List of Model numbers';
        
        $this->form_validation->set_rules('mod_name', 'Model Number', 'required');
        $this->form_validation->set_rules('mod_bnd_id', 'Brand Name', 'required');

        if ($this->form_validation->run() === TRUE)
        {       
            $this->assets_model->model_insert();   
        }
        
        $data['cat_name'] = $this->assets_model->category_name(); 
        $this->theme->view('asset/model_add', $data);      
        
    }

    Public function get_category()
    {
        $query=$this->db->get('asset_type');
                                  
        $result= $query->result();
        $data=array();
        foreach($result as $r)
        {
            $data['value']=$r->at_id;
            $data['label']=$r->at_name;
            $json[]=$data;
            
        }
        echo json_encode($json);
    
    }

    Public function get_item()
    {
        
          $result=$this->db->where('ast_at_id',$_POST['id'])
                        // ->group_by('')
                        ->get('asset_name')
                        ->result();
                        
        $data=array();
        foreach($result as $r)
        {
            $data['ast_id']=$r->ast_id;
            $data['ast_name']=$r->ast_name;
            $json[]=$data;
        }
        echo json_encode($json);

    }

    Public function get_brand()
    {

    $result=$this->db->where('bnd_ast_id',$_POST['id'])
                        // ->group_by('')
                        ->get('brand')
                        ->result();
     
        $data=array();
        foreach($result as $r)
        {
            $data['bnd_id']=$r->bnd_id;
            $data['bnd_name']=$r->bnd_name;
            // $data['label2'] = $r->std_name;
            $json[]=$data;
            
            
        }
        echo json_encode($json);

    }

    Public function get_model()
    {

    $result=$this->db->where('mod_bnd_id',$_POST['id'])
                        // ->group_by('')
                        ->get('model')
                        ->result();
     
        $data=array();
        foreach($result as $r)
        {
            $data['mod_id']=$r->mod_id;
            $data['mod_name']=$r->mod_name;
            // $data['label2'] = $r->std_name;
            $json[]=$data;
            
            
        }
        echo json_encode($json);

    }



    // public function update() {


    //     $this->form_validation->set_rules('std_name', 'Student\' Name', 'required');
        
    //     if ($this->form_validation->run() === TRUE)
    //     {
    //     	$this->student_model->student_update();
    //     }
    //     //else
    //     //{
    //         $data['std_list'] = $this->student_model->student_list();
    //         $data['title'] = 'Student List';

    //         $this->theme->view('student/student_view', $data);

    //     //}

    // }

    // public function search() {

    //         $this->theme->view('asset/asset_search');
    // }

}

//APPPATH/Application/Controller/Student.php