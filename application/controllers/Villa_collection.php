<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Villa_collection  extends CI_Controller {

    public function index()
	{
		// if (!isset($id)) redirect('/home');

		//  $this->load->model("villa_model");
		//  $data["villa"] = $this->villa_model->getVillaByLoc($location_name);
		//  $data["villa"] = $villa->getById($id);
		//  $this->load->view('/common/header');
		//  $this->load->view('villa', $data);
		//  $this->load->view('/common/footer');
		// $this->load->view('/common/sidebar');
	}

	public function villa($location_name = null)
	{
		if (!isset($location_name)) redirect('/home');

		$this->load->model("villa_model");
		$data["villa"] = $this->villa_model->getVillaByLoc($location_name);
		$this->load->view('/common/header');
		$this->load->view('villa', $data);
		$this->load->view('/common/footer');
	}


}
