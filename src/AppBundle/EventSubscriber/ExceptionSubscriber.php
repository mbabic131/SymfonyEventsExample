<?php

namespace AppBundle\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use AppBundle\Event\MyEvent;

// this event subscriber is automaticly registered from config.yml
class ExceptionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return array(
          // Symfony provided event
           KernelEvents::EXCEPTION => array(
               array('processException', 20),
               array('logException', 10),
               array('notifyException', 5),
           ),
           // Custom events
           MyEvent::NAME => 'sayHello'
        );
    }

    public function processException(GetResponseForExceptionEvent $event)
    {
        var_dump("Error!");
    }

    public function logException(GetResponseForExceptionEvent $event)
    {
        var_dump("Logged error.");
    }

    public function notifyException(GetResponseForExceptionEvent $event)
    {
        var_dump("Developers are alerted.");
    }

    public function sayHello(MyEvent $event)
    {
        var_dump($event->sayHello());
    }
}