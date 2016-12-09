<?php


namespace App\Contracts;

interface ContactTypeRepositoryInterface {

    /**
     * Return all contact type statuses as array of labels and values for input select
     * @return array [['value' => 'example1', 'label' => 'Label1'], ['value' => 'example2', 'label' => 'Label2']]
     */
    public function getStatusesForSelect();
}