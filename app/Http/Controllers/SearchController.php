<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryRepositoryInterface;
use App\OfferStatus;
use App\OfferType;
use App\Services\Search\Offer\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;


    /**
     * SearchController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function filter(Request $request)
    {
        $request->flash();

        $offers = Search::apply($request)
                    ->orderBy([
                        'title' => 'desc',
                        'office_area' => 'asc',
                    ])
                    ->withPagination(15)
                    ->getResults()
                    ->appends(request()->except('_token'));

        $categories = $this->categoryRepository->all();
        $offerTypes = OfferType::make()->getOptions('- select -');
        $offerStatuses = OfferStatus::make()->getOptions('- select -');

        return view('search', compact('categories', 'offers', 'offerTypes', 'offerStatuses'));

    }
}
