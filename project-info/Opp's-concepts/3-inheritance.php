<?php

/*
Inheritance:-
    Inheritance allow a class to extend another class and inherit all its methods,
        properties and behaviors.

/**/

echo '<h3>Class Inheritance / extends:</h3>';

class Foo {
    public function printitem($string){
        echo 'Foo: ' . $string . PHP_EOL;
    }
    public function printPHP(){
        echo 'PHP is great. ' . PHP_EOL;
    }
}

class Bar extends Foo{
    public function printitem($string){
        echo 'Bar: ' . $string . PHP_EOL;
    }
}

$foo = new FOO(); // Creating an Object
$bar = new Bar(); // Creating an Object

$foo -> printItem('baz');
$foo -> printPHP();
echo '<br />';

$bar -> printItem('baz');
$bar -> printPHP();
echo '<br />';

