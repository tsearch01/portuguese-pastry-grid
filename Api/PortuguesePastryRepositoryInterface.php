<?php

declare(strict_types=1);

namespace PortuguesePastry\Grid\Api;

use PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface;
use PortuguesePastry\Grid\Api\Data\PortuguesePastrySearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

Interface PortuguesePastryRepositoryInterface
{
    /**
     * Create/Update Portuguese Pastry
     *
     * @param \PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface $pastry
     * @return \PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface
     */
    public function save(\PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface $pastry);

    /**
     * Get info about Portuguese Pastry by id
     *
     * @param int $portuguesePastryId
     * @return \PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface
     */
    public function getById($portuguesePastryId);

    /**
     * Delete Portuguese Pastry
     *
     * @param \PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface $pastry
     * @return bool Will returned True if deleted
     */
    public function delete(\PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface $pastry);

    /**
     * Delete Portuguese Pastry by id
     *
     * @param int $portuguesePastryId
     * @return bool Will returned True if deleted
     */
    public function deleteById($portuguesePastryId);

    /**
     * Get Portuguese Pastry list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \PortuguesePastry\Grid\Api\Data\PortuguesePastrySearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}