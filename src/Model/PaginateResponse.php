<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class PaginateResponse extends Response
{
    /**
     * @param Collection<int, ModelInterface> $results
     */
    protected function __construct(public int $currentPage, public int $totalPages, public int $totalResults, public Collection $results)
    {
        parent::__construct($results);
    }

    public static function create(array $opts): self
    {
        $response = $opts['response'];

        return new self(
            (int) ($response['current_page'] ?? 0),
            (int) ($response['total_pages'] ?? 0),
            (int) ($response['total_results'] ?? 0),
            new ArrayCollection($response['results'])
        );
    }

    /**
     * @param array<string, mixed> $response
     *
     * @return array<int|string, mixed>
     */
    protected static function formatResult(array $response): array
    {
        $results = $response['results']['result'] ?? [];
        if ([] !== $results && !array_key_exists(0, $results)) {
            return [$results];
        }

        return $results;
    }
}
