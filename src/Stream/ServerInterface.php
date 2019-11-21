<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock\Stream;

interface ServerInterface
{
    /**
     * @return resource
     */
    public function __invoke();

    public function createConnection(): ConnectionInterface;
}
