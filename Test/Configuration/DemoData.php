<?php

namespace Test\Configuration;

use Application\UserEntities\User;

class DemoData {

	static function setUp() {
		DemoData::addUsers ();
	}

	static function addUsers() {
		$user = new User ();
		$user->setName ( 'User' );
		$user->setPasswordHash ( password_hash ( 'Password', PASSWORD_DEFAULT ) );
		DemoUseCaseFactory::$userGateway->save ( $user );
	}
}
