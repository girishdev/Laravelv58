<?php

echo "http://www.techflirt.com/tutorials/oop-in-php/abstract-classes-interface.html";
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
	
echo "What is Interface ?"; 

	- You can create interface in php using keyword interface.
	- Interface in oop enforce definition of some set of method in the class.
	- By implementing interface you are forcing any class to must declaring some specific set of methods in oop.
	- You can implement your interface in your class using "implements" keyword.
	- You can only define method in interface with public accessibility.
	- If you will use other than public visibility in interface then it will throw error.
	- Also while defining method in your interface do not use abstract keyword in your methods.
	- You can also extend interface like class. You can extend interface in php using extends keyword.
	- You can not implement 2 interfaces if both share function with same name. It will throw error.
	Fatal error: Interface function a::foo() cannot contain body in C:\xampp\htdocs\Example_programs\Practise\5-Oops-Main\Opp's-concepts\1.7-Oop's-Interfaces.php on line 62

	Differences between abstract class and interface in PHP

		Following are some main difference between abstract classes and interface in php

		=>In abstract classes this is not necessary that every method should be abstract. But in interface every method is abstract.
		=>Multiple and multilevel both type of inheritance is possible in interface. But single and multilevel inheritance is possible in abstract classes.
		=>Method of php interface must be public only. Method in abstract class in php could be public or protected both.
		***=>In abstract class you can define as well as declare methods. But in interface you can only declare your methods & we can't define our method.
		***=>Fatal error: Interface function a::foo() cannot contain body in C:\xampp\htdocs\Example_programs\Practise\5-Oops-Main\Opp's-concepts\1.7-Oop's-Interfaces.php on line 62/**/

	echo '<h3>AbstractClass:</h3>';
	abstract class AbstractClass {
		abstract protected function getValue();
		abstract protected function prefixValue($prefix);
		
		public function printOut($a, $b){
			print $this->getValue();
			echo 'This is just for testing purpose only';
			echo $a+$b;
		}
	}
	
	class ConcreteClass1 extends AbstractClass {
		protected function getValue(){
			return "ConcreteClass1: ";
		}
		public function prefixValue($prefix) {
			return "{$prefix}ConcreteClass1";
		}
	}
	
	class ConcreteClass2 extends AbstractClass {
		protected function getValue(){
			return "ConcreteClass2: ";
		}
		public function prefixValue($prefix) {
			return "{$prefix}ConcreteClass2";
		}
	}
	
	$class1 = new ConcreteClass1;
	$class1->printOut(10,2);
	echo $class1->prefixValue("Foo: ");
	echo '<br />';echo '<br />';

	$class2 = new ConcreteClass2;
	$class2->printOut(3,3);
	echo $class2->prefixValue("Foo: ");/**/

?>