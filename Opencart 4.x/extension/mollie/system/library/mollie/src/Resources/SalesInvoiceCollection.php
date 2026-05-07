<?php

namespace Mollie\Api\Resources;

class SalesInvoiceCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'sales_invoices';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\SalesInvoice::class;
}
