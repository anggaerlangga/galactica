<?php

class Overview extends CI_Controller {
    public function __construct()
    {
	parent::__construct();
        $this->load->model("user_model");
        if(!$this->user_model->current_user()){
			redirect('admin/login');
		}
    }

    public function index()
    {
        $this->load->view("admin/overview");
    }
}