<?php

namespace Application\UserEntities;

use Application\Entity;

class User extends Entity {
	private $name;
	private $passwordHash;

	function getName() {
		return $this->name;
	}

	function setName($name) {
		$this->name = $name;
	}

	function getPasswordHash() {
		return $this->passwordHash;
	}

	function setPasswordHash($passwordHash) {
		$this->passwordHash = $passwordHash;
	}
}