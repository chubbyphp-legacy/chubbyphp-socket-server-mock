<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\SocketServerMock\Unit;

use Chubbyphp\SocketServerMock\MessageInterface;
use Chubbyphp\SocketServerMock\MessageLog;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Chubbyphp\SocketServerMock\MessageLog
 *
 * @internal
 */
final class MessageLogTest extends TestCase
{
    public function testMessageLog(): void
    {
        $messageLog = MessageLog::createFromArray([['input' => 'input', 'output' => 'output']]);

        $message = $messageLog->getNextMessage();

        self::assertInstanceOf(MessageInterface::class, $message);

        self::assertSame('input', $message->getInput());
        self::assertSame('output', $message->getOutput());

        self::assertNull($messageLog->getNextMessage());
    }
}
