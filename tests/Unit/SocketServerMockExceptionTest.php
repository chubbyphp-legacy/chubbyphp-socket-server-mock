<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\SocketServerMock\Unit;

use Chubbyphp\SocketServerMock\SocketServerMockException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Chubbyphp\SocketServerMock\SocketServerMockException
 *
 * @internal
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
