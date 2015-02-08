<?php

namespace Test\SecurityUseCases;

use Application\Responder;

class LogInResponderSpy extends Responder {
	public $showHomeViewCalled = false;

	function showHomeView() {
		$this->showHomeViewCalled = true;
	}
}