<?php

namespace App\EventDispatchers\Listeners;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\EventDispatcher\Event;

class DemoListener
{
    private $logger;

    public function __construct(string $isDebug, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->logger->info("The value is debug is: ".print_r($isDebug, true)."\n");
    }

    public function onDemoEvent(Event $event)
    {
        // fetch event information here
        $this->logger->info("The value of the foo is: ".$event->getFoo()."\n");
        //die();
    }
}
