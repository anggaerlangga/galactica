<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if(!$this->user_model->current_user()){
			redirect('admin/login');
		}
    }

    public function index()
    {
        $data["category"] = $this->category_model->getAll();
        $this->load->view("admin/category/list", $data);
    }
 
    public function add()
    {
        $category = $this->category_model; // objek model
        $data['category'] = $this->category_model->getAll();
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($category->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
           $category->save(); // simpan data ke database
           $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/category/new_form", $data); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/category'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $category = $this->category_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($category->rules()); 

        if($validation->run()) { // melakukan validasi
            $category->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["category"] = $category->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["category"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/category/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->category_model->delete($id)) {
            redirect(site_url('admin/category'));
        }
    }

}