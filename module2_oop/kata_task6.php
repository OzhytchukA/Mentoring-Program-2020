<?php
/**
 * 1. Copy and paste a working solution from Kata #4 of this Series (you may want to complete that first if you
 *    haven't done so already).
 * 2. You may safely remove the class constant and all class methods (except the class constructor) as these will
 *    not be tested in this Kata (Optional).
 * 3. Change the visibilites of all properties into protected visibility.
 * 4. Since all valid names must be strings, throw an InvalidArgumentException with the message "Name must be a
 *    string!" if the $name argument of the class constructor is not a string.
 * 5. Since all valid ages must be non-negative integers, throw an InvalidArgumentException with the message
 *    "Age must be a non-negative integer!" if the $age argument of the class constructor is not a non-negative integer.
 * 6. Since all valid occupations must be strings, throw an InvalidArgumentException with the message "Occupation
 *    must be a string!" if the $occupation argument of the class constructor is not a string.
 * 7. Since the $name, $age and $occupation properties of the Person class are now protected, any attempt at directly
 *    accessing them from outside the class will result in a Fatal error. Therefore, define three methods, get_name(),
 *    get_age() and get_occupation() which all accept no arguments and returns the $name, $age and $occupation of the
 *    Person respectively.
 * 8. Since $name, $age and $occupation are now protected, any attempt at directly reassigning them values outside
 *    the class will result in a Fatal error. Therefore, define three methods, set_name(), set_age() and
 *    set_occupation() in which each of them receives exactly one argument and sets the value of their respective
 *    properties to the value of the argument if and only if the argument is valid. The validity of the argument is
 *    the same as the standards used in the constructor (i.e. string value for $name and $occupation and non-negative
 *    integer for $age) and if the argument is invalid then throw the exact same errors (with the same messages)
 *    thrown by the constructor in such cases.
 */

class Person
{
	protected $name;
	protected $age;
	protected $occupation;

	public function __construct($name, $age, $occupation)
	{
		$this->set_name($name);
		$this->set_age($age);
		$this->set_occupation($occupation);
	}

	public function get_name()
	{
		return $this->name;
	}

	public function get_age()
	{
		return $this->age;
	}

	public function get_occupation()
	{
		return $this->occupation;
	}

	public function set_name($name)
	{
		if (!is_string($name)) {
			throw new InvalidArgumentException('Name must be a string!');
		}
		$this->name = $name;
	}

	public function set_age($age)
	{
		if (!is_integer($age) || $age < 0) {
			throw new InvalidArgumentException('Age must be a non-negative integer!');
		}
		$this->age = $age;
	}

	public function set_occupation($occupation)
	{
		if (!is_string($occupation)) {
			throw new InvalidArgumentException('Occupation must be a string!');
		}
		$this->occupation = $occupation;
	}
}