<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');
        $this->load->model('category_model');
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if(!$this->user_model->current_user()){
			redirect('admin/login');
		}
    }

    public function index()
    {
        $data["barang"] = $this->barang_model->getAll();
        $this->load->view("admin/barang/list", $data);
    }

    public function getByCategoryId()
    {   
        $postData = $this->input->post();
        $this->load->model('category_model');
        $data = $this->category_model->getByCategoryId($postData);
        echo json_encode($data);
    }

    function save_barang(){
        $data=$this->barang_model->save_barang();
        echo json_encode($data);
    }

    function update_barang(){
        $data=$this->barang_model->update_barang();
        echo json_encode($data);
    }
 
    public function add()
    {
        $barang = $this->barang_model; 
        $data['category'] = $this->category_model->getAll();

        $this->load->view("admin/barang/new_form", $data); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/barang'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $barang = $this->barang_model; // objek model
        $data['category'] = $this->category_model->getAll();

        $data["barang"] = $barang->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["barang"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/barang/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->barang_model->delete($id)) {
            redirect(site_url('admin/barang'));
        }
    }

    function delete_barang(){
        $data=$this->_model->delete_barang();
        echo json_encode($data);
    }

}