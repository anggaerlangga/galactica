<?php

class user_model extends CI_Model
{
    private $_table = "users";
    const SESSION_KEY = 'user_id';

    public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username or Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}

    public function login($username, $password){

        // cari user berdasarkan email dan username
        $this->db->where('email', $username)->or_where('username', $username);
		$query = $this->db->get($this->_table);
		$user = $query->row();

        // jika user terdaftar
        if(!$user) {
            return false;
        }

        if (!password_verify($password, $user->password)) {
			return FALSE;
        }
        
        $this->session->set_userdata([self::SESSION_KEY => $user->user_id]);
		$this->_update_last_login($user->user_id);

        return $this->session->has_userdata(self::SESSION_KEY);
        
    }

    public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->_table, ['user_id' => $user_id]);
		return $query->row();
	}
    
    public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

	private function _update_last_login($id)
	{
		$data = [
			'last_login' => date("Y-m-d H:i:s"),
		];

		return $this->db->update($this->_table, $data, ['user_id' => $id]);
	}

}