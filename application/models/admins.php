<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Model {
	
	private $user = 'users';
	private $category = 'category';
	private $client = 'client';
	private $info = 'userinfo';

	public function insertCategory($data)
	{
		$search =  $this->db->get_where($this->category,array('lower(categoryName)'=>strtolower($data['categoryName'])));
		if($search->num_rows()==0){
			$q = $this->db->insert($this->category,$data);
			if($q)
			{
				return TRUE;
			}
		}
		return FALSE;
	}
	
	
	public function insertClient($data)
	{
		$search =  $this->db->get_where($this->client,array('lower(clientName)'=>strtolower($data['clientName'])));
		if($search->num_rows()==0){
			$q = $this->db->insert($this->client,$data);
			if($q)
			{
				return TRUE;
			}
		}
		return FALSE;
	}
	
	public function clientList()
	{
		$response = array();
		$q  = $this->db->get_where($this->client,array('status'=>0));
			if($q->num_rows()>0)
			{
				return $q->result();
			}
		return $response;
	}
	
	public function categoryList()
	{
		$response = array();
		$q  = $this->db->get_where($this->category,array());
			if($q->num_rows()>0)
			{
				return $q->result();
			}
		return $response;
	}
	
	public function usersInsert($data)
	{
		$search =  $this->db->get_where($this->user,array('lower(username)'=>strtolower($data['username'])));
		if($search->num_rows()==0){
			$q = $this->db->insert($this->user,$data);
			if($q)
			{
				return $this->db->insert_id();
			}
		}
		return FALSE;
	}
	
	public function infoInsert($data)
	{
		$q = $this->db->insert($this->info,$data);
	}
	
	public function deleteCate($id)
	{
		$this->db->delete($this->category,array('id'=>$id));
	}
	
	public function deleteClient($id)
	{
		$this->db->where(array('id'=>$id))->update($this->client,array('status'=>1));
	}
	
	public function userList()
	{
		$q = $this->db->query('
			select u.id,u.role,u.username,ut.roleType,u.active from users as u 
			left join userType as ut ON (u.role  = ut.id) where u.active = 1
		');
		if($q->num_rows()>0)
		{
			return $q->result();
		}
		return false;
	}
	
	public function deleteU($id)
	{
		$this->db->where(array('id'=>$id))->update($this->user,array('active'=>2));
	}
}
?>