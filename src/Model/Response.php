<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Response extends AbstractModel
{
    /**
     * @param Collection<int, ModelInterface> $results
     */
    protected function __construct(public Collection $results)
    {
    }

    public static function create(array $opts): self
    {
        $response = $opts['response'];

        return new self(
            new ArrayCollection($response['results'])
        );
    }
}
