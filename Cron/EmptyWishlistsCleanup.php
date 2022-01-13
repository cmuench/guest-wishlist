<?php

namespace MageSuite\GuestWishlist\Cron;

class EmptyWishlistsCleanup
{
    protected \MageSuite\GuestWishlist\Model\ResourceModel\Wishlist $resourceModel;
    protected \MageSuite\GuestWishlist\Helper\Configuration $configuration;

    public function __construct(
        \MageSuite\GuestWishlist\Model\ResourceModel\Wishlist $resourceModel,
        \MageSuite\GuestWishlist\Helper\Configuration $configuration
    ) {
        $this->resourceModel = $resourceModel;
        $this->configuration = $configuration;
    }

    public function execute()
    {
        if ($this->configuration->getEmptyWishlistsRetentionPeriod() <= 0) {
            return;
        }

        $this->resourceModel->removeOlderThan($this->configuration->getEmptyWishlistsRetentionPeriod());
    }
}
