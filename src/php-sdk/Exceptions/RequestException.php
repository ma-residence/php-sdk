<?php

namespace MR\SDK\Exceptions;

use MR\SDK\Transport\Response;
use RuntimeException;

class RequestException extends RuntimeException
{
    private $trace = [];

    public function getTrace()
    {
        return $this->trace;
    }

    public function setTrace(array $trace)
    {
        $this->trace = $trace;

        return $this;
    }
}