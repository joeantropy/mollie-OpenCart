<?php

namespace Mollie\Api\Factories;

use Mollie\Api\Http\Data\ApplicationFee;
class ApplicationFeeFactory extends \Mollie\Api\Factories\Factory
{
    public function create() : ApplicationFee
    {
        return new ApplicationFee(\Mollie\Api\Factories\MoneyFactory::new($this->get('amount'))->create(), $this->get('description'));
    }
}
