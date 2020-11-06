<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;
use App\Models\Form;


class NewPostArrived extends Notification
{
    private $form;
    public function __construct(Form $form)
    {
       $this->form = $form;
    }

    public function via($notifiable)
    {
        return [TwitterChannel::class];
    }

    public function toTwitter($notifiable)
    {
        $text = "テストだよ";
        
        return new TwitterStatusUpdate($text);
    }
}