<?php
/*
* File:     Event.php
* Category: Event
* Author:   M. Goldenbaum
* Created:  25.11.20 22:21
* Updated:  -
*
* Description:
*  -
*/

namespace Ninhtqse\PHPIMAP\Events;

/**
 * Class Event
 *
 * @package Ninhtqse\PHPIMAP\Events
 */
abstract class Event {

    /**
     * Dispatch the event with the given arguments.
     */
    public static function dispatch() {
        return new static(func_get_args());
    }
}
