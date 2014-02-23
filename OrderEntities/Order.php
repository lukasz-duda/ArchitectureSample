<?php
namespace OrderEntities;

abstract class Order {

    protected $number;
    protected $items;

    function Order() {
        $this->items = array();
    }

    function getNumber() {
        return $this->number;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function addItem($item) {
        array_push($items, $item);
    }

    function getItems() {
        return $this->items;
    }
} 