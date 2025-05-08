<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {
	public function __construct() {
        parent::__construct();
   		$this->load->model(array('model'));
   		// var_dump(base64_encode(md5('12345678')));exit;
    } 

	public function index() {
		// $data['information'] = $this->checkdata();
		$this->load->view('login');
	} 

	public function home() {
		// $data['information'] = $this->checkdata();
		$data['users'] = $this->model->getResult('users');

		$this->load->view('head');
		$this->load->view('topnavbar');
		$this->load->view('sidebar',$data);
		$this->load->view('home');
		$this->load->view('upload_ndvi');
		$this->load->view('footer');
	}

	public function upload_ndvi(){
		// $data['information'] = $this->checkdata();
		$data['users'] = $this->model->getResult('users');

		$this->load->view('head');
		$this->load->view('topnavbar');
		$this->load->view('sidebar',$data);
		$this->load->view('upload_ndvi');
		$this->load->view('footer');
	}

	public function ndvi_result(){
		// $data['information'] = $this->checkdata();
		$data['users'] = $this->model->getResult('users');

		$this->load->view('head');
		$this->load->view('topnavbar');
		$this->load->view('sidebar',$data);
		$this->load->view('ndvi_result');
		$this->load->view('footer');
	}

	public function process($nir_img, $red_img) {
	    $nir_path = FCPATH . 'uploads/' . $nir_img;
	    $red_path = FCPATH . 'uploads/' . $red_img;
	    $output_path = FCPATH . 'ndvi/ndvi_' . time() . '.png';

	    $command = "python3 ndvi_calc.py $nir_path $red_path $output_path";
	    exec($command);

	    $data['ndvi_image'] = base_url('ndvi/' . basename($output_path));
	    $this->load->view('ndvi_result', $data);
	}


	public function checkdata(){
		$id = $this->session->userdata('id');
		$where = ['id'=>$id];
		$info = $this->model->getRow('users',$where);
		if ($info == NULL) {
			$this->session->set_flashdata('message',"There is no shortcut in life.");
			$this->session->set_flashdata('icon','error');
			redirect(base_url());
		} elseif ($info->usertype != 'admin'){
			$this->session->set_flashdata('message',"You can't access this page.");
			$this->session->set_flashdata('icon','error');
			redirect(base_url('users/home'));
		} else {
			return $info;
		}
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
			$this->session->set_flashdata('message',"Welcome ".$row->firstname.' '.$row->lastname.'!');
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

	public function logout() {
	    $this->session->sess_destroy();
	    $message = base64_encode("You have successfully logged out.");
	    redirect(base_url('?m/'.$message));
	}

	
}
