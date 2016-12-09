<?php


namespace App\Services\Search\Offer;


use App\Offer;
use App\Services\Search\AbstractSearch;
use Illuminate\Http\Request;

class Search extends AbstractSearch{

    public static function apply(Request $filters)
    {
        return (new self($filters, Offer::query()))
                ->applyFilters();
    }

    public function getResults()
    {
        $result = $this->query->with('category');

        if($this->order){
            $this->getOrdered();
        }

        if($this->pages){
            return $this->getPaginated();
        }

        return $result->get();
    }

}