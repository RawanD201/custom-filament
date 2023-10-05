<?php
if (!function_exists('array_key_invoke')) {
    /**
     * Returns Invoked array key if exists, otherwise return null
     */
    function array_key_invoke(array $data, string $key): mixed
    {
        return array_key_exists($key, $data) ? $data[$key]() : null;
    }
}
