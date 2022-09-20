<?php

declare(strict_types=1);

namespace PortuguesePastry\Grid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ResourceModel extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('portuguese_pastry_entity', 'portuguese_pastry_entity_id');
    }
}