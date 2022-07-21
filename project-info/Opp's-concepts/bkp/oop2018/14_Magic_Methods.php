<?php 

// echo "Magic Methods";
// This magic method will call on specific event
// 1. __autoload
    // This autoload function is nothing but "spl_autoload_register"

// 2. __get()
// __get() is utilized for reading data from inaccessible properties.
// Getting the value as input and matching value in databases or an array and you can return that... 

// 3. __set()
// __set() is run when writing data to inaccessible properties.
// Sets data taking input data and setting that value to assigned Key in an array

// 4. __isset()
// __isset() is triggered by calling isset() or empty() on inaccessible properties.
// __isset check if the value is there in array or not if it is there means true or false

// 5. __unset()
// __unset() is invoked when unset() is used on inaccessible properties.
// It is just unsetting the variable


class newClass 
{
    public $name;

    public function __set($name, $value){
        // throw new Exception("Variable ".$name." has not been set.", 1);
    }

    public function __get($name){
        // throw new Exception("Variable ".$name." has not been declared and can not be get.", 1);
    }
}

$c = new newClass();

$c->name = "Person Name";
$c->email = "email@address.com";


?>