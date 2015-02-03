<?php

namespace Test;

use Test\TestCase;
use Application\UseCase;

class TestUseCase extends UseCase {
	public $calledRequest;
	public $calledResponder;

	public function transaction($request, $responder) {
		$this->calledRequest = $request;
		$this->calledResponder = $responder;
	}
}
class UseCaseTest extends TestCase {
	private $sut;

	public function setUp() {
		$this->sut = new TestUseCase ();
	}

	public function testExecutesTransaction() {
		$expectedRequest = 'request';
		$expectedResponder = 'responder';
		
		$this->sut->execute ( 'transaction', $expectedRequest, $expectedResponder );
		
		$this->assertEquals ( $expectedRequest, $this->sut->calledRequest );
		$this->assertEquals ( $expectedResponder, $this->sut->calledResponder );
	}
}