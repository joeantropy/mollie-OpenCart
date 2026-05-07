<?php

namespace Mollie\Api\Contracts;

use MollieVendor\Psr\Http\Message\StreamFactoryInterface;
use MollieVendor\Psr\Http\Message\StreamInterface;
interface PayloadRepository extends \Mollie\Api\Contracts\Repository
{
    /**
     * Convert the repository contents into a stream
     */
    public function toStream(StreamFactoryInterface $streamFactory) : StreamInterface;
}
