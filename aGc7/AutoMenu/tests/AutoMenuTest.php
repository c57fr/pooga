<?php

class Gc7ToolsTest extends PHPUnit_Framework_TestCase {

	function testToCamelCase () {
		$this->assertEquals( 'AbCdEfc', Gc7Tools::toCamelCase( 'aB_CD ef' ) );
	}

}

