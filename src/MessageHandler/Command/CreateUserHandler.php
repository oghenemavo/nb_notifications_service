<?php

namespace App\MessageHandler\Command;

use App\Message\Command\CreateUser;
use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CreateUserHandler
{
    public function __invoke(CreateUser $message)
    {
        // do something with your message
        $notification = [
            'first_name' => $message->getFirstName(),
            'last_name' => $message->getLastName(),
            'email' => $message->getEmail(),
        ];

        file_put_contents(
            'public/notifications.log', 
            print_r($notification, true) . PHP_EOL, 
            FILE_APPEND);
    }
}
