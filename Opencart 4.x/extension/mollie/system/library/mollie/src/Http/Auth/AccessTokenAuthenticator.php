<?php

namespace Mollie\Api\Http\Auth;

use Mollie\Api\Exceptions\InvalidAuthenticationException;
class AccessTokenAuthenticator extends \Mollie\Api\Http\Auth\BearerTokenAuthenticator
{
    public function __construct(string $token)
    {
        if (!\Mollie\Api\Http\Auth\TokenValidator::isAccessToken($token)) {
            throw new InvalidAuthenticationException($token, "Invalid OAuth access token. An access token must start with 'access_'.");
        }
        parent::__construct($token);
    }
}
