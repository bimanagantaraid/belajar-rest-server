<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class Sewa extends REST_Controller{
        function __construct($config = 'rest') {
            parent::__construct($config);
        }

        function getsewa_get(){
            $idsewa = $this->get('idsewa');
            if($idsewa === null){
                $data = $this->m_sewa->getSewa();
            }else{
                $data = $this->m_sewa->getSewa($idsewa);
            }
            $this->response($data, 200);
        }

        function insertsewa_post(){
            $data = array (
                'idsewa'    => '',
                'idkost'    => $this->input->post('idkost'),
                'id'        => $this->input->post('id'),
                'cekin'     => $this->input->post('cekin'),
                'cekout'    => $this->input->post('cekout'),
                'kekurangan'=> $this->input->post('kekurangan'),
                'kelebihan' => $this->input->post('kelebihan'),
                'total'     => $this->input->post('total')
            );
            if($this->m_sewa->insertSewa('sewa',$data)>0){
                $message = [
                    'message'   => "new data sewa hasben created",
                    'data'      => $data
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            }else{
                $message = [
                    'message'   => "fail insert new data sewa to database",
                ];
                $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
            }
        }

        function editsewa_put(){
            $idsewa = $this->put('idsewa');
            $data = array (
                'idkost'    => $this->put('idkost'),
                'id'        => $this->put('id'),
                'cekin'     => $this->put('cekin'),
                'cekout'    => $this->put('cekout'),
                'kekurangan'=> $this->put('kekurangan'),
                'kelebihan' => $this->put('kelebihan'),
                'total'     => $this->put('total')
            );

            $data = $this->m_sewa->editSewa($idsewa,$data);
            $this->response([
                'status' => true,
                'messages' => 'Sewa has been modified!'
            ], REST_Controller::HTTP_OK);
        }

        function deletesewa_delete(){
            $idsewa = $this->delete('idsewa');
            if($idsewa === null ){
                $this->response([
                    'status' => false,
                    'messages' => 'Masukan Id Sewa!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }else{
                if($this->m_sewa->deleteSewa($idsewa)>0){
                    $this->response([
                        'status' => true,
                        'messages' => 'sewa has been delete!'
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status' => false,
                        'messages' => 'id sewa not found!'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }
    }