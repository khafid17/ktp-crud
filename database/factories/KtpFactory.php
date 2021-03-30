<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Model::class, function (Faker $faker) {
    factory(App\Ktp::class, 50)->create()->each(function ($ktp) {
        $ktp->ktp()->save(factory(App\ktp::class)->make());
    });
});
