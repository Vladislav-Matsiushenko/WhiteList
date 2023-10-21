<?php

declare(strict_types=1);

namespace Magedia\WhiteList\Observer;

use Magedia\WhiteList\Model\WhiteListRepository;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session;

class Login implements ObserverInterface
{
    /**
     * @var WhiteListRepository $whiteListRepository
     */
    private $whiteListRepository;

    /**
     * @var Session $session
     */
    private $session;

    /**
     * @param WhiteListRepository $whiteListRepository
     * @param Session $session
     * @throws \Magento\Framework\Exception\SessionException
     */
    public function __construct(WhiteListRepository $whiteListRepository, Session $session)
    {
        $this->whiteListRepository = $whiteListRepository;
        $this->session = $session;
        $this->session->start();
    }

    /**
     * @inheritdoc
     */
    public function execute(Observer $observer)
    {
        if ($this->whiteListRepository->inWhiteList()) {
            $this->session->setData($this->whiteListRepository::SESSION_KEY, $this->whiteListRepository::SESSION_VALUE);
        }
    }
}
