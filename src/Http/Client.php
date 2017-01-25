<?php

namespace Joe\Http;

interface Client
{

    public function __construct(array $options = []);

    /**
     * @param $method
     * @param $url
     * @param $options
     * @return Response
     */
    public function request($method, $url, array $options = []);
}