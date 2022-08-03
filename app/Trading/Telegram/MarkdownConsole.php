<?php

namespace App\Trading\Telegram;

class MarkdownConsole extends MarkdownString
{
    public function __toString(): string
    {
        return '```' . PHP_EOL . $this->string . PHP_EOL . '```';
    }
}
