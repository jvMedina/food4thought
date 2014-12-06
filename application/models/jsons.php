<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jsons extends CI_Model {
	
	private $user = 'users';
	private $category = 'category';
	private $client = 'client';
	private $info = 'userinfo';
	private $location = 'location';
	
	private $device = 'devicereg';
	
	
	public function insertReg($data)
	{
		$q = $this->db->insert($this->device,$data);
			if($q)
			{
				return $this->db->insert_id();;
			}
		return false;
	}
	
	
	public function categoryList()
	{
			$cat = $this->db->get_where($this->category,array());
		$res = array();
			
			if($cat->num_rows()>0)
			{
				foreach($cat->result() as $catres)
				{
					$res[]  = array('id'=>$catres->id,'name'=>$catres->categoryName,'icon'=>base_url()."public/upload/".$catres->navIcon);
				}
				
				return $res;
			}
			
			return FALSE;
	}
	public function locationList()
	{
		$q = $this->db->query(
		"SELECT lc.userId, lc.lat,lc.lng,lc.best,lc.url,lc.desc,uf.categoryList,c.clientName FROM location as lc 
		left join userinfo as uf ON (lc.userId = uf.userId)
		left join client as c ON (c.id = uf.clientId)
		");
			$response = array();
			if($q->num_rows()>0)
			{
				foreach($q->result() as $dat)
				{
					$response[] = array(
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
}	
?>