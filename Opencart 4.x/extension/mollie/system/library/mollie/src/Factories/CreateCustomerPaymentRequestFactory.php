<?php

namespace Mollie\Api\Factories;

use Mollie\Api\Http\Data\Address;
use Mollie\Api\Http\Requests\CreateCustomerPaymentRequest;
use Mollie\Api\Types\PaymentQuery;
use Mollie\Api\Utils\Utility;
class CreateCustomerPaymentRequestFactory extends \Mollie\Api\Factories\RequestFactory
{
    private string $customerId;
    public function __construct(string $customerId)
    {
        $this->customerId = $customerId;
    }
    public function create() : CreateCustomerPaymentRequest
    {
        $includeQrCode = $this->queryIncludes('include', PaymentQuery::INCLUDE_QR_CODE);
        return new CreateCustomerPaymentRequest($this->customerId, $this->payload('description'), \Mollie\Api\Factories\MoneyFactory::new($this->payload('amount'))->create(), $this->payload('redirectUrl'), $this->payload('cancelUrl'), $this->payload('webhookUrl'), $this->transformFromPayload('lines', fn($items) => \Mollie\Api\Factories\OrderLineCollectionFactory::new($items)->create()), $this->transformFromPayload('billingAddress', fn($item) => Address::fromArray($item)), $this->transformFromPayload('shippingAddress', fn($item) => Address::fromArray($item)), $this->payload('locale'), $this->payload('method'), $this->payload('issuer'), $this->payload('restrictPaymentMethodsToCountry'), $this->payload('metadata'), $this->payload('captureMode'), $this->payload('captureDelay'), $this->transformFromPayload('applicationFee', fn($item) => \Mollie\Api\Factories\ApplicationFeeFactory::new($item)->create()), $this->transformFromPayload('routing', fn($items) => \Mollie\Api\Factories\PaymentRouteCollectionFactory::new($items)->create()), $this->payload('sequenceType'), $this->payload('mandateId'), $this->payload('profileId'), ($this->payload('additional') ?: Utility::filterByProperties(CreateCustomerPaymentRequest::class, $this->payload())) ?: [], $this->query('includeQrCode', $includeQrCode));
    }
}
