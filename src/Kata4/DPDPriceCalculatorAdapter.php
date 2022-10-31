<?php

declare(strict_types=1);

namespace App\Kata4;

use App\Kata1\Discount;
use App\Kata1\Price;
use App\Kata1\Shipping;
use App\Kata2\PriceCalculatorInterface;

class DPDPriceCalculatorAdapter implements PriceCalculatorInterface
{
    public function __construct(private DpdShippingProvider $provider)
    {
    }

    public function calculate(float $price, float $discount, float $tax)
    {
        return (new Shipping($this->provider->ourCost(), new Discount($discount, new Price($price))))->cost();
    }
}
