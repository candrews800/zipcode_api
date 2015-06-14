<?php namespace App;

class JsonWriter extends Writer{

    private $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function __toString(){
        return $this->output();
    }

    protected function output(){
        return json_encode(['data' => $this->data]);
    }
}