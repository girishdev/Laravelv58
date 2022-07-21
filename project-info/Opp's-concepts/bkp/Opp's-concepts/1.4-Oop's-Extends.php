<?php

	echo '<h3>Class Inheritance / extends:</h3>';
	class Foo {
		public function printitem($string){
			echo 'Foo: ' . $string . PHP_EOL;
		}
		public function printPHP(){
			echo 'PHP is great. ' . PHP_EOL;
		}
	}
	class Bar extends Foo{
		public function printitem($string){
			echo 'Bar: ' . $string . PHP_EOL;
		}
	}
	$foo = new FOO(); //Creating an Object
	$bar = new Bar(); //Creating an Object
	$foo -> printItem('baz');
	$foo -> printPHP();
	echo '<br />';
	$bar -> printItem('baz');
	$bar -> printPHP();
	echo '<br />';echo '<br />';
	/*---------------------------------------------------------------------------------------------------*/
	echo '<h3>ClassInheritance / extends:</h3>';
	class classone {
		function Myfunone() {
			
		}
	}
	
	class classtwo extends classone {
		function Myfuntwo() {
			echo "This is First Parent class: ".get_parent_class($this);
		}
	}
	
	class classthree extends classtwo {
		function Myfunthree() {
			echo "This is Second Parent class: ".get_parent_class($this);
		}
	}
	
	if(class_exists('classone')){
		$obj1 = new classtwo();
		$obj1->Myfuntwo();
		echo '<br />';
		$obj2 = new classthree();
		$obj2->Myfunthree();
	} else {
		echo 'Necessary class does not exist: ';
	}
	echo '<br />';echo '<br />';
	/*---------------------------------------------------------------------------------------------------*/	
	class classones {
		function Myfunone() {
			
		}
	}
	
	class classtwo2 extends classones {
		function Myfuntwo() {
			echo "This is First Parent class: ".get_parent_class($this);
		}
	}
	
	class classthree2 extends classtwo2 {
		function Myfunthree() {
			echo "This is Second Parent class: ".get_parent_class($this);
		}
	}
	
	if(class_exists('classones')){
		$obj1 = new classtwo2();	//Creating an object
		$obj1->Myfuntwo();
		echo '<br />';echo '<br />';
		$obj2 = new classthree2();
		$obj2->Myfunthree();
	} else {
		echo 'Necessary class does not exist: ';
	}
	echo '<br />';echo '<br />';
	/*---------------------------------------------------------------------------------------------------*/		
//Inheritance:-
	//inheritance allow a class to extend
	//another class and inherit all its methos,
	//properties and behaviors.

	//Creating Super Class
	class MyClass {
		public $first;
		public $second;

		public function __construct($fr,$sc){
			$this->first=$fr;
			$this->second=$sc;
		}
		public function fintSumTwo(){
			$result = $this->first + $this->second;
			echo $result;
		}
	}

	//Creating Sub Class
	class NewClass extends MyClass {
		public $third;
		public function __construct($fr,$sc,$th){
			parent::__construct($fr,$sc);
			//Calling Super Class constructor
			//using parent
			$this->third=$th;
		}
		public function findSumthree(){
			$result = $this->first + $this->second + $this->third;
			echo $result;
		}
	}
	$pr=new NewClass(10,20,40);
	//creating sub class object and calling subclass constructor
	//eventually, sub class constructor call parent constructor
	$pr->findSumthree();
	/*---------------------------------------------------------------------------------------------------*/
	//echo 'Multi Level inheritence:';
	class MyClass{
		public $first;
		public $second;

		public function __construct($fr,$sc){
			$this->first=$fr;
			$this->second=$sc;
		}
		public function findSumTwo(){
			$result = $this->first + $this->second;
			echo $result;
		}
	}

	class NewClass2 extends MyClass {
		public $third;
		public function __construct($fr,$sc,$th){
			parent::__construct($fr,$sc);
			$this->third=$th;
		}
		public function findSumThree(){
			$result = $this->first+$this->second+$this->third;
			echo $result;
		}
	}

	class MyNewClass extends NewClass2 {
		public $fourth;
		public function __construct($fr,$sc,$th,$fo){
			parent::__construct($fr,$sc,$th);
			$this->fourth=$fo;
		}
		public function findSumFour(){
			$result = $this->first+$this->second+$this->third+$this->fourth;
			echo $result;
		}
		//public function display(){
			//echo self::findSum();
		//}
	}

	$pr= new MyNewClass(5,20,10,20);
	$pr->findSumFour();
	/*---------------------------------------------------------------------------------------------------*/		

?>