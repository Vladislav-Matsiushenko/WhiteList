<?php

namespace Magedia\WhiteList\Controller\Adminhtml\WhiteList;
use Magento\Backend\App\Action;
class Index extends Action
{
    /**
     * @return void
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
