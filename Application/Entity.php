<?php

namespace Application;

class Entity {
	private $id;

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function isSame($entity) {
		return $this->id != null && $this->id == $entity->id;
	}

	public function makeClone() {
		return clone $this;
	}
}