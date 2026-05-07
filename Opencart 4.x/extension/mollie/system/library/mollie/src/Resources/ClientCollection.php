<?php

namespace Mollie\Api\Resources;

class ClientCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'clients';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Client::class;
}
