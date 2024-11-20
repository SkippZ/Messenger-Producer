<?php

namespace App\Message;

final class FirstMessage
{
    public function __construct(
        public readonly string $name,
    ) {
    }
}
