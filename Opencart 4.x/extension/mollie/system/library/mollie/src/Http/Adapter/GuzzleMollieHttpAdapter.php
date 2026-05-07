<?php

namespace Mollie\Api\Http\Adapter;

use MollieVendor\Composer\CaBundle\CaBundle;
use MollieVendor\GuzzleHttp\Client;
use MollieVendor\GuzzleHttp\ClientInterface;
use MollieVendor\GuzzleHttp\Exception\ConnectException;
use MollieVendor\GuzzleHttp\Exception\RequestException;
use MollieVendor\GuzzleHttp\Exception\TooManyRedirectsException;
use MollieVendor\GuzzleHttp\HandlerStack;
use MollieVendor\GuzzleHttp\Psr7\HttpFactory;
use MollieVendor\GuzzleHttp\RequestOptions;
use Mollie\Api\Contracts\HttpAdapterContract;
use Mollie\Api\Exceptions\NetworkRequestException;
use Mollie\Api\Exceptions\RetryableNetworkRequestException;
use Mollie\Api\Http\PendingRequest;
use Mollie\Api\Http\Response;
use Mollie\Api\Utils\Factories;
use MollieVendor\Psr\Http\Message\RequestInterface;
use MollieVendor\Psr\Http\Message\ResponseInterface;
use Throwable;
final class GuzzleMollieHttpAdapter implements HttpAdapterContract
{
    /**
     * Default response timeout (in seconds).
     */
    public const DEFAULT_TIMEOUT = 10;
    /**
     * Default connect timeout (in seconds).
     */
    public const DEFAULT_CONNECT_TIMEOUT = 2;
    protected ClientInterface $httpClient;
    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    public function factories() : Factories
    {
        $factory = new HttpFactory();
        return new Factories($factory, $factory, $factory, $factory);
    }
    /**
     * Create a preconfigured Guzzle adapter.
     */
    public static function createClient() : self
    {
        $handlerStack = HandlerStack::create();
        $client = new Client([RequestOptions::VERIFY => CaBundle::getBundledCaBundlePath(), RequestOptions::TIMEOUT => self::DEFAULT_TIMEOUT, RequestOptions::CONNECT_TIMEOUT => self::DEFAULT_CONNECT_TIMEOUT, RequestOptions::HTTP_ERRORS => \false, 'handler' => $handlerStack]);
        return new \Mollie\Api\Http\Adapter\GuzzleMollieHttpAdapter($client);
    }
    /**
     * @throws NetworkRequestException
     * @throws RetryableNetworkRequestException
     */
    public function sendRequest(PendingRequest $pendingRequest) : Response
    {
        $request = $pendingRequest->createPsrRequest();
        try {
            $response = $this->httpClient->send($request);
            return $this->createResponse($response, $request, $pendingRequest);
        } catch (ConnectException $e) {
            throw new RetryableNetworkRequestException($pendingRequest, $e->getMessage());
        } catch (TooManyRedirectsException $e) {
            throw new NetworkRequestException($pendingRequest, $e, $e->getMessage());
        } catch (RequestException $e) {
            if ($response = $e->getResponse()) {
                return $this->createResponse($response, $request, $pendingRequest, $e);
            }
            throw new RetryableNetworkRequestException($pendingRequest, $e->getMessage());
        }
    }
    protected function createResponse(ResponseInterface $psrResponse, RequestInterface $psrRequest, PendingRequest $pendingRequest, ?Throwable $exception = null) : Response
    {
        return new Response($psrResponse, $psrRequest, $pendingRequest, $exception);
    }
    public function version() : string
    {
        return 'Guzzle/' . ClientInterface::MAJOR_VERSION;
    }
}
