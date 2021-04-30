<?php

namespace App\Service;

class PushallService
{
    private $id;
    private $apiKey;

    protected $url = "https://pushall.ru/api.php";

    public function __construct($id, $apiKey)
    {
        $this->id = $id;
        $this->apiKey = $apiKey;
    }

    public function pushAll($articleTitle)
    {
        curl_setopt_array($ch = curl_init(), array(
            CURLOPT_URL => $this->url,
            CURLOPT_POSTFIELDS => array(
                "type" => "self",
                "id" => $this->id,
                "key" => $this->apiKey,
                "text" => "Создана статья!",
                "title" => $articleTitle
            ),
            CURLOPT_RETURNTRANSFER => true
        ));
        $return=curl_exec($ch); //получить ответ или ошибку
        curl_close($ch);
    }
}
