<?php
namespace SalesInteractors;

use InteractorTestHelpers\InteractorTest;

class AddOrderUseCaseTest extends InteractorTest
{
    private $sut;
    private $orderGateway;
    private $responder;

    public function setUp() {
        $useCase = new AddOrderUseCase();
        $this->orderGateway = new OrderGatewaySpy();
        $useCase->setOrderGateway($this->orderGateway);
        $this->sut = $useCase;

        $this->responder = new AddOrderResponderSpy();
    }

	public function testImplementsUseCase()
	{
        $this->implementsUseCase($this->sut);
	}

    public function testSavesOrder() {
        $this->sut->execute(null, $this->responder);

        $this->assertTrue($this->orderGateway->calledSave);
        $this->assertNotNull($this->orderGateway->calledOrderInMethodSave);
    }

    public function testResponds() {
        $this->sut->execute(null, $this->responder);

        $this->assertTrue($this->responder->calledShowOrderSummary);
    }
}