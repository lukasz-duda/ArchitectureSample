<?php

namespace Test\Configuration;

use Application\UserManagement\LogIn\LogInUseCase;
use Test\UserGateways\InMemoryUserGateway;
use Application\UserEntities\User;

class DemoUseCaseFactory {
	public static $userGateway;

	function makeUseCase($useCaseName) {
		$useCaseFamilies = array (
				'Application\UserManagement' 
		);
		
		foreach ( $useCaseFamilies as $useCaseFamily ) {
			$useCaseNamespace = $useCaseFamily . '\\' . $useCaseName;
			$useCaseClassName = $useCaseNamespace . '\\' . $useCaseName . 'UseCase';
			if (class_exists ( $useCaseClassName ))
				$useCase = new $useCaseClassName ();
		}
		
		$useCase->userGateway = $this->makeUserGateway ();
		return $useCase;
	}

	public function makeUserGateway() {
		return DemoUseCaseFactory::$userGateway;
	}
}