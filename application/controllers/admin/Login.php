<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');   
        $this->load->library('session');
        $this->load->model('user_model');
    }

    public function index()
	{
		$this->load->model('user_model');
		$this->load->library('form_validation');

		$rules = $this->user_model->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('admin/login_page.php');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->user_model->login($username, $password)){
			redirect('admin');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Failed, Please check your username and password!');
		}

		$this->load->view('admin/login_page.php');
    }
    
	public function logout()
	{
		$this->load->model('user_model');
		$this->user_model->logout();
		redirect(site_url('admin/login'));
	}
}