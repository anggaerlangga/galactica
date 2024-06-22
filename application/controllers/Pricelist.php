<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricelist extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
        $this->load->model("category_model");
	}

    public function index()
	{
	
		//  $data = array (
		// 	$location => $this->location_model->getAll();
		// 	// $banner["banner"] = $this->banner_model->getAll();
		// 	$villa => $this->villa_model->getTopVilla();
		//  )
         $data['category'] = $this->category_model->getAll();
		 $this->load->view('/common/header');
		 $this->load->view('/public/pricelist',$data);
		 $this->load->view('/common/footer');

	}

	public function getpricelistByCategory()
    {   
        $postData = $this->input->post();
        $this->load->model('pricelist_model');
        $data = $this->pricelist_model->getpricelistByCategory($postData);
        echo json_encode($data);
    }
}
