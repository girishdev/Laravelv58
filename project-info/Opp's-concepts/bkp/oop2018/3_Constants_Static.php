<?php
/**
 * Created by PhpStorm.
 * User: girish
 * Date: 24/12/17
 * Time: 9:01 AM
 */

class Constants_Static {
	const my_constant_value_one = 'first value';
	const my_constant_value_two = 'second value';
	function showConstant(){
		echo '<b>This fun output: </b>';
		echo self::my_constant_value_two;
	}
}
$obj = new Constants_Static;
$obj->showConstant();

echo '<br />';echo '<br />';
echo Constants_Static::my_constant_value_one;

echo '<br />';echo '<br />';
$var = "Constants_Static";
echo $var::my_constant_value_one;

echo '<br />';echo '<br />';

// Static Function

class staticFunction {

	public static $var1 = 'var value one';

	public static function staticMethod(){
		echo self::$var1;
	}

}

$obj = new staticFunction;
$obj->staticMethod();

echo '<br />';
staticFunction::staticMethod();

echo '<br />';
$classname = 'staticFunction';
$classname::staticMethod(); // As of PHP 5.3.0