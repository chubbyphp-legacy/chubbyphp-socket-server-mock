<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock\Stream;

interface ServerFactoryInterface
{
    public function createByHostAndPort(string $host, int $port): ServerInterface;
}
