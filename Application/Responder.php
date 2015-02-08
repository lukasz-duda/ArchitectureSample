<?php

namespace Application;

class Responder {
	public $actions = array ();
	public $messages = array ();

	function __call($name, $args) {
		$firstArgument = ($args) ? $args[0] : null;
		$action = array (
				'name' => $name,
				'args' => $firstArgument
		);
		
		$this->actions [] = $action;
	}

	function showWarning($text) {
		$message = array (
				'text' => $text 
		);
		
		$action = array (
				'name' => 'showWarning',
				'args' => $message 
		);
		
		$this->actions [] = $action;
		$this->messages [] = $message;
	}
}
