<?php defined('BASEPATH') OR exit('No direct script access allowed');

class barang_model extends CI_Model 
{
    // nama table
    private $_table = "master_barang";

    // nama kolom di tabel
    public $barang_id;
    public $category_id;
    public $category_name;
    public $barang_name;
    public $model;
    public $size;
    public $weight;
    public $price;

    public function rules() {
        return [

            ['field' => 'category_id',
            'label' => 'category_id',
            'rules' => 'required'],

            ['field' => 'category_name',
            'label' => 'category_name'],

            ['field' => 'barang_name',
            'label' => 'barang Name'],

            ['field' => 'model',
            'label' => 'Model'],

            ['field' => 'size',
            'label' => 'Size'],

            ['field' => 'weight',
            'label' => 'Weight'],

            ['field' => 'price',
            'label' => 'Price']

        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM barang
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["barang_id" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

   // public function getBarangByCategoryId($category_id)
//    {
  //      return $this->db->get_where($this->_table, ["category" => $category_id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    //}

    public function getBarangByCategoryId($postData)
    {
        $response = array();
        $this->db->select('category_id,category_name,barang_name,model,size,weight,price');
        $this->db->where('category_id',$postData['category_id']);
        $q = $this->db->get('master_barang');
        $response = $q->result_array();

        return $response;
    }
    
    public function getBarangByBarangName($postData)
    {
        $response = array();
        $this->db->select('barang_name,model,size,weight,price');
        $this->db->where('barang_name',$postData['barang_name']);
        $q = $this->db->get('master_barang');
        $response = $q->result_array();

        return $response;
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
        $this->barang_id = uniqid(); // membuat id unik
        $this->category_id = $post["category_id"];
        $this->category_name = $post["category_name"];  
        $this->barang_name = $post["barang_name"];
        $this->model = $post["model"];
        $this->size = $post["size"];
        $this->weight = $post["weight"];
        $this->price = $post["price"];
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function save_barang() 
    {
        $data = array(
            'barang_id' => uniqid(),
            'category_id' => $this->input->post('category_id'),
            'category_name' => $this->input->post('category_name'),
            'barang_name' => $this->input->post('barang_name'),
            'model' => $this->input->post('model'),
            'size' => $this->input->post('size'),
            'weight' => $this->input->post('weight'),
            'price' => $this->input->post('price'),
        );
        $result=$this->db->insert('master_barang',$data);
        return $result;
    }

    public function update_barang() 
    {
        $barang_id = $this->input->post('barang_id');
        $category_id = $this->input->post('category_id');
        $category_name = $this->input->post('category_name');
        $barang_name = $this->input->post('barang_name');
        $model = $this->input->post('model');
        $size = $this->input->post('size');
        $weight = $this->input->post('weight');
        $price = $this->input->post('price');
        
        $this->db->set('barang_id', $barang_id);
        $this->db->set('category_id', $category_id);
        $this->db->set('category_name', $category_name);
        $this->db->set('barang_name', $barang_name);
        $this->db->set('model', $model);
        $this->db->set('size', $size);
        $this->db->set('weight', $weight);
        $this->db->set('price', $price);

        $this->db->where('barang_id', $barang_id);
        $result=$this->db->update('master_barang');
        return $result;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->barang_id = $post["id"];
        $this->category_id = $post["category_id"];
        $this->category_name = $post["category_name"];  
        $this->barang_name = $post["barang_name"];
        $this->model = $post["model"];
        $this->size = $post["size"];
        $this->weight = $post["weight"];
        $this->price = $post["price"];

        return $this->db->update($this->_table, $this, array('barang_id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("barang_id" => $id));
    }

}