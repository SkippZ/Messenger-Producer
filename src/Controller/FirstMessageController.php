<?php

namespace App\Controller;

use App\Message\FirstMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\Bridge\Amqp\Transport\AmqpStamp;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class FirstMessageController extends AbstractController
{
  #[Route('/message', name: 'blaaaaaa')]
  public function index(MessageBusInterface $messageBus): JsonResponse
  {
    $message = new FirstMessage('test');

    $envelope = new Envelope(
      $message,
      [new AmqpStamp('user.update')]
    );

    $messageBus->dispatch($envelope);

    return $this->json([
      'message' => 'dispatched',
    ]);
  }
}
