<?php

declare(strict_types=1);

namespace Magedia\WhiteList\Model;

use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Magento\Framework\FileSystem\DirectoryList;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Exception\Plugin\AuthenticationException;

class WhiteListRepository
{
    public const SESSION_KEY = 'WhiteList';
    public const SESSION_VALUE = 1;
    public const WHITE_LIST_IP_DIR = '/code/Magedia/WhiteList/etc/WhiteListIP';

    /**
     * @var RemoteAddress $remoteAddress
     */
    private $remoteAddress;

    /**
     * @var DirectoryList $dir
     */
    private $dir;

    /**
     * @param RemoteAddress $remoteAddress
     * @param DirectoryList $dir
     */
    public function __construct(RemoteAddress $remoteAddress, DirectoryList $dir)
    {
        $this->remoteAddress = $remoteAddress;
        $this->dir = $dir;
    }

    /**
     * @return bool
     * @throws FileSystemException
     * @throws AuthenticationException
     */
    public function inWhiteList(): bool
    {
        $ip = $this->remoteAddress->getRemoteAddress();
        $filename = $this->dir->getPath('app') . self::WHITE_LIST_IP_DIR;
        if (!file_exists($filename)) {
            throw new AuthenticationException(__('WhiteListIP file does not exist'));
        }

        $list = file_get_contents($filename);
        if ($list === false) {
            throw new AuthenticationException(__('Can not open WhiteListIP file'));
        }

        $pattern = sprintf("/%s\n/", $ip);

        return preg_match($pattern, $list);
    }
}
