<?php

class ApiHelper{

    private $method = 'get';
    private $url;
    private $resource;
    private $resource_id;
    private $body_content;
    private $db;

    public function __construct() {
        $this->db = new MYSQLHandler();
        $this->method = $this-> request_method();
        $this->read_resources();
        if($this->resource === '' || $this->resource_id === -1){
            $this->output(array("error" => "Resource or ResourceID is not found!"), 404);
        }
    }

    public function output($data, $response_code = 200){
        http_response_code($response_code);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    private function request_method(){
        $allowed = array('get', 'post', 'put', 'delete');
        if(in_array(strtolower($_SERVER['REQUEST_METHOD']), $allowed)){
        return strtolower($_SERVER['REQUEST_METHOD']);
        } else {
            $this->output(array("error" => 'This method is not supported!'), 405);
        }
    }

    private function read_resources(){
        $this->url = $_SERVER['REQUEST_URI'];
        $parts = explode("/", $this->url);
        $allowed = array("items", "users", "employees");
        $this->resource = in_array($parts[4], $allowed) ? $parts[4] : "";
        if(isset($parts[5])){
        $this->resource_id = is_numeric($parts[5]) ? $parts[5] : -1;
        }
    }

    public function get(){
        if($this->method == 'get'){
            if($this->resource_id >= 0){
                $data = $this->db->get_data();
                return $this->output(array('data' => $data), 200);
            }
        }
    }

}