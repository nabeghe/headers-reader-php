<?php namespace Nabeghe\HeadersReader;

class Headers
{
    public const DEFAULT = '';

    public const DEFAULTS = [];

    protected static ?array $headers;

    protected static function init()
    {
        if (!isset(static::$headers)) {
            $headers = getallheaders();
            if (!is_array($headers)) {
                $headers = [];
            }
            static::$headers = $headers;
        }
    }

    public static function all(): array
    {
        static::init();
        return static::$headers;
    }

    public static function get($name, $default = null)
    {
        static::init();

        if (isset(static::$headers[$name])) {
            return static::$headers[$name];
        }

        if (func_num_args() > 1) {
            return $default;
        }

        return static::DEFAULTS[$name] ?? static::DEFAULT;
    }

    public static function flush()
    {
        static::$headers = null;
    }
}