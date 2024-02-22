<?php

namespace App\MessageHandler\Command;

use App\Message\Command\CreateUser;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CreateUserHandler
{
    public function __invoke(CreateUser $message)
    {
        // do something with your message
        $user = [
            'first_name' => $message->getFirstName(),
            'last_name' => $message->getLastName(),
            'email' => $message->getEmail(),
        ];

        file_put_contents(
            'user_store.log', 
            print_r($user, true) . PHP_EOL, 
            FILE_APPEND);
    }
}
