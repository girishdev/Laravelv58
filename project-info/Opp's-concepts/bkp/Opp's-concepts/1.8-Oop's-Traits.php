<?php

echo "
multiple traits usage
changing method visibility
traits composed from traits
abstract trait members
static trait members";

	/*echo 'Declaration of PHP Trait';
	trait my_firt_trait {
		//Function traitFunction is the function which will be available in your trait
		public function traitFunction() {
			echo "This is callable by your class object";
		}
		public function traitFunction2() {
			echo "This is 'TraitFunction2'";
		}
	}
	//Declaring class where traits will be used
	class helloWorld {
		use my_firt_trait; //Adding things from the trait
	}
	$objTest = new HelloWorld();
	$objTest->traitFunction();// Print This is callable by your class object
	$objTest->traitFunction2();// Print This is callable by your class object/**/

echo "<h3>http://www.techflirt.com/php-traits-tutorial/</h3>";

	/*echo '<h3>Trait:</h3>';
	trait first_trait {
		function first_method(){ echo 'First method in first trait: '; }
		function second_method(){ echo 'Second method in first trait: '; }
	}
	trait first_trait2 {
		function first_method2(){ echo '<h3>First method in first trait: </h3>'; }
		function second_method2(){ echo '<h3>Second method in first trait: </h3>'; }
	}
	class first_class {
		use first_trait, first_trait2;
	}
	$obj = new first_class;
	$obj->first_method();
	$obj->first_method2();
	echo '<br />';
	$obj->second_method();
	$obj->second_method2();/**/
	/*---------------------------------------------------------------------------------------------------*/
	/*trait first_trait {
		function first_method(){ echo 'First method in first trait: '; }
		abstract public function secondab_method();
	}
	trait second_trait {
		use first_trait;
		function second_method(){ echo 'Second method in first trait: '; }
	}
	class first_class {
		use second_trait;
		function secondab_method(){
			echo 'This is abstract method testing in TRAIT: ';
		}
	}
	
	$obj = new first_class;
	$obj->first_method();
	echo '<br />';
	echo '<br />';
	$obj->second_method();
	echo '<br />';
	echo '<br />';
	$obj->secondab_method();/**/
	/*---------------------------------------------------------------------------------------------------*/
	/*trait first_trait {
		function first_function() { 
			echo "<b>From First Trait</b><br />";
		}
	}

	trait second_trait {
		function first_function() { 
			echo "<b>From Second Trait</b><br />";
		}
	}

	class first_class {
		use first_trait, second_trait {
			// This class will now call the method
			// first function from first_trait only
			first_trait::first_function insteadof second_trait;
			
			// first_function of second_traits can be 
			// accessed with second_function
			second_trait::first_function as second_function;
		}
	}

	$obj = new first_class();
	// Output: From First Trait
	$obj->first_function();
	
	// Output: From Second Trait
	$obj->second_function();/**/
	/*---------------------------------------------------------------------------------------------------*/
	/*class Base {
		public function sayHello() {
			echo 'Hello ';
		}
	}

	trait SayWorld {
		public function sayHello() {
			parent::sayHello();
			echo 'World!';
		}
	}

	class MyHelloWorld extends Base {
		use SayWorld;
	}

	$o = new MyHelloWorld();
	$o->sayHello();/**/
	/*---------------------------------------------------------------------------------------------------*/

?>