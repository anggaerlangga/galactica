<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pricelist extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pricelist_model");
        $this->load->model("category_model");
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if(!$this->user_model->current_user()){
			redirect('admin/login');
		}
    }

    public function index()
    {
        $data["pricelist"] = $this->pricelist_model->getAll();
        $this->load->view("admin/pricelist/list", $data);
    }

    public function getByCategoryId()
    {   
        $postData = $this->input->post();
        $this->load->model('category_model');
        $data = $this->category_model->getByCategoryId($postData);
        echo json_encode($data);
    }

    public function getBarangByCategoryId()
    {   
        $postData = $this->input->post();
        $this->load->model('barang_model');
        $data = $this->barang_model->getBarangByCategoryId($postData);
        echo json_encode($data);
    }

    public function getpricelistByCategory()
    {   
        $postData = $this->input->post();
        $this->load->model('pricelist_model');
        $data = $this->pricelist_model->getpricelistByCategory($postData);
        echo json_encode($data);
    }
    
    public function add()
    {
        $pricelist = $this->pricelist_model;
        $data['category'] = $this->category_model->getAll();
        // $data['barang_category'] = $this->barang_model->getAll();
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($pricelist->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
           $pricelist->save(); // simpan data ke database
           $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/pricelist/new_form", $data); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/pricelist'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $pricelist = $this->pricelist_model; // objek model
        $data['category'] = $this->category_model->getAll();
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($pricelist->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $pricelist->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pricelist"] = $pricelist->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["pricelist"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/pricelist/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->pricelist_model->delete($id)) {
            redirect(site_url('admin/pricelist'));
        }
    }
}