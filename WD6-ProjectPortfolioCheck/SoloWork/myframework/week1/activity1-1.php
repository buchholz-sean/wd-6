<?php


// 1 Complete Development Environment Setup and create a Hello World application:
echo '<h2>Question 1</h2>';
class Speaker
{
    public function __construct($name="World")
    {
        echo "Hello ".$name."!";
    }

    public function smallTalk()
    {
        echo '<br />';
        echo "Lovely weather we're having, isn't it?";
    }
}

$sayHi = new Speaker('Sean');

$sayHi->smallTalk();

// 2 Users method created above to test functionality
echo '<h2>Question 2</h2>';
$name = 'Sean';
$age = 31;

$person = array($name, $age, 'name'=>$name, 'age'=>$age);

echo "My name is ".$name." and my age is ".$age.".<br />";
echo 'My name is '.$name.' and my age is '.$age.'.<br />';
echo 'My name is '.$person[0].' and my age is '.$person[1].'.<br />';
echo 'My name is '.$person['name'].' and my age is '.$person['age'].'.<br />';

$age = null;
echo 'Null value of $age: <br />';
echo $age;

unset($name);

echo 'unset value of $name: <br />';
echo $name;

// 3 Assign letter grades based on points earned. Using if/else/elseif statements, create a function that returns a letter grade based on the following point breakdowns when called:

// 100-90=A, 80-89=B, 79-70=C, 69-60=D, <60=F

echo '<h2>Question 3</h2>';
function grader($grade)
{
    if ($grade >= 90 && $grade <= 100) {
        echo 'You earned an A!<br />';
    } elseif ($grade >= 80 && $grade < 90) {
        echo 'You earned a B.<br />';
    } elseif ($grade >= 70 && $grade < 80) {
        echo 'You earned a C.<br />';
    } elseif ($grade >= 60 && $grade < 70) {
        echo 'You earned a D.<br />';
    } elseif ($grade < 60) {
        echo 'You have received an F.<br />';
    } else {
        echo "Are you sure you didn't cheat?<br />";
    }
}

// To test your function, try it with these 5 point values and echo the result back out from the value returned from the function:
//
// 1. 94
// 2. 54
// 3. 89.9
// 4. 60.01
// 5. 102.1

grader(94);
grader(54);
grader(89.9);
grader(60.01);
grader(102.1);


// 4 Create an array indexed by integers. Create 5 solid color values for the even numbers (starting at 0, through 9), then a shade of that color for the successive odd number.
// E.g., [0] => "Red", [1] => "Pink", [2] => "Blue", [3] => "Baby Blue", [4] => "Green", [5] => "Lime"
//
// Loop through the colors of the array and display the index number and color name.
echo '<h2>Question 4</h2>';
$colors = array('Red', 'Scarlet', 'Orange', 'Ochre', 'Yellow', 'Citron', 'Green', 'Chartreuse', 'Blue', 'Periwinkle');

foreach ($colors as $key => $value) {
    echo "The color at Index {$key} is {$value}.<br />";
}
