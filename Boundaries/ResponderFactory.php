<?php
namespace Boundaries;

interface ResponderFactory {
    function makeResponder($useCaseName);
} 