<?php defined('BASEPATH') OR exit('No direct script access allowed');

class footer_model extends CI_Model 
{
    // nama table
    private $_table = "footer";

    // nama kolom di tabel
    public $footer_id;
    public $lang;
    public $image = "default.jpg";
    public $motto;
    public $subtitle;
    public $subtitle2;
    public $email;
    public $tna;
    public $pnp;
    public $twitter;
    public $telegram;
    public $facebook;
    public $instagram;
    public $medium;
    public $linkedin;
    public $github;
    public $youtube;

    public function rules() {
        return [
            ['field' => 'footer_id',
            'label' => 'footer_id',
            'rules' => 'required'],

            ['field' => 'lang',
            'label' => 'lang'],

            ['field' => 'image',
            'label' => 'image'],

            ['field' => 'motto',
            'label' => 'motto'],

            ['field' => 'subtitle',
            'label' => 'subtitle'],

            ['field' => 'subtitle2',
            'label' => 'subtitle2'],

            ['field' => 'email',
            'label' => 'email'],

            ['field' => 'tna',
            'label' => 'tna'],

            ['field' => 'pnp',
            'label' => 'pnp'],

            ['field' => 'twitter',
            'label' => 'twitter'],

            ['field' => 'telegram',
            'label' => 'telegram'],

            ['field' => 'facebook',
            'label' => 'facebook'],

            ['field' => 'instagram',
            'label' => 'instagram'],

            ['field' => 'medium',
            'label' => 'medium'],

            ['field' => 'linkedin',
            'label' => 'linkedin'],

            ['field' => 'github',
            'label' => 'github'],

            ['field' => 'youtube',
            'label' => 'youtube']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["footer_id" => $id])->row();
    }

    public function getByLang($lang)
    {
        return $this->db->get_where($this->_table, ["lang" => $lang])->row();
    }

    public function save() 
    {
        $post = $this->input->post();
        $this->footer_id = uniqid(); 
        $this->lang = $post["lang"];
        $this->image = $this->_uploadImage();
        $this->motto = $post["motto"]; 
        $this->subtitle = $post["subtitle"];
        $this->subtitle2 = $post["subtitle2"];
        $this->email = $post["email"]; 
        $this->tna = $post["tna"];
        $this->pnp = $post["pnp"]; 
        $this->twitter = $post["twitter"];
        $this->telegram = $post["telegram"];
        $this->facebook = $post["facebook"]; 
        $this->instagram = $post["instagram"]; 
        $this->medium = $post["medium"];
        $this->linkedin = $post["linkedin"];
        $this->github = $post["github"];
        $this->youtube = $post["youtube"]; 
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->footer_id = $post["footer_id"]; 
        $this->lang = $post["lang"];
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        $this->motto = $post["motto"]; 
        $this->subtitle = $post["subtitle"];
        $this->subtitle2 = $post["subtitle2"];
        $this->email = $post["email"]; 
        $this->tna = $post["tna"];
        $this->pnp = $post["pnp"]; 
        $this->twitter = $post["twitter"];
        $this->telegram = $post["telegram"];
        $this->facebook = $post["facebook"]; 
        $this->instagram = $post["instagram"]; 
        $this->medium = $post["medium"];
        $this->linkedin = $post["linkedin"];
        $this->github = $post["github"];
        $this->youtube = $post["youtube"]; 
        return $this->db->update($this->_table, $this, array('footer_id' => $post['footer_id']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/homepage/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->footer_id;
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
        return $this->db->delete($this->_table, array("footer_id" => $id));
    }

    private function _deleteImage($id)
    {
        $footer = $this->getById($id);
        if ($footer->image != "default.jpg") {
            $filename = explode(".", $footer->image)[0];
            return array_map('unlink', glob(FCPATH."upload/homepage/$filename.*"));
        }
    }


}