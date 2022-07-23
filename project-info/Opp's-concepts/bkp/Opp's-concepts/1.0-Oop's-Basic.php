<?php

    // echo "http://www.techflirt.com/tutorials/oop-in-php/classes-and-objects-php.html";
	echo '<h3>Basic Class Declaration:</h3>';

	class SimpleClass {

		public $name = 'girish';

		public function displayName(){
			echo $this->name;
		}

	}

	$call = new SimpleClass; // php initializing class

	$call->displayName();

	echo '<br />';echo '<br />';
    // exit;
	/*---------------------------------------------------------------------------------------------------*/
	echo '<h3>Basic Class Declaration:</h3>';

	class MyClass {

		public $first = 10; // Here we declare properties

		public $second = 20; // Here also we declare properties

		public function addclass(){ // Here we created method

			$result = $this->first + $this->second;
			echo $result;
		}

	}
	$var = new MyClass; // created object of class
	$var -> addclass(); // calling class method usage
	echo '<br />';echo '<br />';
    // exit;
	/*---------------------------------------------------------------------------------------------------*/
	echo '<h3>passing parameter in method:</h3>';

	class MyClass3 {

		public $first;

		public $second;

		//passing parameter in method findsumTwo()
		public function findSumTwo($first,$second){
			$result = $first + $second;
			echo $result;
		}
	}
	$pr = new MyClass3; // created object of class
	$pr->findSumTwo(200,300); // calling class method usage
	echo '<br />';echo '<br />';
    // exit;
	/*---------------------------------------------------------------------------------------------------*/
	echo '<h3>Class Methods and Properties:</h3>';

	class SimpleClass2 {

		public $var = 'myconstant'; // Property declarations

		public $var_one = array(true,false); // Property declarations

		protected $var1 = 1;

		private $var2 = 2;

		static $var3 = 3;

		public function newclass() {
			echo '<b>var::</b>'.$this->var . ' <b>var1::</b>'.$this->var1 . ' <b>var2::</b>'.$this->var2;echo '<br>';
			echo self::$var3;echo '<br>';
			echo '<pre>';print_r($this->var_one);
		}

	}
	$SimpleClass2 = new SimpleClass2();
	$SimpleClass2->newclass();
	echo '<br />';echo '<br />';

?>
