<?php

return [
    'accepted'             => 'Необходимо принять :attribute.',
    'active_url'           => ' :attribute не является действительным URL.',
    'after'                => ' :attribute должен быть датой после :date.',
    'after_or_equal'       => ' :attribute должен быть датой после :date или равной ей.',
    'alpha'                => ' :attribute может содержать только буквы.',
    'alpha_dash'           => ' :attribute может содержать только буквы, цифры, дефисы и символы подчеркивания.',
    'alpha_num'            => ' :attribute может содержать только буквы и цифры.',
    'array'                => ' :attribute должен быть массивом.',
    'before'               => ' :attribute должен быть датой до :date.',
    'before_or_equal'      => ' :attribute должен быть датой до :date или равной ей.',
    'between'              =>
        [
            'numeric' => ' :attribute должен быть между :min и :max.',
            'file'    => ' :attribute должен быть от :min до :max килобайт.',
            'string'  => ' :attribute должен быть от :min до :max символов.',
            'array'   => 'В :attribute должно быть от :min до :max предметов.',
        ],
    'boolean'              => 'Поле :attribute должно быть истинным или ложным.',
    'confirmed'            => 'Подтверждение :attribute не совпадает.',
    'date'                 => ' :attribute не является действительной датой.',
    'date_equals'          => ' :attribute должен быть датой, равной :date.',
    'date_format'          => ' :attribute не соответствует формату :format.',
    'different'            => ' :attribute и :other должны быть разными.',
    'digits'               => ' :attribute должен быть :digits цифрами.',
    'digits_between'       => ' :attribute должен быть от :min до :max цифр.',
    'dimensions'           => ' :attribute имеет недопустимые размеры изображения.',
    'distinct'             => 'Поле :attribute имеет повторяющееся значение.',
    'email'                => ' :attribute должен быть действующим адресом электронной почты.',
    'ends_with'            => ' :attribute должен заканчиваться одним из следующих символов: :values.',
    'exists'               => 'Выбранный :attribute недействителен.',
    'file'                 => ' :attribute должен быть файлом.',
    'filled'               => 'Поле :attribute должно иметь значение.',
    'gt'                   =>
        [
            'numeric' => ' :attribute должен быть больше :value.',
            'file'    => ' :attribute должен быть больше :value килобайт.',
            'string'  => ' :attribute должен быть больше, чем :value символов.',
            'array'   => 'В :attribute должно быть больше :value предметов.',
        ],
    'gte'                  =>
        [
            'numeric' => ' :attribute должен быть больше или равен :value.',
            'file'    => ' :attribute должен быть больше или равен :value килобайта.',
            'string'  => ' :attribute должен быть больше или равен :value символов.',
            'array'   => 'В :attribute должно быть :value или больше предметов.',
        ],
    'image'                => ' :attribute должен быть изображением.',
    'in'                   => 'Выбранный :attribute недействителен.',
    'in_array'             => 'Поле :attribute не существует в :other.',
    'integer'              => ' :attribute должен быть целым числом.',
    'ip'                   => ' :attribute должен быть действующим IP-адресом.',
    'ipv4'                 => ' :attribute должен быть действительным адресом IPv4.',
    'ipv6'                 => ' :attribute должен быть действительным адресом IPv6.',
    'json'                 => ' :attribute должен быть допустимой строкой JSON.',
    'lt'                   =>
        [
            'numeric' => ' :attribute должен быть меньше :value.',
            'file'    => 'Размер :attribute должен быть меньше :value килобайт.',
            'string'  => ' :attribute должно быть меньше :value символов.',
            'array'   => 'В :attribute должно быть меньше :value предметов.',
        ],
    'lte'                  =>
        [
            'numeric' => ' :attribute должен быть меньше или равен :value.',
            'file'    => ' :attribute должен быть меньше или равен :value килобайта.',
            'string'  => ' :attribute должен быть меньше или равен :value символов.',
            'array'   => 'В :attribute не должно быть более :value предметов.',
        ],
    'max'                  =>
        [
            'numeric' => ' :attribute не может быть больше :max.',
            'file'    => ' :attribute не может быть больше :max килобайт.',
            'string'  => ' :attribute не может быть больше :max символов.',
            'array'   => 'В :attribute может быть не более :max предметов.',
        ],
    'mimes'                => ' :attribute должен быть файлом типа: :values.',
    'mimetypes'            => ' :attribute должен быть файлом типа: :values.',
    'min'                  =>
        [
            'numeric' => ' :attribute должен быть не менее :min.',
            'file'    => 'Размер :attribute должен быть не менее :min килобайт.',
            'string'  => ' :attribute должен содержать не менее :min символов.',
            'array'   => 'В :attribute должно быть не менее :min предметов.',
        ],
    'not_in'               => 'Выбранный :attribute недействителен.',
    'not_regex'            => 'Формат :attribute недействителен.',
    'numeric'              => ' :attribute должен быть числом.',
    'password'             => 'Пароль неверен.',
    'present'              => 'Поле :attribute должно присутствовать.',
    'regex'                => 'Формат :attribute недействителен.',
    'required'             => 'Поле :attribute является обязательным.',
    'required_if'          => 'Поле :attribute требуется, когда :other равно :value.',
    'required_unless'      => 'Поле :attribute является обязательным, если :other не находится в :values.',
    'required_with'        => 'Поле :attribute требуется, когда присутствует :values.',
    'required_with_all'    => 'Поле :attribute требуется при наличии :values.',
    'required_without'     => 'Поле :attribute требуется, когда :values отсутствует.',
    'required_without_all' => 'Поле :attribute требуется, когда ни один из :values отсутствует.',
    'same'                 => ' :attribute и :other должны совпадать.',
    'size'                 =>
        [
            'numeric' => ' :attribute должен быть :size.',
            'file'    => ' :attribute должен быть :size килобайта.',
            'string'  => ' :attribute должен состоять из :size символов.',
            'array'   => ' :attribute должен содержать :size элемента.',
        ],
    'starts_with'          => ' :attribute должен начинаться с одного из следующих: :values.',
    'string'               => ' :attribute должен быть строкой.',
    'timezone'             => ' :attribute должна быть допустимой зоной.',
    'unique'               => ' :attribute уже был взят.',
    'uploaded'             => 'Не удалось загрузить :attribute.',
    'url'                  => 'Формат :attribute недействителен.',
    'uuid'                 => ' :attribute должен быть действительным UUID.',
    'custom'               =>
        [
            'attribute-name' =>
                [
                    'rule-name' => 'custom-message',
                ]
        ],
    'valid_idnp'           => 'Idnp incorect',
    'status_codes'         => [
        'failed_dependency' => 'Implementarea cererii actuale poate depinde de succesul unei alte operațiuni.'
    ]
];
