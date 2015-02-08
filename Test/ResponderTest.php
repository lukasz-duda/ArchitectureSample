<?php

namespace Test;

use Application\Responder;

class ResponderTest extends TestCase {
	private $sut;

	function setUp() {
		$this->sut = new Responder ();
	}

	function testRecordsFunctionCalls() {
		$expectedArgument1 = array (
				'argName1' => 'argValue1' 
		);
		$expectedArgument2 = array (
				'argName2' => 'argValue2' 
		);
		
		$this->sut->functionName1 ( $expectedArgument1 );
		$this->sut->functionName2 ( $expectedArgument2 );
		
		$this->assertEquals ( 2, count ( $this->sut->actions ) );
		$this->assertEquals ( 'functionName1', $this->sut->actions [0] ['name'] );
		$this->assertEquals ( $expectedArgument1, $this->sut->actions [0] ['args'] );
		$this->assertEquals ( 'functionName2', $this->sut->actions [1] ['name'] );
		$this->assertEquals ( $expectedArgument2, $this->sut->actions [1] ['args'] );
	}

	function testShowWarning_updatesActionsAndMessages() {
		$expectedText = 'message';
		
		$this->sut->showWarning ( $expectedText );
		
		$this->assertEquals ( 1, count ( $this->sut->actions ) );
		$this->assertEquals ( 'showWarning', $this->sut->actions [0] ['name'] );
		$message = $this->sut->actions [0] ['args'];
		$this->assertEquals ( $expectedText, $message ['text'] );
		$this->assertEquals ( 1, count ( $this->sut->messages ) );
		$this->assertEquals ( $expectedText, $this->sut->messages [0] ['text'] );
	}
}
