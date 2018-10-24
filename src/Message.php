<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock;

final class Message implements MessageInterface
{
    /**
     * @var string
     */
    private $input;

    /**
     * @var string
     */
    private $output;

    /**
     * @param string $input
     * @param string $output
     */
    public function __construct(string $input, string $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * @param array $data
     *
     * @return self
     */
    public static function createFromArray(array $data): self
    {
        $missingFields = [];
        $invalidFields = [];

        if (!isset($data['input'])) {
            $missingFields[] = 'input';
        }

        if (!isset($data['output'])) {
            $missingFields[] = 'output';
        }

        if ([] !== $missingFields) {
            throw new \InvalidArgumentException(sprintf('Missing keys in array: "%s"', implode('","', $missingFields)));
        }

        return new self((string) $data['input'], (string) $data['output']);
    }

    /**
     * @return string
     */
    public function getInput(): string
    {
        return $this->input;
    }

    /**
     * @return string
     */
    public function getOutput(): string
    {
        return $this->output;
    }
}
