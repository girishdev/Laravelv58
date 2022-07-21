<?php

echo "http://www.techflirt.com/tutorials/oop-in-php/static-methods-and-properties-in-php.html";
echo "What is Final Keyword in PHP?
	PHP introduces the final keyword, which prevents child classes from overriding a method by prefixing 
	the definition with final.If the class itself is being defined final then it cannot be extended. 
	If the function itself is being defined final then it cannot be extended.";

	echo 'Final Keyword';
	class BaseClass {
		public function test() {
			echo "BaseClass::test() called<br />";
		}
		
		final public function moreTesting() {
			echo "BaseClass::moreTesting() called<br />";
		}
	}

	class ChildClass extends BaseClass {
		//this will cause Compile error
		public function moreTesting() {
			echo "ChildClass::moreTesting() called<br />";
		}
	}
	
	$final = new ChildClass;
	$final->test();
	$final->moreTesting();

?>