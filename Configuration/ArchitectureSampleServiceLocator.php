<?php
namespace Configuration;

use OrderGatewayImplementations\SqlOrderGateway;

class ArchitectureSampleServiceLocator implements ServiceLocator {

    public function make($typeName)
    {
        switch($typeName) {
            case "OrderGateway":
                return $this->makeOrderGateway();
            default:
                throw new \Exception("Type " . $typeName . " not supported.");
        }
    }

    public function makeOrderGateway() {
        return new SqlOrderGateway();
    }

}