<?php

namespace BotTelegram\Entities;

use BotTelegram\Exception\TelegramException;
use BotTelegram\Entities\Entity;

class InlineKeyboardButton extends Entity
{
    protected $text;
    protected $url;
    protected $callback_data;
    protected $switch_inline_query;

    /**
     * @todo check if only one of 'url, callback_data, switch_inline_query' fields is set, documentation states that only one of these can be used
     */
    public function __construct($data = array())
    {
        $this->text = isset($data['text']) ? $data['text'] : null;
        if (empty($this->text)) {
            throw new TelegramException('text is empty!');
        }

        $this->url = isset($data['url']) ? $data['url'] : null;
        $this->callback_data = isset($data['callback_data']) ? $data['callback_data'] : null;
        $this->switch_inline_query = isset($data['switch_inline_query']) ? $data['switch_inline_query'] : null;

        if ($this->url === '' && $this->callback_data === '' && $this->switch_inline_query === '') {
            throw new TelegramException('You must use at least one of these fields: url, callback_data, switch_inline_query!');
        }
    }
}