<?php

declare(strict_types=1);

/*
 * This file is part of the Zikula\StaticContentModule package.
 *
 * Copyright Zikula.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zikula\StaticContentModule;

use Zikula\BlocksModule\Entity\BlockEntity;
use Zikula\BlocksModule\Entity\BlockPlacementEntity;
use Zikula\BlocksModule\Entity\BlockPositionEntity;
use Zikula\ExtensionsModule\Entity\ExtensionEntity;
use Zikula\ExtensionsModule\Installer\AbstractExtensionInstaller;
use Zikula\StaticContentModule\Block\TemplateBlock;

class StaticContentModuleInstaller extends AbstractExtensionInstaller
{
    public function install(): bool
    {
        $this->createDefaultData();

        return true;
    }

    public function upgrade(string $oldVersion): bool
    {
        return true;
    }

    public function uninstall(): bool
    {
        return true;
    }

    public function createDefaultData(): void
    {
        $module = $this->entityManager->getRepository(ExtensionEntity::class)
            ->findOneBy(['name' => 'ZikulaStaticContentModule']);
        $position = $this->entityManager->getRepository(BlockPositionEntity::class)
            ->findOneBy(['name' => 'center']);
        if (!isset($module, $position)) {
            return;
        }

        $blockEntity = new BlockEntity();
        $blockEntity->setModule($module);
        $blockEntity->setBkey(TemplateBlock::class);
        $blockEntity->setBlocktype('Template');
        $blockEntity->setTitle($this->trans('This site is powered by Zikula!'));
        $blockEntity->setDescription($this->trans('HTML block'));
        $blockEntity->setProperties(['path' => '@ZikulaStaticContentModule/welcome.html.twig']);
        $this->entityManager->persist($blockEntity);

        $placement = new BlockPlacementEntity();
        $placement->setBlock($blockEntity);
        $placement->setPosition($position);
        $placement->setSortorder(0);
        $this->entityManager->persist($placement);

        $this->entityManager->flush();
    }
}
