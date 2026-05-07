<?php

namespace Mollie\Api\Contracts;

use Mollie\Api\Http\Response;
interface IsResponseAware extends \Mollie\Api\Contracts\ViableResponse
{
    public function getResponse() : Response;
    /**
     * @return $this
     */
    public function setResponse(Response $response);
}
