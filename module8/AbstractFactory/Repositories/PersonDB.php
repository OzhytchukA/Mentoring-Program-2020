<?php

namespace AbstractFactory\Repositories;

use AbstractFactory\Entity\Person;

class PersonDB implements PersonRepositoryInterface
{
	/**
	 * @var \mysqli $conn
	 */
	private \mysqli $conn;

	/**
	 * PersonDatabaseStorage constructor.
	 */
	public function __construct()
	{
		$this->conn = new \mysqli('localhost', 'root', 'root', 'abstract_factory');
	}

	/**
	 * @param Person $person
	 */
	public function savePerson(Person $person): void
	{
		$firstName = $person->getFirstName();
		$lastName = $person->getLastName();
		$stmt = $this->conn->prepare('INSERT INTO persons (firstName, lastName) VALUES (?, ?)');
		$stmt->bind_param('ss', $firstName, $lastName);
		$stmt->execute();
		$stmt->close();
	}

	/**
	 * @return array
	 */
	public function readPeople(): array
	{
		$stmt = $this->conn->prepare('SELECT * FROM persons');
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();

		$persons = [];
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$persons[] = $row['firstName'] . ' ' . $row['lastName'];
			}
		}

		return !empty($persons) ? $persons : ['0 results'];
	}

	/**
	 * @param string $name
	 * @return Person|null
	 */
	public function readPerson(string $name): ?Person
	{
		$stmt = $this->conn->prepare('SELECT * FROM persons WHERE firstName = ?');
		$stmt->bind_param("s", $name);
		$stmt->execute();
		$result = $stmt->get_result();
		$person = $result->fetch_object(Person::class);
		$stmt->close();

		return $person;
	}
}
