<?php

namespace Mollie\Api\Contracts;

interface HasPayload
{
    public function payload() : \Mollie\Api\Contracts\PayloadRepository;
}
