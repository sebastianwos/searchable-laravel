<?php
/**
 * Created by PhpStorm.
 * User: JS-BOG
 * Date: 2016-09-11
 * Time: 18:21
 */
namespace App\Contracts;

interface CurrencyRepositoryInterface {

    /**
     * Get current rate for the given Currency Code (3 signs eg. EUR, PLN, USD) from Cache
     * If not in cache - updates from API
     * @param $currencyCode
     * @return mixed
     */
    public function getRate($currencyCode);

    /**
     * Update rate straight from the API
     * @param $currencyCode
     * @return int|\Psr\Http\Message\StreamInterface
     */
    public function updateRate($currencyCode);
}