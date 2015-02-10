<?php

namespace Test;

use Test\Guid;
use Application\Entity;

class InMemoryGateway {
	private $entities = array ();

	function save($entity) {
		if ($entity->getId () == null)
			$entity->setId ( Guid::create () );
		$clone = $entity->makeClone ();
		$this->entities [] = $clone;
		return $entity->makeClone ();
	}

	function getEntities() {
		$clonedEntities = array ();
		foreach ( $this->entities as $entity )
			$clonedEntities [] = $entity->makeClone ();
		return $clonedEntities;
	}

	function delete($entity) {
		for($i = 0; $i < count ( $this->entities ); $i ++) {
			if ($entity->isSame ( $this->entities [$i] ))
				unset ( $this->entities [$i] );
		}
	}

	function get($id) {
		foreach ( $this->getEntities () as $entity )
			if ($entity->getId () == $id)
				return $entity;
	}
}