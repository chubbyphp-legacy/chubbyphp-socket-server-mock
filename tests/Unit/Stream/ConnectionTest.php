<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\SocketServerMock\Unit\Stream;

use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use Chubbyphp\SocketServerMock\Stream\Connection;
use Chubbyphp\SocketServerMock\Stream\ServerInterface;
use Chubbyphp\SocketServerMock\Stream\StreamException;
use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Chubbyphp\SocketServerMock\Stream\Connection
 *
 * @internal
 */
final class ConnectionTest extends TestCase
{
    use PHPMock;
    use MockByCallsTrait;

    public function testSuccessfulConstruct(): void
    {
        $serverResource = new \stdClass();
        $connectionResource = new \stdClass();

        $stream_socket_accept = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'stream_socket_accept');
        $stream_socket_accept->expects($this->once())->with($serverResource)->willReturn($connectionResource);

        $is_resource = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'is_resource');
        $is_resource->expects($this->once())->with($connectionResource)->willReturn(true);

        $server = $this->getMockByCalls(ServerInterface::class, [
            Call::create('__invoke')->with()->willReturn($serverResource),
        ]);

        new Connection($server);
    }

    public function testFailedConstruct(): void
    {
        $this->expectException(StreamException::class);
        $this->expectExceptionMessage('Stream socket could not accept a connection');

        $serverResource = new \stdClass();
        $connectionResource = new \stdClass();

        $stream_socket_accept = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'stream_socket_accept');
        $stream_socket_accept->expects($this->once())->with($serverResource)->willReturn($connectionResource);

        $is_resource = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'is_resource');
        $is_resource->expects($this->once())->with($connectionResource)->willReturn(false);

        $server = $this->getMockByCalls(ServerInterface::class, [
            Call::create('__invoke')->with()->willReturn($serverResource),
        ]);

        new Connection($server);
    }

    public function testDeconstruct(): void
    {
        $serverResource = new \stdClass();
        $connectionResource = new \stdClass();

        $stream_socket_accept = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'stream_socket_accept');
        $stream_socket_accept->expects($this->once())->with($serverResource)->willReturn($connectionResource);

        $is_resource = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'is_resource');
        $is_resource->expects($this->once())->with($connectionResource)->willReturn(true);

        $fclose = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'fclose');
        $fclose->expects($this->once())->with($connectionResource);

        $server = $this->getMockByCalls(ServerInterface::class, [
            Call::create('__invoke')->with()->willReturn($serverResource),
        ]);

        $connection = new Connection($server);
        $connection->__deconstruct();
    }

    public function testRead(): void
    {
        $serverResource = new \stdClass();
        $connectionResource = new \stdClass();

        $stream_socket_accept = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'stream_socket_accept');
        $stream_socket_accept->expects($this->once())->with($serverResource)->willReturn($connectionResource);

        $is_resource = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'is_resource');
        $is_resource->expects($this->once())->with($connectionResource)->willReturn(true);

        $fread = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'fread');
        $fread->expects($this->once())->with($connectionResource, 1234)->willReturn('test');

        $server = $this->getMockByCalls(ServerInterface::class, [
            Call::create('__invoke')->with()->willReturn($serverResource),
        ]);

        $connection = new Connection($server);

        self::assertSame('test', $connection->read(1234));
    }

    public function testWrite(): void
    {
        $serverResource = new \stdClass();
        $connectionResource = new \stdClass();

        $stream_socket_accept = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'stream_socket_accept');
        $stream_socket_accept->expects($this->once())->with($serverResource)->willReturn($connectionResource);

        $is_resource = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'is_resource');
        $is_resource->expects($this->once())->with($connectionResource)->willReturn(true);

        $fwrite = $this->getFunctionMock('Chubbyphp\SocketServerMock\Stream', 'fwrite');
        $fwrite->expects($this->once())->with($connectionResource, 'test');

        $server = $this->getMockByCalls(ServerInterface::class, [
            Call::create('__invoke')->with()->willReturn($serverResource),
        ]);

        $connection = new Connection($server);
        $connection->write('test');
    }
}
