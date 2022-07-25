<?php

/*
Link: https://www.fullstacktutorials.com/interviews/oops-interview-questions-and-answers-for-experienced-in-php-5.html

Q:- What is Object Oriented Programming?
    Object oriented programming is a programming technique to design your application.
    Application can be of any type like it can be web based application, windows based application etc.

Q:- What is a class?
    A class is a template for an object, a user-defined datatype that contains variables, properties, and methods.

    Class represents all properties and behaviors of object.

/**/

class Person {
    public $name;
    public $age;
    function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
    function getUserDetails(){
        return "Hi, My Name is ".$this->name." and I'm ". $this->age ." old";
    }
}
// To create php object we have to use a new operator.
$obj = new Person("Girish", 32);
echo $obj->getUserDetails();
// Output: Hi, My Name is Girish and I'm 32 old

/*

Q:- What is an object?
    Objects are created from Classes, is an instance of a class that is created dynamically.

    Object in programming is similar to real word object. Every programming object has some properties and behaviors.

    //Create an object of MyClass

    $obj = new MyClass();
    OR
    $obj = new MyClass;

Q:- What is the relation between Classes and Objects?
    They look very much same but are not same.

    A class is a definition, while an object is an instance of the class.
    A class is a blueprint while objects are actual objects existing in the real world.
    Suppose we have a class Person which has attributes and methods like name, age, height, weight, color etc.

    Class Person is just a prototype, now we can create real-time objects of class Person.

    #Example: Girish is real time object of class Person, which have name=Girish, age=32, height=170cm,
        weight=90kg and color=black etc.

Class
    A way to bind data and associated functions together.
    Class have many objects.
    Class is a template for creating objects.
    It is logical existence.
    Memory space is not allocated, when it is created.
    Definition (Declaration) is created once.
    Class is declared using "class" keyword.

Object
    Basic runtime entity in object oriented environment.
    Object belongs to only class.
    Object are a implementation of class.
    It is physical existence.
    Memory space is allocated when it is created.
    It is created many times as you required.
    Object is the instance or variable of class.

/**/
