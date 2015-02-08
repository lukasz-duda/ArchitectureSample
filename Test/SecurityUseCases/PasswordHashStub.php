<?php

namespace Test\SecurityUseCases;

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