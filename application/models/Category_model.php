<?php defined('BASEPATH') OR exit('No direct script access allowed');

class category_model extends CI_Model 
{
    // nama table
    private $_table = "category";

    // nama kolom di tabel
    public $category_id;
    public $category_name;
    public $photo;

    public function rules() {
        return [

            ['field' => 'category_id',
            'label' => 'Category ID',
            'rules' => 'required'],

            ['field' => 'category_name',
            'label' => 'category Name'],

            ['field' => 'photo',
            'label' => 'Photo']

        ];
    }

    public function getAll() {
        $this->db->order_by('sequence','asc');
        $query = $this->db->get('category');
        return $query->result();
        //return $this->db->get($this->_table)->result();
        // SELECT * FROM barang
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["category_id" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function getByCategoryId($postData)
    {
        $response = array();
        $this->db->select('category_id,category_name');
        $this->db->where('category_id',$postData['category_id']);
        $q = $this->db->get('category');
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
        $this->category_id = $post["category_id"]; // membuat id unik
        $this->category_name = $post["category_name"]; 
        $this->photo = $this->_uploadImage();
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->category_id = $post["category_id"];
        $this->category_name = $post["category_name"]; 

        if (!empty($_FILES["photo"]["name"])) {
            $this->photo = $this->_uploadImage();
        } else {
            $this->photo = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('category_id' => $post['category_id']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/homepage';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->category_id;
        $config['overwrite']			= true;
        $config['max_size']             = 10000; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }

        print_r($this->upload->display_errors());
        
       // return "default.jpg";
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("category_id" => $id));
    }

    private function _deleteImage($id)
    {
        $category = $this->getById($id);
        if ($category->photo != "default.jpg") {
            $filename = explode(".", $category->photo)[0];
            return array_map('unlink', glob(FCPATH."upload/homepage/$filename.*"));
        }
    }

}