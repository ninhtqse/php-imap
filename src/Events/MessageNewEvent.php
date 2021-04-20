<?php
/*
* File:     MessageNewEvent.php
* Category: Event
* Author:   M. Goldenbaum
* Created:  25.11.20 22:21
* Updated:  -
*
* Description:
*  -
*/

namespace Ninhtqse\PHPIMAP\Events;

use Ninhtqse\PHPIMAP\Message;

/**
 * Class MessageNewEvent
 *
 * @package Ninhtqse\PHPIMAP\Events
 */
class MessageNewEvent extends Event {

    /** @var Message $message */
    public $message;

    /**
     * Create a new event instance.
     * @var Message[] $messages
     * @return void
     */
    public function __construct($messages) {
        $this->message = $messages[0];
    }
}
