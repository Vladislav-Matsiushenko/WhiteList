<?php

declare(strict_types=1);

namespace Magedia\WhiteList\Observer;

use Magedia\WhiteList\Model\WhiteList;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session;

class Logout implements ObserverInterface
{
    /**
     * @var Session $session
     */
    private $session;

    /**
     * @param Session $session
     * @throws \Magento\Framework\Exception\SessionException
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
        $this->session->start();
    }

    /**
     * @inheritdoc
     */
    public function execute(Observer $observer)
    {
        $this->session->unsetData(WhiteList::SESSION_KEY);
    }
}
