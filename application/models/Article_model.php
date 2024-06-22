<?php defined('BASEPATH') OR exit('No direct script access allowed');

class article_model extends CI_Model 
{
    // nama table
    private $_table = "article";

    // nama kolom di tabel
    public $article_id;
    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $author;
    public $category;
    public $tags;
    public $meta;
    public $image = "default.jpg";

    public function rules() {
        return [
            ['field' => 'article_id',
            'label' => 'article_id',
            'rules' => 'required'],

            ['field' => 'title',
            'label' => 'title'],

            ['field' => 'description',
            'label' => 'description'],

            ['field' => 'start_date',
            'label' => 'start_date'],

            ['field' => 'end_date',
            'label' => 'end_date'],

            ['field' => 'author',
            'label' => 'author'],

            ['field' => 'category',
            'label' => 'category'],

            ['field' => 'tags',
            'label' => 'tags'],

            ['field' => 'meta',
            'label' => 'meta'],

            ['field' => 'image',
            'label' => 'image']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

   // public function getShortDesc() {
   //     $this->db->select('SUBSTRING(description, 1, 100), article_id, title, image', FALSE);
   //     $query = $this->db->get('article');
   //     return $query->result();
   // }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["article_id" => $id])->row();
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->article_id = uniqid(); // membuat id unik
        $this->title = $post["title"];
        $this->description = $post["description"]; 
        $this->start_date = $post["start_date"];
        $this->end_date = $post["end_date"];
        $this->author = $post["author"];
        $this->category = $post["category"];
        $this->tags = $post["tags"];
        $this->meta = $post["meta"];
        $this->image = $this->_uploadImage();
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->article_id = $post["article_id"]; 
        $this->title = $post["title"]; 
        $this->description = $post["description"];
        $this->start_date = $post["start_date"];
        $this->end_date = $post["end_date"];
        $this->author = $post["author"];
        $this->category = $post["category"];
        $this->tags = $post["tags"];
        $this->meta = $post["meta"];

        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('article_id' => $post['article_id']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/homepage/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $this->article_id;
        $config['overwrite']			= true;
        $config['max_size']             = 3024; // 1MB
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
        return $this->db->delete($this->_table, array("article_id" => $id));
    }

    private function _deleteImage($id)
    {
        $article = $this->getById($id);
        if ($article->image != "default.jpg") {
            $filename = explode(".", $article->image)[0];
            return array_map('unlink', glob(FCPATH."upload/homepage/$filename.*"));
        }
    }

}