<?php

class Wolfram {
    public $url = 'http://www.wolframcloud.com/obj/1522bb90-ce94-4e46-b2f8-97cf69ba9895';

    public function __construct()
    {
    }

    public function WolframCloudCall($param1,$param2,$param3,$param4){
        $body ='param1='.$param1.'&'.'param2='.$param2.'&'.'param3='.$param3.'&'.'param4='.$param4;
        $opts = array(
            'http'=> array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "User-Agent:EmbedCode-PHP/1.0\r\n",
                'method' => 'POST','content' =>'param1='.$param1.'&'.'param2='.$param2.'&'.'param3='.$param3.'&'.'param4='.$param4));
        $context = stream_context_create($opts);
        $page = file_get_contents($this->url, false, $context);
        $result = (String)$page;
        return $result;
    }
}
