<?php
/**
 * Created by PhpStorm.
 * User: Mirek
 * Date: 2016-10-08
 * Time: 23:05
 */
namespace App\Contracts;

interface OfferRepositoryInterface {
    public function findOrCreateOfferFormData($offerId);
    public function getAllOffersAsMarkers();
}