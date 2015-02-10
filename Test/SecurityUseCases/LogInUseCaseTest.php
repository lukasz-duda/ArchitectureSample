<?php

namespace Test\SecurityUseCases;

use Application\SecurityUseCases\LogInUseCase;
use Application\UserEntities\User;
use Test\TestCase;
use Test\UserGateways\InMemoryUserGateway;
use Test\SecurityUseCases\LogInResponderSpy;

class LogInUseCaseTest extends TestCase {
	private $sut;
	private $responder;
	private $userGateway;
	private $passwordHash;
	private $user;

	function setUp() {
		$this->responder = new LogInResponderSpy ();
		$this->sut = new LogInUseCase ();
		$this->userGateway = new InMemoryUserGateway ();
		$this->sut->userGateway = $this->userGateway;
		$this->passwordHash = new PasswordHashStub ();
		$this->sut->passwordHash = $this->passwordHash;
		$this->setUpUser ();
	}

	function setUpUser() {
		$user = new User ();
		$user->setName ( 'UserName' );
		$this->userGateway->save ( $user );
	}

	function testWithExistingUserName_showsHomeView() {
		$request = $this->makeExistingUserRequest ();
		
		$this->sut->logIn ( $request, $this->responder );
		$this->assertTrue ( $this->responder->showHomeViewCalled );
	}

	function makeExistingUserRequest() {
		return ( object ) array (
				'userName' => 'UserName',
				'password' => 'Password' 
		);
	}

	function testWithNotExistingUserName_showsWarning() {
		$request = $this->makeNotExistingUserRequest ();
		
		$this->sut->logIn ( $request, $this->responder );
		
		$this->assertFalse ( $this->responder->showHomeViewCalled );
		$this->assertEquals ( 'Wrong user name or password.', $this->responder->messages [0] ['text'] );
	}

	function makeNotExistingUserRequest() {
		return ( object ) array (
				'userName' => 'NotExistingUserName' 
		);
	}

	function testWithInvalidPassword_showsWarning() {
		$this->passwordHash->setUpNotValid ();
		$request = $this->makeExistingUserRequest ();
		
		$this->sut->logIn ( $request, $this->responder );
		
		$this->assertFalse ( $this->responder->showHomeViewCalled );
		$this->assertEquals ( 'Wrong user name or password.', $this->responder->messages [0] ['text'] );
	}
}