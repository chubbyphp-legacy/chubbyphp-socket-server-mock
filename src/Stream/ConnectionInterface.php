<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock\Stream;

interface ConnectionInterface
{
    public function read(int $length): string;

    public function write(string $string);
}
