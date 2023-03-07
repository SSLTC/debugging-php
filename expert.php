<?php

// In strict mode, only a variable of the requested type 
// (like: int of the type declaration) will be accepted, or a TypeError will be thrown.
declare(strict_types=1);

echo "Exercise 1 starts here:";

function new_exercise($x)
{
    $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
    echo $block;
}

new_exercise(2);

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[0];

echo $monday;

new_exercise(3);

$str = "Debugged ! Also very fun"; // double quotes
echo substr($str, 0, 10);

new_exercise(4);

foreach ($week as &$day)
{
    $day = substr($day, 0, -3);
}

print_r($week);

new_exercise(5);

function copyright(string $year)
{
    return "Copyright &copy; $year - BeCode";
}
//print the copyright
echo copyright(date('Y'));

new_exercise(6);

$arr = [];
/*
foreach(range('a','z') as $letter) {
    array_push($arr, $letter);
}
*/

// ;$letter <=> "aa"; loop until aa == aa (-101) false 0
// $letter = "a"; $letter <= "z"; $letter++
for ($i = 97; $i <= 122; $i++) {
    array_push($arr, chr($i));
}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alphabetical array

new_exercise(7);

function login(string $email, string $password)
{
    if ($email == 'john@example.be' // change || to &&
    && $password == 'pocahontas') {
        return 'Welcome John Smith<br/>';
        // put Smith behind John
    }
    return 'No access<br/>';
}

//should greet the user with his full name (John Smith)
echo login('john@example.be', 'pocahontas'); 
//Should say: no access
echo login('john@example.be', 'dfgidfgdfg'); 
//Should say: no access
echo login('wrong@example', 'wrong');

new_exercise(8);

function isLinkValid(string $link)
{
    $unacceptables = array('https:','.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) !== false) { // !== false instead of == true
            // str_contains() === true
            return 'Unacceptable Found<br>';
        }
    }
    return 'Acceptable<br>';
}
//invalid link
echo isLinkValid('http://www.google.com/hack.pdf');
//invalid link
echo isLinkValid('https://google.com');
//VALID link
echo isLinkValid('http://google.com');
//VALID link
echo isLinkValid('http://google.com/test.txt');

new_exercise(9);

$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];
//from here on you can change the code
$arrayLength = count($areTheseFruits); // add this line
for ($i=0; $i < $arrayLength; $i++) {
    if (!in_array($areTheseFruits[$i], $validFruits)) {
        unset($areTheseFruits[$i]);
    }
}
/*
foreach($areTheseFruits as $index => $value) {
    if(!in_array($value, $validFruits)) {
        unset($areTheseFruits[$index]);
    }
}
*/
var_dump($areTheseFruits);//do not change this

new_exercise(10);

//$arr = [];

function combineNames($str1 = "", $str2 = "")
{
    $params = [$str1, $str2];
    // pass by reference (&) and 
    // pass index to randomHeroName were 0 is equal to hero_firstnames or lastname = false
    foreach ($params as $index => &$param) {
        if ($param == "") {
            $param = randomHeroName($index);
        }
    }
    // return instead of echo and switch arguments
    return implode(" - ", $params);
}

function randomHeroName($lastname = true)
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    // change random heroes to lastname (1) or firstname (0)
    $randName = $heroes[$lastname][rand(0, 10)];
    // return instead of echo
    return $randName;
}

echo "Here is the name: " . combineNames();