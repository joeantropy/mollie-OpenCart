<?php

namespace Mollie\Api\Resources;

class MethodCollection extends \Mollie\Api\Resources\ResourceCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'methods';
    public static string $resource = \Mollie\Api\Resources\Method::class;
}
