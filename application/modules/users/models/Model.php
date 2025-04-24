<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model extends CI_Model {
	function getRow($table,$where){
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get()->row();
	}

	function insertData($table,$data){
		return $this->db->insert($table,$data);
	}

	function updateData($table,$data,$where){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function deleteData($table,$where){
		$this->db->delete($table,$where);
	}
}