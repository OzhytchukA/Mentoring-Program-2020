<?php

namespace AbstractFactory\Factories;

use AbstractFactory\Repositories\PersonFS;
use AbstractFactory\Repositories\PersonRepositoryInterface;

class FSFactory implements RepositoryFactory
{
    /**
     * @return PersonRepositoryInterface
     */
    public function getData(): PersonRepositoryInterface
    {
        return new PersonFS();
    }
}
