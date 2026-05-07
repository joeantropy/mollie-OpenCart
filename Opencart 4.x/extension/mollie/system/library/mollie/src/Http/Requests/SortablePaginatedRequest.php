<?php

namespace Mollie\Api\Http\Requests;

abstract class SortablePaginatedRequest extends \Mollie\Api\Http\Requests\PaginatedRequest
{
    public function __construct(?string $from = null, ?int $limit = null, ?string $sort = null)
    {
        parent::__construct($from, $limit);
        $this->query()->add('sort', $sort);
    }
}
