<?php

namespace App\Telegram;

use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;

class Handler extends WebhookHandler
{
public function new(): void 
{
    $this->reply('Привет!');
}

public function help(): void {
    $this->reply('Вам нужна помощь?');
}
public function start(): void
{
    $this->chat->message('Для авторизациии необходим номер телефона:')->replyKeyboard(ReplyKeyboard::make()->oneTime()->buttons([
    ReplyButton::make('Отправьте свой номер')->requestContact(),    
    ]))->send();
    $phone = $this->message->contact()->phoneNumber();
}

// protected function handleChatMessage(\Illuminate\Support\Stringable $text): void
// {
//     $phone = $this->message->contact()->phoneNumber();
    
// }
}