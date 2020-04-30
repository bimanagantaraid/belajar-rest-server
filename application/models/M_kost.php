<?php 

    class M_kost extends CI_Model{
        
        public function getKost($idkost=null){
            if($idkost===null){
                return $this->db->get('kost')->result();
            }else{
                return $this->db->where('idkost',$idkost)
                ->get('kost');
            }
        }

        public function insertKost($table,$data){
            $this->db->insert($table,$data);
            return $this->db->affected_rows();
        }

        public function editKost($idkost,$data){
            $this->db->where('idkost',$idkost);
            $this->db->update('kost',$data);
        }

        public function deleteKost($idkost){
            $this->db->where('idkost',$idkost);
            $this->db->delete('kost');
            return $this->db->affected_rows();
        }

        public function filter($keterangan,$kota){
            if($keterangan == "default" & $kota == "default"){
                return $this->get_kost(null);
            }else if($keterangan == "default" & !empty($kota)){
                return $this->db->select('*')
                ->from('kost')
                ->where('kota like', $kota)
                ->get()->result();
            }else if(!empty($keterangan) & $kota == "default"){
                return $this->db->select('*')
                ->from('kost')
                ->where('keterangan like', $keterangan)
                ->get()->result();
            }else{
                return $this->db->select('*')
                ->from('kost')
                ->where('keterangan like', $keterangan)
                ->where('kota like', $kota)
                ->get()->result();
            }
        }

    }

?>