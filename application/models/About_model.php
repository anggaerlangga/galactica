<?php defined('BASEPATH') OR exit('No direct script access allowed');

class about_model extends CI_Model 
{
    // nama table
    private $_table = "about";

    // nama kolom di tabel
    public $about_id;
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
            'label' => 'Subtitle'],

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
        // SELECT * FROM barang
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["about_id" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function save() 
    {
        $post = $this->input->post(); //
        $this->about_id = uniqid(); 
        $this->title = $post["title"]; 
        $this->subtitle = $post["subtitle"]; 
        $this->description = $post["description"];
        $this->label = $post["label"]; 
        $this->url = $post["url"];
        $this->image = $this->_uploadImage();
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->about_id = $post["id"];
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

        return $this->db->update($this->_table, $this, array('about_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("about_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/image/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->about_id;
        $config['overwrite']			= true;
        $config['max_size']             = 5024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        print_r($this->upload->display_errors());
        //return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $about = $this->getById($id);
        if ($about->image != "default.jpg") {
            $filename = explode(".", $about->image)[0];
            return array_map('unlink', glob(FCPATH."upload/about/$filename.*"));
        }
    }
}