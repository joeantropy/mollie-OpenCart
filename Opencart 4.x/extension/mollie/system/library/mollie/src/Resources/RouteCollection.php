<?php

namespace Mollie\Api\Resources;

class RouteCollection extends \Mollie\Api\Resources\ResourceCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'routes';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Route::class;
}
