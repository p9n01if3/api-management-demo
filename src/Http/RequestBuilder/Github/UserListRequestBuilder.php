<?php

namespace Http\RequestBuilder\Github;

use Http\RequestBuilder\RequestBuilderInterface;

use Http\Message\Request;

class UserListRequestBuilder implements RequestBuilderInterface
{
    private array $query_data = [];

    public function setUserId(int $user_id): self
    {
        $this->query_data["since"] = $user_id;
        return $this;
    }

    public function setPerPage(int $per_page): self
    {
        $this->query_data["per_page"] = $per_page;
        return $this;
    }

    public function build(): Request
    {
        $uri = "https://api.github.com/users";

        if (!empty($this->query_data)) {
            $uri .= sprintf("?%s",  http_build_query($this->query_data));
        }
        
        return new Request($uri, "GET", ["Accept" => "application/vnd.github.v3+json"]);
    }
}