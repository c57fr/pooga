<?php
use Kahlan\Filter\Filters;

$commandLine = $this->commandLine();
$commandLine->option('spec', 'default', 'Tests/accueil/spec');
$commandLine->option('src', 'default', 'Tests/1_Demo');
$commandLine->option('coverage', 'default', 4);
$commandLine->option('reporter', 'default', 'verbose');

Filters::apply($this, 'namespaces', function($next) {
	$this->autoloader()->addPsr4('Test\\Demo\\', dirname(__DIR__) . '/Tests/1_Demo/');
	return $next();
});
