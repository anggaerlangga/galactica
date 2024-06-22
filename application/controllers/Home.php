<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}

    public function index()
	{
		 $category_id = "STEEL";
		 $this->load->model("banner_model");
		 $banner["banner"] = $this->banner_model->getAll();
		 $this->load->model("product_model");
		 $data["product"] = $this->product_model->getByCategoryId($category_id);
		 $this->load->model("category_model");
		 $data["category"] = $this->category_model->getAll();
		 $this->load->model("proyek_model");
		 $data["proyek"] = $this->proyek_model->getAll();
		 $this->load->model("article_model");
		 $data["article"] = $this->article_model->getAll();
		 $this->load->model("partner_model");
		 $data["partner"] = $this->partner_model->getAll();
		 $this->load->model("contact_model");
		 $data["contact"] = $this->contact_model->getAll();

		//  $data = array (
		// 	$location => $this->location_model->getAll();
		// 	// $banner["banner"] = $this->banner_model->getAll();
		// 	$villa => $this->villa_model->getTopVilla();
		//  )

		 $this->load->view('/common/header');
		 $this->load->view('/common/banner', $banner);
		 $this->load->view('/public/home', $data);
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
