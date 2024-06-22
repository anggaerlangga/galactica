<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("partner_model");
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if(!$this->user_model->current_user()){
			redirect('admin/login');
		}
    }

    public function index()
    {
        $data["partner"] = $this->partner_model->getAll();
        $this->load->view("admin/partner/list", $data);
    }

    public function add()
    {
        $partner = $this->partner_model; // objek model
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($partner->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
            $partner->save(); // simpan data ke database
            $this->session->set_flashdata('success', 'Saved Successfully'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/partner/new_form"); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/partner'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $partner = $this->partner_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($partner->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $partner->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Saved Successfully');
        }

        $data["partner"] = $partner->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["partner"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/partner/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->partner_model->delete($id)) {
            redirect(site_url('admin/partner'));
        }
    }
}