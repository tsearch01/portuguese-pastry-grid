<?php

declare(strict_types=1);

namespace PortuguesePastry\Grid\Api\Data;

interface PortuguesePastryInterface
{
    /**
     * @return int|null
     */
    public function getId();

    /**
     * @param int $id
     * @return PortuguesePastryInterface
     */
    public function setId($id = null): PortuguesePastryInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return PortuguesePastryInterface
     */
    public function setName(string $name): PortuguesePastryInterface;

    /**
     * @return string
     */
    public function getFlavour(): string;

    /**
     * @param string $flavour
     * @return PortuguesePastryInterface
     */
    public function setFlavour(string $flavour): PortuguesePastryInterface;

    /**
     * @return int
     */
    public function getTastiness(): int;

    /**
     * @param int $tastiness
     * @return PortuguesePastryInterface
     */
    public function setTastiness(int $tastiness): PortuguesePastryInterface;

    /**
     * @return int
     */
    public function getOriginality(): int;

    /**
     * @param int $originality
     * @return PortuguesePastryInterface
     */
    public function setOriginality(int $originality): PortuguesePastryInterface;

    /**
     * @return bool
     */
    public function getAllergens(): bool;

    /**
     * @param bool $allergens
     * @return PortuguesePastryInterface
     */
    public function setAllergens(bool $allergens): PortuguesePastryInterface;
}