<?php
namespace InteractorTestHelpers;

use Boundaries\UseCase;

abstract class InteractorTest extends \PHPUnit_Framework_TestCase {

    public function implementsUseCase($interactor) {
        $this->assertTrue($interactor instanceof UseCase);
    }

}