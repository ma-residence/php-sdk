<?php

namespace MR\SDK\Exceptions;

use MR\SDK\Transport\Response;
use RuntimeException;

class RequestException extends RuntimeException
{
    private $trace = [];

    public function getExtTrace()
    {
        return $this->trace;
    }

    public function setExtTrace(array $trace)
    {
        $this->trace = $trace;

        return $this;
    }
}