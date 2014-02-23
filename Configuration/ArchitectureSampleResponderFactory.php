<?php
namespace Configuration;

use Boundaries\ResponderFactory;
use SalesResponderImplementations\AddOrderResponder;

class ArchitectureSampleResponderFactory implements ResponderFactory {

    function makeResponder($useCaseName)
    {
        switch($useCaseName) {
            case "AddOrder":
                return $this->makeAddOrderResponder();
            default:
                throw new \Exception("Use case " . $useCaseName . " not supported.");
        }
    }

    function makeAddOrderResponder() {
        return new AddOrderResponder();
    }
}