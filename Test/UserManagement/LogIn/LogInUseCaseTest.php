<?php

namespace Test\UserManagement\LogIn;

use Application\UserManagement\LogIn\LogInUseCase;
use Application\UserEntities\User;
use Test\TestCase;
use Test\UserGateways\InMemoryUserGateway;
use Test\LogIn\LogInResponderSpy;

class LogInUseCaseTest extends TestCase {
	private $sut;
	private $responder;
	private $userGateway;
	private $user;

	public function setUp() {
		$this->responder = new LogInResponderSpy ();
		$this->sut = new LogInUseCase ();
		$this->userGateway = new InMemoryUserGateway ();
		$this->sut->userGateway = $this->userGateway;
		$this->setUpUser ();
	}

	public function setUpUser() {
		$user = new User ();
		$user->name = 'UserName';
		$this->userGateway->save ( $user );
	}

	public function testWithExistingUserName_showsHomeView() {
		$request = $this->makeExistingUserRequest ();
		$this->sut->logIn ( $request, $this->responder );
		$this->assertTrue ( $this->responder->showHomeViewCalled );
	}

	public function makeExistingUserRequest() {
		return ( object ) array (
				'userName' => 'UserName' 
		);
	}

	public function testWithNotExistingUserName_showsMessage() {
		$request = $this->makeNotExistingUserRequest ();
		$this->sut->logIn ( $request, $this->responder );
		$this->assertFalse ( $this->responder->showHomeViewCalled );
		$this->assertEquals ( 'Wrong user name.', $this->responder->messages [0] ['text'] );
	}

	public function makeNotExistingUserRequest() {
		return ( object ) array (
				'userName' => 'WrongUserName' 
		);
	}
}