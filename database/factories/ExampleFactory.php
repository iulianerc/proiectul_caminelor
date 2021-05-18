<?php

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


/**
 * @var Factory $factory
 */
$factory->define(Model::class, static function () {
    return [
        'uuid'      => Str::uuid(),
        'author_id' => static function () {
            return app(User::class)->first()->id;
        }
    ];
});

