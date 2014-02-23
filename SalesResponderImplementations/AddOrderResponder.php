<?php
namespace SalesResponderImplementations;

use ResponderHelpers\PresenterAction;
use ResponderHelpers\PresenterActionResponder;

class AddOrderResponder extends PresenterActionResponder implements \SalesResponders\AddOrderResponder {

    function showOrderSummary($orderSummary)
    {
        $action = new PresenterAction("showOrderSummary");
        $action->setParameters(
            array(
                "orderSummary" => array(
                    "totalPrice" => $orderSummary->totalPrice
                )
            )
        );

        $this->addAction($action);
    }
}