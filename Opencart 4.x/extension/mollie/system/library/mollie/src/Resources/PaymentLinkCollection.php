<?php

namespace Mollie\Api\Resources;

class PaymentLinkCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'payment_links';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\PaymentLink::class;
}
