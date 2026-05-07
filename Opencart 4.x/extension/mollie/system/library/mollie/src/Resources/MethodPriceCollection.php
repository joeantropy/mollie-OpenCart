<?php

namespace Mollie\Api\Resources;

class MethodPriceCollection extends \Mollie\Api\Resources\ResourceCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'prices';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\MethodPrice::class;
}
