<?php

namespace App\Facades;

use App\Services\DiscountService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed calculateDiscounts($order)
 */
class DiscountManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return DiscountService::class;
    }
}
