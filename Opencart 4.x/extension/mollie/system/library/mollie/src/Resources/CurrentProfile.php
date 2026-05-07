<?php

namespace Mollie\Api\Resources;

use Mollie\Api\Exceptions\ApiException;
class CurrentProfile extends \Mollie\Api\Resources\Profile
{
    /**
     * Enable a payment method for this profile.
     *
     *
     * @throws ApiException
     */
    public function enableMethod(string $methodId) : \Mollie\Api\Resources\Method
    {
        return $this->connector->profileMethods->createForCurrentProfile($methodId);
    }
    /**
     * Disable a payment method for this profile.
     *
     *
     * @throws ApiException
     */
    public function disableMethod(string $methodId) : void
    {
        $this->connector->profileMethods->deleteForCurrentProfile($methodId);
    }
}
