<?php

namespace App\Trading\Notifications\Telegram;

use App\Support\Notifications\INotifiable;
use App\Support\Notifications\INotifier;
use App\Trading\Notifications\TelegramUpdateNotifiable;

class PingNotification extends TextNotification
{
    public function __construct(string $text = 'Hello', ?INotifier $notifier = null)
    {
        parent::__construct($text, $notifier);
    }

    protected function getText(INotifiable $notifiable): string
    {
        return $notifiable instanceof TelegramUpdateNotifiable && !$notifiable->isChannel()
            ? sprintf('%s @%s!', $this->text, $notifiable->fromUsername())
            : sprintf('%s!', $this->text);
    }
}
