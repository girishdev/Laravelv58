<?php
/**
 * Created by PhpStorm.
 * User: girish
 * Date: 24/12/17
 * Time: 8:31 AM
 */

class Classes_ObjectsA {

	public $one_var = 'Sample value One';

	function foo(){

		echo $this->one_var;

	}

}

class Classes_ObjectsB {

	public $two_var = 'Sample value Two';

	function bar(){

		echo $this->two_var;

	}
}

$obj = new Classes_ObjectsA;
$obj->foo();

//Classes_ObjectsA::foo(); // This will give an error
echo '<br />';

$obj2 = new Classes_ObjectsB;
$obj2->bar();


