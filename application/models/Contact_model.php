<?php defined('BASEPATH') OR exit('No direct script access allowed');

class contact_model extends CI_Model 
{
    // nama table
    private $_table = "contact";

    // nama kolom di tabel
    public $contact_id;
    public $phone;
    public $wa;
    public $email;
    public $ig;
    public $address;
    public $latitude;

    public function rules() {
        return [
            ['field' => 'contact_id',
            'label' => 'contact_id',
            'rules' => 'required'],

            ['field' => 'phone',
            'label' => 'phone'],

            ['field' => 'wa',
            'label' => 'wa'],

            ['field' => 'email',
            'label' => 'email'],

            ['field' => 'ig',
            'label' => 'ig'],

            ['field' => 'address',
            'label' => 'address'],

            ['field' => 'latitude',
            'label' => 'latitude']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["contact_id" => $id])->row();
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->contact_id = uniqid(); // membuat id unik
        $this->phone = $post["phone"];
        $this->wa = $post["wa"];
        $this->email = $post["email"]; 
        $this->ig = $post["ig"]; 
        $this->address = $post["address"];
        $this->latitude = $post["latitude"];
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->contact_id = $post["contact_id"]; 
        $this->phone = $post["phone"];
        $this->wa = $post["wa"];
        $this->email = $post["email"]; 
        $this->ig = $post["ig"]; 
        $this->address = $post["address"];
        $this->latitude = $post["latitude"];

        return $this->db->update($this->_table, $this, array('contact_id' => $post['contact_id']));
    }


    public function delete($id)
    {
        return $this->db->delete($this->_table, array("contact_id" => $id));
    }

}