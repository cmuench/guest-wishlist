<?php

namespace MageSuite\GuestWishlist\Model\ResourceModel;

class Wishlist extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('wishlist', 'wishlist_id');
    }

    public function removeOlderThan(int $retentionPeriodInDays)
    {
        $connection = $this->getConnection();

        return $connection->delete($this->getMainTable(), [
            sprintf('updated_at < date_sub(CURDATE(), INTERVAL %s Day)', $retentionPeriodInDays),
            new \Zend_Db_Expr(sprintf('wishlist_id NOT IN (SELECT wishlist_id FROM %s)', $this->getTable('wishlist_item'))),
            'customer_id = 0'
        ]);
    }
}
