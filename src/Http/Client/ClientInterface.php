<?php

namespace Http\Client;

use Http\Message\Request;
use Http\Message\Response;

interface ClientInterface
{
    public function send(Request $request): Response;
}