<?php

namespace Magedia\WhiteList\Model;

use Magedia\WhiteList\Api\Data\WhiteListInterface;
use Magedia\WhiteList\Model\ResourceModel\WhiteList as WhiteListResource;
use Magento\Framework\Model\AbstractModel;

class WhiteList extends AbstractModel implements WhiteListInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(WhiteListResource::class);
    }

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->getData(WhiteListInterface::ID);
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(mixed $id)
    {
        $this->setData(WhiteListInterface::ID, $id);
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->getData(WhiteListInterface::IP_ADDRESS);
    }

    /**
     * @param string $ipAddress
     * @return $this
     */
    public function setIpAddress(string $ipAddress)
    {
        $this->setData(WhiteListInterface::IP_ADDRESS, $ipAddress);
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAllowed(): bool
    {
        return $this->getData(WhiteListInterface::IS_ALLOWED);
    }

    /**
     * @param bool $isAllowed
     * @return $this
     */
    public function setIsAllowed(bool $isAllowed)
    {
        $this->setData(WhiteListInterface::IS_ALLOWED, $isAllowed);
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getData(WhiteListInterface::DESCRIPTION);
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->setData(WhiteListInterface::DESCRIPTION, $description);
        return $this;
    }
}
