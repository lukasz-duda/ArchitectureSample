<?php

namespace Application\SecurityUseCases;

use Application\UseCase;

class LogInUseCase extends UseCase {
	public $userGateway;
	public $passwordHash;

	function logIn($request, $responder) {
		$user = $this->userGateway->findByName ( $request->userName );
		
		if ($user == null) {
			$this->invalidPassword ( $responder );
			return;
		}
		
		$invalidPassword = ! $this->passwordHash->verify ( $request->password, $user->passwordHash );
		if ($invalidPassword) {
			$this->invalidPassword ( $responder );
			return;
		}
		
		$responder->showHomeView ();
	}

	function invalidPassword($responder) {
		$responder->showWarning ( 'Wrong user name or password.' );
	}
}