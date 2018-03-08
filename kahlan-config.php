<?php
use Kahlan\Filter\Filters;

Filters::apply($this, 'namespaces', function($next) {
	$this->autoloader()->addPsr4('Test\\Demo\\', __DIR__ . '/Tests/1_Demo/');
	return $next();
});
