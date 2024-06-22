<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("contact_model");
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if(!$this->user_model->current_user()){
			redirect('admin/login');
		}
    }

    public function index()
    {
        $data["contact"] = $this->contact_model->getAll();
        $this->load->view("admin/contact/list", $data);
    }

    public function add()
    {
        $contact = $this->contact_model; // objek model
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($contact->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
            $contact->save(); // simpan data ke database
            $this->session->set_flashdata('success', 'Saved Successfully'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/contact/new_form"); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/contact'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $contact = $this->contact_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($contact->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $contact->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Saved Successfully');
        }

        $data["contact"] = $contact->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["contact"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/contact/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->contact_model->delete($id)) {
            redirect(site_url('admin/contact'));
        }
    }
}