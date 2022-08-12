<?php

namespace App\Trading\Bots\Pricing;

class BinancePriceCollection extends PriceCollection
{
    public function __construct(string $ticker, Interval $interval, array $prices, array $times)
    {
        parent::__construct('binance', $ticker, $interval, $prices, $times);
    }

    /**
     * @return float[]
     */
    protected function createPrices(): array
    {
        return array_map(function ($item) {
            return (float)$item[4]; // Close
        }, $this->items);
    }
}
