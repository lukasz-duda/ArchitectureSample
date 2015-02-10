<?php

namespace Test\Configuration;

use Application\SecurityUseCases\LogInUseCase;
use Test\UserGateways\InMemoryUserGateway;
use Application\UserGateways\PasswordHash;

class DemoUseCaseFactory {
	static $userGateway;
	static $passwordHash;
	static $setupCompleted = false;

	static function setUp() {
		if (DemoUseCaseFactory::$setupCompleted)
			return;
		
		DemoUseCaseFactory::$userGateway = new InMemoryUserGateway ();
		DemoUseCaseFactory::$passwordHash = new PasswordHash ();
		DemoData::setUp ();
		DemoUseCaseFactory::$setupCompleted = true;
	}

	function makeUseCase($useCaseName) {
		$useCaseFamilies = array (
				'Application\SecurityUseCases' 
		);
		
		foreach ( $useCaseFamilies as $useCaseFamily ) {
			$useCaseClassName = $useCaseFamily . '\\' . $useCaseName . 'UseCase';
			if (class_exists ( $useCaseClassName ))
				$useCase = new $useCaseClassName ();
		}
		
		$useCase->userGateway = DemoUseCaseFactory::$userGateway;
		$useCase->passwordHash = DemoUseCaseFactory::$passwordHash;
		return $useCase;
	}
}