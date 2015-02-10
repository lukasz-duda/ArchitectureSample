<?php

namespace Test;

use Application\Entity;

class TestEntity extends Entity {
}
class InMemoryGatewayTest extends TestCase {
	private $sut;

	function setUp() {
		$this->sut = new InMemoryGateway ();
	}

	function testTwoSavedEntitiesHaveDifferentIds() {
		$entity1 = new Entity ();
		$this->sut->save ( $entity1 );
		$entity2 = new Entity ();
		$this->sut->save ( $entity2 );
		
		$this->assertNotEquals ( $entity1->getId(), $entity2->getId() );
	}

	function testSaveDoesntChangeExistingId() {
		$entity = new Entity ();
		$this->sut->save ( $entity );
		$expectedId = $entity->getId();
		
		$this->sut->save ( $entity );
		
		$this->assertEquals ( $expectedId, $entity->getId() );
	}

	function testSaveReturnsClonedEntity() {
		$entity = new Entity ();
		
		$clone = $this->sut->save ( $entity );
		
		$this->assertEquals ( $entity->getId(), $clone->getId() );
		$this->assertNotSame ( $entity, $clone );
	}

	function testGetEntitiesReturnsClonedEntities() {
		$entity = new Entity ();
		$clone = $this->sut->save ( $entity );
		
		$entities1 = $this->sut->getEntities ();
		$entities2 = $this->sut->getEntities ();
		
		$this->assertNotSame ( $entities1 [0], $entities2 [0] );
	}

	function testDeleteRemovesEntity() {
		$entity = new Entity ();
		$this->sut->save ( $entity );
		
		$this->sut->delete ( $entity );
		
		$this->assertEquals ( 0, count ( $this->sut->getEntities () ) );
	}

	function testCanGetById() {
		$entity = new Entity ();
		$this->sut->save ( $entity );
		
		$returnedEntity = $this->sut->get ( $entity->getId() );
		
		$this->assertTrue ( $entity->isSame ( $returnedEntity ) );
	}
}