# chubbyphp-socket-server-mock

[![Build Status](https://api.travis-ci.org/chubbyphp/chubbyphp-socket-server-mock.png?branch=master)](https://travis-ci.org/chubbyphp/chubbyphp-socket-server-mock)
[![Coverage Status](https://coveralls.io/repos/github/chubbyphp/chubbyphp-socket-server-mock/badge.svg?branch=master)](https://coveralls.io/github/chubbyphp/chubbyphp-socket-server-mock?branch=master)
[![Latest Stable Version](https://poser.pugx.org/chubbyphp/chubbyphp-socket-server-mock/v/stable.png)](https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock)
[![Total Downloads](https://poser.pugx.org/chubbyphp/chubbyphp-socket-server-mock/downloads.png)](https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock)
[![Monthly Downloads](https://poser.pugx.org/chubbyphp/chubbyphp-socket-server-mock/d/monthly)](https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock)
[![Daily Downloads](https://poser.pugx.org/chubbyphp/chubbyphp-socket-server-mock/d/daily)](https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock)

## Description

A simple socket server mock.

## Requirements

 * php: ^7.2
 * symfony/process: ^3.4.43|^4.4.11|^5.0

## Installation

Through [Composer](http://getcomposer.org) as [chubbyphp/chubbyphp-socket-server-mock][1].

```sh
composer require chubbyphp/chubbyphp-socket-server-mock "^1.2"
```

## Usage

```php
<?php

namespace MyProject\Tests\Integration;

use Chubbyphp\SocketServerMock\CreateSocketServerMockTrait;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Process\Process;

final class SampleTest extends TestCase
{
    use CreateSocketServerMockTrait;

    public function testSample()
    {
        /** @var Process $process */
        $process = $this->createSocketServerMock('0.0.0.0', 3000, [[[
            'input' => 'input',
            'output' => 'output'
        ]]]);

        // run my integration test
    }
}
```

## Copyright

Dominik Zogg 2020


[1]: https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock
