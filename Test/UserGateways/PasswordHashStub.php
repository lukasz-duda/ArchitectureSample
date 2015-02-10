<?php

namespace Test\UserGateways;

class PasswordHashStub {
	private $valid = true;

	function create($password) {
	}

	function setUpNotValid() {
		$this->valid = false;
	}

	function verify($password, $paswordHash) {
		return $this->valid;
	}
}