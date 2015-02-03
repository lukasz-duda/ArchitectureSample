<?php

namespace Test;

use Application\Entity;

class EntityTest extends TestCase {

	public function testTwoDifferentEntitiesAreNotSame() {
		$entity1 = new Entity ();
		$entity2 = new Entity ();
		$entity1->setId ( "entity1Id" );
		$entity2->setId ( "entity2Id" );
		$this->assertFalse ( $entity1->isSame ( $entity2 ) );
	}

	public function testOneEntityIsTheSameAsItself() {
		$entity1 = new Entity ();
		$entity1->setId ( "entity1Id" );
		$this->assertTrue ( $entity1->isSame ( $entity1 ) );
	}

	public function testEntitiesWithTheSameIdAreTheSame() {
		$entity1 = new Entity ();
		$entity2 = new Entity ();
		$entity1->setId ( "entity1Id" );
		$entity2->setId ( "entity1Id" );
		$this->assertTrue ( $entity1->isSame ( $entity2 ) );
	}

	public function testEntitiesWithNullIdsAreNeverSame() {
		$entity1 = new Entity ();
		$entity2 = new Entity ();
		$this->assertFalse ( $entity1->isSame ( $entity2 ) );
	}

	public function testClonedEntityIsSameAsOriginal() {
		$entity1 = new Entity ();
		$entity1->setId ( "entity1Id" );
		$entity2 = $entity1->makeClone ();
		$this->assertTrue ( $entity1->isSame ( $entity2 ) );
	}

	public function testClonedEntitiesRefersToDifferentObject() {
		$entity1 = new Entity ();
		$entity1->setId ( "entity1Id" );
		$entity2 = $entity1->makeClone ();
		$this->assertNotSame ( $entity1, $entity2 );
	}
}