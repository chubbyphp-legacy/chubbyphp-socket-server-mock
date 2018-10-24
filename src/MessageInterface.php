<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock;

interface MessageInterface
{
    /**
     * @return string
     */
    public function getInput(): string;

    /**
     * @return string
     */
    public function getOutput(): string;
}
