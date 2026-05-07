<?php

namespace Mollie\Api\Resources;

class CustomerCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'customers';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Customer::class;
}
