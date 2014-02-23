<?php
namespace OrderEntities;

abstract class OrderItem {

    protected $productName;
    protected $quantity;

    function setProductName($productName) {
        $this->productName = $productName;
    }

    function getProductName() {
        return $this->productName;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function getQuantity() {
        return $this->quantity;
    }

} 