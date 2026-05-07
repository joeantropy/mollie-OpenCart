<?php

namespace Mollie\Api\Resources;

class PermissionCollection extends \Mollie\Api\Resources\ResourceCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'permissions';
    public static string $resource = \Mollie\Api\Resources\Permission::class;
}
