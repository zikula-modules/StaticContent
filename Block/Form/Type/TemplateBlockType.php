<?php

declare(strict_types=1);

/*
 * This file is part of the Zikula package.
 *
 * Copyright Zikula - https://ziku.la/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zikula\StaticContentModule\Block\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class TemplateBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('path', TextType::class, [
                'label' => 'Template path',
                'help' => '<code>/direct/path/foo.html.twig</code> in <code>/templates</code>, or <code>@AcmeFooTheme/foo.html.twig</code> in any extension.',
                'help_html' => true,
                'constraints' => [
                    new NotBlank(),
                    new Type('string')
                ]
            ])
        ;
    }
}
