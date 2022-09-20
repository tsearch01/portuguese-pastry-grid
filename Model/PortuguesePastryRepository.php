<?php

declare(strict_types=1);

namespace PortuguesePastry\Grid\Model;

use Exception;
use PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface;
use PortuguesePastry\Grid\Api\Data\PortuguesePastryInterfaceFactory;
use PortuguesePastry\Grid\Model\ResourceModel\PortuguesePastry\Collection;
use PortuguesePastry\Grid\Model\ResourceModel\PortuguesePastry\CollectionFactory;
use PortuguesePastry\Grid\Model\ResourceModel\ResourceModel;
use PortuguesePastry\Grid\Api\Data\PortuguesePastrySearchResultsInterface;
use PortuguesePastry\Grid\Api\Data\PortuguesePastrySearchResultsInterfaceFactory;
use PortuguesePastry\Grid\Api\PortuguesePastryRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class PortuguesePastryRepository implements PortuguesePastryRepositoryInterface
{

    protected $portuguesePastryFactory;

    protected $resourceModel;

    protected $collectionFactory;

    protected $collectionProcessor;

    protected $searchResultsFactory;

    public function __construct(
        PortuguesePastryInterfaceFactory $portuguesePastryFactory,
        ResourceModel $resourceModel,
        CollectionFactory $collectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        PortuguesePastrySearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->portuguesePastryFactory = $portuguesePastryFactory;
        $this->resourceModel = $resourceModel;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Create/Update Portuguese Pastry
     *
     * @param \PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface $pastry
     * @return \PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface
     */
    public function save(PortuguesePastryInterface $pastry)
    {
        try {
            $this->resourceModel->save($pastry);
        } catch (Exception $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo $e->getLine();
        }
        return $this->getById($pastry->getId());
    }

    /**
     * Get info about Portuguese Pastry by id
     *
     * @param int $portuguesePastryId
     * @return \PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface
     */
    public function getById($portuguesePastryId)
    {
        try {
            $portuguesePastry = $this->portuguesePastryFactory->create();
            $this->resourceModel->load($portuguesePastry, $portuguesePastryId);
        } catch (Exception $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo $e->getLine();
        }
        return $portuguesePastry;
    }

    /**
     * Delete Portuguese Pastry
     *
     * @param \PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface $pastry
     * @return bool Will returned True if deleted
     */
    public function delete(PortuguesePastryInterface $pastry)
    {
        try {
            $this->resourceModel->delete($pastry);
        } catch (Exception $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo $e->getLine();
        }
        return $pastry->isDeleted();
    }

    /**
     * Delete Portuguese Pastry by id
     *
     * @param int $portuguesePastryId
     * @return bool Will returned True if deleted
     */
    public function deleteById($portuguesePastryId)
    {
        try {
            $portuguesePastry = $this->getById($portuguesePastryId);
            $this->delete($portuguesePastry);
        } catch (Exception $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo $e->getLine();
        }
        return $portuguesePastry->isDeleted();
    }

    /**
     * Get Portuguese Pastry list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \PortuguesePastry\Grid\Api\Data\PortuguesePastrySearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}