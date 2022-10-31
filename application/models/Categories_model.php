<?php
header('Access-Control-Allow-Origin: *');

class Categories_model extends CI_Model{

    public function simpan ($data){
        $this->db->insert('task_categories',$data);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function detail($id){
        $this->db->select('*');
        $this->db->from('task_categories');
        $this->db->where('id', $id);

        $get = $this->db->get();
        if($get->num_rows() !=0){
            return $get->row_object();
        }else{
            return null;
        }
    }

    public function hapus($id){
        $this->db->delete('task_categories', ['id' => $id]);

        return $this->db->affected_rows() ? true : false;

        
    }

    public function ubah($id, $data){
        $this->db->where('id', $id);
        $this->db->update('task_categories', $data);
        return $this->db->affected_rows() ? true : false;
    }

    public function list_data($page, $per_page = 5){
        $this->db->select('*');
        $this->db->from('task_categories');

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