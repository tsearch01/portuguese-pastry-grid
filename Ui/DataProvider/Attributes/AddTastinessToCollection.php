<?php

namespace PortuguesePastry\Grid\Ui\DataProvider\Attributes;

use PortuguesePastry\Grid\Model\ResourceModel\PortuguesePastry\CollectionFactory;
use PortuguesePastry\Grid\Model\ResourceModel\PortuguesePastry\Collection as PortuguesePastryCollection;
use Magento\Framework\Data\Collection;
use Magento\Ui\DataProvider\AddFilterToCollectionInterface;

class AddTastinessToCollection implements AddFilterToCollectionInterface
{
    private $portuguesePastryCollection;

    public function __construct(
        CollectionFactory $portuguesePastryCollectionFactory
    ) {
        $this->portuguesePastryCollection = $portuguesePastryCollectionFactory->create();
    }

    /**
     * @inheritDoc
     */
    public function addFilter(Collection $collection, $field, $condition = null)
    {
        //issue: Default 'Tastiness' selected on FE results in 2 rows of 2nd Pastry.
        $comparisonOperator = 'gteq';
        if ($condition['eq'] != "") {
            $collection->addFieldToFilter('tastiness', [$comparisonOperator => $condition['eq']]);
        } else {
            $collection->addFieldToFilter('tastiness', [$comparisonOperator => "0"]);
        }
    }
}