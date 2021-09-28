<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\CallFlow\Rule;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;
use Yproximite\IovoxBundle\Model\CallFlow\Call\Event\ParamModel;

class HttpRequestModel extends AbstractModel
{
    /**
     * @param Collection<int, ParamModel> $params
     */
    private function __construct(public ?string $id, public ?string $label, public ?string $url, public ?string $requestMethod, public Collection $params)
    {
    }

    public static function create(array $opts): self
    {
        $httpRequestAttributes = $opts['@attributes'];

        return new self(
            $httpRequestAttributes['id'],
            $httpRequestAttributes['label'],
            $httpRequestAttributes['url'],
            $httpRequestAttributes['requestMethod'],
            (new ArrayCollection(static::formatResult($opts['params']['param'], false)))->map(fn($v): ParamModel => ParamModel::create($v)),
        );
    }
}
