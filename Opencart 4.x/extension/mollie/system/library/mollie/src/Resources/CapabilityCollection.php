<?php

namespace Mollie\Api\Resources;

class CapabilityCollection extends \Mollie\Api\Resources\ResourceCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'capabilities';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Capability::class;
}
