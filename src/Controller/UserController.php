<?php

namespace App\Controller;

use App\Message\Command\CreateUser;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', 'api_')]
class UserController extends AbstractController
{
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    #[Route('/users', name: 'app_user', methods: ['GET'])]
    public function index(LoggerInterface $logger): JsonResponse
    {
        // $logger->info('hello world');
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    #[Route('/users', name: 'create_user', methods: ['POST'])]
    public function create(Request $request)
    {
        $requestBody = json_decode($request->getContent());
        $firstName = $requestBody->firstName;
        $lastName = $requestBody->lastName;
        $email = $requestBody->email;

        $this->bus->dispatch(new CreateUser($firstName, $lastName, $email));

        return $this->json([
            'status' => 'success',
            'message' => 'user onboard successful'
        ]);
    }

}
