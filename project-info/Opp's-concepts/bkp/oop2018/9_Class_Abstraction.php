<?php
/**
 * Created by PhpStorm.
 * User: girish
 * Date: 25/12/17
 * Time: 11:40 AM
 */

// echo "http://www.techflirt.com/tutorials/oop-in-php/abstract-classes-interface.html";

/*echo "What is abstract Classes";
	- You can create abstract classes in php using abstract keyword.
	- Abstract classes are those classes which can not be directly initialized.
	    Or in other word we can say that you can not create object of abstract classes.
	- Abstract classes always created for inheritance purpose.
	- You can only inherit abstract class in your child class.
	- Usually abstract class are also known as base class.
	- We call it base class because abstract class are not the class which is available directly for
		creating object.
	- It can only act as parent class of any normal class. You can use abstract class in class hierarchy.
	- Mean one abstract class can inherit another abstract class also.
	- Private methods cannot be abstract
		If a method is defined as abstract then it cannot be declared as private
		(it can only be public or protected).
		This is because a private method cannot be inherited.
/**/

abstract class AbstractClass {
	abstract protected function getValue();
	abstract protected function prefixValue($prefix);

	public function printOut($a, $b){
		print $this->getValue();
		echo 'This is just for testing purpose only ';
		echo $a+$b;
	}
}

class ConcreteClass1 extends AbstractClass {
	protected function getValue(){
		return "ConcreteClass1: ";
	}
	public function prefixValue($prefix) {
		return " {$prefix}ConcreteClass1";
	}
}

class ConcreteClass2 extends AbstractClass {
	protected function getValue(){
		return "ConcreteClass2: ";
	}
	public function prefixValue($prefix) {
		return " {$prefix}ConcreteClass2";
	}
}

$class1 = new ConcreteClass1;
$class1->printOut(10,2);
echo $class1->prefixValue("Foo: ");
echo '<br />';echo '<br />';

$class2 = new ConcreteClass2;
$class2->printOut(3,3);
echo $class2->prefixValue("Foo: ");/**/
