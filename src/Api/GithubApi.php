<?php

namespace Api;

use Http\Client\ClientInterface;
use Http\Client\Factory;

use Http\RequestBuilder\Github\UserListRequestBuilder;
use Http\RequestBuilder\Github\UserRequestBuilder;

use Entity\User;

class GithubApi
{
    private ClientInterface $http_client;

    public function __construct()
    {
        $this->http_client = (new Factory)->getClient();
    }

    public function getUsers(int $user_id, int $per_page): array
    {
        $request = (new UserListRequestBuilder)
            ->setUserId($user_id)
            ->setPerPage($per_page)
            ->build();
        
        $response = $this->http_client->send($request);
        $body = json_decode($response->getBody(), true);

        return array_map(fn($data) => new User($data["id"], $data["login"]), $body);
    }

    public function getUser(string $username): User
    {
        $request = (new UserRequestBuilder)
            ->setUsernane($username)
            ->build();
        
        $response = $this->http_client->send($request);
        $body = json_decode($response->getBody(), true);

        return new User($body["id"], $body["login"]);
    }
}