<?php

/*
// https://www.techflirt.com/tutorials/oop-in-php/magic-methods-in-php.html
List of Magic Methods in PHP:
Magic Method	Description
__construct	This magic methods is called when someone create object of your class. Usually this is used for 
	creating constructor in php5.

__destruct	This magic method is called when object of your class is unset. This is just opposite of __construct.

__get	This method called when your object attempt to read property or variable of the class 
	which is inaccessible or unavailable.

__set	This method called when object of your class attempts to set value of the property 
	which is really inaccessible or unavailable in your class.

__isset	This magic methods trigger when isset() function is applied on any property of the class 
	which isinaccessible or unavailable.

__unset	__unset is something opposite of isset method. This method triggers 
	when unset() function called on inaccessible or unavailable property of the class.

__call	__call magic method trigger when you are attempting to call method or function of the class 
	which is either inaccessible or unavailable.

__callstatic	__callstatic execture when inaccessible or unavailable method is in static context.

__sleep	__sleep methods trigger when you are going to serialize your class object.

__wakeup	__wakeup executes when you are un serializing any class object.

__toString	__toString executes when you are using echo on your object.

__invoke	__invoke called when you are using object of your class as function

/**/

	exit();


echo '<br />__construct STARTS'.'<br />';
	/*class classconst {
		function __construct() {
			echo 'Hi This is constructer function ';
			echo '<br />' . __METHOD__ . '<br />';
			if(isset($_REQUEST['submit_form'])){
				echo $_REQUEST['fname'];
			}
		}
		function myfunc(){
			echo '<br />' . __METHOD__ . '<br />';
			if(isset($_REQUEST['submit_form'])){
				$fname = $_REQUEST['fname'];
				echo '<br />';
				echo "<h1>$fname</h1>";
				echo '<br />';
				self::__construct();
			}
		}
		function __destruct(){
			echo 'This is destruct function: ';
			echo '<br />' . __METHOD__ . '<br />';
		}
	}
	$obj = new classconst;
	$obj->myfunc();
	
	echo $htmlOut = '<form action="#" Method=""POST">
						<lable>Name: </lable>
						<input type="text" name="fname" />
						<input type="submit" name="submit_form" value="Login" />
					</form>';/**/

	/*class BaseClass {
		function __construct(){
			print 'In BaseClass constructor <br />';
		}
	}
	class SubClass extends BaseClass {
		function Myfunc(){
			echo 'Hi Myfunc';
		}
		function __construct(){
			parent::__construct();
			print 'In SubClass constructor';
			echo '<br />';echo '<br />';
			parent::__construct();
			self::Myfunc();
		}
	}
	$Obj = new BaseClass();
	$Obj = new SubClass();/**/
	
	/*class MyDestructableclass {
		public $name = 'Raju';
		function __construct(){
			print 'In constructor';
			$this->name = 'MyDestructableclass';
			echo '<br />';
		}
		function __destruct(){
			print 'Destroying ' . $this->name . '<br />';
		}
	}
	$obj = new MyDestructableclass;/**/
echo '<br />__construct ENDS'.'<br />';

echo '<br />__autoload STARTS'.'<br />';
	/*function __autoload($classname){
		include "$classname.php";
		//echo '<br />';echo '<br />';
		//var_dump($classname);
		//print_r($classname);
		//echo '<br />';echo '<br />';
	}
	$abc = new ABC();
	$abc->func_abc();
	
	$xyz = new XYZ();
	$xyz->func_xyz();/**/
	
	/*function my_autoloader($class) {
		include "$class.php";
	}
	spl_autoload_register('my_autoloader');/**/
	
	/*spl_autoload_register(function ($class) {
		include "$class.php";
	});/**/
	/*$abc = new ABC();
	$abc->func_abc();
	
	$xyz = new XYZ();
	$xyz->func_xyz();/**/
	
	/*function __autoload($classname){
		echo "Want to load $classname";
		throw new Exception("Unable to load $classname.");
		//include "$classname.php";
		//echo '<br />';echo '<br />';
		//var_dump($classname);
		//print_r($classname);
		//echo '<br />';echo '<br />';
	}
	try {
		$obj = new ABC();
	} catch (Exception $e){
		echo $e->getMessage();
	}
	
	/*$abc = new ABC();
	$abc->func_abc();
	
	$xyz = new XYZ();
	$xyz->func_xyz();/**/
echo '<br />__autoload ENDS'.'<br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__GET STARTS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';
	//https://www.youtube.com/watch?v=caCxRjz3LAI&index=2&list=PLCvBIV4j7b7fkBZPhLObxeI5LwkVpYTHK
	class a {
		private $arr = array('name'=>'Girish','lastname'=>'kumar');
		public function __get($n){
			if(array_key_exists($n, $this->arr)){
				echo $this->arr[$n];
				//echo $n;
			} else {
				echo 'Error not found';
			}
		}
	}
	$obj = new a;
	$obj->lastname;

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__GET ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__SET STARTS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

	class b {
		private $arr2 = array('Name2'=>'Girish2','lastname2'=>'kumar2');
		public function __set($n, $value){
			if(array_key_exists($n, $this->arr2)){
				echo $this->arr2[$n] = $value;
			} else {
				echo 'Error: ';
			}
		}
	}
	$obj2 = new b;
	$obj2->Name2="Lenovo";

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__SET ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__ISSET STARTS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

	class classisset {
		private $arr3 = array('Name3'=>'Girish3','lastname3'=>'kumar3');
		//public $Name3 = 'Girish';
		public function __isset($n) {
			if (isset($this->arr3[$n])) {
				echo 'Found: ';
				//return true;
			} else {
				echo 'Not Found: ';
				//return false;
			}
		}
	}
	$obj3 = new classisset;
	var_dump(isset($obj3->Name3));

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__ISSET ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__UNSET STARTS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

	class classunset {
		private $arr3 = array('Name3'=>'Girish3','lastname3'=>'kumar3');
		public function __unset($n) {
			unset($this->arr3[$n]);
			print_r($this->arr3);
			/*if (isset($this->arr3[$n])) {
				echo 'Found: ';
				//return true;
			} else {
				echo 'Not Found: ';
				//return false;
			}/**/
		}
	}
	$obj4 = new classunset;
	unset($obj4->lastname3);

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__UNSET ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__TOSTRING STARTS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

	class test {
		public function testfun(){
			return 'This is test class and we are testing __tostring here: ';
			return get_class($this);
		}
	}
	$obj5 = new test;
	echo $obj5->testfun();
	//echo $obj5;
	echo '<br />';echo '<br />';echo '<br />';
	
	class test2 {
		public function __tostring(){
			return get_class($this);
			return 'This is test class and we are testing __tostring here: ';
		}
	}
	$obj6 = new test2;
	echo $obj6;

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__TOSTRING ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__INVOKE STARTS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

	class ainvoke {
		public function __invoke($a, $b){
			return $a." ".$b;
		}
	}
	$obj7 = new ainvoke;
	echo $obj7('Girish','kumar');
	
echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__INVOKE ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__CALL STARTS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

	class acall {
		public function __call($function, $parm){
			echo $function.'<br />';
			print_r($parm);
			echo count($parm);
			//return count($parm);
		}
	}
	$obj8 = new acall;
	$obj8->testing('girish','kumar');

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__CALL ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__CALLSTATIC ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

	class acalls {
		public static function __callStatic($function, $parm){
			echo $function.'<br />';
			print_r($parm);
			echo count($parm);
			//return count($parm);
		}
	}
	/*$obj9 = new acalls;
	$obj9->testing('girish','kumar');/**/
	acalls::testings('girish','kumar');

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__CALLSTATIC ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__CLONE starts>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';
echo '<br />';echo '<br />';
	$abcxy = new stdclass();
	$abcxy->subobject = new stdclass();	
	
	$abcxy->xyz = 'xyz variable: ';
	//$abcxy->$subobject = 'Sub_xyz variable: ';
	//$newabc = $abcxy;
	$newabc = clone $abcxy;
	$newabc->xyz = 'xyz variable value changed';
	print_r($abcxy);
	
	class ABC {
		public function __clone() {
			$this->subobject = clone $this->subobject;
		}
	}
	
echo '<br />';echo '<br />';
echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__CLONE ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__sleep starts>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';
	echo "__sleep	will call when object will get serialize";
	class ABC {
		public function __sleep() {
			db->disconnect();
		}
	}
	$slee = new ABC();
	echo $slee;
echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__sleep ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__wakeup STARTS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';
	echo "__sleep	will call when object will get UNserialize";
	class ABC {
		public function __sleep() {
			db->connect();
		}
	}
	$slee = new ABC();
	echo $slee;
echo '<br /><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<__wakeup ENDS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><br />';

/*class testcon {
	function __construct(){
		echo '<br >This is __construct 1: <br />';
	}
	function __destruct(){
		echo '<br >This is __destruct 2: <br />';
	}
}
$objT = new testcon;
unset($objT);*/

echo '__CALL STARTS'.'<br />';

	/*class Test {
	  function __call( $var1, $var2 ) {
			  $check = " '$var1' called\n";
			  $check.= print_r( $var2, true );
		   return $check;
		 }
	}
	$item = new Test();
	print $item->array( "John", "Maria", "Jason" );/**/
	
	/*class test {
		function __get($name) {
			echo "__get executed with name $name ";
		}
		function __set($name , $value) {
			echo "__set executed with name $name , value $value";
		}
		function __call($name , $parameter) {
			$a = print_r($parameter , true); //taking recursive array in string
			echo "__call executed with name $name , parameter $a";
		}
		static function __callStatic($name , $parameter) {
			$a = print_r($parameter , true); //taking recursive array in string
			echo "__callStatic executed with name $name , parameter $a";
		}
	}
	$a = new test();
	$a->abc = 3;//__set will executed
	echo '<br />';echo '<br />';
	
	$app = $a->pqr;//__get will triggerd
	echo '<br />';echo '<br />';
	
	$a->getMyName('ankur' , 'techflirt', 'etc');//__call willl be executed
	echo '<br />';echo '<br />';
	
	test::xyz('1' , 'qpc' , 'test');//__callstatic will be executed
	echo '<br />';echo '<br />';/**/

?>