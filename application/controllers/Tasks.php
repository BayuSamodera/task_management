<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Tasks extends RestController {

    function __construct(){
        parent :: __construct();
        $this->load->model('tasks_model');

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
            $method = $_SERVER['REQUEST_METHOD'];
            if($method == "OPTIONS") {
                die();
            }
    }

    public function index_post(){

        $data = $this->post();

        $success = $this->tasks_model->simpan($data);

        if($success){
            $this->response( [
            'status' => true,
            'message' => 'Insert success',
            'data' => $data
        ], 200 );

        }else{
            $this->response( [
                'status' => false,
                'message' => 'Insert failed'
            ], 400 );
        }
    }
    public function index_get(){
        $id = $this->get('id');

        $data = $this->tasks_model->detail($id);
    if($data){
        $this->response( [
            'status' => true,
            'message' => 'Detail Success',
            'data' => $data
        ], 200 );
    }else{
        $this->response([
            
            'status' => false,
            'message' => 'There is no tasks with id = '.$id
        ], 400 );
    }

}

    public function index_delete(){
        $id = $this->get('id');
        $success = $this->tasks_model->hapus($id);

        if($success){
            $this->response( [
            'status' => true,
            'message' => 'Delete success'
        ], 200 );

        }else{
            $this->response( [
                'status' => false,
                'message' => 'Delete failed'
            ], 400 );
        }
    }

    public function update_post(){
        $id = $this->get('id');
        $data = $this->post();

        $success = $this->tasks_model->ubah($id, $data);

        $newData = $this->tasks_model->detail($id);

            $this->response( [
            'status' => true,
            'message' => 'Update success',
            'data' => $newData
        ], 200 );
    }

    public function list_get(){
        $page = $this->get('page');
        $per_page = $this->get('per_page');

        $data = $this->tasks_model->list_data($page, $per_page);
        $this->response( [
            'status' => true,
            'message' => 'List Loaded',
            'data' => $data
        ], 200 );
    }
    
}
