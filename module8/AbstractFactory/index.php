<?php

require 'vendor/autoload.php';

use AbstractFactory\Entity\Person;
use AbstractFactory\Factories\FSFactory;
use AbstractFactory\Factories\DBFactory;

$person = (new Person())
    ->setFirstName('Andrii')
    ->setLastName('Ozhytchuk');

$repository = (new DBFactory())->getData();

//$repository->savePerson($person);
print_r($repository->readPeople());
//print_r($repository->readPerson('Andrii'));
