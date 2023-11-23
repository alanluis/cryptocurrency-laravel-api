<?php

namespace App\Implementations;

use App\Interfaces\CryptocurrencyInterface;
use Illuminate\Support\Facades\Http;
use Exception;

class CoinGeckoService implements CryptocurrencyInterface
{
    public function getMarkets(array $params): array
    {
        $response = Http::get(env('CRYPTO_API_URL') . 'coins/markets', $params);

        $body = json_decode($response->getBody(), true);

        if ($params['_key'] !== '') {
            $body = array_filter($body, function ($item) use ($params) {
                $key = preg_quote($params['_key'], '/');
                return preg_match("/" . $key . "/i", $item['name']) || preg_match("/" . $key . "/i", $item['id']);
            });
        }

        if ($response->status() !== 200) {
            throw new Exception($body['status']['error_message'], $response->status());
        }

        return $body;
    }

    public function getCoin($id): object
    {
        $response = Http::get(env('CRYPTO_API_URL') . 'coins/' . $id);

        $body = json_decode($response->getBody());

        if ($response->status() !== 200) {
            throw new Exception($body->status->error_message, $response->status());
        }

        return $body;
    }
}
