<?php

namespace Joe\Http;

interface Response
{
    public function getBody();
    public function getHeaders();
    public function getStatusCode();
}