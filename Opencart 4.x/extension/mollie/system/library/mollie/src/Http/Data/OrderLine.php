<?php

namespace Mollie\Api\Http\Data;

use Mollie\Api\Contracts\Resolvable;
class OrderLine implements Resolvable
{
    public string $description;
    public int $quantity;
    public \Mollie\Api\Http\Data\Money $unitPrice;
    public \Mollie\Api\Http\Data\Money $totalAmount;
    public ?string $type;
    public ?string $quantityUnit;
    public ?\Mollie\Api\Http\Data\Money $discountAmount;
    public ?\Mollie\Api\Http\Data\RecurringBillingCycle $recurring;
    public ?string $vatRate;
    public ?\Mollie\Api\Http\Data\Money $vatAmount;
    public ?string $sku;
    public ?string $imageUrl;
    public ?string $productUrl;
    public function __construct(string $description, int $quantity, \Mollie\Api\Http\Data\Money $unitPrice, \Mollie\Api\Http\Data\Money $totalAmount, ?string $type = null, ?string $quantityUnit = null, ?\Mollie\Api\Http\Data\Money $discountAmount = null, ?\Mollie\Api\Http\Data\RecurringBillingCycle $recurring = null, ?string $vatRate = null, ?\Mollie\Api\Http\Data\Money $vatAmount = null, ?string $sku = null, ?string $imageUrl = null, ?string $productUrl = null)
    {
        $this->description = $description;
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;
        $this->totalAmount = $totalAmount;
        $this->type = $type;
        $this->quantityUnit = $quantityUnit;
        $this->discountAmount = $discountAmount;
        $this->recurring = $recurring;
        $this->vatRate = $vatRate;
        $this->vatAmount = $vatAmount;
        $this->sku = $sku;
        $this->imageUrl = $imageUrl;
        $this->productUrl = $productUrl;
    }
    public function toArray() : array
    {
        return ['description' => $this->description, 'quantity' => $this->quantity, 'unitPrice' => $this->unitPrice, 'totalAmount' => $this->totalAmount, 'type' => $this->type, 'quantityUnit' => $this->quantityUnit, 'discountAmount' => $this->discountAmount, 'recurring' => $this->recurring, 'vatRate' => $this->vatRate, 'vatAmount' => $this->vatAmount, 'sku' => $this->sku, 'imageUrl' => $this->imageUrl, 'productUrl' => $this->productUrl];
    }
}
