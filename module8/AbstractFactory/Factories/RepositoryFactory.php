<?php

namespace AbstractFactory\Factories;

use AbstractFactory\Repositories\PersonRepositoryInterface;

interface RepositoryFactory
{
    /**
     * @return PersonRepositoryInterface
     */
    public function getData(): PersonRepositoryInterface;
}
