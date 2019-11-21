<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock\Stream;

final class StreamException extends \RuntimeException
{
    public static function createFromStreamServerError(string $host, int $port, string $message): self
    {
        return new self(sprintf(
            'Server could not listen to host: "%s", port: %d, detail: "%s"',
            $host,
            $port,
            $message
        ), 100);
    }

    public static function createFromStreamAcceptError(): self
    {
        return new self('Stream socket could not accept a connection', 101);
    }
}
