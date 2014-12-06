<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Json extends CI_Controller {

			public function __construct()
			{
				parent::__construct();
				$this->load->model('jsons');
			}
			
			public function index(){
				$response = array();
				foreach($_POST as $key => $value)
				{
					$$key = $value;
				}
				
				switch($type)
					{
						case "reg":
								
									$response['status'] = TRUE;
									$response['data'] = $this->jsons->insertReg(array(
										'number'=>$number,
										'deviceKey'=>$key,
										'deviceType'=>$type,
										'subscribe'=>$subscribe
									));
										
									$response['message'] = 'Successfully Saved';
							
									
						break;
						
						case "category":
								$q = $this->jsons->categoryList();
								if($q)
								{
										$response['status'] = TRUE;
										$response['data'] = $q;
										$response['message'] = 'Location List';
								}else{
									$response['status'] = false;
									$response['message'] = 'No Record';
								}
						break;
						
						case "all":
								$q = $this->jsons->locationList();
								if($q)
								{
										$response['status'] = TRUE;
										$response['data'] = $q;
										$response['message'] = 'Location List';
								}else{
									$response['status'] = false;
									$response['message'] = 'No Record';
								}
						break;
					}
				echo json_encode($response);
				exit;
				
			}
			

}
?>
			
		