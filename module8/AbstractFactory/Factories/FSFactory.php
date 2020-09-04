<?php

namespace AbstractFactory\Factories;

use AbstractFactory\Repositories\PersonFS;

class FSFactory implements RepositoryFactory
{
	/**
	 * @return PersonFS|mixed
	 */
    public function getData()
    {
        return new PersonFS();
    }
}
