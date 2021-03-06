<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class BookModel extends CI_Model {

        private $table = "buku";

        public function findOne($col, $val){
            return $this->db->get_where($this->table, [$col => $val])->row();
        }
        
        public function findAll(){
            return $this->db->query(
                    "SELECT 
                        buku.id, buku.cover, buku.nama_buku, jenis_buku.jenis, buku.created_by, buku.created_on
                    FROM buku AS buku 
                    LEFT JOIN jenis_buku AS jenis_buku
                    ON buku.jenis_buku = jenis_buku.id 
                    ORDER BY buku.id ASC"
                )->result();
        }
        
        public function create($data){
            return $this->db->insert($this->table, $data);
        }
        
        public function update($data, $id){
            return $this->db->update($this->table, $data, array('id' => $id));
        }
        
        public function delete($id){
            return $this->db->delete($this->table, array('id' => $id));
        }
        
    }