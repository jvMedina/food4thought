<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
			{
				parent::__construct();
				$this->load->model('clients');
					@$sess = $this->session->userdata('information');
				$this->globals->currentPage($this->uri->segment(1),$sess['logged'],$sess['role']);
			}

			public function index()
			{
			
				$this->load->view('headerClient');
				$this->load->view('indexClient');
				$this->load->view('footer');
			}
			
			public function tag()
			{
				$sess = $this->session->userdata('information');
				
				
				if(isset($_POST['mapBtn']))
				{
					$best = $this->input->post('best');
					$url = $this->input->post('url');
					$desc = $this->input->post('menu');
					$lat = $this->input->post('lat');
					$lng = $this->input->post('lng');
					
						$data = array(
							'userId'=>$sess['id'],
							'lat'=>$lat,
							'lng'=>$lng,
							'best'=>$best,
							'url'=>$url,
							'desc'=>$desc
						);
					$q = $this->clients->insertPosition($data);
					if($q){
								$this->session->set_flashdata('message', 'Success fully saved');
								redirect('/client/tag', 'refresh');
					}else
					{
						$this->session->set_flashdata('message', 'Save failed, please try again later');
								redirect('/client/tag', 'refresh');
					}
				}
				$data['list'] = $this->clients->locationList($sess['id']);
			
				$this->load->view('headerClient',$data);
				$this->load->view('tag');
				$this->load->view('footer');
			}
			
			
			public function add()
			{
				if(isset($_POST['sms']))
				{
					$ch = curl_init();
							curl_setopt($ch, CURLOPT_POST, TRUE);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER , TRUE);
							curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);

							$param = "APIKEY=" . urlencode("Input your API key.");
							$param .= "&EmailMode=" . urlencode("TRUE");
							$param .= "&IMMode=" . urlencode("TRUE");
							$param .= "&SMSMode=" . urlencode("TRUE");
							$param .= "&SBMode=" . urlencode("FALSE");
							$param .= "&Description=" . urlencode("This is a test message.");
							$param .= "&EmailSubject=" . urlencode("This is a test message.");
							$param .= "&EmailMessage=" . urlencode("This is a test message#1<br><br>This is a test message#2<br><br>This is a test message#3");
							$param .= "&IMMessage=" . urlencode("This is a test message. - IM");
							$param .= "&SMSMessage=" . urlencode($this->input->post('message'));
							$param .= "&ListNames=" . urlencode("TestList");
							$param .= "&SendLater=" . urlencode("FALSE");
							curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
							curl_setopt($ch, CURLOPT_URL, "http://messagingtoolkit.att.com/api/sendtolist.php");
							$xml = simplexml_load_string(curl_exec($ch));
							if (current($xml->xpath("/API/STATUSCODE")) == "1") {
								$this->session->set_flashdata('message', 'SMS successfully sent');
														redirect('/client/add', 'refresh');
							}
							else {
							//	echo "<br><br>ERROR : " . current($xml->xpath("/API/ERRORCODE")) . " - " . current($xml->xpath("/API/ERRORMESSAGE"));
								$this->session->set_flashdata('message', 'SMS Failed');
														redirect('/client/add', 'refresh');
							} 
				}
			
					$this->load->view('headerClient');
				$this->load->view('adver');
				$this->load->view('footer');
			}
				
			public function deleteLoc($id)
			{
				$this->clients->deletLocation($id);
				$this->session->set_flashdata('message', 'Successfully Deleted');
				redirect('/client/tag', 'refresh');
			}			
				
			public function logout()
			{
				$this->session->unset_userdata('information');
				 redirect('/welcome/index', 'refresh');
			}	
}

?>