<?php

namespace Magedia\WhiteList\Model\ResourceModel;

use Magedia\WhiteList\Api\Data\WhiteListInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class WhiteList extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(WhiteListInterface::DB_NAME, WhiteListInterface::ID);
    }
}
