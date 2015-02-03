<?php

namespace Test\LogIn;

use Application\Responder;

class LogInResponderSpy extends Responder {
	public $showHomeViewCalled = false;

	public function showHomeView() {
		$this->showHomeViewCalled = true;
	}
}