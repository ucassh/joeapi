<?php

namespace Joe;

use Joe\Http\GuzzleClient;
use Joe\Http\GuzzleReques;
use Joe\Http\Client;

class Connection
{
    const ADDRESS = 'http://joemonster.org';

    /** @var  Client */
    private static $httpClient;


    /**
     * @param $login
     * @param $password
     * @return Client
     */
    public static function login($login, $password)
    {
        Connection::$httpClient = new GuzzleClient();

        Connection::$httpClient->request('HEAD', Connection::ADDRESS . '/logowanie', ['headers' => []]);

        Connection::$httpClient->request('POST', 'https://joemonster.org/login_check', [
            'form_params' => [
                '_username' => $login,
                '_password' => $password,
                'op' => 'login'
            ],
        ]);

        return Connection::$httpClient;
    }

    public static function client(array $config = [])
    {
        return isset(Connection::$httpClient)
            ? Connection::$httpClient
            : new GuzzleClient($config);
    }

}