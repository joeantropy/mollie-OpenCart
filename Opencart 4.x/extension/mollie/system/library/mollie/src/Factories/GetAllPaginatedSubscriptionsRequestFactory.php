<?php

namespace Mollie\Api\Factories;

use Mollie\Api\Http\Requests\GetAllPaginatedSubscriptionsRequest;
class GetAllPaginatedSubscriptionsRequestFactory extends \Mollie\Api\Factories\RequestFactory
{
    public function create() : GetAllPaginatedSubscriptionsRequest
    {
        return new GetAllPaginatedSubscriptionsRequest($this->query('limit'), $this->query('from'), $this->query('profileId'));
    }
}
