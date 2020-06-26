<?php

$description = "An amazing PHP Kata Series, complete with 10 top-quality Kata containing a large number of both fixed and random tests, that teaches both the fundamentals of object-oriented programming in PHP (in the first 7 Kata of this Series) and more advanced OOP topics in PHP (in the last 3 Kata of this Series) such as interfaces, abstract classes and even anonymous classes in a way that stimulates critical thinking and encourages independent research";
$kata_array = [
	"Object-Oriented PHP #1 - Classes, Public Properties and Methods",
	'Object-Oriented PHP #2 - Class Constructors and $this',
	"Object-Oriented PHP #3 - Class Constants and Static Methods",
	"Object-Oriented PHP #4 - People, people, people (Practice)",
	"Object-Oriented PHP #5 - Classical Inheritance",
	"Object-Oriented PHP #6 - Visibility",
	"Object-Oriented PHP #7 - The \"Final\" Keyword",
	"Object-Oriented PHP #8 - Interfaces [Advanced]",
	"Object-Oriented PHP #9 - Abstract Classes [Advanced]",
	"Object-Oriented PHP #10 - Objects on the Fly [Advanced]",
];

$object_oriented_php = new class($description, $kata_array, 10) {
	public $description;
	public $kata_list;
	public $kata_count;
	public $author;

	public function __construct($description, $kata_list, $kata_count)
	{
		$this->description = $description;
		$this->kata_list = $kata_list;
		$this->kata_count = $kata_count;
	}

	public function advertise($name)
	{
		return "Hey {$name}, don't forget to check out this great PHP Kata Series authored by Donald called \"Object-Oriented PHP\"";
	}

	public function get_kata_by_number($kata_number)
	{
		if (!is_int($kata_number) || $kata_number < 1 || $kata_number > 10) {
			throw new InvalidArgumentException('Exception');
		}

		return $this->kata_list[$kata_number-1];
	}

	public function complete()
	{
		return "Hooray, I've finally completed the entire \"Object-Oriented PHP\" Kata Series!!!";
	}
};

