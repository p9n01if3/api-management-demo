<?php

namespace Http\Message;

abstract class Message
{
    protected array $headers;
    protected string $body;

    public function __construct(array $headers = [], string $body = "")
    {
        foreach ($headers as $name => $value) {
            $this->setHeader($name, $value);
        }

        $this->body = $body;
    }

    public function setHeader(string $name, $value): void
    {
        $this->headers[strtolower($name)] = $value;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}