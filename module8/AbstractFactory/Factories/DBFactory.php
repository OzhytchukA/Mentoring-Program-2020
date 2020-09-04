<?php

namespace AbstractFactory\Factories;

use AbstractFactory\Repositories\PersonDB;

class DBFactory implements RepositoryFactory
{
	/**
	 * @return PersonDB|mixed
	 */
    public function getData()
    {
        return new PersonDB();
    }
}
