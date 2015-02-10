<?php

namespace Application;

class Entity {
	private $id;

	function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function isSame($entity) {
		return $this->id != null && $this->id == $entity->id;
	}

	function makeClone() {
		return clone $this;
	}
}