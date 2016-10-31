<?php
namespace Ncaneldiee\Rajaongkir\Helper;

class Json
{
    /**
     * Decode the given JSON back into an array or object.
     *
     * @param  string  $value
     * @param  bool  $assoc
     * @return mixed
     */
    public static function decode($value, $assoc = false)
    {
        return json_decode($value, $assoc);
    }

    /**
     * Encode the given value as JSON.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function encode($value)
    {
        return json_encode($value);
    }
}
