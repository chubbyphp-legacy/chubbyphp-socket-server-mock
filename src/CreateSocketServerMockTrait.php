<?php

declare(strict_types=1);

namespace Chubbyphp\SocketServerMock;

use Symfony\Component\Process\Process;

trait CreateSocketServerMockTrait
{
    /**
     * @param string $host
     * @param int    $port
     * @param array  $messageLogs
     *
     * @return Process
     */
    private function createSocketServerMock(string $host, int $port, array $messageLogs): Process
    {
        $process = new Process(sprintf(
            '%s %s %d \'%s\'',
            realpath(__DIR__.'/../bin/socketServerMock'),
            $host,
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

        return $process;
    }
}
