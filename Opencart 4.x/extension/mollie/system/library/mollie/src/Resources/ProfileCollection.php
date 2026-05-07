<?php

namespace Mollie\Api\Resources;

class ProfileCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'profiles';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Profile::class;
}
