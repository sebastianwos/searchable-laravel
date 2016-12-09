<?php

namespace App\Repositories;


use App\Contracts\OwnershipStatusRepositoryInterface;
use App\OwnershipStatus;

class OwnershipStatusRepository implements OwnershipStatusRepositoryInterface
{
    public function getStatusesForSelect()
    {
        $res = [];
        $results = OwnershipStatus::make()->getOptions();

        foreach ($results as $id => $name){
            array_push($res, [
                'id' => $id,
                'name' => $name,
            ]);
        }

        return $res;
    }
}