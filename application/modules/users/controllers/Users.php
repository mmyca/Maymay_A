<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {
	public function __construct() {
        parent::__construct();
   		$this->load->model(array('model'));
   		// var_dump(base64_encode(md5('12345678')));exit;
    } 

	public function index() {
		$this->load->view('login');
	} 

	public function home() {
		$this->load->view('home');
	} 

	public function login_process(){
		$password = $this->input->post('password');
		$email_add = $this->input->post('email_add');

		$where = [
			'email_add' => $email_add,
			'password' => base64_encode(md5($password))
		];

		$row = $this->model->getRow('users',$where);
		// var_dump($row); exit;
		if($row != null){
			$this->session->set_userdata('id',$row->id);
			$this->session->set_flashdata('message',"Welcome ".$row->firstname.'!');
			$this->session->set_flashdata('icon', 'success');

			if ($row->usertype == 'admin') {
				redirect(base_url('admin/'));
			} else {
				redirect(base_url('users/home/'));
			}
		} else {
			$this->session->set_flashdata('message',"Email address or password is incorrect!");
			$this->session->set_flashdata('icon', 'error');
			redirect(base_url());
		}
		
	}


	public function registration(){
		$this->load->view('registration');
	}

	public function registration_process() {
		$data1 = $this->input->post();
		$password = $this->input->post('password');
		unset($data1['password']);
		$data1['password'] = base64_encode(md5($password));
		$retype = $this->input->post('retype');
		unset($data1['retype']);

		// $password = base64_encode(md5($this->input->post('password')));
		// unset($data1['password']);
		// $data1['password'] = $password;
		
		if($password == $retype){
			if($this->model->insertData('users',$data1)){
				$this->session->set_flashdata('message','Data successfully saved!');
				$this->session->set_flashdata('icon','success');
			} else {
				$this->session->set_flashdata('message',"There's an error in saving your account.");
				$this->session->set_flashdata('icon','error');
			}
			redirect(base_url('?m='.$message));
		} else {
			$this->session->set_flashdata('firstname',$this->input->post('firstname'));
			$this->session->set_flashdata('middlename',$this->input->post('middlename'));
			$this->session->set_flashdata('lastname',$this->input->post('lastname'));
			$this->session->set_flashdata('address',$this->input->post('address'));
			$this->session->set_flashdata('gender',$this->input->post('gender'));
			$this->session->set_flashdata('bod',$this->input->post('bod'));
			$this->session->set_flashdata('email_add',$this->input->post('email_add'));
			$this->session->set_flashdata('password',$this->input->post('password'));
			$this->session->set_flashdata('retype',$this->input->post('retype'));
			$this->session->set_flashdata('message',"Tanga ka kaajo!");
			$this->session->set_flashdata('icon','error');
			redirect(base_url('users/registration/'));
		}
	}

	public function add(){
		$this->load->view('add');
	}
	
}
