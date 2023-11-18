<?php

namespace backend\controllers;


use backend\models\telegram;
use yii\web\Controller;

class TestbotController extends Controller
{
    public function actionTest()
    {
        $text = '10+10';
        $a = strpos($text, '+');
        $b = strpos($text, '-');
        $c = strpos($text, '*');
        $d = strpos($text, ':');

        if ($a == true)
        {
            $z = substr($text, 0, $a);
            $x = substr($text, $a);
            echo  $z+$x;

        }else{
            $text1 = 'xato';
        }
    }

    public $enableCsrfValidation = false;

    public function actionWebhook()
    {
        $telegram = new telegram();
        $data = $telegram->getData();

        $chat_id = $data['message']['from']['id'];
        $text = isset($data['message']['text']) ? $data['message']['text']: '';

        $a = strpos($text, '+');
        $b = strpos($text, '-');
        $c = strpos($text, '*');
        $d = strpos($text, ':');

        if ($a == true)
        {
            $z = substr($text, 0, $a);
            $x = substr($text, $a);
            $text1 = $z+$x;
        }elseif ($b == true)
        {
            $z = substr($text, 0, $a);
            $x = substr($text, $a);
            $text1 = $z-$x;
        }elseif ($c == true)
        {
            $z = substr($text, 0, $a);
            $x = substr($text, $a);
            $text1 = $z*$x;
        }elseif ($d == true)
        {
            $z = substr($text, 0, $a);
            $x = substr($text, $a);
            $text1 = $z/$x;
        }else
        {
            $text1 = $text;
        }




        $this->sendMessage($chat_id, $text1);

    }

    public function sendMessage($chat_id, $text)
    {
        $data = [
            'chat_id' => $chat_id,
            'text' => $text,
        ];

        $token = "6816596578:AAGcblyvf4sGmrvMY3iPf4TCou2nwnMiQFI";
        $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($data);
        $curl = curl_init($url);
//        curl_setopt($curl, CURLOPT_POST, true);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
    }

}