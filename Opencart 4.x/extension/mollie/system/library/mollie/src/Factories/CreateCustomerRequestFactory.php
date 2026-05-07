<?php

namespace Mollie\Api\Factories;

use Mollie\Api\Http\Requests\CreateCustomerRequest;
class CreateCustomerRequestFactory extends \Mollie\Api\Factories\RequestFactory
{
    public function create() : CreateCustomerRequest
    {
        return new CreateCustomerRequest($this->payload('name'), $this->payload('email'), $this->payload('locale'), $this->payload('metadata'));
    }
}
