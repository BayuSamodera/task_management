<?php

class Tasks_model extends CI_Model{

    public function simpan ($data){
        $this->db->insert('tasks',$data);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function detail($id){
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->where('id', $id);

        $get = $this->db->get();
        if($get->num_rows() !=0){
            return $get->row_object();
        }else{
            return null;
        }
    }

    public function hapus($id){
        $this->db->delete('tasks', ['id' => $id]);

        return $this->db->affected_rows() ? true : false;

        
    }

    public function ubah($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tasks', $data);
        return $this->db->affected_rows() ? true : false;
    }

    public function list_data($page, $per_page = 5){
        $this->db->select('*');
        $this->db->from('tasks');

        $offset = 0;

        if($page >= 1){
            $offset = $per_page * ($page - 1);
        }

        $this->db->limit($per_page, $offset);

        $get = $this->db->get();

        if($get->num_rows() > 0){
            return $get->result();
        }else{
            return[];
        }
    }

}
?>