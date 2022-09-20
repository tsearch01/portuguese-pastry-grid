<?php

namespace PortuguesePastry\Grid\Ui\Component\Listing;

use Magento\Framework\Data\OptionSourceInterface;

class AllergensOptions implements OptionSourceInterface
{
    const ATTRIBUTE_OPTIONS = [
        ['label' => 'Default', 'value' => ""],
        ['label' => 'No Allergens', 'value' => "0"],
        ['label' => 'Contains Allergens', 'value' => "1"],
    ];

    /**
     * @inheritDoc
     */
    public function toOptionArray(): array
    {
        return self::ATTRIBUTE_OPTIONS;
    }
}