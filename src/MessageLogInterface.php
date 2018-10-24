<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock;

interface MessageLogInterface
{
    /**
     * @return MessageInterface|null
     */
    public function getNextMessage();
}
