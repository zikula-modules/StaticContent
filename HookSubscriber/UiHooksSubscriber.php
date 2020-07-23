<?php

declare(strict_types=1);

/*
 * This file is part of the ZikulaModules\StaticContentModule package.
 *
 * Copyright Zikula - https://ziku.la/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zikula\StaticContentModule\HookSubscriber;

use Symfony\Contracts\Translation\TranslatorInterface;
use Zikula\Bundle\HookBundle\Category\UiHooksCategory;
use Zikula\Bundle\HookBundle\HookSubscriberInterface;

class UiHooksSubscriber implements HookSubscriberInterface
{
    public const HTMLBLOCK_EDIT_FORM = 'staticcontent.ui_hooks.htmlblock.content.form_edit';

    /**
     * @var TranslatorInterface
     */
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function getOwner(): string
    {
        return 'ZikulaStaticContentModule';
    }

    public function getCategory(): string
    {
        return UiHooksCategory::NAME;
    }

    public function getTitle(): string
    {
        return $this->translator->trans('HTML Block content hook');
    }

    public function getAreaName(): string
    {
        return 'subscriber.staticcontentmodule.ui_hooks.htmlblock_content';
    }

    public function getEvents(): array
    {
        return [
            UiHooksCategory::TYPE_FORM_EDIT => self::HTMLBLOCK_EDIT_FORM
        ];
    }
}
