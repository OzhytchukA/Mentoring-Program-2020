<?php

namespace AbstractFactory\Repositories;

use AbstractFactory\Entity\Person;

class PersonFS implements PersonRepositoryInterface
{
	/**
	 * @var string
	 */
	private string $file = 'peoples.json';

	/**
	 * @param Person $person
	 */
	public function savePerson(Person $person): void
	{
		$personsData = json_decode(file_get_contents($this->file));
		$personsData[] = [
			'firstName' => $person->getFirstName(),
			'lastName' => $person->getLastName(),
		];

		file_put_contents($this->file, json_encode($personsData));
	}

	/**
	 * @return array
	 */
	public function readPeople(): array
	{
		$personsData = json_decode(file_get_contents($this->file));

		$arrayPersons = [];
		foreach ($personsData as $value) {
			$arrayPersons[] = (array)$value;
		}

		return $arrayPersons;
	}

	/**
	 * @param string $name
	 * @return Person|null
	 */
	public function readPerson(string $name): ?Person
	{
		$person = new Person();
		$result = '';
		$personsData = json_decode(file_get_contents($this->file));

		foreach ($personsData as $value) {
			if ($value->firstName === $name) {
				$result = $person->setFirstName($value->firstName)->setLastName($value->lastName);
			}
		}

		return !empty($result) ? $result : null;
	}
}
