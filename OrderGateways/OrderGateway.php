<?php
namespace OrderGateways;

interface OrderGateway {

    function make();

    function save($order);

} 