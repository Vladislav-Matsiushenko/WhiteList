<?php

declare(strict_types=1);

namespace Magedia\WhiteList\Observer;

use Magedia\WhiteList\Model\WhiteList;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session;

class Login implements ObserverInterface
{
    /**
     * @var WhiteList $whiteList
     */
    private $whiteList;

    /**
     * @var Session $session
     */
    private $session;

    /**
     * @param WhiteList $whiteList
     * @param Session $session
     * @throws \Magento\Framework\Exception\SessionException
     */
    public function __construct(WhiteList $whiteList, Session $session)
    {
        $this->whiteList = $whiteList;
        $this->session = $session;
        $this->session->start();
    }

    /**
     * @inheritdoc
     */
    public function execute(Observer $observer)
    {
        if ($this->whiteList->inWhiteList()) {
            $this->session->setData($this->whiteList::SESSION_KEY, $this->whiteList::SESSION_VALUE);
        }
    }
}
