<?php

namespace Application;

class UseCase {

	function execute($transactionName, $request, $responder) {
		$this->$transactionName ( $request, $responder );
	}
}