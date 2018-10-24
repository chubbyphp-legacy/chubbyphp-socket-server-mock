<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\SocketServerMock;

use Chubbyphp\SocketServerMock\MessageInterface;
use Chubbyphp\SocketServerMock\MessageLogInterface;
use Chubbyphp\SocketServerMock\MessageLogs;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Chubbyphp\SocketServerMock\MessageLogs
 */
final class MessageLogsTest extends TestCase
{
    public function testMessageLogs()
    {
        $messageLogs = MessageLogs::createFromArray([[['input' => 'input', 'output' => 'output']]]);

        $messageLog = $messageLogs->getNextMessageLog();

        self::assertInstanceOf(MessageLogInterface::class, $messageLog);

        $message = $messageLog->getNextMessage();

        self::assertInstanceOf(MessageInterface::class, $message);

        self::assertSame('input', $message->getInput());
        self::assertSame('output', $message->getOutput());

        self::assertNull($messageLog->getNextMessage());

        self::assertNull($messageLogs->getNextMessageLog());
    }
}
