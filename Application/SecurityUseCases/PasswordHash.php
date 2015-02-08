<?php

namespace Application\SecurityUseCases;

class PasswordHash {

	function create($password) {
		return password_hash ( $password, PASSWORD_DEFAULT );
	}

	function verify($password, $passwordHash) {
		return password_verify ( $password, $passwordHash );
	}
}