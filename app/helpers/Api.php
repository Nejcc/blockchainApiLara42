<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Redirect;

class Api
{
    private $client;

    /**
     * Api constructor.
     */
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * @param $url
     * @param bool $errorMessage
     * @return \Psr\Http\Message\StreamInterface
     */
    public function get($url, $customErrorMessage = false)
    {
        try {
            $response = $this->client->request('GET', $url);
            $response->getHeaderLine('content-type:application/json');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            if ($customErrorMessage) {
                return Redirect::route('home')->with('message', $customErrorMessage);
            }

            return Redirect::route('home')->with('message', $e->getMessage());
        }

        return json_decode($response->getBody());
    }

}