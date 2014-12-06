<?php

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Globals
{

	public function menuAdmin($current)
	{
		$data = array(
			'Home'=>'index',
			'Category'=>'category',
			'Client'=>'client',
			'Users'=>'user'
		);
			$str = "";
			
			
			foreach($data as $dt => $value)
			{
					if($value == $current){
						$str   .= '<li class="active"><a href="'.base_url().'index.php/admin/'.$value.'">'.$dt.'</a></li>';
					}else
					{
							$str   .= '<li><a href="'.base_url().'index.php/admin/'.$value.'">'.$dt.'</a></li>';
					}
			}
			return $str;
	}
	
	
		public function clientAdmin($current)
	{
		$data = array(
			'Home'=>'index',
			'Tag'=>'tag',
			'Advertise'=>'add',
		);
			$str = "";

			foreach($data as $dt => $value)
			{
					if($value == $current){
						$str   .= '<li class="active"><a href="'.base_url().'index.php/client/'.$value.'">'.$dt.'</a></li>';
					}else
					{
							$str   .= '<li><a href="'.base_url().'index.php/client/'.$value.'">'.$dt.'</a></li>';
					}
			}
			return $str;
	}
	
	public function currentPage($current,$logged,$role){
		if($logged)
		{
			switch($role){
				case 1:
					if($current  != 'admin'){
							redirect('admin/index','refresh');
					}
				break;
				case 2:
						if($current  != 'client'){
							redirect('client/index','refresh');
					}
				break;
			}
		}else{
			redirect('welcome/index','refresh');
		}
	}
	
	public function redi($logged)
	{
		if($logged)
		{
			redirect('admin/index','refresh');
		}
	}
	

}
?>