<?php
namespace Main;

use Configuration\ArchitectureSampleRequestBuilder;
use Configuration\ArchitectureSampleResponderFactory;
use Configuration\ArchitectureSampleServiceLocator;
use Configuration\ArchitectureSampleUseCaseFactory;

class UseCaseActivator {

    private $useCaseFactory;
    private $requestBuilder;
    private $responderFactory;

    public function __construct() {
        $serviceLocator = new ArchitectureSampleServiceLocator();
        $this->useCaseFactory = new ArchitectureSampleUseCaseFactory($serviceLocator);
        $this->requestBuilder = new ArchitectureSampleRequestBuilder();
        $this->responderFactory = new ArchitectureSampleResponderFactory();
    }

    public function execute($useCaseName, $parameters) {
        $request = $this->requestBuilder->build($useCaseName, $parameters);
        $useCase = $this->useCaseFactory->makeUseCase($useCaseName);
        $responder = $this->responderFactory->makeResponder($useCaseName);

        $useCase->execute($request, $responder);

        return json_encode($responder->getActions());
    }

} 