<?php

namespace Application;

class Entity {
	public $id;

	function isSame($entity) {
		return $this->id != null && $this->id == $entity->id;
	}

	function makeClone() {
		return clone $this;
	}
}