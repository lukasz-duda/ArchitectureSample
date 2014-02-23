<?php
namespace OrderGatewayImplementations;

use OrderGateways\OrderGateway;

class SqlOrderGateway implements OrderGateway {

    function make()
    {
        return new SqlOrder();
    }

    function save($order)
    {
        print "Saving order";
    }
}