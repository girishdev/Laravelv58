<?php

/*
Link: https://www.fullstacktutorials.com/interviews/oops-interview-questions-and-answers-for-experienced-in-php-5.html

Q:- What is Constructor and Destructor?
    Constructor:
        Constructor is a special type of function which will be called automatically whenever there is any object
        created from a class.

    Destructor:
        Destructor is a special type of function which will be called automatically whenever any object is
        deleted or goes out of scope.

Types of constructors:
1. Default constructor
    A constructor without any parameters is called a default constructor.

2. Parameterized constructor
    A constructor with at least one parameter is called a parametrized constructor.

3. Copy Constructor

4. Static Constructor

5. Private Constructor
    Purpose of Private Constructor: It ensures that there can be only one instance of a Class and provides a
        global access point to that instance and this is common with The Singleton Pattern.

/**/

class Constructors_Destructors {

    public function __construct() {

        print 'This is calling from Constructors_Destructors....';

    }

}

class subClass extends Constructors_Destructors {

    public function __construct() {
        parent::__construct();
        echo '<br>';
        print 'This is calling from subClass';

    }

}

$obj1 = new Constructors_Destructors;
echo '<br />';
$obj2 = new subClass();

class MyDestructableClass {

    function __construct() {
        print "In Constructor";
        $this->name = " MyDestructableClass ";
    }

    function __destruct() {
        // TODO: Implement __destruct() method.
        print " ::Destroying:: " . $this->name;
    }

}

echo '<br />';echo '<br />';
$obj3 = new MyDestructableClass();
