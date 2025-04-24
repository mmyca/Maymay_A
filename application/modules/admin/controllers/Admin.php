<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
	public function __construct() {
        parent::__construct();
   		$this->load->model(array('model'));
   		$this->load->libraries(array('ciqrcode'));
    }

    public function generateQR($id) {
    	$where = ['id'=>$id];
    	$row = $this->model->getRow('users', $where);
    	$params['data'] = $row->firstname.' '.$row->lastname.' '.$row->address;
    	$params['level'] = 'H';
    	$params['size'] = 10;
    	$params['savename'] = FCPATH.'assets/qr_images/qr_'.$row->id.'_'.$row->firstname.'.png';
    	if($this->ciqrcode->generate($params)) {
    		$this->session->set_flashdata('message',"QR code successfully created.");
			$this->session->set_flashdata('icon','success');
			
		} else {
			$this->session->set_flashdata('message',"Error.");
			$this->session->set_flashdata('icon','error');
    	}
    	redirect(base_url('admin/users/'));
    }

	public function index() {
		$data['information'] = $this->checkdata();
		$data['users'] = $this->model->getResult('users');

		$admin_count = $this->model->countData('users', ['usertype' => 'admin']);
		$data['admin_count'] = $admin_count;

		$user_count = $this->model->countData('users', ['usertype' => 'user']);
		$data['user_count'] = $user_count;

		$this->load->view('head');
		$this->load->view('topnavbar');
		$this->load->view('sidebar',$data);
		$this->load->view('home', $data);
		$this->load->view('footer');
	} 

	public function users() {
		$data['information'] = $this->checkdata();
		$data['users'] = $this->model->getResult('users');
		
		$this->load->view('head');
		$this->load->view('topnavbar');
		$this->load->view('sidebar',$data);
		$this->load->view('users', $data);
		$this->load->view('footer');
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

	public function delete($id) {
		$where = ['id'=>$id];
		if($this->model->deleteData('users',$where)){
			$this->session->set_flashdata('message',"User deleted successfully.");
			$this->session->set_flashdata('icon','success');
		} else {
			$this->session->set_flashdata('message',"User deleted unsuccessfully.");
			$this->session->set_flashdata('icon','error');
		}
	    $this->session->set_flashdata('message', 'User deleted successfully!');
	    redirect('admin/users/');
	}

	public function search() {
	    $keyword = $this->input->get('table_search'); // from the search input

	    // Search query using CI's Query Builder
	    $this->db->like('firstname', $keyword);
	    $this->db->or_like('lastname', $keyword);
	    $this->db->or_like('email_add', $keyword);

	    $data['users'] = $this->db->get('users')->result();

	    $this->load->view('home', $data); // Adjust this to your actual view file
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
			redirect(base_url('admin/users/'));
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
			redirect(base_url('admin/users/'));
		}
	}

	public function update($id) {
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'middlename' => $this->input->post('middlename'),
            'lastname' => $this->input->post('lastname'),
            'address' => $this->input->post('address'),
            'gender' => $this->input->post('gender'),
        );

        $this->model->update($id, $data);
        $this->session->set_flashdata('success', 'User updated successfully!');
        $this->session->set_flashdata('icon','success');
        redirect('admin/users/'); // Adjust the route as necessary
    }
}
