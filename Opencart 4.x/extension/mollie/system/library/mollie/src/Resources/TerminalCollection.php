<?php

namespace Mollie\Api\Resources;

class TerminalCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'terminals';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\Terminal::class;
}
