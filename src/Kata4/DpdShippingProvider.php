<?php

declare(strict_types=1);

namespace App\Kata4;

/**
 * Do not edit this class. Just use it in Shipping calculations if users selects DPD.
 */
class DpdShippingProvider
{
    public function ourCost(): float
    {
        return 4;
    }
}
