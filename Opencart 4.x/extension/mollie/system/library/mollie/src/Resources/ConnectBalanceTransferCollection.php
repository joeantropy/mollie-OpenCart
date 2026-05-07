<?php

namespace Mollie\Api\Resources;

class ConnectBalanceTransferCollection extends \Mollie\Api\Resources\CursorCollection
{
    /**
     * The name of the collection resource in Mollie's API.
     */
    public static string $collectionName = 'connect_balance_transfers';
    /**
     * Resource class name.
     */
    public static string $resource = \Mollie\Api\Resources\ConnectBalanceTransfer::class;
}
