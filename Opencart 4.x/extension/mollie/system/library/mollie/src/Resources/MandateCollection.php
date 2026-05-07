<?php

namespace Mollie\Api\Resources;

class MandateCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'mandates';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Mandate::class;
    /**
     * @param  string  $status
     */
    public function whereStatus($status) : self
    {
        return $this->filter(fn(\Mollie\Api\Resources\Mandate $mandate) => $mandate->status === $status);
    }
}
