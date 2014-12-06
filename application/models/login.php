<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Model {
	
	private $user = 'users';
	public function validate($username,$password)
	{
		$q = $this->db->get_where($this->user,array('lower(username)'=>strtolower($username)));
			if($q->num_rows()>0)
			{
					$usersData = $q->row();
					$salt = $usersData->salt;
					$password = md5($password.$salt);
					$q2 = $this->db->get_where($this->user,array('lower(username)'=>strtolower($username),'password'=>$password,'active'=>1));
					if($q2->num_rows()>0)
					{
							return $q2->row();
					}
					return FALSE;
			}
		return FALSE;
	}

}
?>