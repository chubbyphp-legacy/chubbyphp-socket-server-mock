<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock;

final class MessageLogs implements MessageLogsInterface
{
    /**
     * @var MessageLogInterface[]
     */
    private $messageLogs;

    /**
     * @param MessageLogInterface[] $messageLogs
     */
    public function __construct(array $messageLogs)
    {
        $this->messageLogs = [];
        foreach ($messageLogs as $connection) {
            $this->addMessageLog($connection);
        }
    }

    /**
     * @param array $data
     *
     * @return self
     */
    public static function createFromArray(array $data): self
    {
        $messageLogs = [];

        foreach ($data as $value) {
            $messageLogs[] = MessageLog::createFromArray($value);
        }

        return new self($messageLogs);
    }

    /**
     * @param MessageLogInterface $connection
     */
    private function addMessageLog(MessageLogInterface $connection)
    {
        $this->messageLogs[] = $connection;
    }

    /**
     * @return MessageLogInterface|null
     */
    public function getNextMessageLog()
    {
        return array_shift($this->messageLogs);
    }
}
