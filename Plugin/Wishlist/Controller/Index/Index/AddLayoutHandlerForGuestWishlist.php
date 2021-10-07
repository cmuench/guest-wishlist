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
     * @var \MageSuite\GuestWishlist\Helper\Configuration
     */
    protected $configuration;

    /**
     * @param \MageSuite\GuestWishlist\Plugin\Wishlist\Helper\Data\CountItemsForGuestWishlist $countItemsForGuestWishlistHelper
     * @param \MageSuite\GuestWishlist\Helper\Configuration $configuration
     */
    public function __construct(
        \MageSuite\GuestWishlist\Plugin\Wishlist\Helper\Data\CountItemsForGuestWishlist $countItemsForGuestWishlistHelper,
        \MageSuite\GuestWishlist\Helper\Configuration $configuration
    ) {
        $this->countItemsForGuestWishlistHelper = $countItemsForGuestWishlistHelper;
        $this->configuration = $configuration;
    }

    public function afterExecute(
        \Magento\Wishlist\Controller\Index\Index $subject,
        \Magento\Framework\View\Result\Page $result
    ) {
        if (!$this->countItemsForGuestWishlistHelper->isCustomerGuest()) {
            return $result;
        }

        if ($this->configuration->isShowAccountLinksForGuest()) {
            return $result;
        }
        $result->getLayout()->getUpdate()->addHandle(self::LAYOUT_HANDLER_NAME);

        return $result;
    }
}
