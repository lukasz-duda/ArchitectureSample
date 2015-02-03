<?php

namespace Application\UserManagement\LogIn;

use Application\UseCase;

class LogInUseCase extends UseCase {
	public $userGateway;

	public function logIn($request, $responder) {
		$user = $this->userGateway->findByName ( $request->userName );
		
		if ($user == null) {
			$responder->showWarning ( 'Wrong user name.' );
			return;
		}
		
		$responder->showHomeView ();
	}
}