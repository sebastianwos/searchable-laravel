<?php


namespace App\Contracts;

interface AgentRepositoryInterface {

    /**
     * Return all ownership statuses as array of labels and values for input select
     * @return array [['value' => 'example1', 'label' => 'Label1'], ['value' => 'example2', 'label' => 'Label2']]
     */
    public function getAgentsForAddingOfferSelect();
}