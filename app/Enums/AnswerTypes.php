<?php

namespace App\Enums;

enum AnswerTypes: string
{
    case Text = 'text';
    case SingleOption = 'single-option';
    case MultipleOption = 'multiple-option';

    public function canBeScored(): bool
    {
        return match ($this) {
            self::Text => false,
            self::MultipleOption, self::SingleOption => true
        };
    }
}
