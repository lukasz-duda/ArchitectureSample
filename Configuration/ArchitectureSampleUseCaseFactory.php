<?php
namespace Configuration;

use Boundaries\UseCaseFactory;
use SalesInteractors\AddOrderUseCase;

class ArchitectureSampleUseCaseFactory implements UseCaseFactory {

    private $serviceLocator;

    public function __construct($serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }

    function makeUseCase($useCaseName)
    {
        switch($useCaseName) {
            case "AddOrder":
                return $this->makeAddOrderUseCase();
            default:
                throw new \Exception("Use case" . $useCaseName . " not supported.");
        }
    }

    function makeAddOrderUseCase() {
        $useCase = new AddOrderUseCase();
        $orderGateway = $this->serviceLocator->make("OrderGateway");
        $useCase->setOrderGateway($orderGateway);
        return $useCase;
    }
}