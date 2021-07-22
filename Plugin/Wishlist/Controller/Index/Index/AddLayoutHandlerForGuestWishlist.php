<?php
declare(strict_types=1);

namespace MageSuite\GuestWishlist\Plugin\Wishlist\Controller\Index\Index;

class AddLayoutHandlerForGuestWishlist
{
    public const LAYOUT_HANDLER_NAME = 'guest_wishlist_handle';

    /**
     * @var \MageSuite\GuestWishlist\Plugin\Wishlist\Helper\Data\CountItemsForGuestWishlist
     */
    protected $countItemsForGuestWishlistHelper;

    /**
     * @param \MageSuite\GuestWishlist\Plugin\Wishlist\Helper\Data\CountItemsForGuestWishlist $countItemsForGuestWishlistHelper
     */
    public function __construct(
        \MageSuite\GuestWishlist\Plugin\Wishlist\Helper\Data\CountItemsForGuestWishlist $countItemsForGuestWishlistHelper
    ) {
        $this->countItemsForGuestWishlistHelper = $countItemsForGuestWishlistHelper;
    }

    public function afterExecute(
        \Magento\Wishlist\Controller\Index\Index $subject,
        \Magento\Framework\View\Result\Page $result
    ) {
        if (!$this->countItemsForGuestWishlistHelper->isCustomerGuest()) {
            return $result;
        }

        $result->getLayout()->getUpdate()->addHandle(self::LAYOUT_HANDLER_NAME);

        return $result;
    }
}
