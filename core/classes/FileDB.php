<?php

class FileDB
{
    private $file_name;
    //data property, bus duomenu masyvas
    private $data;

    public function __construct($file_name)
    {
        $this->file_name = $file_name;
    }

    public function setData($data_array){
        $this->data = $data_array;
    }

    public function save(){
        $string = json_encode($this->data);
        $bytes_written = file_put_contents($this->file_name, $string);

        if($bytes_written !== false){
            return true;
        }
        return false;
    }
}
