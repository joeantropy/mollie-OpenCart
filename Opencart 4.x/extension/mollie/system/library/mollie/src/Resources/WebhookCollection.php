<?php

namespace Mollie\Api\Resources;

class WebhookCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'webhooks';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Webhook::class;
}
