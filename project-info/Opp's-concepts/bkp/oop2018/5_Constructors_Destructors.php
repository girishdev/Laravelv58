<?php
/**
 * Created by PhpStorm.
 * User: girish
 * Date: 24/12/17
 * Time: 5:19 PM
 */

class Constructors_Destructors {

	public function __construct() {

		print 'This is calling from Constructors_Destructors....';

	}

}

class subClass extends Constructors_Destructors {

	public function __construct() {
		parent::__construct();
		print 'This is calling from subClass';

	}

}

$obj1 = new Constructors_Destructors;
echo '<br />';
$obj2 = new subClass();

class MyDestructableClass {

	function __construct() {
		print "In Constructor";
		$this->name = "MyDestructableClass";
	}

	function __destruct() {
		// TODO: Implement __destruct() method.
		print "Destroying" . $this->name;
	}

}

echo '<br />';echo '<br />';
$obj3 = new MyDestructableClass;
