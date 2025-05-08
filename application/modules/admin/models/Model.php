<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model extends CI_Model {
	function getRow($table,$where){
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get()->row();
	}

	function getResult($table){
		$this->db->from($table);
		$this->db->order_by('lastname', 'ASC');
		return $this->db->get()->result();
	}

	function countData($table, $where = [usertype]) {
	    return $this->db->where($where)->count_all_results($table);
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

	function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
}