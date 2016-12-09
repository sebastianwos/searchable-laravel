<?php
/**
 * Created by PhpStorm.
 * User: JS-BOG
 * Date: 2016-09-03
 * Time: 09:19
 */

namespace App;


use App\Utilities\OptionsList;

class OfferPublicationStatus extends OptionsList{

    const DRAFT = 1;
    const WAITING_FOR_APPROVE = 2;
    const PUBLISHED = 3;

}