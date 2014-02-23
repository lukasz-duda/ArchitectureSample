<?php
namespace Main;

class UseCaseActivatorTest extends \PHPUnit_Framework_TestCase {

    public function testExecute() {
        $sut = new UseCaseActivator();

        $parameters = array (
            "orderNumber"  => "ABC",
            "items" => array(
                array("productName" => "P1", "quantity" => 1),
                array("productName" => "P2", "quantity" => 3.5)
            )
        );

        $response = $sut->execute("AddOrder", $parameters);

        $this->assertEquals(
            "[{\"name\":\"showOrderSummary\",\"parameters\":{\"orderSummary\":{\"totalPrice\":153.43}}}]",
            $response);
    }

} 