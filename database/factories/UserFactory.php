<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Brand;
use App\Buyer;
use App\Branch;
use App\Client;
use App\Output;
use App\Product;
use App\Provider;
use App\Maintenance;
use App\ModelProduct;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//         'remember_token' => Str::random(10),
//     ];
// });


$factory->define(Provider::class, function (Faker $faker) {

    $phone = $faker->regexify('9'.$faker->randomNumber(9,false));

    return [
        'names' => $faker->name,
        'phone1' => $faker->regexify('9'.$faker->randomNumber(9,false)),
        'phone2' => $faker->optional(0.5)->regexify('9'.$faker->randomNumber(9,false)),
    ];
});

$factory->define(Buyer::class, function (Faker $faker) {

    $provider = Provider::all()->random();

    return [
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        // 'total' => $faker->name,
        'state' => $faker->randomElement([Buyer::XPAGAR, Buyer::FINALIZADO]),
        'id_provider' => $provider->id
    ];
});


$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(50)
    ];
});


$factory->define(ModelProduct::class, function (Faker $faker) {

    $id_brand = Brand::all()->random();
    
    return [
        'name' => $faker->name,
        'description' => $faker->text(50),
        'stock' => $faker->regexify('^[1-9]{1}$'),
        'id_brand' => $id_brand->id
    ];
});


$factory->define(Branch::class, function (Faker $faker) {

    $ticket_series = '1';
    $ticket_number = $ticket_series + 1;
    
    return [
        'galery' => $faker->text(10),
        'stand' => $faker->regexify('^[1-4]{2}$'),
        'name' => $faker->text(7),
        'city' => $faker->cityPrefix,
        'address' => $faker->secondaryAddress,
        'ticket_series' => $ticket_series,
        'ticket_number' => $ticket_number
    ];
});


$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'dni' => $faker->regexify('^[1-9]{8}$'),
        'phone1' => $faker->regexify('9'.$faker->randomNumber(9,false)),
        'phone2' => $faker->optional(0.5)->regexify('9'.$faker->randomNumber(9,false)),
        'birthdate' => $faker->date,
        'city' => $faker->city,
    ];
});

$factory->define(Output::class, function (Faker $faker) {

    $client = Client::all()->random();
    
    return [
        'total' => $faker->regexify('^[1-9]{2}$'),
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'output_type' => $faker->randomElement([Output::VENTA_MENOR, Output::VENTA_MAYOR]),
        'description' => $faker->text(30),

        'id_client' => $client->id,
    ];
});



$factory->define(Product::class, function (Faker $faker) {

    $price_buy = $faker->regexify('^[1-7]00$');
    $price_sale = $price_buy + 100;
    $price_sale_min = $price_sale - 20;
    $price_sale_max = $price_sale + 20;

    $model_product = ModelProduct::all()->random();
    $branch = Branch::all()->random();

    return [
        'mac' => $faker->macAddress,
        'state' => $faker->randomElement([Product::VERIFICANDO, Product::DISPONIBLE]),
        'defect' => $faker->randomElement([Product::SINDEFECTO]),
        'price_buy' => $price_buy,
        'price_sale' => $price_sale,
        'price_sale_min' => $price_sale_min,
        'price_sale_max' => $price_sale_max,

        'id_model_product' => $model_product->id,
        'id_branch' => $branch->id
    ];
});


$factory->define(Maintenance::class, function (Faker $faker) {

    $product = Product::all()->random();

    $product->state = Product::MANTENIMIENTO;

    $product->save();

    return [
        'name' => $faker->name,
        'price' => $faker->regexify('^[1-9]0$'),
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'description' => $faker->text(30),
        'technical' => $faker->name,
        'state' => $faker->randomElement([Maintenance::PROCESO, Maintenance::REALIZADO, Maintenance::PROCESO]),

        'product_id' => $product->id
    ];
});


