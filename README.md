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
 * symfony/process: ~2.8|~3.0|~4.0

## Installation

Through [Composer](http://getcomposer.org) as [chubbyphp/chubbyphp-socket-server-mock][1].

```sh
composer require chubbyphp/chubbyphp-socket-server-mock "~1.0"
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

Dominik Zogg 2018


[1]: https://packagist.org/packages/chubbyphp/chubbyphp-socket-server-mock
