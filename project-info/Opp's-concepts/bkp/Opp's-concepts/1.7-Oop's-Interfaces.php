<?php

	echo '<h3>Interface:-</h3>';
	
	/*interface iTemplate {
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
	
	/*$obj = new Template();
	$obj->setVariable('girish',26);
	$obj->getHtml('abc');/**/

	/*$obj = new BadTemplate();
	$obj->setVariable('girish',26);/**/

	/*---------------------------------------------------------------------------------------------------*/

	/*interface Storable {
		function getContentsAsText();
	}

	class Document implements Storable {
		public function getContentsAsText() {
			return "This is Text of the Document\n";
		}
	}

	class Indexer {
		public function readAndIndex(Storable $s) {
			$textData = $s->getContentsAsText();
			//do necessary logic to index
			echo $textData;
		}
	}

	$p = new Document();
	 
	$i = new Indexer();
	$i->readAndIndex($p);/**/

	/*---------------------------------------------------------------------------------------------------*/

	/*interface a {
		public function foo();
	}
	interface b extends a {
		public function baz(Baz $baz);
	}
	
	//This will work
	class c implements b {
		public function foo(){
			echo 'Foo';
		}
		public function baz(Baz $baz){
			echo 'Baz';
		}
	}
	
	//This will not work and result in a Fatal error
	class d implements b {
		public function foo(){
			
		}
		public function baz(Foo $foo){
			
		}
	}
	
	$z = new c;
	$z->foo();/**/

	/*---------------------------------------------------------------------------------------------------*/

?>