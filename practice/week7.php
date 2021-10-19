<?php
# question 10 ternary operator 
$example = (5 > 10) ? 9 : 10;
echo $example; # 10
echo "<br><br>";

# question 4 create a class
class Person
{
    # Properties
    public $firstName;
    public $lastName;
    public int $age;
    public $getFullName;

    # Methods
    public function __construct($firstName, $lastName, $age)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }
    public function getFullName()
    {
        $getFullName = "$this->firstName $this->lastName";
        $this->getFullName = $getFullName;
        if ($this->getFullName) {
        }
        return $this->getFullName;
    }
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
echo "<br>";
// echo $person->lastName;
// echo "<br>";
// echo $person->age;
echo $person->getFullName();
echo "<br>";
echo $person->getClassification();
echo "<br>";

# question 2 write a function
$example1 = vowelCount('apple'); # Should yield 2
$example2 = vowelCount('lynx'); # Should yield 0
$example3 = vowelCount('hi'); # Should yield 1
$example4 = vowelCount('mississippi'); # Should yield 4

function vowelCount($word)
{
    /* 
    $vowels = ['a', 'e', 'i', 'o', 'u']; 
    #simplified to inclusion in 
    if statement based on forum reply
    variable name revision to be different than function name
    */
    $countVowels = 0;
    # https://www.php.net/manual/en/language.operators.string.php
    $words = str_split($word, 1);
    foreach ($words as $character) {
        # https://www.php.net/manual/en/function.in-array.php
        if (in_array($character, ['a', 'e', 'i', 'o', 'u'])) {
            $countVowels++;
        }
    }
    return $countVowels;
}
echo "<br>apple has $example1 vowel(s)";
echo "<br>lynx has $example2 vowel(s)";
echo "<br>hi has $example3 vowel(s)";
echo "<br>mississippi has $example4 vowel(s)";

# double check property definitions against reading, 
# originally I selected all choices based on reading

class Definition
{
    public $name;
    public $named = 'Jane';
    public $dames = ['Jane', 'Avi', 'Jamal', 'Natalia'];
    // public $names = file_get_contents('names.json'); # vsCode error
}