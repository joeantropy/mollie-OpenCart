<?php

namespace Mollie\Api\Factories;

use Mollie\Api\Http\Data\Address;
use Mollie\Api\Http\Requests\CreateSessionRequest;
class CreateSessionRequestFactory extends \Mollie\Api\Factories\RequestFactory
{
    public function create() : CreateSessionRequest
    {
        return new CreateSessionRequest(\Mollie\Api\Factories\MoneyFactory::new($this->payload('amount'))->create(), $this->payload('description'), $this->payload('redirectUrl'), $this->transformFromPayload('lines', fn($items) => \Mollie\Api\Factories\OrderLineCollectionFactory::new($items)->create()), $this->payload('cancelUrl'), $this->transformFromPayload('billingAddress', fn($item) => Address::fromArray($item)), $this->transformFromPayload('shippingAddress', fn($item) => Address::fromArray($item)), $this->payload('customerId'), $this->payload('sequenceType'), $this->payload('metadata'), $this->payload('webhookUrl', null, 'payment.'), $this->payload('profileId'));
    }
}
