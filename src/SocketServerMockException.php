<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock;

final class SocketServerMockException extends \InvalidArgumentException
{
    /**
     * @param string $givenInput
     * @param string $input
     *
     * @return self
     */
    public static function createByInvalidInput(string $givenInput, string $input): self
    {
        return new self(sprintf('Given input "%s" is not part of input "%s"', $givenInput, $input), 200);
    }
}
