<?php

namespace Mollie\Api\Http\Requests;

use Mollie\Api\Contracts\IsIteratable;
use Mollie\Api\Contracts\SupportsTestmodeInQuery;
use Mollie\Api\Traits\IsIteratableRequest;
class DynamicPaginatedRequest extends \Mollie\Api\Http\Requests\DynamicGetRequest implements IsIteratable, SupportsTestmodeInQuery
{
    use IsIteratableRequest;
}
