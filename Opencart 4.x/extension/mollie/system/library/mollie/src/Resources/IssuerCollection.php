<?php

namespace Mollie\Api\Resources;

class IssuerCollection extends \Mollie\Api\Resources\ResourceCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'issuers';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Issuer::class;
}
