<?php
/**
 * Created by PhpStorm.
 * User: girish
 * Date: 25/12/17
 * Time: 1:23 PM
 */

/*echo "What is Interface ?";

	- You can create interface in php using keyword interface.
	- Interface in oop enforce definition of some set of method in the class.
	- By implementing interface you are forcing any class to must declaring some specific set of methods in oop.
	- You can implement your interface in your class using "implements" keyword.
	- You can only define method in interface with public accessibility.
	- If you use other than public visibility in interface then it will throw error.
	- Also while defining method in your interface do not use abstract keyword in your methods.
	- You can also extend interface like class. You can extend interface in php using extends keyword.
	- You can not implement 2 interfaces if both share function with same name. It will throw error.
		Fatal error: Interface function a::foo() cannot contain body in C:\xampp\htdocs\1.7-Oop's-Interfaces.php on line 62

	Differences between abstract class and interface in PHP

		=>In abstract classes this is not necessary that every method should be abstract. 
			But in interface every method is abstract.
		***=>Multiple and multilevel both type of inheritance is possible in interface. 
			But single and multilevel inheritance is possible in abstract classes.
		***=>Method of php interface must be public only. Method in abstract class in php could be 
			public or protected both.
		***=>In abstract class you can define as well as declare methods. 
			But in interface you can only declare your methods & we can't define our method.
		***=>Fatal error: Interface function a::foo() cannot contain body in 
			C:\xampp\htdocs\1.7-Oop's-Interfaces.php on line 62/**/

interface iTemplate {
	public function setVariable($name, $var);
	public function getHtml($template);
}

class Template implements iTemplate {
	private $vars = array();
	public function setVariable($name, $var){
		echo $this->vars[$name] = $var;
	}
	public function getHtml($template){
		foreach($this->vars as $name => $value) {
			$template = str_replace('{' . $name .'}', $value, $template);
		}
		return $template;
	}
}/**/

/*class BadTemplate implements iTemplate {
	private $vars =  array();
	public function setVariable($name, $var) {
		$this->vars[$name] = $var;
	}
}/**/

$obj = new Template();
$obj->setVariable('girish',26);
echo $obj->getHtml('abc');/**/

/*$obj = new BadTemplate();
$obj->setVariable('girish',26);/**/