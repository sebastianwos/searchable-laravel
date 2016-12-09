<?php
/**
 * Created by PhpStorm.
 * User: JS-BOG
 * Date: 2016-09-11
 * Time: 17:39
 */

namespace App\Repositories;

use App\Contracts\CurrencyRepositoryInterface;
use Cache;
use GuzzleHttp\ClientInterface;

class CurrencyRepository implements CurrencyRepositoryInterface {

    /**
     * @var HTTP Client
     */
    private $client;

    /**
     * CurrencyRepository constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Get current rate for the given Currency Code (3 signs eg. EUR, PLN, USD) from Cache
     * If not in cache - updates from API
     * @param $currencyCode
     * @return mixed
     */
    public function getRate($currencyCode)
    {
        $self = $this;
        return Cache::remember("currency.$currencyCode", 24*60 , function() use ($self, $currencyCode) {
            return $self->updateRate($currencyCode);
        });
    }

    /**
     * Update rate straight from the API
     * @param $currencyCode
     * @return int|\Psr\Http\Message\StreamInterface
     */
    public function updateRate($currencyCode)
    {
        $response = $this->client->get("http://api.nbp.pl/api/exchangerates/rates/a/$currencyCode/?format=json");
        if($response->getStatusCode() === 200){
            return json_decode($response->getBody())->rates[0]->mid;
        }else{
            return 0;
        }
    }

}