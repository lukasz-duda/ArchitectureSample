<?php
namespace SalesInteractors;

use Boundaries\UseCase;

class AddOrderUseCase implements UseCase
{
    private $orderGateway;

    function setOrderGateway($orderGateway) {
        $this->orderGateway = $orderGateway;
    }

    function getOrderGateway() {
        return $this->orderGateway;
    }

    function execute($request, $responder)
    {
        $order = $this->orderGateway->make();
        // copy $request to $order
        $this->orderGateway->save($order);

        $summary = new OrderSummary();
        $summary->totalPrice = 153.43;
        $responder->showOrderSummary($summary);
    }
}