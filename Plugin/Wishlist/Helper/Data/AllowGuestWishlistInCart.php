<?php

namespace MageSuite\GuestWishlist\Plugin\Wishlist\Helper\Data;

/**
 * Default logic checked if wishlist is enabled and customer is present.
 * This plugin checking only if wishlist is enabled.
 */
class AllowGuestWishlistInCart
{
    public function aroundIsAllowInCart(\Magento\Wishlist\Helper\Data $subject, callable $proceed)
    {
        return $subject->isAllow();
    }
}
