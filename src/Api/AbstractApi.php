<?php

namespace Yproximite\IovoxBundle\Api;

use Yproximite\IovoxBundle\Api\QueryParameter\QueryParameterInterface;
use Yproximite\IovoxBundle\Client;

abstract class AbstractApi
{
    protected string $method;
    protected string $endpoint;
    /** @var array<string, QueryParameterInterface> */
    protected array $editableQueryParameters;
    /** @var array<string, QueryParameterInterface> */
    protected array $allQueryParameters;

    public function __construct(protected Client $client)
    {
        $this->setMethod();
        $this->setEndpoint();
        $this->setQueryParameters();
    }

    protected abstract function setMethod(): void;

    protected abstract function setEndpoint(): void;

    protected abstract function setQueryParameters(): void;
}
