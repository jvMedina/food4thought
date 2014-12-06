<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

			public function __construct()
			{
				parent::__construct();
				$this->load->model('admins');
				@$sess = $this->session->userdata('information');
				$this->globals->currentPage($this->uri->segment(1),$sess['logged'],$sess['role']);
			}

			public function index()
			{
			
				$this->load->view('header');
				$this->load->view('admin');
				$this->load->view('footer');
			}
			
			public function category()
			{
				if(isset($_POST['catBtn']))
				{
					$name = $_FILES['navi']['name'];
					
					 move_uploaded_file($_FILES['navi']['tmp_name'], "public/upload/".$name);
					$q = $this->admins->insertCategory(array('categoryName'=>$this->input->post('category'),'navIcon'=>$name));
					if($q)
					{
						$this->session->set_flashdata('message', 'Successfully Saved.');
						 redirect('/admin/category', 'refresh');
					}else
					{
						$this->session->set_flashdata('message', 'Category Already Exists.');
						 redirect('/admin/category', 'refresh');
					}
					
						//$this->session->set_flashdata('message', 'Invalid account');
				}
				
				$data['list'] = $this->admins->categoryList();
				$this->load->view('header',$data);
				$this->load->view('category');
				$this->load->view('footer');
			}
			
			
			public function client()
			{
				if(isset($_POST['clieBtn']))
				{
					
					$q = $this->admins->insertClient(array('clientName'=>$this->input->post('client'),'desc'=>$this->input->post('desc')));
					if($q)
					{
						$this->session->set_flashdata('message', 'Successfully Saved.');
						 redirect('/admin/client', 'refresh');
					}else
					{
						$this->session->set_flashdata('message', 'Client Already Exists.');
						 redirect('/admin/client', 'refresh');
					}
					
						//$this->session->set_flashdata('message', 'Invalid account');
				}
				
					$data['list'] = $this->admins->clientList();
				$this->load->view('header',$data);
				$this->load->view('client');
				$this->load->view('footer');
			}
			
			public function user()
			{
					$data = array();
					$data['category'] = $this->admins->categoryList();
					$data['client'] = $this->admins->clientList();
				
					if(isset($_POST['userBtn']))
					{
						$email = $this->input->post('email');
						$category = $this->input->post('category');
						$client = $this->input->post('client');
						$salt = time();
						$md5 = md5($salt);
					//	$pass = date('Ymdhis');
						$pass = "q1w2e3";
						$hash = md5($pass.$md5);
						$data = array(
							'username'=>$email,
							'active'=>1,
							'role'=>2,
							'password'=>$hash,
							'salt'=>$md5
						);
						$q = $this->admins->usersInsert($data);
						if($q){
							$in = array(
								'userId'=>$q,
								'clientId'=>$client,
								'categoryList'=>json_encode($category)
							);
								$this->admins->infoInsert($in);
							
								$config = Array(				   
								'protocol'  => 'smtp', 
								'smtp_host' => 'ssl://smtp.googlemail.com', 
								'smtp_port' => 465, 
								'smtp_user' => 'jettvincentmedina@gmail.com', 
								'smtp_pass' => 'online1605', 
								'mailtype'  => 'html',
								'charset'   => 'iso-8859-1');
								$this->email->initialize($config);
								$this->email->set_newline("\r\n");
								
								$msg ="Thank you for using this app. Here is your password (".$pass.")";
								
								$this->email->from('noreply@test.com', 'Successfully Registered - food4thought'); 
								$this->email->to($email);
								$this->email->subject('Successfully Registered - food4thought'); 
								$this->email->message($msg);  
								$this->email->send();
								
								$this->session->set_flashdata('message', 'Successfully Created.');
								redirect('/admin/user', 'refresh');
						}else
						{
								$this->session->set_flashdata('message', 'User Already Exists.');
								redirect('/admin/user/created', 'refresh');
						}
					}
					$data['list'] = $this->admins->userList();
					$this->load->view('header',$data);
					$this->load->view('user');
					$this->load->view('footer');
			}
			public function logout()
			{
				$this->session->unset_userdata('information');
				 redirect('/welcome/index', 'refresh');
			}	
			
			
			public function deleteCategory($id)
			{
				$this->admins->deleteCate($id);
				$this->session->set_flashdata('message', 'Successfully deleted');
				redirect('/admin/category', 'refresh');
			}
			
			public function deleteClie($id)
			{
				$this->admins->deleteClient($id);
				$this->session->set_flashdata('message', 'Successfully deleted');
				redirect('/admin/client', 'refresh');
			
			}
			
			public function deleteUser($id)
			{
					$this->admins->deleteU($id);
					$this->session->set_flashdata('message', 'Successfully deleted');
					redirect('/admin/user', 'refresh');
			}
}
?>