<?php
namespace Configuration;

use Boundaries\RequestBuilder;
use SalesInteractors\AddOrderRequest;

class ArchitectureSampleRequestBuilderTest extends \PHPUnit_Framework_TestCase {

    private $sut;

    public function setUp() {
        $this->sut = new ArchitectureSampleRequestBuilder();
    }

    public function testImplementsRequestBuilder() {
        $this->assertTrue($this->sut instanceof RequestBuilder);
    }

    public function testBuildsAddOrderRequest() {
        $parameters = array (
            "orderNumber"  => "ABC",
            "items" => array(
                array("productName" => "P1", "quantity" => 1),
                array("productName" => "P2", "quantity" => 3.5)
            )
        );

        $request = $this->sut->build("AddOrder", $parameters);

        $this->assertTrue($request instanceof AddOrderRequest);
        $this->assertEquals("ABC", $request->orderNumber);
        $this->assertEquals("P1", $request->orderItems[0]->productName);
        $this->assertEquals(3.5, $request->orderItems[1]->quantity);
    }

}