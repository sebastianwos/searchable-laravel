<?php


namespace App\Services\Search;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AbstractSearch {

    protected $filters;
    protected $query;
    protected $pages;
    protected $order;

    protected function __construct(Request $request, Builder $query)
    {
        $this->filters = collect($request->all());
        $this->query = $query;
    }

    public function getResults()
    {
        return $this->query->get();
    }

    public function withPagination($pages)
    {
        $this->pages = $pages;
        return $this;
    }

    public function orderBy($order = [])
    {
        $this->order = $order;
        return $this;
    }

    protected function getFilterFor($name)
    {
        $filterClassName = $this->createFilterDecorator($name);

        if (! class_exists($filterClassName)) {
            return new NullFilter;
        }

        return new $filterClassName;
    }

    protected function applyFilters()
    {
        $this->filters->each(function ($value, $filterName) {
            $this->getFilterFor($filterName)->apply($this->query, $value);
        });

        return $this;
    }

    protected function createFilterDecorator($name)
    {
        return substr(get_class($this), 0, strrpos(get_class($this), '\\')) .
        '\\Filters\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
    }

    protected function getPaginated(){
        return $this->query->paginate($this->pages);
    }

    protected function getOrdered()
    {
        foreach ($this->order as $column => $order)
        {
            $this->query->orderBy($column, $order);
        }
    }

}