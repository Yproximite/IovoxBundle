<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Call;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yproximite\IovoxBundle\Model\AbstractModel;

class CallDataModel extends AbstractModel
{
    /**
     * @param Collection<int, CategoryModel>|null $categories
     * @param Collection<int, CategoryModel>|null $callCategories
     * @param Collection<int, CategoryModel>|null $nodeCategories
     * @param Collection<int, CategoryModel>|null $contactCategories
     */
    private function __construct(
        public ?string $id,
        public ?string $callStart,
        public ?string $callEnd,
        public ?string $callOrigin,
        public ?string $callOriginLocation,
        public ?string $voxnumber,
        public ?string $callDestination,
        public ?string $detail,
        public ?int $callTimeSec,
        public ?string $callTime,
        public ?int $talkTimeSec,
        public ?string $talkTime,
        public ?string $callType,
        public ?string $callResult,
        public ?string $ruleResult,
        public ?string $nodeId,
        public ?string $nodeName,
        public ?string $nodeType,
        public ?string $linkId,
        public ?string $linkName,
        public ?string $linkType,
        public ?bool $hasRecording,
        public ?bool $emailSent,
        public ?string $direction,
        public ?string $callOriginEncoded,
        public ?Collection $categories = null,
        public ?Collection $callCategories = null,
        public ?Collection $nodeCategories = null,
        public ?Collection $contactCategories = null,
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            $opts['id'] ?? null,
            $opts['call_start'] ?? null,
            $opts['call_end'] ?? null,
            $opts['call_origin'] ?? null,
            $opts['call_origin_location'] ?? null,
            $opts['voxnumber'] ?? null,
            $opts['call_destination'] ?? null,
            $opts['detail'] ?? null,
            (null !== $callTimeSec = $opts['call_time_sec'] ?? null) ? (int) $callTimeSec : null,
            $opts['call_time'] ?? null,
            (null !== $talkTimeSec = $opts['talk_time_sec'] ?? null) ? (int) $talkTimeSec : null,
            $opts['talk_time'] ?? null,
            $opts['call_type'] ?? null,
            $opts['call_result'] ?? null,
            $opts['rule_result'] ?? null,
            $opts['node_id'] ?? null,
            $opts['node_name'] ?? null,
            $opts['node_type'] ?? null,
            $opts['link_id'] ?? null,
            $opts['link_name'] ?? null,
            $opts['link_type'] ?? null,
            (null !== $hasRecording = $opts['has_recording'] ?? null) ? '0' !== $hasRecording : null,
            (null !== $emailSent = $opts['email_sent'] ?? null) ? '0' !== $emailSent : null,
            $opts['direction'] ?? null,
            $opts['call_origin_encoded'] ?? null,
            (null !== $categories = ($opts['categories']['category'] ?? null)) ?
                (new ArrayCollection(static::formatResult($categories, false)))->map(fn ($v): CategoryModel => CategoryModel::create($v)) : null,
            (null !== $categories = ($opts['call_categories']['call_category'] ?? null)) ?
                (new ArrayCollection(static::formatResult($categories, false)))->map(fn ($v): CategoryModel => CategoryModel::create($v)) : null,
            (null !== $categories = ($opts['node_categories']['node_category'] ?? null)) ?
                (new ArrayCollection(static::formatResult($categories, false)))->map(fn ($v): CategoryModel => CategoryModel::create($v)) : null,
            (null !== $categories = ($opts['contact_categories']['contact_category'] ?? null)) ?
                (new ArrayCollection(static::formatResult($categories, false)))->map(fn ($v): CategoryModel => CategoryModel::create($v)) : null,
        );
    }
}
