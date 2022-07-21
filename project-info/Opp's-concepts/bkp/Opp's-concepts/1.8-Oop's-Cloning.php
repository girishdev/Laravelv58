<?php

	echo '<pre>
	<h3>PHP : Object Cloning:- </h3>

	Cloning is used to create a copy of an object.
	An object copy is created by using the clone keyword.
	When an object is cloned, PHP 5 will perform a shallow copy of all of the object\'s properties.
	Any properties that are references to other variables, will remain references.
	PHP provides a special method __clone to copy an object.
	Once the cloning is complete, if a __clone() method is defined, then the newly created object\'s __clone() method will be called, 
	to allow any necessary properties that need to be changed.
	';
	
	/*echo '<h3>Object copy or by reference copy</h3>';
	
	class test{
		public $a;
		private $b;

		function __construct($a, $b){
			$this->a = $a;
			$this->b = $b;
		}

	}
	
	$obj = new test('Girish', ' kumar');
	$obj_copy = $obj;		//Copy of the object
	$obj->a = "Girish with stars";
	
	print_r($obj);
	var_dump($obj);
	echo '<br />';
	print_r($obj_copy);
	var_dump($obj_copy);/**/
	
	/*---------------------------------------------------------------------------------------------------*/

	/*echo '<h3>Implementation of object cloning in php</h3>';
	
	class test2 {
		public $a;
		private $b;

		function __construct($a, $b){
			$this->a = $a;
			$this->b = $b;
		}

	}
	$obj = new test2('Girish', ' kumar');
	$obj2 = $obj;		//Copy of the object
	$obj3 = clone $obj;		//Clone of the object
	$obj->a = 'Girish Rocking stat';

	echo "This is 'obj'<br />";
	print_r($obj);
	echo '<br />';
	
	echo "This is 'obj2'<br />";
	print_r($obj2);
	echo '<br />';
	
	echo "This is 'obj3'<br />";
	print_r($obj3);
	echo '<br />';/**/
	
	/*---------------------------------------------------------------------------------------------------*/
	
	/*echo '<h3>Object cloning with magic method __clone:-</h3>';

	class test {
		public $a;
		private $b;
		function __construct($a, $b) {
			$this->a = $a;
			$this->b = $b;
		}
		function __clone() {
			$this->a = "c";
		}
	}

	$a = new test("ankur" , "techflirt");
	$b = $a;				 //Copy of the object
	$xbox = clone $a; 		//clone of the object
	$a->a = "no Ankur";
	
	print_r($a);
	print_r($b);
	print_r($xbox);
	print_r($a);/**/
	
	/*---------------------------------------------------------------------------------------------------*/

?>