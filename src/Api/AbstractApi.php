<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api;

use Yproximite\IovoxBundle\Api\ErrorResult\ErrorResultInterface;
use Yproximite\IovoxBundle\Api\QueryParameter\QueryParameterInterface;
use Yproximite\IovoxBundle\Client;
use Yproximite\IovoxBundle\Exception\Api\BadQueryParameterException;

abstract class AbstractApi
{
    protected string $method;
    protected string $endpoint;
    /** @var array<string, QueryParameterInterface> */
    protected array $editableQueryParameters;
    /** @var array<string, QueryParameterInterface> */
    protected array $allQueryParameters;
    /** @var array<int, ErrorResultInterface> */
    protected array $errorResults;

    public function __construct(protected Client $client)
    {
        $this->setMethod();
        $this->setEndpoint();
        $this->setQueryParameters();
        $this->setErrorResults();
    }

    /**
     * @param array<string, string|int|array<int|string, mixed>> $queryParameters
     */
    protected function createQuery(array $queryParameters = []): Query
    {
        $query = new Query($this->method, $this->endpoint);
        foreach ($queryParameters as $key => $queryParameter) {
            if (!\array_key_exists($key, $this->editableQueryParameters)) {
                throw new BadQueryParameterException($key, array_keys($this->editableQueryParameters));
            }

            $query->addQueryParameter($queryParameter, $this->editableQueryParameters[$key]);
        }

        foreach ($this->allQueryParameters as $queryParameter) {
            $query->addDefaultQueryParameter($queryParameter);
        }

        return $query;
    }

    abstract protected function setMethod(): void;

    abstract protected function setEndpoint(): void;

    abstract protected function setQueryParameters(): void;

    abstract protected function setErrorResults(): void;
}
