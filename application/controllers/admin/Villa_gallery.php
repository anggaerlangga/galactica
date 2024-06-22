<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_gallery extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["product"] = $this->product_model->getAll();
        $this->load->view("admin/product/list", $data);
    }

    function create()
	{
		$this->load->view("admin/product/new_form");
    }
    
    public function proses()
    {
        $config['upload_path']          = './upload/product/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['encrypt_name'] 		= true;
        $this->load->library('upload',$config);
        // $product_gallery_id = uniqid();
		$kode_product = $this->input->post('kode_product');
		$jumlah_photo = count($_FILES['photo']['name']);
		for($i = 0; $i < $jumlah_photo; $i++)
		{
            if(!empty($_FILES['photo']['name'][$i])){
 
				$_FILES['file']['name'] = $_FILES['photo']['name'][$i];
				$_FILES['file']['type'] = $_FILES['photo']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['photo']['error'][$i];
                $_FILES['file']['size'] = $_FILES['photo']['size'][$i];
                
                if($this->upload->do_upload('file')){
					$product_id = uniqid();
                    $uploadData = $this->upload->data();
                    $data['product_id'] = $product_id;
                    $data['kode_product'] = $kode_product;
					$data['photo'] = $uploadData['file_name'];
					$this->db->insert('product',$data);
				}
            }
        }
        redirect(site_url('admin/product'));
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/product'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $product = $this->product_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($product->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $product->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["product"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/product/edit_form", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->product_model->delete($id)) {
            redirect(site_url('admin/product'));
        }
    }
}