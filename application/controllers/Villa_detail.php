<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Villa_detail extends CI_Controller {

    public function index()
	{
		//  $this->load->view('/common/header');
		//  $this->load->view('villa_detail');
		//  $this->load->view('/common/footer');
	}

	public function villa($kode_villa = null)
	{
		if (!isset($kode_villa)) redirect('/home');

		$this->load->model("villa_model");
		$this->load->model("villa_gallery_model");
		$data["villa"] = $this->villa_model->getVillaByKodeVilla($kode_villa);
		$data["villa_gallery"] = $this->villa_gallery_model->getDetailVilla($kode_villa);
		$this->load->view('/common/header');
		$this->load->view('villa_detail', $data);
		$this->load->view('/common/footer');
	}
}
