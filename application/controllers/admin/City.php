<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('about_model');
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["about"] = $this->about_model->getAll();
        $this->load->view("admin/about/list", $data);
    }

    public function add()
    {
        $about = $this->about_model; // objek model
        $data['about'] = $this->about_model->getAll();
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($about->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
           $about->save(); // simpan data ke database
           $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/about/new_form", $data); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/about'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $about = $this->about_model; // objek model
        $data['about'] = $this->about_model->getAll();
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($about->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $about->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["about"] = $about->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["about"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/about/edit_form", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->about_model->delete($id)) {
            redirect(site_url('admin/about'));
        }
    }

}