<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-12-08
 * Time: 14:22
 */
namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface {

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value);
}