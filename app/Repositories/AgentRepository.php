<?php

namespace App\Repositories;


use App\Agent;
use App\Contracts\AgentRepositoryInterface;

class AgentRepository implements AgentRepositoryInterface
{
    public function getAgentsForAddingOfferSelect()
    {
        return \Auth::user()->agents()->get();
    }

    public function getAgentById($agentId)
    {
        return Agent::find($agentId);
    }
}