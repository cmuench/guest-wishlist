<?php

namespace MageSuite\GuestWishlist\Plugin\Wishlist\Model\Wishlist;

class MarkGuestAsWishlistOwner
{
    public function afterIsOwner(\Magento\Wishlist\Model\Wishlist $subject, $result, $customerId)
    {
        if (!$customerId) {
            return true;
        }

        return $result;
    }
}
