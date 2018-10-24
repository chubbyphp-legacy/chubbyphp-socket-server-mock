<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock\Stream;

interface ServerInterface
{
    /**
     * @return ConnectionInterface
     */
    public function createConnection(): ConnectionInterface;

    /**
     * @return resource
     */
    public function __invoke();
}
