<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\SocketServerMock\Unit;

use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use Chubbyphp\SocketServerMock\MessageInterface;
use Chubbyphp\SocketServerMock\MessageLogInterface;
use Chubbyphp\SocketServerMock\MessageLogsInterface;
use Chubbyphp\SocketServerMock\SocketServerMock;
use Chubbyphp\SocketServerMock\SocketServerMockException;
use Chubbyphp\SocketServerMock\Stream\ConnectionInterface;
use Chubbyphp\SocketServerMock\Stream\ServerFactoryInterface;
use Chubbyphp\SocketServerMock\Stream\ServerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Chubbyphp\SocketServerMock\SocketServerMock
 *
 * @internal
 */
final class SocketServerMockTest extends TestCase
{
    use MockByCallsTrait;

    public function testRunWithPlainInput()
    {
        /** @var MessageInterface|MockObject $message */
        $message = $this->getMockByCalls(MessageInterface::class, [
            Call::create('getInput')->with()->willReturn('input'),
            Call::create('getOutput')->with()->willReturn('output'),
        ]);

        /** @var MessageLogInterface|MockObject $messageLog */
        $messageLog = $this->getMockByCalls(MessageLogInterface::class, [
            Call::create('getNextMessage')->with()->willReturn($message),
            Call::create('getNextMessage')->with()->willReturn(null),
        ]);

        /** @var MessageLogsInterface|MockObject $messageLogs */
        $messageLogs = $this->getMockByCalls(MessageLogsInterface::class, [
            Call::create('getNextMessageLog')->with()->willReturn($messageLog),
            Call::create('getNextMessageLog')->with()->willReturn(null),
        ]);

        /** @var ConnectionInterface|MockObject $connection */
        $connection = $this->getMockByCalls(ConnectionInterface::class, [
            Call::create('read')->with(1)->willReturn('i'),
            Call::create('read')->with(1)->willReturn('n'),
            Call::create('read')->with(1)->willReturn('p'),
            Call::create('read')->with(1)->willReturn('u'),
            Call::create('read')->with(1)->willReturn('t'),
            Call::create('write')->with('output'),
        ]);

        /** @var ServerInterface|MockObject $server */
        $server = $this->getMockByCalls(ServerInterface::class, [
            Call::create('createConnection')->with()->willReturn($connection),
        ]);

        /** @var ServerFactoryInterface|MockObject $serverFactory */
        $serverFactory = $this->getMockByCalls(ServerFactoryInterface::class, [
            Call::create('createByHostAndPort')->with('0.0.0.0', 3000)->willReturn($server),
        ]);

        $socketServerMock = new SocketServerMock($serverFactory);
        $socketServerMock->run('0.0.0.0', 3000, $messageLogs);
    }

    public function testRunWithEncodedInput()
    {
        /** @var MessageInterface|MockObject $message */
        $message = $this->getMockByCalls(MessageInterface::class, [
            Call::create('getInput')->with()->willReturn('base64:aW5wdXQ='),
            Call::create('getOutput')->with()->willReturn('base64:b3V0cHV0'),
        ]);

        /** @var MessageLogInterface|MockObject $messageLog */
        $messageLog = $this->getMockByCalls(MessageLogInterface::class, [
            Call::create('getNextMessage')->with()->willReturn($message),
            Call::create('getNextMessage')->with()->willReturn(null),
        ]);

        /** @var MessageLogsInterface|MockObject $messageLogs */
        $messageLogs = $this->getMockByCalls(MessageLogsInterface::class, [
            Call::create('getNextMessageLog')->with()->willReturn($messageLog),
            Call::create('getNextMessageLog')->with()->willReturn(null),
        ]);

        /** @var ConnectionInterface|MockObject $connection */
        $connection = $this->getMockByCalls(ConnectionInterface::class, [
            Call::create('read')->with(1)->willReturn('i'),
            Call::create('read')->with(1)->willReturn('n'),
            Call::create('read')->with(1)->willReturn('p'),
            Call::create('read')->with(1)->willReturn('u'),
            Call::create('read')->with(1)->willReturn('t'),
            Call::create('write')->with('output'),
        ]);

        /** @var ServerInterface|MockObject $server */
        $server = $this->getMockByCalls(ServerInterface::class, [
            Call::create('createConnection')->with()->willReturn($connection),
        ]);

        /** @var ServerFactoryInterface|MockObject $serverFactory */
        $serverFactory = $this->getMockByCalls(ServerFactoryInterface::class, [
            Call::create('createByHostAndPort')->with('0.0.0.0', 3000)->willReturn($server),
        ]);

        $socketServerMock = new SocketServerMock($serverFactory);
        $socketServerMock->run('0.0.0.0', 3000, $messageLogs);
    }

    public function testRunWithInvalidPlainInput()
    {
        $this->expectException(SocketServerMockException::class);
        $this->expectExceptionMessage('Given input "inu" is not part of input "input"');

        /** @var MessageInterface|MockObject $message */
        $message = $this->getMockByCalls(MessageInterface::class, [
            Call::create('getInput')->with()->willReturn('input'),
        ]);

        /** @var MessageLogInterface|MockObject $messageLog */
        $messageLog = $this->getMockByCalls(MessageLogInterface::class, [
            Call::create('getNextMessage')->with()->willReturn($message),
        ]);

        /** @var MessageLogsInterface|MockObject $messageLogs */
        $messageLogs = $this->getMockByCalls(MessageLogsInterface::class, [
            Call::create('getNextMessageLog')->with()->willReturn($messageLog),
        ]);

        /** @var ConnectionInterface|MockObject $connection */
        $connection = $this->getMockByCalls(ConnectionInterface::class, [
            Call::create('read')->with(1)->willReturn('i'),
            Call::create('read')->with(1)->willReturn('n'),
            Call::create('read')->with(1)->willReturn('u'),
        ]);

        /** @var ServerInterface|MockObject $server */
        $server = $this->getMockByCalls(ServerInterface::class, [
            Call::create('createConnection')->with()->willReturn($connection),
        ]);

        /** @var ServerFactoryInterface|MockObject $serverFactory */
        $serverFactory = $this->getMockByCalls(ServerFactoryInterface::class, [
            Call::create('createByHostAndPort')->with('0.0.0.0', 3000)->willReturn($server),
        ]);

        $socketServerMock = new SocketServerMock($serverFactory);
        $socketServerMock->run('0.0.0.0', 3000, $messageLogs);
    }
}
