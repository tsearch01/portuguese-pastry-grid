<?php

declare(strict_types=1);

namespace PortuguesePastry\Grid\Setup\Patch\Data;

use Exception;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use PortuguesePastry\Grid\Api\Data\PortuguesePastryInterface;
use PortuguesePastry\Grid\Api\Data\PortuguesePastryInterfaceFactory;
use PortuguesePastry\Grid\Api\PortuguesePastryRepositoryInterface;
use Psr\Log\LoggerInterface;

class AddPortuguesePastries implements DataPatchInterface, PatchRevertableInterface
{
    public const SEED_PORTUGUESE_PASTRIES = [
        ["name" => "Pastel de Nata", "flavour" => "Cream", "tastiness" => 7, "originality" => 7, "allergens" => false],
        ["name" => "Pastel de Cerveja", "flavour" => "Beer", "tastiness" => 8, "originality" => 9, "allergens" => false],
        ["name" => "Pao de Deus", "flavour" => "Coconut", "tastiness" => 5, "originality" => 7, "allergens" => true],
        ["name" => "Bola de Berlim", "flavour" => "Custard", "tastiness" => 6, "originality" => 6, "allergens" => true],
    ];

    /**
     * @var PortuguesePastryInterfaceFactory
     */
    private $pastryFactory;

    /**
     * @var PortuguesePastryRepositoryInterface
     */
    private $pastryRepository;

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var LoggerInterface
     */
    private $logger;


    public function __construct(
        PortuguesePastryInterfaceFactory $pastryFactory,
        PortuguesePastryRepositoryInterface $pastryRepository,
        ModuleDataSetupInterface $moduleDataSetup,
        LoggerInterface $logger
    ) {
        $this->pastryFactory = $pastryFactory;
        $this->pastryRepository = $pastryRepository;
        $this->moduleDataSetup = $moduleDataSetup;
        $this->logger = $logger;
    }

    /**
     * @return DataPatchInterface|void
     * @throws Exception
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        try {
            foreach(self::SEED_PORTUGUESE_PASTRIES as $index => $pastryData) {
                /** @var PortuguesePastryInterface $pastry */
                $pastry = $this->pastryFactory->create();
                $pastry->setName($pastryData["name"]);
                $pastry->setFlavour($pastryData['flavour']);
                $pastry->setTastiness($pastryData['tastiness']);
                $pastry->setOriginality($pastryData['originality']);
                $pastry->setAllergens($pastryData['allergens']);
                $this->pastryRepository->save($pastry);
            }
        } catch (Exception $e) {
            $this->logger->debug($e->getMessage());
        }
        $this->moduleDataSetup->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public function revert()
    {
        //to Implement
    }

    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
        return [];
    }
}
