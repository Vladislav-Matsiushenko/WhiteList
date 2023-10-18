<?php

declare(strict_types=1);

namespace Magedia\WhiteList\Plugin;

use Magedia\WhiteList\Model\WhiteList;
use Magento\Catalog\Model\Product;
use Magento\Customer\Model\Session;

class RenderAddToCartButton
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
     * @param Product $subject
     * @param $result
     * @return bool
     */
    public function afterIsSalable(Product $subject, $result)
    {
        if ($this->session->getData(WhiteList::SESSION_KEY) === WhiteList::SESSION_VALUE) {
            return $result;
        }
        return false;
    }
}
