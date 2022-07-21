<?php
/**
 * Created by PhpStorm.
 * User: girish
 * Date: 27/12/17
 * Time: 6:59 AM
 */

/*
 ***https://www.sitepoint.com/using-traits-in-php-5-4/
 What a Trait Looks Like

	A trait is similar to an abstract class which cannot be instantiated on its own 
	(though more often it’s compared to an interface).

What is Traits in PHP?
	- Traits are a mechanism for code reuse in single inheritance.
	- A Trait is similar to a class, but only intended to group functionality in a 
		fine-grained and consistent way.
	- It is not possible to instantiate a Trait but addition to traditional inheritance. 
		It is intended to reduce some limitations of single inheritance to reuse sets of methods 
		freely in several independent classes living in different class hierarchies.
	- Multiple Traits can be inserted into a class by listing them in the use statement, separated by commas(,).
	- If two Traits insert a method with the same name, a fatal error is produced.

/**/

/*

class BaseClass{
    function getReturnType() {
        return 'BaseClass';
    }
}
trait traitSample {
    function getReturnType() {
        echo "TraitSample:";
        parent::getReturnType();
    }    
}

class Class1 extends BaseClass {
    use traitSample;   
}

$obj1 = new Class1();
$obj1->getReturnType();//TraitSample:BaseClass

/**/


// Multiple traits
trait Hello {
	function sayHello() {
		echo "Hello";
	}
}

trait World {
	function sayWorld() {
		echo "World";
	}
}

class MyWorld {
	use Hello, World;
}

$world = new MyWorld();
echo $world->sayHello() . " " . $world->sayWorld(); //Hello World

//Traits Composed of Traits
trait HelloWorld {
	use Hello, World;
}

class MyWorld2 {
	use HelloWorld;
}

echo '<br />';
$world = new MyWorld2();
echo $world->sayHello() . " " . $world->sayWorld(); //Hello World

//Conflict Resolution and Aliasing
trait Game {
	function play() {
		echo "Playing a game";
	}
	function testtrait(){
		echo 'This is for testing in Game';
	}
}

trait Music {
	function play() {
		echo "Playing music";
	}
	function testtrait(){
		echo 'This is for testing in Music';
	}
}

class Player {
//	use Game, Music;
	use Game, Music{
		Music::play insteadof Game;
		Game::testtrait insteadof Music;
	}
}

echo '<br />';
$player = new Player();
$player->play();echo '<br />';
$player->testtrait();

// Using as keyword
class Player2 {
	use Game, Music {
		Game::play as gamePlay;
		Music::play insteadof Game;
		Music::testtrait insteadof Game;
	}
}

echo '<br />';
echo '<br />';
$player2 = new Player2();
$player2->play(); //Playing music
echo '<br />';
$player2->gamePlay(); //Playing a game

//Other Features
trait Message {
	function alert() {
		echo $this->message;
	}
}

class Messenger {
	use Message;
	private $message = "This is a message";
}

echo '<br />';
$messenger = new Messenger;
$messenger->alert(); //This is a message

//Other Features
trait Message2
{
	private $message;

	function alert2() {
		$this->define();
		echo $this->message;
	}
	abstract function define();
}

class Messenger2
{
	use Message2;
	function define() {
		$this->message = "Custom Message";
	}
}

echo '<br />';
$messenger = new Messenger2;
$messenger->alert2(); //Custom Message