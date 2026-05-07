<?php

namespace Mollie\Api\Http\Data;

use DateTimeInterface;
class DateTime extends \Mollie\Api\Http\Data\Temporal
{
    protected function getFormat() : string
    {
        return DateTimeInterface::ATOM;
    }
}
