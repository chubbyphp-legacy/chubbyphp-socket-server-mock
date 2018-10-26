<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\SocketServerMock;

use PHPUnit\Framework\TestCase;
use Chubbyphp\SocketServerMock\SocketServerMockException;

/**
 * @covers \Chubbyphp\SocketServerMock\SocketServerMockException
 */
final class SocketServerMockExceptionTest extends TestCase
{
    public function testCreateFromStreamServerError()
    {
        $exception = SocketServerMockException::createByInvalidInput('inu', 'input');

        self::assertSame('Given input "inu" is not part of input "input"', $exception->getMessage());
        self::assertSame(200, $exception->getCode());
    }
}
