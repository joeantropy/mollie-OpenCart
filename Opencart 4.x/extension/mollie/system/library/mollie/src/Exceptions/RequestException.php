<?php

namespace Mollie\Api\Exceptions;

use Mollie\Api\Http\PendingRequest;
use Mollie\Api\Http\Response;
use MollieVendor\Psr\Http\Client\RequestExceptionInterface;
use MollieVendor\Psr\Http\Message\RequestInterface;
use Throwable;
class RequestException extends \Mollie\Api\Exceptions\MollieException implements RequestExceptionInterface
{
    protected Response $response;
    public function __construct(Response $response, ?string $message = null, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
    }
    public function getRequest() : RequestInterface
    {
        return $this->response->getPsrRequest();
    }
    public function getResponse() : Response
    {
        return $this->response;
    }
    public function getPendingRequest() : PendingRequest
    {
        return $this->response->getPendingRequest();
    }
    public function getStatusCode() : int
    {
        return $this->response->status();
    }
}
