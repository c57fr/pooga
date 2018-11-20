<?php namespace Psr\EventManager;
use PHPUnit\Framework\TestCase;

//include 'autoloader.php';
//
require './DPCpnt/6_Observer/EventManager.php';
//require './DPCpnt/6_Observer/EventManagerInterface.php';
//include 'C:\laragon\www\pooga\DPCpnt/6_Observer/EventManagerInterface.php';

/**
 * Class EventManagerTest
 * @package Gc7
 */
class EventManagerTest extends TestCase {

	private $manager;

	public function setUp () {
		$this->manager = new EventManager();
		parent::setUp();
		//$this->assertEquals(1+1,21);
	}


	/**
	 * @param string $eventName
	 * @param string $target
	 *
	 * @return \PHPUnit_Framework_MockObject_MockObject
	 */
	private function makeEvent ( string $eventName = 'default.event', $target = 'target' ) {
		$event = $this->getMockBuilder( EventInterface::class )->getMock();
		$event->method( 'getName' )->willReturn( $eventName );

		return $event;
	}
	
	public function testTriggerEvent () {
		$event = $this->makeEvent();

	}


}
