<?php

namespace Test;

use Application\Entity;

class InMemoryGateway {
	protected $entities = array ();

	public function save($entity) {
		if ($entity->getId () == null)
			$entity->setId ( Guid::next () );
		$clone = $entity->makeClone ();
		$this->entities [] = $clone;
		return $entity->makeClone ();
	}

	public function getEntities() {
		$clonedEntities = array ();
		foreach ( $this->entities as $entity )
			$clonedEntities [] = $entity->makeClone ();
		return $clonedEntities;
	}

	public function delete($entity) {
		for($i = 0; $i < count ( $this->entities ); $i ++) {
			if ($entity->getId () == $this->entities [$i]->getId ())
				unset ( $this->entities [$i] );
		}
	}
}