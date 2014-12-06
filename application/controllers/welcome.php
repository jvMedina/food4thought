<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login');
		@$sess = $this->session->userdata('information');
		$this->globals->redi($sess);
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
		$this->load->view('welcome_message');
		$this->load->view('footer');
	}
	
	public function validate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($username != '' && $password != ''){
					
				$q = $this->login->validate($username,$password);
				if($q)
				{
					$data = array(
						'id'=>$q->id,
						'logged'=>true,
						'username'=>$q->username,
						'role'=>$q->role
					);
					$this->session->set_userdata('information', $data);
					
					switch($q->role)
					{
						case 1:
								redirect('/admin/index', 'refresh');
						break;
						case 2:
								redirect('/client/index', 'refresh');
						break;
					}
					
				}else{
					$this->session->set_flashdata('message', 'Invalid account');
					redirect('/welcome/index', 'refresh');
				}
		}else
		{
			$this->session->set_flashdata('message', 'Invalid account');
			 redirect('/welcome/index', 'refresh');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */