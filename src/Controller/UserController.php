<?php

namespace App\Controller;

use App\Message\Command\CreateUser;
use App\Model\UserDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

#[Route('/api', 'api_')]
class UserController extends AbstractController
{
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    #[Route('/users', name: 'app_user', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    #[Route('/users', name: 'create_user', methods: ['POST'])]
    public function create(
        #[MapRequestPayload] UserDTO $userDto
    ): JsonResponse
    {
        $firstName = $userDto->firstName;
        $lastName = $userDto->lastName;
        $email = $userDto->email;

        $this->bus->dispatch(new CreateUser($firstName, $lastName, $email));

        return $this->json([
            'status' => 'success',
            'message' => 'user onboard successful'
        ]);
    }

}
