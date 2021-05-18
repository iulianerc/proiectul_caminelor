<?php

return array(
    'email'    =>
        array(
            'title' => 'Email',
            'model' => 'mail@domain.com',
            'icon'  => 'mdi-email',
            'min'   => '1',
            'max'   => '3',
        ),
    'phone'    =>
        array(
            'title' => 'Phone',
            'model' => '+37300000000',
            'icon'  => 'mdi-phone',
            'min'   => '1',
            'max'   => '4',
        ),
    'telegram' =>
        array(
            'title' => 'Telegram',
            'model' => '@doe.john',
            'icon'  => 'mdi-telegram',
            'min'   => '0',
            'max'   => '3',
        ),
    'jabber'   =>
        array(
            'title' => 'Jabber',
            'model' => 'DoeJohn',
            'icon'  => 'mdi-jabber',
            'min'   => '0',
            'max'   => '1',
        ),
    'skype'    =>
        array(
            'title' => 'Skype',
            'model' => 'live:john-doe',
            'icon'  => 'mdi-skype',
            'min'   => '0',
            'max'   => '5',
        ),
    'social'   =>
        array(
            'title' => 'Social',
            'items' =>
                array(
                    'facebook' =>
                        array(
                            'icon'  => 'mdi-facebook',
                            'label' => 'Facebook',
                            'url'   => '',
                        ),
                    'linkedin' =>
                        array(
                            'icon'  => 'mdi-linkedin',
                            'label' => 'Linkedin',
                            'url'   => '',
                        ),
                    'vk'       =>
                        array(
                            'icon'  => 'mdi-vk',
                            'label' => 'VK',
                            'url'   => '',
                        ),
                ),
            'model' => 'live:john-doe',
            'icon'  => 'mdi-face-profile',
            'min'   => '0',
            'max'   => '5',
        ),
);
