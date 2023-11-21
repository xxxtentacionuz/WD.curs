<?php

namespace backend\controllers;



use backend\telegram\Telegram;
use yii\web\Controller;

class Testbot2Controller extends Controller
{
    public $enableCsrfValidation = false;

    public $token;
    public $telegram;
    public $chat_id;
    public $text;

    public function actionWebhook()
    {
        $this->token = '6816596578:AAGcblyvf4sGmrvMY3iPf4TCou2nwnMiQFI';
        $this->telegram = new telegram($this->token);
        $data = $this->telegram->getData();

        $chat_id = $data['message']['from']['id'];
        $this->text= 'salom2'; //isset($data['message']['text']) ? $data['message']['text']: '';
        $this->sendMessage($this->text);
    }

    public function sendMessage($text)
    {
        $content = [
            'chat_id'=>$this->chat_id, 'text'=>$text
        ];

        $this->telegram->sendMessage($content);
    }

}