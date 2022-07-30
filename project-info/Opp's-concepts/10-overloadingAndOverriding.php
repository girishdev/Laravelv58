<?php

//Method Overriding and Final:-
	//Method Overriding: if a method of superclass is implemented in
	//subclass then it is called method overriding

	//To stop method overriding we have to use final keyword
	//In the same way to stop inheritance we have to use final keyword
	//In front of class
	
// echo "***http://www.techflirt.com/tutorials/oop-in-php/overloading-and-overriding.html";

// echo "Overriding :-	Basic meaning of overriding in oop is to change behavior of your parent class 
// method.";
// echo Overriding is only pertinent to derived classes, where the parent class has defined a 
// method and the derived class wishes to override that method.

// echo "Overloading :- In real word overloading means assigning extra work to same machine or person.";
// echo Overloading is defining functions that have similar signatures, yet have different parameters.

/*class Foo {
    function myFoo() {
        return "Foo";
    }
}

class Bar extends Foo {
    function myFoo() {
        return "Bar";
    }
}

$foo = new Foo;
$bar = new Bar;
echo($foo->myFoo()); //"Foo"
echo($bar->myFoo()); //"Bar"
/**/

/*
// echo "Overriding parent class methods";
	class Member {
		public $username = "";
		private $loggedIn = false;

		public function login() {
			$this->loggedIn = true;
		}

		public function logout() {
			$this->loggedIn = false;
		}
	}

	class Administrator extends Member {
		public function login() {
			$this->loggedIn = true;
			echo "Log entry: $this->username logged in<br>";
		}

		public function logout() {
			$this->loggedIn = false;
			echo "$this->username logged out successfully";
		}
	}

	$member = new Member();
	$member->username = "Fred";
	$member->login();
	$member->logout();

	// Create a new administrator and log them in
	$admin = new Administrator();
	$admin->username = "Mary";
	$admin->login();			// Displays "Log entry: Mary logged in"
	$admin->logout();		// Displays "LogOut: Mary loged out successfully"

	/**/

/*
// echo "http://www.techflirt.com/tutorials/oop-in-php/overloading-and-overriding.html";
echo "<h3>Overloading in PHP</h3>";
	class test {
		public function __construct() {
			//Your logic for constructor
		}
		public function __call($method_name , $parameter) {
			if($method_name == "overlodedFunction") //Function overloading logic for function name overlodedFunction
			{
				$count = count($parameter);
				switch($count) {
					case "1":
						//Business log in case of overlodedFunction function has 1 argument
						echo "You are passing 1 argument";
						break;
					case "2": //Incase of 2 parameter
						echo "You are passing 2 parameter";
						break;
					case "3": //Incase of 3 parameter
						echo "You are passing 3 parameter";
						break;
						default:
					throw new exception("Bad argument");
				}
			} else {
				throw new exception("Function $method_name does not exists ");
			}
		}
	}

	$a = new test();
	$a->overlodedFunction("ankur");
	echo "<br />";
	$a->overlodedFunction("techflirt" , "ankur");
	echo "<br />";
	$a->overlodedFunction("techflirt" , "ankur","apple");/**/


// echo "Overriding in PHP";
	
/*	class testParent {
		public function f1() {
			echo 1;
		}
		public function f2() {
			echo 2;
		}
	}
	class testChild {
		function f2($a) //overriding function f2
		{
			echo "$a";
		}
	}
	$a = new testChild();
	$a->f2("ankur");//it will print ankur*/
	
	


?>