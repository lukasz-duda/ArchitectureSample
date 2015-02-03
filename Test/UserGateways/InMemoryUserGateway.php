<?php

namespace Test\UserGateways;

use Test\InMemoryGateway;

class InMemoryUserGateway extends InMemoryGateway {

	public function findByName($name) {
		foreach ( $this->getEntities () as $user ) {
			if ($user->name == $name) {
				return $user;
			}
		}
	}
}