<?php

namespace Mollie\Api\Exceptions;

use MollieVendor\Psr\Http\Client\ClientExceptionInterface;
abstract class MollieException extends \Exception implements ClientExceptionInterface
{
}
