<?php

namespace PortuguesePastry\Grid\Controller\Adminhtml\Grid;

use PortuguesePastry\Grid\Controller\Adminhtml\AdminAcl;
use Magento\Backend\App\Action;
use Magento\Framework\view\Result\PageFactory;

class Index extends Action
{
    CONST ADMIN_RESOURCE = "PortuguesePastry_Grid::portuguese_pastry_grid";

    protected $pageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->set('Portuguese Pastry Grid');
        return $page;
    }
}