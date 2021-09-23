<?php

namespace Yproximite\IovoxBundle\Api;

use Yproximite\IovoxBundle\Api\QueryParameter\QueryParameterInterface;
use Yproximite\IovoxBundle\Exception\Api\InvalidQueryParameterException;
use Yproximite\IovoxBundle\Exception\Api\MandatoryQueryParameterException;

class Query
{
    /**
     * @param array<string, string|int> $queryParameters
     */
    public function __construct(public string $method, public string $endpoint, private array $queryParameters = [])
    {
    }

    /**
     * @param string|int $queryParameter
     */
    public function addQueryParameter($queryParameter, QueryParameterInterface $queryParameterConfig): void
    {
        if (!$queryParameterConfig->isValid($queryParameter)) {
            throw new InvalidQueryParameterException($queryParameter, $queryParameterConfig);
        }

        $this->queryParameters[$queryParameterConfig->getName()] = $queryParameter;
    }

    public function addDefaultQueryParameter(QueryParameterInterface $queryParameter): void
    {
        if (!$queryParameter->isMandatory()) {
            return;
        }

        if (array_key_exists($queryParameter->getName(), $this->queryParameters)) {
            return;
        }

        if (null === $queryParameter->getDefaultValue()) {
            throw new MandatoryQueryParameterException($queryParameter);
        }

        $this->queryParameters[$queryParameter->getName()] = $queryParameter->getDefaultValue();
    }

    /**
     * @return array<string, string|int>
     */
    public function getQueryParameters(): array
    {
        return $this->queryParameters;
    }
}
