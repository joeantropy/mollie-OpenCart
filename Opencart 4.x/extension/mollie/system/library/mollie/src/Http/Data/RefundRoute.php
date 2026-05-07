<?php

namespace Mollie\Api\Http\Data;

use Mollie\Api\Contracts\Resolvable;
class RefundRoute implements Resolvable
{
    public \Mollie\Api\Http\Data\Money $amount;
    public string $organizationId;
    public function __construct(\Mollie\Api\Http\Data\Money $amount, string $organizationId)
    {
        $this->amount = $amount;
        $this->organizationId = $organizationId;
    }
    public function toArray() : array
    {
        return ['amount' => $this->amount, 'source' => ['type' => 'organization', 'organizationId' => $this->organizationId]];
    }
}
