<?php
/**
 * Created by PhpStorm.
 * User: girish
 * Date: 24/12/17
 * Time: 9:23 AM
 */

spl_autoload_register(function($class_name) {
	include 'Autoloading_Classes/' .$class_name . '.php';
});

// spl_autoload_register(function($class_name1){
// 	include '';
// });

$obj1 = new Autoloading_Classes_One;
$obj1->Autoloading_Classes_One_method();

echo '<br />';echo '<br />';
$obj2 = new Autoloading_Classes_Two;
$obj2->Autoloading_Classes_Two_method();