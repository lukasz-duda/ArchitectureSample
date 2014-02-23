<?php
namespace Configuration;

use Boundaries\RequestBuilder;
use SalesInteractors\AddOrderRequest;
use SalesInteractors\OrderItem;

class ArchitectureSampleRequestBuilder implements RequestBuilder {

    function build($useCaseName, $parameters)
    {
        switch($useCaseName) {
            case "AddOrder":
                return $this->buildAddOrderRequest($parameters);
            default:
                throw new \Exception("Use case" . $useCaseName . " not supported.");
        }
    }

    function buildAddOrderRequest($parameters) {
        $request = new AddOrderRequest();
        $request->orderNumber = $parameters["orderNumber"];

        foreach ($parameters["items"] as $item) {
            $orderItem = new OrderItem();
            $orderItem->productName = $item["productName"];
            $orderItem->quantity = $item["quantity"];
            array_push($request->orderItems, $orderItem);
        }

        return $request;
    }
}