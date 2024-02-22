<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', 'api_')]
class UserController extends AbstractController
{
    // public function __construct(private LoggerInterface $logger)
    // {
    // }

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
        // $requestBody = json_decode($request->getContent());

        // store user data
        $store = file_put_contents('users_store.log', print_r($request->getContent(), true) . PHP_EOL, FILE_APPEND);

        if ($store) {
            // send notification
            file_put_contents('notifications.log', print_r($request->getContent(), true) . PHP_EOL, FILE_APPEND);
        }
    }

}
