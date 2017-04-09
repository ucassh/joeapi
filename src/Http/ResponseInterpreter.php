<?php

namespace Joe\Http;

interface ResponseInterpreter
{
    public function process(Response $response);
}