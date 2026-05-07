<?php

namespace Mollie\Api\Factories;

use Mollie\Api\Http\Requests\CreatePaymentRefundRequest;
class CreatePaymentRefundRequestFactory extends \Mollie\Api\Factories\RequestFactory
{
    private string $paymentId;
    public function __construct(string $paymentId)
    {
        $this->paymentId = $paymentId;
    }
    public function create() : CreatePaymentRefundRequest
    {
        return new CreatePaymentRefundRequest($this->paymentId, $this->payload('description', ''), \Mollie\Api\Factories\MoneyFactory::new($this->payload('amount'))->create(), $this->payload('metadata'), $this->payload('reverseRouting'), $this->transformFromPayload('routingReversals', fn($items) => \Mollie\Api\Factories\RefundRouteCollectionFactory::new($items)->create()));
    }
}
