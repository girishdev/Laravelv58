<?php

	echo '<h3>Static:</h3>';
	class MyClass7 {
		const const_value = 'This is a constant value: ';
	}
	$classname = 'MyClass7';
	echo $classname::const_value;
	echo '<br />';
	echo MyClass7::const_value;
	
	class OtherClass extends MyClass7 {
		public static $my_static = 'Hi this is a static value: ';
		//private static $my_static = 'Hi this is a static value: ';	//Fatal error: Cannot redeclare OtherClass::$my_static in
		//protected static $my_static = 'Hi this is a static value: ';	//IF YOU CALL FORM YOUTSIDE FROM CLASS Fatal error: Cannot redeclare OtherClass::$my_static in
		public static function doubleColon(){
			//echo 'Test value';
			echo '<br /><br />'.'<b>Calling from Self:- </b>' . self::$my_static . '<br />';
			echo '<br />'.'<b>Calling from Parent:- </b>' . parent::const_value . '<br />';
		}
	}
	$classname = 'OtherClass';
	echo $classname::doubleColon();
	OtherClass::doubleColon();
	// echo '<b>Hi This is OtherClass::$my_static: </b>' . OtherClass::$my_static;
	/*---------------------------------------------------------------------------------------------------*/
	echo '<h3>Static:</h3>';
	class mycont{
		const val = 'This is a constant value';
		public function myFun(){
			echo self::val;
		}
	}
	echo '<br />';
	echo 'Outside of the class: ' . mycont::val;
	echo '<br />';
	
	$obj = new mycont;
	$obj->myFun();/**/
	echo '<br />';
	/*---------------------------------------------------------------------------------------------------*/
	echo '<h3>Scope Resolution operator</h3>';
	class A {
		function foo(){
			if(isset($this)){
				echo '$this is defined (';
				echo get_class($this);
				echo ")\n";
			} else {
				echo "\$This is not defined.\n";
			}
		}
	}
	
	class B {
		function bar(){
			A::foo();
		}
	}
	
	$a = new A();
	$a->foo();
	
	A::foo();
	$b = new B();
	$b->bar();
	
	B::bar();
	echo '<br />';
	/*---------------------------------------------------------------------------------------------------*/

?>