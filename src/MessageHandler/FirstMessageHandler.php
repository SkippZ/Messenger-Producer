<?php

namespace App\MessageHandler;

use App\Message\FirstMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class FirstMessageHandler
{
  public function __invoke(FirstMessage $message): void
  {
    dump($message);
  }
}
