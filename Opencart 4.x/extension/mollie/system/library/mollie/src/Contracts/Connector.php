<?php

namespace Mollie\Api\Contracts;

use Mollie\Api\Http\Middleware;
use Mollie\Api\Http\Request;
interface Connector extends \Mollie\Api\Contracts\Authenticatable, \Mollie\Api\Contracts\IdempotencyContract, \Mollie\Api\Contracts\SupportsDebuggingContract, \Mollie\Api\Contracts\Testable
{
    /**
     * @return mixed
     */
    public function send(Request $request);
    public function resolveBaseUrl() : string;
    public function headers() : \Mollie\Api\Contracts\Repository;
    public function query() : \Mollie\Api\Contracts\Repository;
    public function middleware() : Middleware;
    public function addVersionString($versionString) : self;
    public function getVersionStrings() : array;
    public function getHttpClient() : \Mollie\Api\Contracts\HttpAdapterContract;
}
