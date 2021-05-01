<?php

namespace Http\Client;

use GuzzleHttp\Client;

use Http\Message\Request;
use Http\Message\Response;

class GuzzleClient implements ClientInterface
{
    public function send(Request $request): Response
    {
        $options = array_filter([
            "headers" => $request->getHeaders(),
            "body" => $request->getBody()
        ]);

        $client = new Client();
        $response = $client->request($request->getMethod(), $request->getUri(), $options);

        return new Response($response->getStatusCode(), $response->getHeaders(), $response->getBody());
    }
}