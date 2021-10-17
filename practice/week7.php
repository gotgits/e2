<?php

// $example = (5 > 10) ? 9 : 10;
// var_dump($example); # 10

class Person
{
    # Properties
    public $firstName;
    public $lastName;
    public int $age;


    # Methods
    public function __construct($firstName, $lastName, $age)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }
    // public function getFullName()
    // {
    //     $this->getFullName = '$this->firstName ' . '$this->lastName';
    // }
    public function getClassification()
    {
        if ($this->age >= 18) {
            return "adult";
        } else
            return "minor";
    }
}
$person = new Person('John', 'Harvard', 45);
echo $person->firstName;
echo "\n";
// echo $person->lastName;
// echo $person->age;
// echo $person->getFullName();
echo $person->getClassification();