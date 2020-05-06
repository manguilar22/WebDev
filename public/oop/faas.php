<?php

class Wolfram {
    public $url = 'http://www.wolframcloud.com/obj/d7a7e7ea-2958-43c2-9d53-1e71551fee96';
    public function __construct()
    {
    }

    public function WolframCloudCall($majorGPA,$overallGPA,$labels){
        $body ='majorGPA='.$majorGPA.'&'.'overallGPA='.$overallGPA.'&'.'labels='.$labels;
        $opts = array(
            'http'=> array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "User-Agent:EmbedCode-PHP/1.0\r\n",
                'method' => 'POST','content' =>'majorGPA='.$majorGPA.'&'.'overallGPA='.$overallGPA.'&'.'labels='.$labels));
        $context = stream_context_create($opts);
        $page = file_get_contents($this->url, false, $context);
        $result = (String)$page;
        return $result;
    }

}