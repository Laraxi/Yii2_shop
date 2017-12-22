<?php
namespace app\tool;

class M3Result{

    public $status;
    public $message;
    public $data = array();

    public function toJson()
    {
        return exit(json_encode($this,JSON_UNESCAPED_UNICODE));
    }

}



?>