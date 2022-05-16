<?php

namespace App\Helpers;

class OrderStatus
{
    public const PENDING="PENDING";
    public const IN_CART="in_cart";
    public const APPROVED="APPROVED";
    public const REJECTED="REJECTED";

    public static function toArray()
    {
        return [
            self::PENDING,
            self::IN_CART,
            self::APPROVED,
            self::REJECTED,
        ];
    }
}
