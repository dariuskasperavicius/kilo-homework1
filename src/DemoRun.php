<?php

declare(strict_types=1);

namespace App;

use App\Kata1\Discount;
use App\Kata1\Price;
use App\Kata1\Shipping;
use App\Kata2\PriceCalculator;
use App\Kata2\PriceCalculatorInterface;
use App\Kata3\DiscountStrategy;
use App\Kata4\DPDPriceCalculatorAdapter;
use App\Kata4\DpdShippingProvider;

class DemoRun
{
    private bool $isTuesday = false;

    public function kata1()
    {
        // shipping = 8;
        // discount = 20;
        // new Price(100);

        return (new Shipping(8, new Discount(20, new Price(100))))->cost();
    }

    public function kata2(PriceCalculatorInterface $calculator)
    {
        return $calculator->calculate(100, 20, 8);
    }

    public function kata3()
    {
        return (new DiscountStrategy($this->isTuesday()))->calculate(100, 20, 8);
    }

    public function kata4(string $providerName)
    {
        $priceCalculator = new PriceCalculator();
        if ($providerName === 'dpd') {
            $priceCalculator = new DPDPriceCalculatorAdapter(new DpdShippingProvider());
        }
        return $priceCalculator->calculate(100, 20, 8);
    }

    /**
     * @return bool
     */
    public function isTuesday(): bool
    {
        return $this->isTuesday;
    }

    /**
     * @param bool $isTuesday
     */
    public function setIsTuesday(bool $isTuesday): void
    {
        $this->isTuesday = $isTuesday;
    }
}
