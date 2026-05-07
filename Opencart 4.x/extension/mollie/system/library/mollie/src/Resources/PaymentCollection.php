<?php

namespace Mollie\Api\Resources;

class PaymentCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'payments';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Payment::class;
}
