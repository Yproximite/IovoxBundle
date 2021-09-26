<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Rules;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\PaginateResponse;

class GetTimeTemplatesModel extends PaginateResponse
{
    /**
     * @param Collection<int, TimeTemplateModel> $results
     */
    protected function __construct(public int $currentPage, public int $totalPages, public int $totalResults, public Collection $results)
    {
        parent::__construct($this->currentPage, $this->totalResults, $this->totalResults, $this->results);
    }

    public static function create(array $opts): self
    {
        $response = $opts['response'];

        return new self(
            (int) ($response['current_page'] ?? 0),
            (int) ($response['total_pages'] ?? 0),
            (int) ($response['total_results'] ?? 0),
            (new ArrayCollection(static::formatResult($response)))->map(fn($v): TimeTemplateModel => TimeTemplateModel::create($v))
        );
    }
}
