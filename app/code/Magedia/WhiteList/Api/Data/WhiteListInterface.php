<?php

namespace Magedia\WhiteList\Api\Data;

interface WhiteListInterface
{
    public const DB_NAME = 'white_list_ip';

    public const ID = 'id';
    public const IP_ADDRESS = 'ip_address';
    public const IS_ALLOWED = 'is_allowed';
    public const DESCRIPTION = 'description';

    /**
     * @return ?int
     */
    public function getId(): ?int;

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id);

    /**
     * @return string
     */
    public function getIpAddress(): string;

    /**
     * @param string $ipAddress
     * @return $this
     */
    public function setIpAddress(string $ipAddress);

    /**
     * @return bool
     */
    public function getIsAllowed(): bool;

    /**
     * @param bool $isAllowed
     * @return $this
     */
    public function setIsAllowed(bool $isAllowed);

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description);
}
