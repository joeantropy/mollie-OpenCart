<?php

namespace Mollie\Api\Factories;

use Mollie\Api\Http\Data\DataCollection;
class OrderLineCollectionFactory extends \Mollie\Api\Factories\Factory
{
    public function create() : DataCollection
    {
        return new DataCollection(\array_map(fn($item) => \Mollie\Api\Factories\OrderLineFactory::new($item)->create(), $this->get()));
    }
}
