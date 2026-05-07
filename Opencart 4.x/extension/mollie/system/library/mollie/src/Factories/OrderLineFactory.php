<?php

namespace Mollie\Api\Factories;

use Mollie\Api\Http\Data\OrderLine;
class OrderLineFactory extends \Mollie\Api\Factories\Factory
{
    public function create() : OrderLine
    {
        return new OrderLine($this->get('description'), $this->get('quantity'), \Mollie\Api\Factories\MoneyFactory::new($this->get('unitPrice'))->create(), \Mollie\Api\Factories\MoneyFactory::new($this->get('totalAmount'))->create(), $this->get('type'), $this->get('quantityUnit'), $this->transformIfNotNull('discountAmount', fn(array $item) => \Mollie\Api\Factories\MoneyFactory::new($item)->create()), $this->transformIfNotNull('recurring', fn(array $item) => \Mollie\Api\Factories\RecurringBillingCycleFactory::new($item)->create()), $this->get('vatRate'), $this->transformIfNotNull('vatAmount', fn(array $item) => \Mollie\Api\Factories\MoneyFactory::new($item)->create()), $this->get('sku'), $this->get('imageUrl'), $this->get('productUrl'));
    }
}
