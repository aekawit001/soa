<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Students_model extends CI_Model {
    private $tbl_name = "students";

    function insert($studentID,$firstname,$lastname,$birthday,$phone,$email,$address){
        $this->db->set('studentID', $studentID);
        $this->db->set('firstname', $firstname);
        $this->db->set('lastname', $lastname);
        $this->db->set('birthday', $birthday);
        $this->db->set('phone', $phone);
        $this->db->set('email', $email);
        $this->db->set('address', $address);
        $this->db->insert('students');
        $result = $this->db->get($this->tbl_name);
        return $result;
    }
    function updete($studentID,$data){
        $this->db->where('studentID', $studentID);
        $this->db->updete('students',$data);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function delete($studentID){
        $this->db->where('studentID', $studentID);
        $this->db->delete('students');
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function get_all($firstname){
        $this->db->like('firstname',$firstname);
        $result = $this->db->get($this->tbl_name);
        return $result->result();

    }
}
