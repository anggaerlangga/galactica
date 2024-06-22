<?php defined('BASEPATH') OR exit('No direct script access allowed');

class banner_model extends CI_Model 
{
    // nama table
    private $_table = "hero";

    // nama kolom di tabel
    public $hero_id;
    public $title;
    public $subtitle;
    public $description;
    public $label;
    public $url;
    public $image = "default.jpg";

    public function rules() {
        return [
            ['field' => 'title',
            'label' => 'Title'],

            ['field' => 'subtitle',
            'label' => 'Sub Title'],

            ['field' => 'description',
            'label' => 'Description'],

            ['field' => 'label',
            'label' => 'Label'],

            ['field' => 'url',
            'label' => 'URL']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM banner
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["hero_id" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->hero_id = uniqid(); // membuat id unik
        $this->title = $post["title"]; // isi field nama
        $this->subtitle = $post["subtitle"]; // isi field jumlah
        $this->description = $post["description"];
        $this->label = $post["label"]; 
        $this->url = $post["url"]; // isi field tipe
        $this->image = $this->_uploadImage(); // isi field kategori
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->hero_id = $post["id"];
        $this->title = $post["title"];
        $this->subtitle = $post["subtitle"];
        $this->description = $post["description"];
        $this->label = $post["label"];
        $this->url = $post["url"];
       
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        
        return $this->db->update($this->_table, $this, array('hero_id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("hero_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/banner/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->hero_id;
        $config['overwrite']			= true;
        $config['max_size']             = 5024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
    }

    private function _deleteImage($id)
    {
        $banner = $this->getById($id);
        if ($banner->image != "default.jpg") {
            $filename = explode(".", $banner->image)[0];
            return array_map('unlink', glob(FCPATH."upload/banner/$filename.*"));
        }
    }
}