<?php

namespace Mollie\Api\Resources;

use Mollie\Api\Config;
use Mollie\Api\Contracts\IsIteratable;
use Mollie\Api\Contracts\IsWrapper;
use Mollie\Api\Http\Request;
use Mollie\Api\Http\Requests\ResourceHydratableRequest;
use Mollie\Api\Http\Response;
use Mollie\Api\Utils\Str;
class ResourceResolver
{
    private \Mollie\Api\Resources\ResourceHydrator $hydrator;
    public function __construct(\Mollie\Api\Resources\ResourceHydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }
    /**
     * Resolve a response into the appropriate resource type.
     *
     * @return Response|BaseResource|BaseCollection|LazyCollection|IsWrapper
     */
    public function resolve(ResourceHydratableRequest $request, Response $response)
    {
        $targetResourceClass = $request->getHydratableResource();
        if ($targetResourceClass instanceof \Mollie\Api\Resources\WrapperResource) {
            $response = $this->resolve($request->resetHydratableResource(), $response);
            return \Mollie\Api\Resources\ResourceFactory::createDecoratedResource($response, $targetResourceClass->getWrapper());
        }
        if ($this->isCollectionTarget($targetResourceClass)) {
            $collection = $this->resolveCollection($response, $targetResourceClass);
            return $this->unwrapIterator($request, $collection);
        }
        if ($this->isResourceTarget($targetResourceClass)) {
            $resource = \Mollie\Api\Resources\ResourceFactory::create($response->getConnector(), $targetResourceClass);
            return $this->hydrator->hydrate($resource, $response->json(), $response);
        }
        return $response;
    }
    /**
     * @param Response $response
     * @param class-string<ResourceCollection> $targetCollectionClass
     * @return BaseCollection
     */
    private function resolveCollection(Response $response, string $targetCollectionClass) : \Mollie\Api\Resources\BaseCollection
    {
        $result = $response->json();
        $collection = \Mollie\Api\Resources\ResourceFactory::createCollection($response->getConnector(), $targetCollectionClass);
        $kebabCollectionKey = Config::resourceRegistry()->pluralOf($targetCollectionClass::getResourceClass());
        $data = isset($result->_embedded->{$kebabCollectionKey}) ? $result->_embedded->{$kebabCollectionKey} : $result->_embedded->{Str::snake($kebabCollectionKey)};
        return $this->hydrator->hydrateCollection($collection, $data, $response, $result->_links);
    }
    private function unwrapIterator(Request $request, \Mollie\Api\Resources\BaseCollection $collection)
    {
        if ($request instanceof IsIteratable && $request->iteratorEnabled()) {
            /** @var CursorCollection $collection */
            return $collection->getAutoIterator($request->iteratesBackwards());
        }
        return $collection;
    }
    private function isCollectionTarget(string $targetResourceClass) : bool
    {
        return \is_subclass_of($targetResourceClass, \Mollie\Api\Resources\BaseCollection::class);
    }
    private function isResourceTarget(string $targetResourceClass) : bool
    {
        return \is_subclass_of($targetResourceClass, \Mollie\Api\Resources\BaseResource::class);
    }
}
