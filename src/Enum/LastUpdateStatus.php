<?php

namespace AsyncAws\Lambda\Enum;

final class LastUpdateStatus
{
    public const FAILED = 'Failed';
    public const IN_PROGRESS = 'InProgress';
    public const SUCCESSFUL = 'Successful';

    public static function exists(string $value): bool
    {
        return isset([
            self::FAILED => true,
            self::IN_PROGRESS => true,
            self::SUCCESSFUL => true,
        ][$value]);
    }
}
