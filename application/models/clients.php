<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Model {
	
	private $user = 'users';
	private $category = 'category';
	private $client = 'client';
	private $info = 'userinfo';
	private $location = 'location';
	
	
	public function insertPosition($data)
	{
		$q = $this->db->insert($this->location,$data);
			if($q)
			{
				return true;
			}
		return false;
	}
	
	public function locationList($id)
	{
		$q = $this->db->query(
		"SELECT lc.id,lc.userId, lc.lat,lc.lng,lc.best,lc.url,lc.desc,uf.categoryList,c.clientName FROM location as lc 
		left join userinfo as uf ON (lc.userId = uf.userId)
		left join client as c ON (c.id = uf.clientId)
		where lc.userId = '".$id."'
		");
			$response = array();
			if($q->num_rows()>0)
			{
				foreach($q->result() as $dat)
				{
					$response[] = array(
						'id'=>$dat->id,
						'client'=>$dat->clientName,
						'desc'=>$dat->desc,
						'best_seller'=>$dat->best,
						'website_url'=>$dat->url,
						'lat'=>$dat->lat,
						'lng'=>$dat->lng,
						'category'=>json_decode($dat->categoryList)
					);
				}
				
				return $response;
			}
		
		return FALSE;
	}
	
	public function deletLocation($id)
	{
		$this->db->delete($this->location,array('id'=>$id));
	}
}	
?>