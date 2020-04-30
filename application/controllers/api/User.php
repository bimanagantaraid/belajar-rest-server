<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
    }

    function getuser_get(){
        $id = $this->get('id');
        if($id === null){
            $data = $this->m_user->getUser();
        }else{
            $data = $this->m_user->getUser($id);
        }
        $this->response($data,200);
    }

    function insertuser_post(){
        $data = array (
            'id'    => '',
            'username'      => $this->input->post('username'),
            'password'      => $this->input->post('password'),
            'nama'          => $this->input->post('nama'),
            'alamat'        => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'role_id'       => $this->input->post('role_id')
        );
        if($this->m_user->insertUser('user',$data)>0){
            $message = [
                'message'   => "new data user hasben created!",
                'data'      => $data
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        }else{
            $message = [
                'message'   => "fail insert new data user to database",
            ];
            $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    function updateuser_put(){
        $id = $this->put('id');
        $data = array (
            'username'      => $this->put('username'),
            'password'      => $this->put('password'),
            'nama'          => $this->put('nama'),
            'alamat'        => $this->put('alamat'),
            'jenis_kelamin' => $this->put('jenis_kelamin'),
            'role_id'       => $this->put('role_id')
        );
        if($this->m_user->editUser($id,$data)>0){
            $massages = [
                'status'    => true,
                'massages'  => 'data user has been updated!'
            ];
            $this->set_response($massages,REST_Controller::HTTP_OK);
        }else{
            $massages = [
                'status'    => false,
                'massages'  => 'data user fail to update!'
            ];
            $this->set_response($massages,REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    function deleteuser_delete(){
        $id = $this->delete('id');
        if($this->m_user->deleteUser($id)>0){
            $this->set_response([
                'messages'  => 'user has been deleted!'
            ],REST_Controller::HTTP_OK);
        }else{
            $this->set_response([
                'messages'  => 'fail to delete user'
            ],REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}