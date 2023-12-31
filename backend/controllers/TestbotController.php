<?php

namespace backend\controllers;



use backend\telegram\Telegram;
use yii\base\Theme;
use yii\web\Controller;

class TestbotController extends Controller
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

        $this->chat_id = $data['message']['from']['id'];
        $this->text = isset($data['message']['text']) ? $data['message']['text']: '';

        if ($this->text == '/start')
        {
            $text = "salom aka bu if";
            $this->sendMessage($text);
        }elseif ($this->text == 'photo')
        {
            $content =[
                'chat_id'=>$this->chat_id,
                'photo'=>'https://s.nugaev.uz/admn/botImage/images.png',
                'caption'=>'aka mana rasm',
            ];
            $this->telegram->sendPhoto($content);
        }elseif ($this->text == 'video')
        {
            $content =[
                'chat_id'=>$this->chat_id,
                'video'=>'https://s.nugaev.uz/admn/botVideo/video1.mp4',
            ];
            $this->telegram->sendVideo($content);
        }elseif ($this->text == 'audio')
        {
            $content =[
                'chat_id'=>$this->chat_id,
                'audio'=>'https://s.nugaev.uz/admn/botAudio/forema.mp3',
            ];
            $this->telegram->sendAudio($content);
        }
    }

    public function sendMessage($text)
    {
        $content = [
            'chat_id'=>$this->chat_id, 'text'=>$text
        ];

        $this->telegram->sendMessage($content);
    }

}