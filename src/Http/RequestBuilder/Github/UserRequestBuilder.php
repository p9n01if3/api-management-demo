<?php

namespace Http\RequestBuilder\Github;

use Http\RequestBuilder\RequestBuilderInterface;

use Http\Message\Request;

class UserRequestBuilder implements RequestBuilderInterface
{
    private string $username;

    public function setUsernane(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function build(): Request
    {
        $uri = sprintf("https://api.github.com/users/%s", $this->username);

        return new Request($uri, "GET", ["Accept" => "application/vnd.github.v3+json"]);
    }
}