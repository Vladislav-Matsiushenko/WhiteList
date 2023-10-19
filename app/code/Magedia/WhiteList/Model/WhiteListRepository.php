<?php

declare(strict_types=1);

namespace Magedia\WhiteList\Model;

use Magedia\WhiteList\Model\ResourceModel\WhiteList\Collection as WhiteListCollection;
use Magedia\WhiteList\Model\ResourceModel\WhiteList\CollectionFactory as WhiteListCollectionFactory;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;

class WhiteListRepository
{
    public const SESSION_KEY = 'WhiteList';
    public const SESSION_VALUE = 1;
    public const WHITE_LIST_IP_DIR = '/code/Magedia/WhiteList/etc/WhiteListIP';

    /**
     * @var WhiteListCollectionFactory $whiteListCollectionFactory
     */
    private $whiteListCollectionFactory;

    /**
     * @var RemoteAddress $remoteAddress
     */
    private $remoteAddress;

    /**
     * @param WhiteListCollectionFactory $whiteListCollectionFactory
     * @param RemoteAddress $remoteAddress
     */
    public function __construct(WhiteListCollectionFactory $whiteListCollectionFactory, RemoteAddress $remoteAddress)
    {
        $this->whiteListCollectionFactory = $whiteListCollectionFactory;
        $this->remoteAddress = $remoteAddress;
    }

    /**
     * @return bool
     */
    public function inWhiteList(): bool
    {
        $collection = $this->whiteListCollectionFactory->create();
        $ipAddress = $this->remoteAddress->getRemoteAddress();

        foreach ($collection as $a) {
            if ($a->getIpAddress() === $ipAddress) {
                return true;
            }
        }
        return false;
    }
}
