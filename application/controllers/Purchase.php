<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Super Class
 *
 * @package     MSc Project
 * @subpackage  Purchase
 * @category    Purchase dept properties
 * @author      Arif Uddin
 * @link        http://{uri}/purchase
 */


class Purchase extends CI_Controller
{

    function __construct() {
        parent::__construct();
        
		$this->load->model('purchase_model');
        
		//check for login status
        if ((empty($_SESSION['oims_login'])) OR ($_SESSION['oims_login'] !== 'success') )
            redirect('login');  
    }

    Public function get_pur_info()
    {
        $result=$this->db->select('p.pur_id, p.pur_wo_no, p.pur_wo_date, p.pur_bill_no, p.pur_bill_date, a.at_name AS at_type, v.ven_name AS vendor ')
                         ->where('pur_id',$_POST['id'])
                         ->where('p.`pur_ven_id` = v.`ven_id`')
                         ->where('p.`pur_at_id` = a.`at_id`')
                         ->get('purchase p, asset_type a, vendors v')
                         ->result();

        // $result=$this->db->where('pur_id',$_POST['id'])
        //                 // ->group_by('')
        //                 ->get('purchase')
        //                 ->result();
        // $data=array();
        foreach($result as $r)
        {
            $data['pur_id']=$r->pur_id;
            $data['pur_wo_no']=$r->pur_wo_no;
            $data['pur_wo_date']=$r->pur_wo_date;
            $data['pur_bill_no']=$r->pur_bill_no;
            $data['pur_bill_date']=$r->pur_bill_date;
            $data['pur_at_id']=$r->at_type;
            $data['pur_ven_id']=$r->vendor;
            $json[]=$data;
            
        }
        echo json_encode($json);
    
    }


    Public function get_pur_based_item()
    {
        $result=$this->db->select('an.`ast_id` ast_id, an.`ast_name` ast_name')
                         ->where('pur_id',$_POST['id'])
                         ->where('pur.`pur_at_id` = an.`ast_at_id`')
                         ->get('purchase pur , asset_name an')
                         ->result();

        // $result=$this->db->where('pur_id',$_POST['id'])
        //                 // ->group_by('')
        //                 ->get('purchase')
        //                 ->result();
        // $data=array();
        foreach($result as $r)
        {
            $data['ast_id']=$r->ast_id;
            $data['ast_name']=$r->ast_name;
            
            $json[]=$data;
            
        }
        echo json_encode($json);
    
    }


    Public function get_srote_info()
    {
        $result=$this->db->select('ast.`ast_name` AS str_ast_id, bnd.`bnd_name` AS str_bnd_id, mdl.`mod_name` AS str_mod_id, str.str_sl, str.str_id, str.`str_qnty`, str.`str_unt_price`, str.`str_exp_date`, str.`str_w_pre`, br.`br_name` as str_loc, str.str_pur_id')
                    ->where('str.`str_pur_id`',$_POST['id'])
                    ->where('str.str_ast_id = ast.`ast_id`')
                    ->where('str.`str_bnd_id` = bnd.`bnd_id`')
                    ->where('str.`str_mod_id` = mdl.`mod_id`')
                    ->where('str.`str_loc` = br.`br_code`')
                    ->order_by('str_id', 'DESC')
                    ->get('store str, asset_name ast, brand bnd, model mdl, branch br')
                    ->result();

        // $result=$this->db->where('str_pur_id',$_POST['id'])
        //                 ->get('store')
        //                 ->result();

        $data=array();
        foreach($result as $r)
        {
            $data['str_id']=$r->str_id;
            $data['str_pur_id']=$r->str_pur_id;
            $data['str_ast_id']=$r->str_ast_id;
            $data['str_bnd_id']=$r->str_bnd_id;
            $data['str_mod_id']=$r->str_mod_id;
            $data['str_sl']=$r->str_sl;
            $data['str_qnty']=$r->str_qnty;
            $data['str_unt_price']=$r->str_unt_price;
            $data['str_exp_date']=$r->str_exp_date;
            $data['str_w_pre']=$r->str_w_pre;
            $data['str_loc']=$r->str_loc;
            $json[]=$data;
            
        }
        echo json_encode($json);
    
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

            $json[]=$data;
        }
        echo json_encode($json);

    }

    Public function get_vendors()
    {
        
          $result=$this->db->where('ven_at_id',$_POST['id'])
                        ->get('vendors')
                        ->result();
                        
        $data=array();
        foreach($result as $r)
        {
            $data['ven_id']=$r->ven_id;
            $data['ven_name']=$r->ven_name;
            $json[]=$data;
        }
        echo json_encode($json);

    }

    public function index() {
		
         redirect('purchase/newpur');
       
    }

    public function newpur() {
        
        $data['title'] = 'Purchase New product';
        $data['sub_title'] = 'New Purchase';

        $this->form_validation->set_rules('pur_at_id', 'Asset Type', 'required');
        $this->form_validation->set_rules('pur_ven_id', 'Vendor Information', 'required');
        $this->form_validation->set_rules('pur_wo_no', 'Work Order / Office Note Number', 'required');


        if ($this->form_validation->run() === TRUE)
        {
            $this->purchase_model->purchase_insert();     
        }

        $data['title'] = 'Purchase New Product';
        $data['pur_id'] = $this->purchase_model->purchase_id();
        $data['branch_list'] = $this->purchase_model->branch_list();
                
        $this->theme->view('purchase/purchase_new', $data);

    }

    // public function view($slug = NULL)
    //     {
    //         if($slug == NULL) {

    //             $data['pro_list'] = $this->purchase_model->purchase_list();
    //             $data['title'] = 'product List';

    //             $this->theme->view('purchase/pro_view', $data);

    //         } else {

              
    // 			$data['pro_list'] = $this->purchase_model->purchase_list($slug);
    // 			$data['pro_name'] = $data['pro_list']['pro_name'];
    //             if (empty($data['pro_list']))
    //             {
    //         		show_404();	
    //             }

    //             $data['title'] = 'Update purchase Information';

    //             $this->theme->view('purchase/pro_edit', $data);

    //         }
    //     }


    // public function update() {

    //     $this->form_validation->set_rules('pro_name', 'product Name', 'required');
    //     /* $this->form_validation->set_rules('text', 'text', 'required'); */
    //     // $this->load->view('menu');

    //     if ($this->form_validation->run() === FALSE)
    //     {

    //     	$this->theme->view('purchase/pro_add');		

    //     }
    //     else
    //     {
    //         $this->purchase_model->purchase_update();        			
			
    //         $data['pro_list'] = $this->purchase_model->purchase_list();
    //         $data['title'] = 'purchase List';

    //         $this->theme->view('purchase/pro_view', $data);

    //     }

    // }

public function purchase_add(){
    $this->purchase_model->receive_purchase();
}


public function pur_store(){
    $str_pur_id=$this->input->post('str_pur_id');
    $x=$this->purchase_model->pur_wise_store($str_pur_id);
 echo json_encode($x);

}



}