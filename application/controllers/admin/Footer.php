<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("footer_model");
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if(!$this->user_model->current_user()){
			redirect('admin/login');
		}
    }

    public function index()
    {
        $data["footer"] = $this->footer_model->getAll();
        $this->load->view("admin/footer/list", $data);
    }

    public function add()
    {
        $footer = $this->footer_model; // objek model
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($footer->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
            $footer->save(); // simpan data ke database
            $this->session->set_flashdata('success', 'Saved Successfully'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/footer/new_form"); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/footer'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $footer = $this->footer_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($footer->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $footer->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Saved Successfully');
        }

        $data["footer"] = $footer->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["footer"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/footer/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->footer_model->delete($id)) {
            redirect(site_url('admin/footer'));
        }
    }
}