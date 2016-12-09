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


use App\AttributeType;
use App\Certificate;
use App\CommonAreaMethod;
use App\LocationPointType;
use App\MoneyUnit;
use App\OfferType;
use App\OwnershipStatus;
use App\TimeUnit;
use App\User;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Agent::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->jobTitle,
        'company' => $faker->company,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'facebook' => $faker->url,
        'linkedin' => $faker->url,
        'avatar' => $faker->imageUrl(),
    ];
});

$factory->define(App\Attribute::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'icon' => $faker->imageUrl(),
        'type_id' => $faker->randomElement(AttributeType::make()->getOptions()->keys()->all()),

    ];
});

$factory->define(App\LocationPoint::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'icon' => $faker->imageUrl(),
        'type_id' => $faker->randomElement(LocationPointType::make()->getOptions()->keys()->all()),
        'lng' => $faker->longitude,
        'lat' => $faker->latitude,

    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->country,
    ];
});

$factory->define(App\State::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
    return [
        'filename' => $faker->imageUrl(),
    ];
});

$factory->define(App\Video::class, function (Faker\Generator $faker) {
    return [
        'url' => $faker->imageUrl(),
    ];
});

$factory->define(App\Panorama::class, function (Faker\Generator $faker) {
    return [
        'url' => $faker->imageUrl(),
    ];
});

$factory->define(App\OfficeLevel::class, function (Faker\Generator $faker) {
    return [
        'area_min' => $faker->randomFloat(2, 0, 10000),
        'area_max' => $faker->randomFloat(2, 0, 10000),
        'rent_min' => $faker->randomFloat(2, 0, 10000),
        'rent_max' => $faker->randomFloat(2, 0, 10000),
    ];
});

$factory->define(App\OfficeLevelModule::class, function (Faker\Generator $faker) {
    return [
        'area_min' => $faker->randomFloat(2, 0, 10000),
        'area_max' => $faker->randomFloat(2, 0, 10000),
        'rent_min' => $faker->randomFloat(2, 0, 10000),
        'rent_max' => $faker->randomFloat(2, 0, 10000),
    ];
});

$factory->define(App\Offer::class, function (Faker\Generator $faker) {
    $users = User::all()->pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'title' => $faker->title,
        'zip' => $faker->postcode,
        'city' => $faker->city,
        'address' => $faker->address,
        'nr1' => $faker->randomDigit,
        'nr2' => $faker->randomDigit,
        'ownership_status_id' => $faker->randomElement(OwnershipStatus::make()->getOptions()->keys()->all()),
        'offer_type_id' => $faker->randomElement(OfferType::make()->getOptions()->keys()->all()),
        'lng' => $faker->longitude,
        'lat' => $faker->latitude,
        'zoom' => $faker->randomDigit,
        'location_description' => $faker->sentence(15),
        'location_description_langs' => $faker->sentence(15),
        'description' => $faker->sentence(15),
        'description_langs' => $faker->sentence(15),
        'offer_status_id' => $faker->randomElement(OfferType::make()->getOptions()->keys()->all()),
        'certificate_id' => $faker->randomElement(Certificate::make()->getOptions()->keys()->all()),
        'common_area_method_id' => $faker->randomElement(CommonAreaMethod::make()->getOptions()->keys()->all()),
        'offer_date' => $faker->date(),
        'levels' => $faker->randomDigit,
        'underground_levels' => $faker->randomDigit,
        'all_area' => $faker->randomFloat(2, 0, 10000),
        'average_level_area' => $faker->randomFloat(2, 0, 10000),
        'office_area' => $faker->randomFloat(2, 0, 10000),
        'common_area_percent' => $faker->randomNumber(2),
        'common_area' => $faker->randomFloat(2, 0, 10000),
        'ground_parking' => $faker->randomNumber(2),
        'underground_parking' => $faker->randomNumber(2),
        'parking_factor' => $faker->randomNumber(2),
        'monthly_cost' => $faker->randomNumber(4),
        'monthly_cost_money_unit' => $faker->randomElement(MoneyUnit::make()->getOptions()->keys()->all()),
        'minimal_rent_time' => $faker->randomNumber(2),
        'minimal_rent_time_unit' => $faker->randomElement(TimeUnit::make()->getOptions()->keys()->all()),
        'office_ground_parking' => $faker->randomNumber(2),
        'office_underground_parking' => $faker->randomNumber(2),
        'office_ground_parking_price' => $faker->randomNumber(4),
        'office_underground_parking_price' => $faker->randomNumber(4),
    ];
});


