<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\SocketServerMock\Unit\Stream;

use Chubbyphp\SocketServerMock\Stream\StreamException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Chubbyphp\SocketServerMock\Stream\StreamException
 *
 * @internal
 */
final class StreamExceptionTest extends TestCase
{
    public function testCreateFromStreamServerError(): void
    {
        $exception = StreamException::createFromStreamServerError('0.0.0.0', 3000, 'some error');

        self::assertSame(
            'Server could not listen to host: "0.0.0.0", port: 3000, detail: "some error"',
            $exception->getMessage()
        );

        self::assertSame(100, $exception->getCode());
    }

    public function testCreateFromStreamAcceptError(): void
    {
        $exception = StreamException::createFromStreamAcceptError();

        self::assertSame('Stream socket could not accept a connection', $exception->getMessage());

        self::assertSame(101, $exception->getCode());
    }
}
