<?php defined('BASEPATH') OR exit('No direct script access allowed');

class hero_model extends CI_Model 
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
            ['field' => 'hero_id',
            'label' => 'hero_id',
            'rules' => 'required'],

            ['field' => 'title',
            'label' => 'title'],

            ['field' => 'subtitle',
            'label' => 'subtitle'],

            ['field' => 'description',
            'label' => 'description'],

            ['field' => 'label',
            'label' => 'label'],

            ['field' => 'url',
            'label' => 'url'],

            ['field' => 'image',
            'label' => 'image']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["hero_id" => $id])->row();
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->hero_id = uniqid(); // membuat id unik
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
        $this->hero_id = $post["hero_id"]; 
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

        return $this->db->update($this->_table, $this, array('hero_id' => $post['hero_id']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/homepage/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $this->hero_id;
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

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("hero_id" => $id));
    }

    private function _deleteImage($id)
    {
        $hero = $this->getById($id);
        if ($hero->image != "default.jpg") {
            $filename = explode(".", $hero->image)[0];
            return array_map('unlink', glob(FCPATH."upload/homepage/$filename.*"));
        }
    }

}