<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock;

interface MessageInterface
{
    public function getInput(): string;

    public function getOutput(): string;
}
