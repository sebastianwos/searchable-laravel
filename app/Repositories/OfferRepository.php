<?php

namespace App\Repositories;


use App\Contracts\OfferRepositoryInterface;
use App\Http\Requests\AddOfferFormRequest;
use App\Offer;

class OfferRepository implements OfferRepositoryInterface
{
    public function findOrCreateOfferFormData($offerId)
    {
        if (empty($offerId)) {
            $offer = Offer::create(['user_id' => \Auth::user()->id]);
        }else{
            $offer = Offer::select('*')->find($offerId);
        }

        return $offer->toArray();
    }

    public function getAllOffersAsMarkers()
    {
        $markers = Offer::select('lat', 'lng')->get()->map(function($item, $key){
            return ['position' => ['lat' => $item['lat'], 'lng' => $item['lng']]];
        });
        return $markers;
    }

    public function getAllMyOffers()
    {
        return \Auth::user()->offers()->get();
    }

    public function removeMyOffer($offerId)
    {
        return \Auth::user()->offers()->where('id', $offerId)->delete();
    }

    public function saveOffer(AddOfferFormRequest $request)
    {
        $row = Offer::find($request->id);
        $row->title = $request->title;
        $row->category_id = $request->category_id;
        $row->subcategory_id = $request->subcategory_id;
        $row->zip = $request->zip;
        $row->address = $request->address;
        $row->country_id = $request->country_id;
        $row->state_id = $request->state_id;
        $row->city = $request->city;
        $row->nr1 = $request->nr1;
        $row->nr2 = $request->nr2;
        $row->ownership_status_id = $request->ownership_status_id ? $request->ownership_status_id : null;
        $row->agent_id = $request->agent_id;
        $row->contact_type_id = $request->contact_type_id;
        $row->save();
    }
}