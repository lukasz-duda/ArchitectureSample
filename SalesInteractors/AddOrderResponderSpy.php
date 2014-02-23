<?php
namespace SalesInteractors;

use SalesResponders\AddOrderResponder;

class AddOrderResponderSpy implements AddOrderResponder {

    public $calledShowOrderSummary;

    function showOrderSummary($orderSummary)
    {
        $this->calledShowOrderSummary = true;
    }
}