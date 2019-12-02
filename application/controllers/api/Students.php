<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends BD_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('students_model');
    }
    function insert_get(){
        $studentID = $this->get('studentID');
        $firstname = $this->get('firstname');
        $lastname = $this->get('lastname');
        $birthday = $this->get('birthday');
        $phone = $this->get('phone');
        $email = $this->get('email');
        $address = $this->get('address');
        $result = $this->students_model->insert($studentID,$firstname,$lastname,$birthday,$phone,$email,$address);
        if ($result != null)
            {
                $this->response([
                    'status' => true,
                    'response' => $result
                ], REST_Controller::HTTP_OK); 
            }else{
                $this->response([
                    'status' => false,
                    'message' => ''
                ], REST_Controller::HTTP_CONFLICT);
            }
    }
    function updete_post(){
        $studentID = $this->post('studentID');
        $data =[
            $firstname = $this->input->post('firstname'),
            $lastname = $this->input->post('lastname'),
            $birthday = $this->input->post('birthday'),
            $phone = $this->input->post('phone'),
            $email = $this->input->post('email'),
            $address = $this->input->post('address')
        ];
        $result = $this->students_model->updete($studentID,$data);
        if ($result != null)
            {
                $this->response([
                    'status' => true,
                    'response' => $result
                ], REST_Controller::HTTP_OK); 
            }else{
                $this->response([
                    'status' => false,
                    'message' => ''
                ], REST_Controller::HTTP_CONFLICT);
            }
    }
    function delete_get(){
        $studentID = $this->get('studentID');
        $result = $this->students_model->delete($studentID);
        if ($result != null)
            {
                $this->response([
                    'status' => true,
                    'response' => $result
                ], REST_Controller::HTTP_OK); 
            }else{
                $this->response([
                    'status' => false,
                    'message' => ''
                ], REST_Controller::HTTP_CONFLICT);
            }
    }
    function get_all_get(){
        $firstname = $this->get('firstname');
        $result = $this->students_model->get_all($firstname);
        if ($result != null)
            {
                $this->response([
                    'status' => true,
                    'response' => $result
                ], REST_Controller::HTTP_OK); 
            }else{
                $this->response([
                    'status' => false,
                    'message' => ''
                ], REST_Controller::HTTP_CONFLICT);
            }
    }
}