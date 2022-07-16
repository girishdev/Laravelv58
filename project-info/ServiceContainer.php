<?php 

class container
{
	protected $bindings = [];

	public function bind($name, callable $resolver)
	{
		$this->bindings[$name] = $resolver;
	}

	public function make($name)
	{
		return $this->bindings[$name]();
	}
}


$container = new container();
$container->bind('Game', function() {
	return 'Football 1';
});
print_r($container->make('Game'));

// Small Defination / Understanding line:
// Container is a binding Or an array, in which you can put some objects whenever we need it we can get that 

// We can add some items to the container and get soem come itmes form the container





