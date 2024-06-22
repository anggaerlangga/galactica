<?php defined('BASEPATH') OR exit('No direct script access allowed');

class partner_model extends CI_Model 
{
    // nama table
    private $_table = "partner";

    // nama kolom di tabel
    public $partner_id;
    public $partner_name;
    public $description;
    public $photo = "default.jpg";

    public function rules() {
        return [

            ['field' => 'partner_id',
            'label' => 'partner ID',
            'rules' => 'required'],

            ['field' => 'partner_name',
            'label' => 'partner Name'],

            ['field' => 'description',
            'label' => 'Description']

        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["partner_id" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->partner_id = uniqid();
        $this->partner_name = $post["partner_name"]; 
        $this->description = $post["description"]; 
        $this->photo = $this->_uploadImage();
        return $this->db->insert($this->_table, $this); 
    }

    public function update()
    {
        $post = $this->input->post();
        $this->partner_id = $post["partner_id"];
        $this->partner_name = $post["partner_name"]; 
        $this->description = $post["description"]; 

        if (!empty($_FILES["photo"]["name"])) {
            $this->photo = $this->_uploadImage();
        } else {
            $this->photo = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('partner_id' => $post['partner_id']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/homepage/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->partner_id;
        $config['overwrite']			= true;
        $config['max_size']             = 5024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }
        
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("partner_id" => $id));
    }

    private function _deleteImage($id)
    {
        $partner = $this->getById($id);
        if ($partner->photo != "default.jpg") {
            $filename = explode(".", $partner->photo)[0];
            return array_map('unlink', glob(FCPATH."upload/product/thumbnail/$filename.*"));
        }
    }
}
