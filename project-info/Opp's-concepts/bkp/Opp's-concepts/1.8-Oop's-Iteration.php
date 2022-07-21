<?php

	echo "Object Iteration";
	class MyClass2 {
		public $var1 = 'value 1';
		public $var2 = 'value 2';
		public $var3 = 'value 3';

		protected $protected = 'protected var';
		private   $private   = 'private var';

		function iterateVisible() {
			echo '<br />';
			echo "MyClass::iterateVisible:<br />";
			echo '<br />';
			foreach($this as $key => $value) {
				print "$key => $value<br />";
			}
		}
	}

	$class = new MyClass2();
	foreach($class as $key => $value) {
		print "$key => $value<br />";
	}
	$class->iterateVisible();
	/*---------------------------------------------------------------------------------------------------*/

?>