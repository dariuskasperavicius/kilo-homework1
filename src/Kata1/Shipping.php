<?php

declare(strict_types=1);

namespace App\Kata1;

class Shipping implements CostInterface
{
    private float $shipping;
    private CostInterface $baseCost;

    /**
     * @param float $shipping
     * @param CostInterface $baseCost
     */
    public function __construct(float $shipping, CostInterface $baseCost)
    {
        $this->shipping = $shipping;
        $this->baseCost = $baseCost;
    }

    public function cost()
    {
        return $this->baseCost->cost() + $this->shipping;
    }
}
