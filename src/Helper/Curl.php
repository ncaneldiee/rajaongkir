<?php
namespace Ncaneldiee\Rajaongkir\Helper;

class Curl
{
    /**
     * Create an HTTP GET request to a url.
     *
     * @param  string  $url
     * @param  array  $parameter
     * @param  array  $option
     * @return object
     */
    public static function get($url, array $parameter = [], array $option = [])
    {
        return self::request($url, 'GET', $parameter, $option);
    }

    /**
     * Create an HTTP POST request to a url.
     *
     * @param  string  $url
     * @param  array  $parameter
     * @param  array  $option
     * @return object
     */
    public static function post($url, array $parameter = [], array $option = [])
    {
        return self::request($url, 'POST', $parameter, $option);
    }

    /**
     * Create an HTTP request of the specified method to a url.
     *
     * @param  string  $url
     * @param  string  $method
     * @param  array  $parameter
     * @param  array  $option
     * @return object
     */
    public static function request($url, $method = 'GET', array $parameter = [], array $option = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HEADER => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_AUTOREFERER => true,
            CURLOPT_FOLLOWLOCATION => true,
        ]);

        if (isset($option[CURLOPT_CONNECTTIMEOUT])) {
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $option[CURLOPT_CONNECTTIMEOUT]);
        }

        if (isset($option[CURLOPT_TIMEOUT])) {
            curl_setopt($curl, CURLOPT_TIMEOUT, $option[CURLOPT_TIMEOUT]);
        }

        $query = empty($parameter) ? '' : http_build_query($parameter, '', '&');

        switch ($method) {
            case 'GET':
                if ($query) {
                    $url .= '?' . $query;
                }

                curl_setopt($curl, CURLOPT_HTTPGET, true);

                break;
            case 'POST':
                if ($query) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
                }

                if (isset($option[CURLOPT_HTTPHEADER]) && is_array($option[CURLOPT_HTTPHEADER])) {
                    $option[CURLOPT_HTTPHEADER] = array_merge($option[CURLOPT_HTTPHEADER], [
                        'content-type: application/x-www-form-urlencoded',
                    ]);
                } else {
                    $option[CURLOPT_HTTPHEADER] = [
                        'content-type: application/x-www-form-urlencoded',
                    ];
                }

                curl_setopt($curl, CURLOPT_POST, true);

                break;
            default:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

                break;
        }

        if (!empty($option)) {
            curl_setopt_array($curl, $option);
        }

        curl_setopt($curl, CURLOPT_URL, $url);

        $body = curl_exec($curl);

        if (false === $body) {
            $error = curl_error($curl);
            $code = curl_errno($curl);

            curl_close($curl);
        }

        $header = (object) curl_getinfo($curl);

        curl_close($curl);

        if (mb_strpos($header->content_type, 'application/json') !== false) {
            $body = mb_substr($body, $header->header_size);
            $body = json_decode($body);
        }

        return (object) [
            'header' => $header,
            'body' => $body,
        ];
    }
}
