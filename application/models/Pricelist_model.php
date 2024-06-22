<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pricelist_model extends CI_Model 
{
    // nama table
    private $_table = "pricelist";

    // nama kolom di tabel
    public $pricelist_id;
    public $title;
    public $category_id;
    public $category;
    public $files;

    public function rules() {
        return [

            ['field' => 'pricelist_id',
            'label' => 'Pricelist ID',
            'rules' => 'required'],

            ['field' => 'title',
            'label' => 'Title'],

            ['field' => 'category_id',
            'label' => 'Category ID'],

            ['field' => 'category',
            'label' => 'Category'],

            ['field' => 'files',
            'label' => 'File']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM barang
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pricelist_id" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }
    
    public function getByCategoryId($category_id)
    {
        $this->db->select('category_id, category, title, price, photo, description');
        $query = $this->db->get_where($this->_table, array('category_id'=>$category_id));
        // print_r($query);
        return $query->result();
    }

    // public function getpricelistByCategory($category_id)
    // {
    //     $this->db->select('category_id, title, files');
    //     $query = $this->db->get_where($this->_table, array('category_id'=>$category_id));
       
    //     return $query->result();
    // }

    public function getpricelistByCategory($postData)
    {
        $response = array();
        $this->db->select('category, category_id, title,files');
        $this->db->where('category_id',$postData['category_id']);
        $q = $this->db->get('pricelist');
        $response = $q->result_array();

        return $response;
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->pricelist_id = uniqid(); // membuat id unik
        $this->title = $post["title"];
        $this->category_id = $post["category_id"];
        $this->category = $post["category"];
        $this->files = $this->_uploadImage();
        // $this->files = $this->uploadImage();
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->pricelist_id = $post["pricelist_id"];
        $this->title = $post["title"];
        $this->category = $post["category"];
        $this->category_id = $post["category_id"];
        if (!empty($_FILES["files"]["name"])) {
            $this->files = $this->_uploadImage();
        } else {
            $this->files = $post["old_files"];
        }

        return $this->db->update($this->_table, $this, array('pricelist_id' => $post['pricelist_id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("pricelist_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/pricelist';
        $config['allowed_types']        = 'jpg|png|jpeg|pdf';
        $config['file_name']            = $this->pricelist_id;
        $config['overwrite']			= true;
        $config['max_size']             = 5024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('files')) {
            return $this->upload->data("file_name");
        }

        print_r($this->upload->display_errors());
        
       // return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $pricelist = $this->getById($id);
        if ($pricelist->photo != "default.jpg") {
            $filename = explode(".", $pricelist->photo)[0];
            return array_map('unlink', glob(FCPATH."upload/pricelist/$filename.*"));
        }
    }
}