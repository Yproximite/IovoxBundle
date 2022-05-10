<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model;

abstract class AbstractModel implements ModelInterface
{
    /**
     * @param array<int|string, mixed> $opts
     */
    abstract public static function create(array $opts): self;

    /**
     * @param array<string, mixed> $response
     *
     * @return array<int, mixed>
     */
    protected static function formatResult(array $response, bool $isFirstNode = true): array
    {
        $results = $response;
        if ($isFirstNode) {
            $results = $response['results']['result'] ?? [];
        }

        if ([] !== $results && !\array_key_exists(0, $results)) {
            return [$results];
        }

        return $results;
    }
}
