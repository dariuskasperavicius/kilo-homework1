<?php

declare(strict_types=1);

namespace App\Kata1;

class Discount implements CostInterface
{
    public function __construct(private float $discount, private CostInterface $baseCost)
    {
    }

    public function cost()
    {
        return (1 - ($this->discount / 100)) * $this->baseCost->cost();
    }
}
