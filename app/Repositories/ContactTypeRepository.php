<?php

namespace App\Repositories;


use App\ContactType;
use App\Contracts\ContactTypeRepositoryInterface;

class ContactTypeRepository implements ContactTypeRepositoryInterface
{
    public function getStatusesForSelect()
    {
        $res = [];
        $results = ContactType::make()->getOptions();

        foreach ($results as $id => $name){
            array_push($res, [
                'id' => $id,
                'name' => $name,
            ]);
        }

        return $res;
    }
}