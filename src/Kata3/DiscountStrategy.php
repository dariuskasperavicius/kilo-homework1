<?php

declare(strict_types=1);

namespace App\Kata3;

use App\Kata2\PriceCalculatorInterface;

class DiscountStrategy implements PriceCalculatorInterface
{
    public function __construct(private PriceCalculatorInterface $priceCalculator)
    {
    }

    public function calculate(float $price, float $discount, float $tax)
    {
        $this->priceCalculator->calculate($price, $discount, $tax);
    }
}
