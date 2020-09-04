<?php

namespace AbstractFactory\Factories;

use AbstractFactory\Repositories\PersonDB;
use AbstractFactory\Repositories\PersonRepositoryInterface;

class DBFactory implements RepositoryFactory
{
    /**
     * @return PersonRepositoryInterface
     */
    public function getData(): PersonRepositoryInterface
    {
        return new PersonDB();
    }
}
