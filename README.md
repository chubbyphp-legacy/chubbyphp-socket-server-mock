# chubbyphp-socket-server-mock

[![Build Status](https://api.travis-ci.org/chubbyphp/chubbyphp-socket-server-mock.png?branch=master)](https://travis-ci.org/chubbyphp/chubbyphp-socket-server-mock)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-socket-server-mock/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-socket-server-mock/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-socket-server-mock/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-socket-server-mock/?branch=master)
[![Total Downloads](https://poser.pugx.org/chubbyphp/chubbyphp-socket-server-mock/downloads.png)](https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock)
[![Monthly Downloads](https://poser.pugx.org/chubbyphp/chubbyphp-socket-server-mock/d/monthly)](https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock)
[![Latest Stable Version](https://poser.pugx.org/chubbyphp/chubbyphp-socket-server-mock/v/stable.png)](https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock)
[![Latest Unstable Version](https://poser.pugx.org/chubbyphp/chubbyphp-socket-server-mock/v/unstable)](https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock)

## Description

A simple socket server mock.

## Requirements

 * php: ~7.0

## Installation

Through [Composer](http://getcomposer.org) as [chubbyphp/chubbyphp-socket-server-mock][1].

```sh
composer require chubbyphp/chubbyphp-socket-server-mock "~1.0"
```

## Usage

```php
<?php

namespace MyProject\Tests\Integration;

use Symfony\Component\Process\Process;
use PHPUnit\Framework\TestCase;

final class SampleTest extends TestCase
{
    public function testSample()
    {
        $this->createSocketServerMock(3000, [[[
            'input' => 'input',
            'output' => 'output'
        ]]]);

        // run my integration test
    }

    /**
     * @param int $port
     * @param array $messageLogs
     */
    private function createSocketServerMock(int $port, array $messageLogs)
    {
        $process = new Process(sprintf(
            'vendor/bin/socketServerMock 0.0.0.0 %d \'%s\'',
            $port,
            json_encode($messageLogs)
        ));

        $process->start();
        $output = '';

        while ($process->isRunning()) {
            $output .= $process->getOutput();
            if (false !== strpos($output, 'socket server mock: started')) {
                break;
            }

            usleep(10000);
        }

        if ('' !== $errorOutput = $process->getErrorOutput()) {
            throw new \LogicException(
                sprintf(
                    'Could not start the socker server mock: "%s"',
                    $errorOutput
                )
            );
        }
    }
}
```

## Copyright

Dominik Zogg 2018


[1]: https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock
