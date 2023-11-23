<?php

namespace App\Interfaces;

interface CryptocurrencyInterface {
    public function getMarkets(array $config) : array;
    public function getCoin($config) : object;
}