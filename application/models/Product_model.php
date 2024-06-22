<?php defined('BASEPATH') OR exit('No direct script access allowed');

class product_model extends CI_Model 
{
    // nama table
    private $_table = "product";

    // nama kolom di tabel
    public $product_id;
    public $product_name;
    public $title;
    public $category_id;
    public $category;
    public $model;
    public $size;
    public $weight; 
    public $price;   
    public $description;
   // public $files;
    public $photo;

    public function rules() {
        return [

            ['field' => 'product_name',
            'label' => 'Product Name',
            'rules' => 'required'],

            ['field' => 'title',
            'label' => 'Title'],

            ['field' => 'category_id',
            'label' => 'Category ID'],

            ['field' => 'category',
            'label' => 'Category'],

            ['field' => 'model',
            'label' => 'Model'],

            ['field' => 'size',
            'label' => 'Size'],

            ['field' => 'weight',
            'label' => 'Weight'],

            ['field' => 'price',
            'label' => 'Price'],

            ['field' => 'description',
            'label' => 'Description']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM barang
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
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

    public function getProductByCategory($category_id)
    {
        $this->db->select('category_id, category, title, price, photo, description');
        $query = $this->db->get_where($this->_table, array('category_id'=>$category_id));
        // print_r($query);
        return $query->result();
    }

  /*  public function getTopVilla()
    {
        $query = $this->db->get_where($this->_table, array('recommended'=>'Y'));
        return $query->result();
    }
*/
  
 /*   public function getVillaByLoc($location_name)
    {
        $this->db->select('kode_villa, location_name, photo, description, price, tamu, kamartidur, kamarmandi');
        $query = $this->db->get_where($this->_table, array('location_name'=>$location_name));
        // print_r($query);
        return $query->result();
    }
*/
/*    public function getVillaByKodeVilla($kode_villa)
    {
        $this->db->select('kode_villa, location_name, price, description, tamu, kamartidur, kamarmandi, ruangkeluarga, dapur, tempatparkir, wifi, kolamrenang');
        $query = $this->db->get_where($this->_table, array('kode_villa'=>$kode_villa));
        return $query->result();
    }
*/
    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->product_id = uniqid(); // membuat id unik
        $this->product_name = $post["product_name"]; 
        $this->title = $post["title"];
        $this->category_id = $post["category_id"];
        $this->category = $post["category"];
        $this->model = $post["model"];
        $this->size = $post["size"];
        $this->weight = $post["weight"]; 
        $this->price = $post["price"];
        $this->description = $post["description"];
        $this->photo = $this->_uploadImage();
        // $this->files = $this->uploadImage();
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["product_id"];
        $this->product_name = $post["product_name"]; 
        $this->title = $post["title"];
        $this->category_id = $post["category_id"];
        $this->category = $post["category"];
        $this->model = $post["model"];
        $this->size = $post["size"];
        $this->weight = $post["weight"]; 
        $this->price = $post["price"];
        $this->description = $post["description"];
        
        if (!empty($_FILES["photo"]["name"])) {
            $this->photo = $this->_uploadImage();
        } else {
            $this->photo = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('product_id' => $post['product_id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("product_id" => $id));
    }

    private function _multipleUpload()
    {
        $config['upload_path']          = './upload/villa';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['encrypt_name']         =  TRUE;
        $config['quality']              = '50%';
    //     $config['max_size']             = 10000; // 1MB

        $this->load->library('upload', $config);
        for ($i=1; $i<=5; $i++) {
            if(!empty($_FILES['files'.$i]['name'])) {
                if(!$this->upload->do_upload('files'.$i))
                    $this->upload->display_errors();
                else 
                    return $this->upload->data("file_name");
            }
        }
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/product/thumbnail';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->product_id;
        $config['overwrite']			= true;
        $config['max_size']             = 5024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }

        print_r($this->upload->display_errors());
        
       // return "default.jpg";
    }

    private function uploadImage()
    {
        $config['upload_path']          = './upload/product/thumbnail';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->product_id;
        $config['overwrite']			= true;
        $config['max_size']             = 5024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }

        print_r($this->upload->display_errors());
        
       // return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $product = $this->getById($id);
        if ($product->photo != "default.jpg") {
            $filename = explode(".", $product->photo)[0];
            return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
        }
    }
}