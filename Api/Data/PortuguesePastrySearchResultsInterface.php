<?php

declare(strict_types=1);

namespace PortuguesePastry\Grid\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface PortuguesePastrySearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get attributes list.
     *
     * @return \PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface[]
     */
    public function getItems();

    /**
     * Set attributes list.
     *
     * @param \PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface[] $pastries
     * @return $this
     */
    public function setItems(array $pastries);
}
