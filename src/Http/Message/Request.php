<?php

namespace Http\Message;

class Request extends Message
{
    private string $uri;
    private string $method;

    public function __construct(string $uri, string $method, array $headers = [], string $body = "")
    {
        parent::__construct($headers, $body);
        
        $this->uri = $uri;
        $this->method = $method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}