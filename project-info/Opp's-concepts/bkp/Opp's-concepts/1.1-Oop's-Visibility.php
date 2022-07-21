<?php

	echo '<h3>Properties and Visibility</h3>';
	class MyClass4 {
		public $public = 'Public1';
		protected $protected = 'Protected1';
		private $private = 'Private1';

		function printHello()
		{
			echo 'This is from MyClass: == '.$this->public . '<br /><br />';
			echo 'This is from MyClass: == '.$this->protected . '<br /><br />';
			echo 'This is from MyClass: == '.$this->private . '<br /><br />';
		}
	}

	$obj = new MyClass4();
	echo '<b>This is outside of the MyClass4: </b>'.$obj->public .'<br /><br />'; // Works
	// echo '<b>This is outside of the Class: </b>'.$obj->protected . '<br /><br />'; // Fatal Error
	// echo '<b>This is outside of the Class: </b>'.$obj->private .'<br /><br />'; // Fatal Error
	$obj->printHello(); // Shows Public, Protected and Private

	/**
	 * Define MyClass2
	 */
	class MyClass2 extends MyClass4 {
		// We can redeclare the public and protected method, but not private
		protected $protected = 'Protected2';
		//public $public = 'public22';
		private $private = 'private22';

		function printHello()
		{
			echo 'This is MyClass2: == '.$this->public . '<br /><br />';
			echo 'This is MyClass2: == '.$this->protected . '<br /><br />';
			echo 'This is MyClass2: == '.$this->private . '<br /><br />';
		}
	}

	$obj2 = new MyClass2();
	echo '<b>This is outside of the MyClass2:</b> '.$obj2->public . '<br /><br />'; // Works
	//echo '<b>This is outside of the MyClass2:</b>'.$obj2->private; // Undefined
	//echo '<b>This is outside of the MyClass2:</b>'.$obj2->protected; // Fatal Error
	$obj2->printHello(); // Shows Public, Protected2, Undefined
	/*---------------------------------------------------------------------------------------------------*/	

?>