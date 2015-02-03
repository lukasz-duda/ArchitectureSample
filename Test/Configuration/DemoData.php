<?php

namespace Test\Configuration;

use Application\UserEntities\User;
use Test\UserGateways\InMemoryUserGateway;

class DemoData {
	public static $setupCompleted = false;

	public static function setUp() {
		if (DemoData::$setupCompleted)
			return;
		
		DemoData::addUsers ();
		
		DemoData::$setupCompleted = true;
	}

	private static function addUsers() {
		$userGateway = new InMemoryUserGateway ();
		
		$user = new User ();
		$user->name = "UserName";
		$userGateway->save ( $user );
		
		DemoUseCaseFactory::$userGateway = $userGateway;
	}
}
