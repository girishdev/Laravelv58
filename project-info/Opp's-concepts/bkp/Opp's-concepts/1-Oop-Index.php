<?php

/*
// Basic Class Declaration=======

// ClassInheritance / extends=======
	
// ClassMethodsandProperties=======

// Constructors=======
	
// Destructors=======

// Static=======

AbstractClass=======

Interface

Inheritance=======

// Object Iteration

Method Overriding and Final

// Traits

Magic_method.php	

Index.php			{Image upload and storage && In Inside folder of oop:-}

*** Wants to know:- ***

Object cloning
Comparing objects
Type Hinting
Late static binding
Object serilization

***Wants to know about name-spaces***

class
	class is a collection of properties and methods

Object
	object is an instance of class
	
/**/

############################################################################################################################################
############################################################################################################################################

	class MyClass{
		public $first;
		public $second;

		public function __construct($fr,$sc){
			$this->first=$fr;
			$this->second=$sc;
		}
		public function findSum(){ //findSum Method
			$result = $this->first + $this->second;
			return($result);
		}
	}

	class NewClass3 extends MyClass {
		public $third;
		public function __construct($fr,$sc,$th){
			parent::__construct($fr,$sc);
			$this->third=$th;
		}
		public function findSum(){
		//here we use superclass method having same name
			$result = parent::findSum()+$this->third;
			echo $result;
		}
		public function display(){
			echo self::findSum();
		}
	}
	$pr=new NewClass3(10,20,30);
	$pr->display();

############################################################################################################################################
############################################################################################################################################

	class MyIterator implements Iterator {
		private $var = array();

		public function __construct($array)
		{
			if (is_array($array)) {
				$this->var = $array;
			}
		}

		public function rewind()
		{
			echo "rewinding<br />";
			reset($this->var);
		}
	  
		public function current()
		{
			$var = current($this->var);
			echo "current: $var<br />";
			return $var;
			echo '<br />';
		}
	  
		public function key() 
		{
			$var = key($this->var);
			echo "key: $var<br />";
			return $var;
			
		}
	  
		public function next() 
		{
			$var = next($this->var);
			echo "next: $var<br />";
			return $var;
		}
	  
		public function valid()
		{
			$key = key($this->var);
			$var = ($key !== NULL && $key !== FALSE);
			echo "valid: $var<br />";
			return $var;
		}
	}

	$values = array(1,2,3);
	$it = new MyIterator($values);

	foreach ($it as $a => $b) {
		print "$a: $b<br />";
	}
############################################################################################################################################
############################################################################################################################################

	$test = 1;
	if ($test >= 1) {
	  //echo "Value must be 1 or below";
	  trigger_error("Value must be 1 or below");
	}/**/
	
	if(!file_exists("/tmp/test.txt")) {
		die("File not found");
	} else {
		$file = fopen("/tmp/test.txt","r");
		print "Opend file sucessfully";
	}
	// Test of the code here./**/

	class Test {
		function __call( $var1, $var2 ) {
			$check = " '$var1' called\n";
			echo '<br />';
			$check.= print_r( $var2, true );			
			return $check;
		}
	}
	$item = new Test();
	print $item->array( "John", "Maria", "Jason" );/**/
	/*---------------------------------------------------------------------------------------------------*/
	class boy{
		public function __toString() {
			return "This is a boy:";
		}
	}
	$toby = new boy;
	print $toby;/**/
	
	function foo(string $foo) {
	}
	foo('somestring')/**/
	/*---------------------------------------------------------------------------------------------------*/
	/*class AA {
		static $word = "hello";
		static function hello() {print static::$word;}
	}
	class BB extends AA {
		static $word = "bye";
	}
	BB::hello();/**/
	/*---------------------------------------------------------------------------------------------------*/
	/*class A {
		var $variable;
		function display() {
			echo "I am inside the class.";
		}
	}
	$obj=new A;
	//echo $obj instanceof A;
	var_dump($obj instanceof A);/**/
	/*---------------------------------------------------------------------------------------------------*/
	/*class myparent {
		public function foo($bar) {
		// do stuff
		}
	}

	class mychild extends myparent {
		public $val;
	
		private function bar(myparent &$baz) {
		// do stuff
		}
		public function __construct($val) {
			$this->val = $val;
		}
	}
	$child = new mychild('hello world');
	$child->foo('test');
	$reflect = new ReflectionClass('mychild');
	echo $reflect;/**/
	/*---------------------------------------------------------------------------------------------------*/
?>