<?php

namespace Mollie\Api\Resources;

class BalanceCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'balances';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Balance::class;
}
