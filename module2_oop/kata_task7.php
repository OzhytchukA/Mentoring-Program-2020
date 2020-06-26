<?php
/**
 * 1. Copy and paste a working solution from Kata #4 of this Series
 * 2. Since all humans greet extraterrestrials in the exact same way, declare the greet_extraterrestrials static
 *    method as final.
 * 3. Since all people also describe their jobs in the same way, make the describe_job method final too.
 * 4. Declare and define a new class, ComputerProgrammer, which "is a" Person ;)
 * 5. In the ComputerProgrammer class, override the introduce method such that it returns a string of the format
 *    "Hello, my name is NAME_HERE and I am a OCCUPATION_HERE"
 */

class Person
{
	const species = 'Homo Sapiens';

	public $name;
	public $age;
	public $occupation;

	public function __construct($name, $age, $occupation)
	{
		$this->name = $name;
		$this->age = $age;
		$this->occupation = $occupation;
	}

	public function introduce()
	{
		return 'Hello, my name is ' . $this->name;
	}

	final function describe_job()
	{
		return 'I am currently working as a(n) ' . $this->occupation;
	}

	final static function greet_extraterrestrials($species)
	{
		return "Welcome to Planet Earth {$species}!";
	}
}

class ComputerProgrammer extends Person
{
	public function introduce()
	{
		return parent::introduce() . ' and I am a ' . $this->occupation;
	}
}