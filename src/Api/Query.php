<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api;

use Yproximite\IovoxBundle\Api\QueryParameter\QueryParameterInterface;
use Yproximite\IovoxBundle\Exception\Api\InvalidQueryParameterException;
use Yproximite\IovoxBundle\Exception\Api\MandatoryQueryParameterException;

class Query
{
    /**
     * @param array<string, array|string|int> $queryParameters
     */
    public function __construct(public string $method, public string $endpoint, private array $queryParameters = [], private ?string $content = null)
    {
    }

    /**
     * @param string|int|array<int|string, mixed> $queryParameter
     */
    public function addQueryParameter(string|int|array $queryParameter, QueryParameterInterface $queryParameterConfig): void
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
     * @return array<string, array|string|int>
     */
    public function getQueryParameters(): array
    {
        return $this->queryParameters;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }
}
