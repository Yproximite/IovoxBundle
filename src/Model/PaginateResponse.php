<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class PaginateResponse extends Response
{
    /**
     * @phpstan-template T of ModelInterface
     *
     * @param Collection<int, T> $results
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
}
