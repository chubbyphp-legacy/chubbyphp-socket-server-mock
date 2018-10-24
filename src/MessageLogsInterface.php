<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock;

interface MessageLogsInterface
{
    /**
     * @return MessageLogInterface|null
     */
    public function getNextMessageLog();
}
