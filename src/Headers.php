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
            if (is_array($headers)) {
                $headers = array_change_key_case($headers);
            } else {
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

        $lower_name = strtolower($name);

        if (isset(static::$headers[$lower_name])) {
            return static::$headers[$lower_name];
        }

        if (func_num_args() > 1) {
            return $default;
        }

        return static::DEFAULTS[$lower_name] ?? static::DEFAULTS[$name] ?? static::DEFAULT;
    }

    public static function flush()
    {
        static::$headers = null;
    }
}