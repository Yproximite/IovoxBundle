<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Contacts;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\PaginateResponse;

class GetContactsModel extends PaginateResponse
{
    /**
     * @param Collection<int, ContactModel> $results
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
            (new ArrayCollection(static::formatResult($response)))->map(fn ($v): ContactModel => ContactModel::create($v))
        );
    }
}
