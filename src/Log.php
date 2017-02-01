<?php

namespace Joe;

use Katzgrau\KLogger\Logger;

class Log
{
    private static $logger = null;

    private static function createLogger()
    {
        Log::$logger = new Logger(__DIR__.'/logs');
    }

    /**
     * @return Logger
     */
    private static function logger()
    {
        if (!self::$logger) {
            self::createLogger();
        }

        return self::$logger;
    }

    public static function info($message, array $context = [])
    {
        self::logger()->info($message, $context);
    }

    public static function error($message, array $context = [])
    {
        self::logger()->error($message, $context);
    }

    public static function debug($message, array $context = [])
    {
        self::logger()->debug($message, $context);
    }

    public static function emergency($message, array $context = [])
    {
        self::logger()->emergency($message, $context);
    }

    public static function alert($message, array $context = [])
    {
        self::logger()->alert($message, $context);
    }

    public static function critical($message, array $context = [])
    {
        self::logger()->critical($message, $context);
    }

    public static function warning($message, array $context = [])
    {
        self::logger()->warning($message, $context);
    }

    public static function notice($message, array $context = [])
    {
        self::logger()->notice($message, $context);
    }
}