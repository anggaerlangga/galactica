<?php defined('BASEPATH') OR exit('No direct script access allowed');

class proyek_model extends CI_Model 
{
    // nama table
    private $_table = "proyek";

    // nama kolom di tabel
    public $proyek_id;
    public $nama_proyek;
    public $lokasi_proyek;
    public $deskripsi;
    public $photo;

    public function rules() {
        return [

            ['field' => 'proyek_id',
            'label' => 'proyek ID',
            'rules' => 'required'],

            ['field' => 'nama_proyek',
            'label' => 'Nama Proyek'],

            ['field' => 'lokasi_proyek',
            'label' => 'Lokasi Proyek'],

            ['field' => 'deskripsi',
            'label' => 'Deskripsi']

        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM barang
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["proyek_id" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->proyek_id = uniqid(); // membuat id unik
        $this->nama_proyek = $post["nama_proyek"]; 
        $this->lokasi_proyek = $post["lokasi_proyek"];
        $this->deskripsi = $post["deskripsi"]; 
        $this->photo = $this->_uploadImage();
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->proyek_id = $post["proyek_id"];
        $this->nama_proyek = $post["nama_proyek"]; 
        $this->lokasi_proyek = $post["lokasi_proyek"];
        $this->deskripsi = $post["deskripsi"]; 

        if (!empty($_FILES["photo"]["name"])) {
            $this->photo = $this->_uploadImage();
        } else {
            $this->photo = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('proyek_id' => $post['proyek_id']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/homepage';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->proyek_id;
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

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("proyek_id" => $id));
    }

    private function _deleteImage($id)
    {
        $proyek = $this->getById($id);
        if ($proyek->photo != "default.jpg") {
            $filename = explode(".", $proyek->photo)[0];
            return array_map('unlink', glob(FCPATH."upload/homepage/$filename.*"));
        }
    }

}