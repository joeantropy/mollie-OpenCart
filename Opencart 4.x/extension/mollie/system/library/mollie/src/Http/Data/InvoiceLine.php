<?php

namespace Mollie\Api\Http\Data;

use Mollie\Api\Contracts\Resolvable;
class InvoiceLine implements Resolvable
{
    public string $description;
    public int $quantity;
    public string $vatRate;
    public \Mollie\Api\Http\Data\Money $unitPrice;
    public ?\Mollie\Api\Http\Data\Discount $discount;
    public function __construct(string $description, int $quantity, string $vatRate, \Mollie\Api\Http\Data\Money $unitPrice, ?\Mollie\Api\Http\Data\Discount $discount = null)
    {
        $this->description = $description;
        $this->quantity = $quantity;
        $this->vatRate = $vatRate;
        $this->unitPrice = $unitPrice;
        $this->discount = $discount;
    }
    public function toArray() : array
    {
        return ['description' => $this->description, 'quantity' => $this->quantity, 'vatRate' => $this->vatRate, 'unitPrice' => $this->unitPrice, 'discount' => $this->discount];
    }
}
