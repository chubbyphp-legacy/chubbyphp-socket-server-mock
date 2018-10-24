<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock\Stream;

final class ServerFactory implements ServerFactoryInterface
{
    /**
     * @param string $host
     * @param int    $port
     *
     * @return ServerInterface
     */
    public function createByHostAndPort(string $host, int $port): ServerInterface
    {
        return new Server($host, $port);
    }
}
