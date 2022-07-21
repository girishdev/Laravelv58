<?php

	echo '<h3>Constructors:</h3>';
	class BaseClass {
		function __construct(){
			print 'In BaseClass constructor<br />';
		}
	}
	class SubClass extends BaseClass {
		function __construct(){
			parent::__construct();
			print 'in SubClass construntor<br />';
		}
	}
	$Obj = new BaseClass();
	$Obj = new SubClass();
	echo '<br />';echo '<br />';

	/*---------------------------------------------------------------------------------------------------*/	
	
	echo '<h3>Constructors and Property:</h3>';
	class MyClass5 {
		public $first; //properties
		public $second;
		public function __construct($fr,$sc){
			//any values passed to constructor as arguments can be
			//assigned to properties by using $this
			$this->first=$fr;
			$this->second=$sc;
		}
		public function findSumTwo(){
			$result = $this->first + $this->second;
			echo $result;
		}
	}
	$pr = new MyClass5(10,10);
	//a constructor create the object, applying default values
	$pr -> findSumTwo();
	echo '<br />';echo '<br />';
	/*---------------------------------------------------------------------------------------------------*/
	echo '<h3>Constructors and Property:</h3>';
	class MyClass6 {
		public $fn = 'Girish';
		public $ln = 'kumar';
		public function __construct($fn1, $ln2){
			echo $this->fn = $fn1;
			echo $this->ln = $ln2;
		}
		public function nameslist(){
			$nameslist = $this->fn . $this->ln;
			//echo $nameslist;
		}
	}
	$obj = new MyClass6('Raj',' kumar');
	$obj->nameslist();echo '<br /><br />';
	/*---------------------------------------------------------------------------------------------------*/
	echo '<h3>Constructors and Property:</h3>';
	class BaseClass2 {
		function __construct(){
			print 'In BaseClass2 constructor\n';
		}
	}
	class SubClass2 extends BaseClass2 {
		function __construct(){
			parent::__construct();echo '<br />';
			print 'In SubClass2 construntor\n';
		}
	}
	$Obj = new BaseClass2();echo '<br />';echo '<br />';
	$Obj = new SubClass2();echo '<br />';echo '<br />';
	/*---------------------------------------------------------------------------------------------------*/
	echo '<h3>Destructors:</h3>';
	class MyDestructableclass {
		function __construct(){
			print 'In constructor';
			$this->name = 'MyDestructableclass';
		}
		function __destruct(){
			print 'Destroying' . $this->name . '<br />';
		}
	}
	$objdest = new MyDestructableclass();
	echo '<br />';echo '<br />';
	/*---------------------------------------------------------------------------------------------------*/
	echo '<h3>Destructors:</h3>';
	class Animal {
		public $name = "No-name animal";
		
		public function __construct($name)
		{
			echo "I'm alive!<br />";    
			$this->name = $name;
		}
		
		public function __destruct()
		{
			echo "I'm dead now :(";
		}
	}

	$animal = new Animal("Bob");
	echo "Name of the animal: " . $animal->name;echo '<br />';

?>