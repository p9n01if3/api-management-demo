<?php

namespace Http\RequestBuilder;

use Http\Message\Request;

interface RequestBuilderInterface
{
    public function build(): Request;
}