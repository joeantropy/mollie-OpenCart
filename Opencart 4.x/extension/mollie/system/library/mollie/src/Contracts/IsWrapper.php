<?php

namespace Mollie\Api\Contracts;

use Mollie\Api\Http\Response;
use Mollie\Api\Resources\BaseCollection;
use Mollie\Api\Resources\BaseResource;
use Mollie\Api\Resources\LazyCollection;
interface IsWrapper extends \Mollie\Api\Contracts\ViableResponse
{
    /**
     * @param  Response|BaseResource|BaseCollection|LazyCollection  $resource
     */
    public static function fromResource($resource) : self;
}
