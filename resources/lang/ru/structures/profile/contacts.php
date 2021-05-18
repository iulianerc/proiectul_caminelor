<?php

return array(
    'email'    =>
        array(
            'title' => 'Эл. адрес',
            'model' => 'mail@domain.com',
            'icon'  => 'mdi-email',
            'min'   => '1',
            'max'   => '3',
        ),
    'phone'    =>
        array(
            'title' => 'Телефон',
            'model' => '+37300000000',
            'icon'  => 'mdi-phone',
            'min'   => '1',
            'max'   => '4',
        ),
    'telegram' =>
        array(
            'title' => 'Телеграм',
            'model' => '@doe.john',
            'icon'  => 'mdi-telegram',
            'max'   => '3',
        ),
    'jabber'   =>
        array(
            'title' => 'Jabber',
            'model' => 'DoeJohn',
            'icon'  => 'mdi-jabber',
            'max'   => '1',
        ),
    'skype'    =>
        array(
            'title' => 'Skype',
            'model' => 'live: john-doe',
            'icon'  => 'mdi-skype',
            'max'   => '5',
        ),
    'social'   =>
        array(
            'title' => 'Социальное',
            'items' =>
                array(
                    'facebook' =>
                        array(
                            'icon'  => 'mdi-facebook',
                            'label' => 'Facebook',
                        ),
                    'linkedin' =>
                        array(
                            'icon'  => 'mdi-linkedin',
                            'label' => 'Linkedin',
                        ),
                    'vk'       =>
                        array(
                            'icon'  => 'mdi-vk',
                            'label' => 'ВК',
                        ),
                ),
            'icon'  => 'mdi-face-profile',
            'max'   => '5',
            'model' => 'live:john-doe',
        ),
);
