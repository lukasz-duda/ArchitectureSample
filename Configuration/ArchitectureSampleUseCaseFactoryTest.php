<?php
namespace Configuration;

use Boundaries\UseCaseFactory;
use OrderGateways\OrderGateway;
use SalesInteractors\AddOrderUseCase;

class ArchitectureSampleUseCaseFactoryTest extends \PHPUnit_Framework_TestCase {

    private $sut;

    public function setUp() {
        $serviceLocator = new ArchitectureSampleServiceLocator();
        $this->sut = new ArchitectureSampleUseCaseFactory($serviceLocator);
    }

    public function testImplementsUseCaseFactory() {
        $this->assertTrue($this->sut instanceof UseCaseFactory);
    }

    public function testMakesAddOrderUseCase() {
        $useCase = $this->sut->makeUseCase("AddOrder");

        $this->assertTrue($useCase instanceof AddOrderUseCase);
        $this->assertTrue($useCase->getOrderGateway() instanceof OrderGateway);
    }

}