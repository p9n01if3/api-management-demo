<?php

namespace Http\Client;

class Factory
{
    public function getClient(): ClientInterface
    {
        return new GuzzleClient;
    }
}