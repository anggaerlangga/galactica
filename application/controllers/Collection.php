<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}

    public function index()
	{

		// $this->load->model("product_model");
		// $banner["product"] = $this->product_model->getAll();
		// $this->load->model("category_model");
		// $data["category"] = $this->category_model->getAll();

		// $this->load->view('/common/header');
		//  $this->load->view('/common/banner', $banner);
		// $this->load->view('/public/collection', $data);
		// $this->load->view('/common/footer');

	}

    public function product($category_id = null)
	{
        $this->load->model("product_model");
        $data["product"] = $this->product_model->getProductByCategory($category_id);
        //$this->load->model("category_model");
        //$data["category"] = $this->category_model->getAll();

        $this->load->view('/common/header');
       //  $this->load->view('/common/banner', $banner);
        $this->load->view('/public/collection', $data);
        $this->load->view('/common/footer');
	}
	
	public function all()
	{
	  	$this->load->model("product_model");
		$data["product"] = $this->product_model->getAll();
		$this->load->view('/common/header');
		$this->load->view('/public/collection', $data);
		$this->load->view('/common/footer');  
	}
	
	public function detail($product_id = null)
	{
	   $this->load->model("product_model");
	   $data["product"] = $this->product_model->getById($product_id);
	   $this->load->view('/common/header');
       $this->load->view('/public/detail-product', $data);
       $this->load->view('/common/footer');
	}

}
