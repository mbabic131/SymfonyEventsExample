<?php

namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * The order.placed event is dispatched each time an order is created
 * in the system.
 */
class MyEvent extends Event
{
    const NAME = 'my.event';

    protected $messg;

    public function __construct()
    {
        $this->messg = 'This is my event.';
    }

    public function sayHello()
    {
        return $this->messg;
    }

}