<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\SocketServerMock\Unit;

use Chubbyphp\SocketServerMock\Message;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Chubbyphp\SocketServerMock\Message
 *
 * @internal
 */
final class MessageTest extends TestCase
{
    public function testMessageWithValidArguments()
    {
        $message = Message::createFromArray(['input' => 'input', 'output' => 'output']);

        self::assertSame('input', $message->getInput());
        self::assertSame('output', $message->getOutput());
    }

    public function testMessageWithInvalidArguments()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Missing keys in array: "input","output"');

        $message = Message::createFromArray([]);
    }
}
