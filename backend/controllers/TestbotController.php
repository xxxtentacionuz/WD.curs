<?php

namespace backend\controllers;


use backend\models\telegram;
use yii\web\Controller;

class TestbotController extends Controller
{

    public function actionSend()
    {
        $text = 'index/send';
        $chat_id = 844272310;

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
        return $response;
    }

    public $enableCsrfValidation = false;

    public function actionWebhook()
    {
        $telegram = new telegram();
        $data = $telegram->getData();

        $chat_id = $data['message']['from']['id'];
        $text = isset($data['message']['text']) ? $data['message']['text']: '';

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