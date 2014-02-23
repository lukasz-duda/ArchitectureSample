<?php
namespace ResponderHelpers;

class PresenterAction {

    public $name;
    public $parameters;

    public function __construct($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    function getParameters() {
        return $this->parameters;
    }

    function setParameters($parameters) {
        $this->parameters = $parameters;
    }

} 