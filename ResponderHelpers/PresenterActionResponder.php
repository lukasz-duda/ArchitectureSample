<?php
namespace ResponderHelpers;

abstract class PresenterActionResponder {

    private $actions;

    public function __construct() {
        $this->actions = array();
    }

    function addAction($action) {
        array_push($this->actions, $action);
    }

    function getActions() {
        return $this->actions;
    }

} 