<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock\Stream;

interface ConnectionInterface
{
    /**
     * @param int $length
     *
     * @return string
     */
    public function read(int $length): string;

    /**
     * @param string $string
     */
    public function write(string $string);
}
