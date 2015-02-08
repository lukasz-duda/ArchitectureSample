<?php

namespace Test\UserGateways;

use Test\InMemoryGateway;

class InMemoryUserGateway extends InMemoryGateway {

	function findByName($name) {
		foreach ( $this->getEntities () as $user ) {
			if ($user->name == $name) {
				return $user;
			}
		}
	}
}