<?php
namespace SalesInteractors;

use OrderGateways\OrderGateway;

class OrderGatewaySpy implements OrderGateway {

    public $calledSave;
    public $calledMake;
    public $calledOrderInMethodSave;

    function make()
    {
        $this->calledMake = true;
        return new TestOrder();
    }

    function save($order)
    {
        $this->calledOrderInMethodSave = $order;
        $this->calledSave = true;
    }
}