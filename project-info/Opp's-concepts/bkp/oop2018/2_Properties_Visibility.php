<?php
/**
 * Created by PhpStorm.
 * User: girish
 * Date: 24/12/17
 * Time: 7:13 AM
 */

//Public: It allows anyone from outside access its method/property. This is the default visibility in PHP class when no keywords are prefixed to a method/property.
//Protected: It only allows itself or children classes to access its method/property.
//Private: It does not allow anyone except itself to access its method/property.

//In Php Multilevel inheritance is possible but Multiple inheritance is not possible.
	//In simplified terms in php child class can not inherit more than one parent class.
	//But hierarchical inheritance is possible in php.

class testFunction {

	public $var1 = 'Test this var1 Public';
	private $var2 = 'Test this var2 Private';
	protected $var3 = 'Test this var3 Protected';

	function methodOne(){

		echo 'This is from methodOne: ' . $this->var1;echo '<br />';
		echo 'This is from methodOne: ' . $this->var2;echo '<br />';
		echo 'This is from methodOne: ' . $this->var3;echo '<br />';

	}

	function methodTwo(){

		echo 'This is from methodTwo: ' . $this->var1;echo '<br />';
		echo 'This is from methodTwo: ' . $this->var2;echo '<br />';
		echo 'This is from methodTwo: ' . $this->var3;echo '<br />';

	}

	function methodThree(){

		echo 'This is from methodThree: ' . $this->var1;echo '<br />';
		echo 'This is from methodThree: ' . $this->var2;echo '<br />';
		echo 'This is from methodThree: ' . $this->var3;echo '<br />';

	}
}

class testFunction2 extends testFunction {

	function testFunctionSecondMethod(){

		echo 'This is from testFunctionMainMethod: ' . $this->var1;echo '<br />';
		echo 'This is from testFunctionMainMethod: ' . $this->var2;echo '<br />';
		echo 'This is from testFunctionMainMethod: ' . $this->var3;echo '<br />';

	}
}

class testFunction3 extends testFunction2 {

	function testFunctionThirdMethod(){

		echo 'This is from testFunctionMainMethod: ' . $this->var1;echo '<br />';
		echo 'This is from testFunctionMainMethod: ' . $this->var2;echo '<br />';
		echo 'This is from testFunctionMainMethod: ' . $this->var3;echo '<br />';

	}
}

$obj = new testFunction3();
$obj->methodOne();echo '<br />';echo '<br />';
$obj->methodTwo();echo '<br />';echo '<br />';
$obj->methodThree();echo '<br />';echo '<br />';
$obj->testFunctionSecondMethod();echo '<br />';echo '<br />';
$obj->testFunctionThirdMethod();echo '<br />';echo '<br />';

echo $obj->var1;
echo $obj->var2;
echo $obj->var3;

//print $obj::$var1; // The variable name should be static

