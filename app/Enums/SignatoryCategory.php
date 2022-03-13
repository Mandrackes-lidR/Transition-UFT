<?php

namespace App\Enums;

enum SignatoryCategory: string
{
    case Student = 'student';
    case Teacher = 'teacher';
    case Other = 'other';

    /**
     * List enum values in an array.
     *
     * @return array
     */
    public static function valueList(): array
    {
        $list = array();
        foreach (self::cases() as $category) {
            $list[] = $category->value;
        }
        return $list;
    }
}
