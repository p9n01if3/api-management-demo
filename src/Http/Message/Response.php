<?php

namespace Http\Message;

class Response extends Message
{
    private int $status_code;

    public function __construct(int $status_code, array $headers = [], string $body = "")
    {
        parent::__construct($headers, $body);
        
        $this->status_code = $status_code;
    }

    public function getStatusCode(): int
    {
        return $this->status_code;
    }
}