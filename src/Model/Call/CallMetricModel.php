<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Model\Call;

use Yproximite\IovoxBundle\Model\AbstractModel;

class CallMetricModel extends AbstractModel
{
    private function __construct(
        public ?int $totalCalls,
        public ?float $avgCallsPerDay,
        public ?int $totalTalkTimeSec,
        public ?int $totalTalkTime,
        public ?float $avgTalkTimeSec,
        public ?string $avgTalkTime,
        public ?float $totalCallTimeSec,
        public ?string $totalCallTime,
        public ?float $avgCallTimeSec,
        public ?string $avgCallTime,
        public ?int $totalUniqueCallers,
        public ?int $totalUniqueNodes,
        public ?int $totalUniqueLinks,
        public ?\DateTimeImmutable $callDate,
        public ?string $period,
        public ?string $callMonth,
        public ?string $callWeekday,
        public ?string $callOrigin,
        public ?string $callOriginEncoded,
        public ?string $voxnumber,
        public ?string $callDestination,
        public ?string $detail,
        public ?string $callResult,
        public ?string $nodeId,
        public ?string $nodeType,
        public ?string $linkId,
        public ?string $linkName,
        public ?string $linkType,
    ) {
    }

    public static function create(array $opts): self
    {
        return new self(
            (null !== $totalCalls = $opts['total_calls'] ?? null) ? (int) $totalCalls : null,
            (null !== $avgCallsPerDay = $opts['ave_calls_per_day'] ?? null) ? (float) $avgCallsPerDay : null,
            (null !== $totalTalkTimeSec = $opts['total_talk_time_sec'] ?? null) ? (int) $totalTalkTimeSec : null,
            (null !== $totalTalkTime = $opts['total_talk_time'] ?? null) ? (int) $totalTalkTime : null,
            (null !== $avgTalkTimeSec = $opts['ave_talk_time_sec'] ?? null) ? (float) $avgTalkTimeSec : null,
            $opts['ave_talk_time'] ?? null,
            (null !== $totalCallTimeSec = $opts['total_call_time_sec'] ?? null) ? (float) $totalCallTimeSec : null,
            $opts['total_call_time'] ?? null,
            (null !== $avgCallTimeSec = $opts['ave_call_time_sec'] ?? null) ? (float) $avgCallTimeSec : null,
            $opts['ave_call_time'] ?? null,
            (null !== $totalUniqueCallers = $opts['total_unique_callers'] ?? null) ? (int) $totalUniqueCallers : null,
            (null !== $totalUniqueNodes = $opts['total_unique_nodes'] ?? null) ? (int) $totalUniqueNodes : null,
            (null !== $totalUniqueLinks = $opts['total_unique_links'] ?? null) ? (int) $totalUniqueLinks : null,
            (null !== $callDate = $opts['call_date'] ?? null) ? new \DateTimeImmutable($callDate) : null,
            $opts['period'] ?? null,
            $opts['call_month'] ?? null,
            $opts['call_weekday'] ?? null,
            $opts['call_origin'] ?? null,
            $opts['call_origin_encoded'] ?? null,
            $opts['voxnumber'] ?? null,
            $opts['call_destination'] ?? null,
            $opts['detail'] ?? null,
            $opts['call_result'] ?? null,
            $opts['node_id'] ?? null,
            $opts['node_type'] ?? null,
            $opts['link_id'] ?? null,
            $opts['link_name'] ?? null,
            $opts['link_type'] ?? null,
        );
    }
}
