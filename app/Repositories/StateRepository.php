<?php

namespace App\Repositories;


use App\Contracts\StateRepositoryInterface;
use App\State;

class StateRepository implements StateRepositoryInterface
{

    public function getStatesForSelect()
    {
        return State::all();
    }
}