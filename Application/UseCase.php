<?php

namespace Application;

class UseCase {

	public function execute($transactionName, $request, $responder) {
		$this->$transactionName ( $request, $responder );
	}
}