<?php
/**
 * Created by PhpStorm.
 * User: girish
 * Date: 24/12/17
 * Time: 5:52 PM
 */

// From Outside the class definition
class Scope_Resolution_Operator {

	const CONST_VALUE = 'A CONSTANT VALUE';

}

$classname = 'Scope_Resolution_Operator';
echo $classname::CONST_VALUE;


echo '<br />';
echo Scope_Resolution_Operator::CONST_VALUE;

// From inside the class definition
class OtherClass extends Scope_Resolution_Operator {

	public static $my_static = ' Static var';

	public static function doubleColon(){

		echo parent::CONST_VALUE;
		echo self::$my_static;

	}

}

echo '<br />';echo '<br />';
$obj = new OtherClass;
echo $obj::doubleColon();

echo '<br />';echo '<br />';
OtherClass::doubleColon();

// calling parent method
class MyClass2 {

	protected function myFunc2(){
		echo "MyClass22::myFunc22()";
	}

}

class OtherClass2 extends MyClass2 {
	// Overriding parent's definition
	public function myFunc2(){
		// But still call the parent function
		parent::myFunc2();
		echo "OtherClass222::myFunc222()";
	}

}

echo '<br />';echo '<br />';
$obj3 = new OtherClass2;
$obj3->myFunc2();

//$obj2 = new MyClass2;
//$obj2->myFunc2();