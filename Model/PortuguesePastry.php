<?php

declare(strict_types=1);

namespace PortuguesePastry\Grid\Model;

use PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface;
use PortuguesePastry\Grid\Model\ResourceModel\ResourceModel;
use Magento\Framework\Model\AbstractModel;

class PortuguesePastry extends AbstractModel implements PortuguesePastryInterface
{

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->getData('portuguese_pastry_entity_id') === null ? null : (int) $this->getData('portuguese_pastry_entity_id');
    }

    /**
     * @param int $id
     * @return PortuguesePastryInterface
     */
    public function setId($id = null): PortuguesePastryInterface
    {
        return $this->setData('portuguese_pastry_entity_id', $id);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getData('name');
    }

    /**
     * @param string $name
     * @return PortuguesePastryInterface
     */
    public function setName(string $name): PortuguesePastryInterface
    {
        return $this->setData('name', $name);
    }

    /**
     * @return string
     */
    public function getFlavour(): string
    {
        return $this->getData('flavour');

    }

    /**
     * @param string $flavour
     * @return PortuguesePastryInterface
     */
    public function setFlavour(string $flavour): PortuguesePastryInterface
    {
        return $this->setData('flavour', $flavour);
    }

    /**
     * @return int
     */
    public function getTastiness(): int
    {
        return (int) $this->getData('tastiness');
    }

    /**
     * @param int $tastiness
     * @return PortuguesePastryInterface
     */
    public function setTastiness(int $tastiness): PortuguesePastryInterface
    {
        return $this->setData('tastiness', $tastiness);
    }

    /**
     * @return int
     */
    public function getOriginality(): int
    {
        return (int) $this->getData('originality');
    }

    /**
     * @param int $originality
     * @return PortuguesePastryInterface
     */
    public function setOriginality(int $originality): PortuguesePastryInterface
    {
        return $this->setData('originality', $originality);
    }

    /**
     * @return bool
     */
    public function getAllergens(): bool
    {
        return (bool) $this->getData('allergens');
    }

    /**
     * @param bool $allergens
     * @return PortuguesePastryInterface
     */
    public function setAllergens(bool $allergens): PortuguesePastryInterface
    {
        return $this->setData('allergens', $allergens);
    }
}