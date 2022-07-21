<?php
/**
 * Created by PhpStorm.
 * User: girish
 * Date: 25/12/17
 * Time: 11:06 AM
 */

//class Polymorphism_Encapsulation {}

// Polymorphism:

	// When we start to extend classes, and add functionality to them which wasn’t there previously, 
	// and even override existing methods (functions), this is called polymorphism.

	// Polymorphism describes a pattern in object oriented programming in which classes have different functionality 
	// while sharing a common interface.

/*
class ParentClass {
	public function myOwnMethod() {
		echo "ParentClass method called";
	}
}
class ChildClass extends ParentClass {
	public function myOwnMethod() {
		echo "ChildClass method called";
	}
}
function runClass(ParentClass $c) {
	$c->myOwnMethod();
}
$c = new ChildClass();
runClass($c);
echo '<br />';echo '<br />';

/**/

// Polymorphism
interface Shape {
	public function name();
}

class Circle implements Shape {
	public function name() {
		echo "I am a circle";
	}
}

class Triangle implements Shape {
	public function name() {
		echo "I am a triangle";
	}
}

function test(Shape $shape) {
	$shape->name();
}

test(new Circle()); // I am a circle
echo '<br />';
test(new Triangle()); // I am a triangle

// Encapsulation
class Person {
	private $name;

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}
}

echo '<br />';
$robin = new Person();
$robin->setName('Robin');
echo $robin->getName();
