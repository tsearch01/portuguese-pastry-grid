<?php

declare(strict_types=1);

namespace PortuguesePastry\Grid\Model\ResourceModel\PortuguesePastry;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use PortuguesePastry\Grid\Model\PortuguesePastry;
use PortuguesePastry\Grid\Model\ResourceModel\ResourceModel;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(PortuguesePastry::class, ResourceModel::class);
    }
}