<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hero extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("hero_model");
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if(!$this->user_model->current_user()){
			redirect('admin/login');
		}
    }

    public function index()
    {
        $data["hero"] = $this->hero_model->getAll();
        $this->load->view("admin/hero/list", $data);
    }

    public function add()
    {
        $hero = $this->hero_model; // objek model
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($hero->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
            $hero->save(); // simpan data ke database
            $this->session->set_flashdata('success', 'Saved Successfully'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/hero/new_form"); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/hero'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $hero = $this->hero_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($hero->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $hero->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Saved Successfully');
        }

        $data["hero"] = $hero->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["hero"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/hero/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->hero_model->delete($id)) {
            redirect(site_url('admin/hero'));
        }
    }
}