<?php

namespace Joe\Http;


class GuzzleResponse implements Response
{
    private $body;
    private $headers;
    private $statusCode;

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }


    /**
     * @param mixed $body
     * @return GuzzleResponse
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param mixed $headers
     * @return GuzzleResponse
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @param mixed $statusCode
     * @return GuzzleResponse
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
}