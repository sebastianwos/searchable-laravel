<?php


namespace App\Services\Search\Offer\Filters;

use App\Contracts\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class CostMin implements FilterInterface{

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    {
        return $builder->when($value, function($query) use ($value){
            return $query->where('monthly_cost', '>=', 100 * $value );
        });
    }

}