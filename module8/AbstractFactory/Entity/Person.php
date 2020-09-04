<?php

namespace AbstractFactory\Entity;

class Person
{
    /**
     * @var string
     */
	private string $firstName;

    /**
     * @var string
     */
	private string $lastName;

    /**
     * @param string $firstName
     * @return Person
     */
    public function setFirstName(string $firstName): Person
    {
        $this->firstName = $firstName;
        return $this;
    }

	/**
	 * @return mixed
	 */
	public function getFirstName(): string
	{
		return $this->firstName;
	}

    /**
     * @param string $lastName
     * @return Person
     */
    public function setLastName(string $lastName): Person
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
}
