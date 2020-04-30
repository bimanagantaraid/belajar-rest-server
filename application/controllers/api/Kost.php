<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class Kost extends REST_Controller{
        function __construct($config = 'rest') {
            parent::__construct($config);
        }

        function getkost_get(){
            $idkost = $this->get('idkost');
            if($idkost === null ){
                $data = $this->m_kost->getKost();
            }else{
                $data = $this->m_kost->getKost($idkost)->row_array();
            }
            $this->response($data, 200);
        }

        function editkost_put(){
            $idkost = $this->put('idkost');
            $data = array (
                'harga' => $this->put('harga'),
                'keterangan' => $this->put('keterangan'),
                'gambar' => $this->put('gambar'),
                'namakost' => $this->put('namakost'),
                'kota' => $this->put('kota'),
                'type' => $this->put('type'),
                'Alamat' => $this->put('Alamat'),
                'kecamatan' => $this->put('kecamatan'),
                'diskripsi' => $this->put('diskripsi'),
                'fasilitas' => $this->put('fasilitas')
            );
            $data = $this->m_kost->editKost($idkost,$data);
            $this->response([
                'status' => true,
                'messages' => 'kost has been modified!'
            ], REST_Controller::HTTP_OK);
        }

        function deletekost_delete(){
            $idkost = $this->delete('idkost');
            if($idkost === null ){
                $this->response([
                    'status' => false,
                    'messages' => 'Masukan Id Kost!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }else{
                if($this->m_kost->deleteKost($idkost)>0){
                    $this->response([
                        'status' => true,
                        'messages' => 'kost has been delete!'
                    ], REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status' => false,
                        'messages' => 'idkost not found!'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }

        function insertKost_post(){
            $uploaddir = 'uploads/';
            $path = $_FILES['gambar']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $file_name= str_replace(" ", "_", $this->input->post('namakost'));
            $user_img = $file_name . rand(). '.'. $ext;
            $uploadfile = $uploaddir . $user_img;
            if ($_FILES["gambar"]["name"]) {
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadfile)) {
                    echo "success";
                }
            }

            $data = [
                'idkost' => '', 
                'harga' => $this->input->post('harga'),
                'keterangan' => $this->input->post('keterangan'),
                'gambar' => $user_img,
                'namakost' => $this->input->post('namakost'),
                'kota' => $this->input->post('kota'),
                'type' => $this->input->post('type'),
                'Alamat' => $this->input->post('Alamat'),
                'kecamatan' => $this->input->post('kecamatan'),
                'diskripsi' => $this->input->post('diskripsi'),
                'fasilitas' => $this->input->post('fasilitas')
            ];

            if($this->m_kost->insertKost('kost',$data)>0){
                $message = [
                    'message'   => "new data kost hasben created",
                    'data'      => $data
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            }else{
                $message = [
                    'message'   => "fail insert new data kost to database",
                ];
                $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
            }
        }

        function kostbyfilter_get() {
            $keterangan = $this->get('keterangan');
            $kota = $this->get('kota');
            $data = $this->m_kost->filter($keterangan,$kota);
            $this->response($data, 200);
        }
        
    }

?>