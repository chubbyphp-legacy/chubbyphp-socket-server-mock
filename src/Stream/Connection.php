<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock\Stream;

final class Connection implements ConnectionInterface
{
    /**
     * @var resource
     */
    private $stream;

    /**
     * @param ServerInterface $socketServer
     */
    public function __construct(ServerInterface $socketServer)
    {
        $stream = stream_socket_accept($socketServer());

        if (!is_resource($stream)) {
            throw StreamException::createFromStreamAcceptError();
        }

        $this->stream = $stream;
    }

    public function __deconstruct()
    {
        fclose($this->stream);
    }

    /**
     * @param int $length
     *
     * @return string
     */
    public function read(int $length): string
    {
        return fread($this->stream, $length);
    }

    /**
     * @param string $string
     */
    public function write(string $string)
    {
        fwrite($this->stream, $string);
    }
}
