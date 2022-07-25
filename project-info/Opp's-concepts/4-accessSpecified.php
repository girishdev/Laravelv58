<?php

/*
Link: https://www.fullstacktutorials.com/interviews/oops-interview-questions-and-answers-for-experienced-in-php-5.html

Q:- What is different types of Visibility? OR What are access modifiers?
    Each method and property has its visibility. There are three types of visibility in PHP.

    Types of visibility:
    public: Public method or variable can be accessible from anywhere, Means a public method or variable of a class can be called outside of the class or in a subclass.
    protected: A protected method or variable can only be called in that class & it's subclass.
    private: A private method or variable of a class can only be called inside that class only in which it is declared.

    NOTE: By default, in PHP, a class member is public unless declared private or protected.

In Php Multilevel inheritance is possible but Multiple inheritance is not possible.

In simplified terms in php child class can not inherit more than one parent class. But hierarchical inheritance is possible in php.

/**/

class MyClass4 {
    public $public = 'Public1';
    protected $protected = 'Protected1';
    private $private = 'Private1';

    function printHello()
    {
        echo 'This is from MyClass: == '.$this->public . '<br /><br />';
        echo 'This is from MyClass: == '.$this->protected . '<br /><br />';
        echo 'This is from MyClass: == '.$this->private . '<br /><br />';
    }
}

class MyClass2 extends MyClass4 {
    // We can redeclare the public and protected method, but not private
    protected $protected = 'Protected2';
    //public $public = 'public22';
    private $private = 'private22';

    function printHello()
    {
        echo 'This is MyClass2: == '.$this->public . '<br /><br />';
        echo 'This is MyClass2: == '.$this->protected . '<br /><br />';
        echo 'This is MyClass2: == '.$this->private . '<br /><br />';
    }
}

$obj2 = new MyClass2();
echo '<b>This is outside of the MyClass2:</b> '.$obj2->public . '<br /><br />'; // Works
//echo '<b>This is outside of the MyClass2:</b>'.$obj2->private; // Undefined
//echo '<b>This is outside of the MyClass2:</b>'.$obj2->protected; // Fatal Error
$obj2->printHello(); // Shows Public, Protected2, Undefined
