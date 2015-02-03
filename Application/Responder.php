<?php

namespace Application;

class Responder {
	public $actions = array ();
	public $messages = array ();

	public function __call($name, $args) {
		$action = array (
				'name' => $name,
				'args' => $args [0] 
		);
		
		$this->actions [] = $action;
	}

	public function showWarning($text) {
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