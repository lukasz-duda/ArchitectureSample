<?php
namespace SalesInteractors;

class AddOrderRequest {
    public $orderNumber;
    public $orderItems = array();
}