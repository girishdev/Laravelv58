<?php

	/*class A {
		public static  function display(){
			echo 'function called using self';
		}
		public function foo(){
			self ::display();
		}
	}
	$ob =  new A();
	$ob->foo();/**/
	/*---------------------------------------------------------------------------------------------------*/
	// echo "Limitation of  self";
	/*class A {
		public static  function display(){
			echo self::get_classname().'</br>';
		}
		public static function get_classname(){
			return __class__;
		}
	}
	class B extends A {
		public static function get_classname(){
			return __class__;
		}
	}
	$oA =  new A();
	$oA->display();
	$oB =  new B();
	$oB->display();/**/
	/*---------------------------------------------------------------------------------------------------*/
	/*class A {
		public static  function display(){
			echo static::get_classname().'</br>';
		}
		public static function get_classname(){
			return __class__;
		}
	}
	class B extends A {
		public static function get_classname(){
			return __class__;
		}
	}
	$oA =  new A();
	$oA->display();
	$oB =  new B();
	$oB->display();/**/
	/*---------------------------------------------------------------------------------------------------*/
	class singleton {
		public static $instance;
		private function __construct() {
			echo 'Contruct of  singleton class called</br>';
		}
		public static function get_instance() {
			if( !static::$instance instanceof static) {
				static::$instance = new static();
			}
			return static::$instance;
		}
		public function test () {
			echo 'test function called</br>';
		}
	}
	class B extends singleton {
		public static $instance;
		protected function __construct(){
			echo 'Construct of Class B called</br>';
		}
		public static function get_class_name() {
			return __CLASS__;
		}
	}
	singleton::get_instance()->test();
	B::get_instance()->test();
	B::get_instance()->test();
	/*---------------------------------------------------------------------------------------------------*/

?>