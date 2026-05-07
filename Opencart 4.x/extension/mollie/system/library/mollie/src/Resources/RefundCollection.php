<?php

namespace Mollie\Api\Resources;

class RefundCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'refunds';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Refund::class;
}
