<?php

namespace Test\Configuration;

use Application\UserEntities\User;

class DemoData {

	static function setUp() {
		DemoData::addUsers ();
	}

	static function addUsers() {
		$user = new User ();
		$user->name = 'User';
		$user->passwordHash = password_hash ( 'Password', PASSWORD_DEFAULT );
		DemoUseCaseFactory::$userGateway->save ( $user );
	}
}
