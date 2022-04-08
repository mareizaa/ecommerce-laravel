<?php

namespace App\Helpers;

class OrderStatus
{
    public const PENDING="pending";
    public const IN_CART="in_cart";
    public const APPROVED="approved";
    public const REJECTED="rejected";

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
