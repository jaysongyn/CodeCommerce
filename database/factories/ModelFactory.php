<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CodeCommerce\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeCommerce\Category::class, function ($faker) {
    return [
		'name' => $faker->word(),
		'description' => $faker->sentence()
	];
});

$factory->define(CodeCommerce\Product::class, function ($faker) {
    return [
    	'category_id' => $faker->numberBetween(1,10),
		'name' => $faker->word(),
		'description' => $faker->sentence(),
		'price' => $faker->randomNumber(2)
	];
});

$factory->define(CodeCommerce\Tag::class, function ($faker) {
    return [
        'name' => $faker->word()
    ];
});

$factory->define(CodeCommerce\Status::class, function ($faker) {
    return [
        'descricao' => $faker->word()
    ];
});

$factory->define(CodeCommerce\ProductTag::class, function ($faker) {
    return [
        'product_id' => $faker->numberBetween(1,10),
        'tag_id' => $faker->numberBetween(1,10)
    ];
});
