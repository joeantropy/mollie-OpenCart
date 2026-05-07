<?php

namespace Mollie\Api\Resources;

class InvoiceCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'invoices';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Invoice::class;
}
