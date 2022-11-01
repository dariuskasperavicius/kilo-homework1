<?php

declare(strict_types=1);

namespace App\Kata3;

use App\Kata2\FreeShippingCalculator;
use App\Kata2\PriceCalculator;
use App\Kata2\PriceCalculatorInterface;

class DiscountStrategy implements PriceCalculatorInterface
{
    public function __construct(private bool $isTuesday)
    {
    }

    public function calculate(float $price, float $discount, float $tax)
    {
        $priceCalculator = new PriceCalculator();
        if ($this->isTuesday) {
            $priceCalculator = new FreeShippingCalculator();
        }

        return $priceCalculator->calculate($price, $discount, $tax);
    }
}
