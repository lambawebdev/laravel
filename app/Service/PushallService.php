<?php

namespace App\Service;

class PushallService
{
    public function __construct()
    {
    }

    public function pushAll($articleTitle)
    {
        curl_setopt_array($ch = curl_init(), array(
            CURLOPT_URL => "https://pushall.ru/api.php",
            CURLOPT_POSTFIELDS => array(
                "type" => "self",
                "id" => "107458",
                "key" => "4b0bb4146ff997549bb6f2c39bf804a3",
                "text" => "Создана статья!",
                "title" => $articleTitle
            ),
            CURLOPT_RETURNTRANSFER => true
        ));
        $return=curl_exec($ch); //получить ответ или ошибку
        curl_close($ch);
    }
}
