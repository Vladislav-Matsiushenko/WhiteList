<?php

namespace Magedia\WhiteList\Model\ResourceModel\WhiteList;

use Magedia\WhiteList\Model\WhiteList;
use Magedia\WhiteList\Model\ResourceModel\WhiteList as WhiteListResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected  function _construct()
    {
        $this->_init(WhiteList::class, WhiteListResource::class);
    }
}
