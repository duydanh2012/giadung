<?php

use Platform\Page\Repositories\Interfaces\PageInterface;
use Platform\Base\Enums\BaseStatusEnum;

app()->booted(function () {
    $pages = app(PageInterface::class)->pluck('name', 'id', ['status' => BaseStatusEnum::PUBLISHED]);

    theme_option()
        ->setSection([
            'title'      => __('Social'),
            'desc'       => __('Social links'),
            'id'         => 'opt-text-subsection-social',
            'subsection' => true,
            'icon'       => 'fa fa-share-alt',
        ])
        ->setField([
            'id'         => 'facebook',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => 'Facebook',
            'attributes' => [
                'name'    => 'facebook',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => 'https://facebook.com/@username',
                ],
            ],
        ])
        ->setField([
            'id'         => 'instagram',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => 'Instagram',
            'attributes' => [
                'name'    => 'instagram',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => 'https://instagram.com/@username',
                ],
            ],
        ])
        ->setField([
            'id'         => 'twitter',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => 'Twitter',
            'attributes' => [
                'name'    => 'twitter',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => 'https://twitter.com/@username',
                ],
            ],
        ])
        ->setField([
            'id'         => 'linkedin',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => 'Linkedin',
            'attributes' => [
                'name'    => 'linkedin',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => 'https://linkedin.com/company/@username',
                ],
            ],
        ])
        ->setField([
            'id'         => 'telegram',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => 'Telegram',
            'attributes' => [
                'name'    => 'telegram',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => 'https://t.me/@username',
                ],
            ],
        ])
        ->setField([
            'id'         => 'email',
            'section_id' => 'opt-text-subsection-social',
            'type'       => 'text',
            'label'      => 'Email',
            'attributes' => [
                'name'    => 'email',
                'value'   => null,
                'options' => [
                    'class'       => 'form-control',
                    'placeholder' => 'your-email@domain.com',
                ],
            ],
        ])
        ->setField([
            'id'         => 'address',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Address'),
            'attributes' => [
                'name'    => 'address',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'placeholder'  => __('Change address'),
                    'data-counter' => 255,
                ],
            ],
        ])
        ->setField([
            'id'         => 'hotline',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hotline'),
            'attributes' => [
                'name'    => 'hotline',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'placeholder'  => __('Change hotline'),
                    'data-counter' => 20,
                ],
            ],
        ])
        ->setField([
            'id'         => 'copyright',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Copyright'),
            'attributes' => [
                'name'    => 'copyright',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'placeholder'  => __('Change copyright'),
                    'data-counter' => 255,
                ],
            ],
            'helper'     => __('Copyright on footer of site'),
        ])
        ->setField([
            'id'         => 'footer_logo',
            'section_id' => 'opt-text-subsection-logo',
            'type'       => 'mediaImage',
            'label'      => __('Footer logo'),
            'attributes' => [
                'name'    => 'footer_logo',
                'value'   => null,
            ],
        ])
        ->setField([
            'id'         => 'terms_n_conditions_page_id',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'customSelect',
            'label'      => 'Terms and Conditions page',
            'attributes' => [
                'name'    => 'terms_n_conditions_page_id',
                'list'    => ['' => trans('plugins/blog::base.select')] + $pages,
                'value'   => '',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ],)
        ;
});
